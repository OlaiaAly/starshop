<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\MultiImag;

class IndexController extends Controller
{

    public function Index(){
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->limit(10)->get();
        
        $skip_category_2 = Category::skip(1)->first();
        $skip_product_2 = Product::where('status', 1)->where('category_id', $skip_category_2->id)->orderBy('id', 'DESC')->limit(10)->get();
        
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_2->id)->orderBy('id', 'DESC')->limit(10)->get();
        
        return view ('frontend.index', compact('skip_category_0', 'skip_product_0','skip_category_2', 'skip_product_2'));
    }

    public function ProductDetails($id, $slug){
        $product = Product::findOrFail($id);
        
        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        $cat_id =$product->category_id;

        $relatedProduct =Product::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id', 'DESC')->limit(4)->get();
        return view('frontend.product.product_details', compact('product', 'product_color', 'product_size', 'relatedProduct'));

    }
    public function TicketDetails($id, $slug) {
        // Buscar o ticket pelo ID
        $ticket = Ticket::findOrFail($id);
        
        // Preparar dados adicionais, se necessário
        $relatedTickets = Ticket::orderBy('id', 'DESC')->limit(4)->get();
        
        return view('frontend.ticket.ticket_details', compact('ticket', 'relatedTickets'));
    }
    

    public function VendorDetails($id){
        $vendor= User::findOrFail($id);
        $vendor_product = Product::where('vendor_id', $id)->get();
        return view ('frontend.vendor.vendor_details', compact('vendor','vendor_product'));
    }
    public function VendorAll(){
        $vendor = User::where('status', 'active')->where('role', 'vendor')->orderBy('id', 'DESC')->get();
            return view('frontend.vendor.vendor_all', compact('vendor'));
        
        }//fim do metodo
    public function CatWiseProduct(Request $request,$id,$slug){
        $products = Product::where('status','1')->where('category_id', $id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $breadcat=Category::where('id', $id)->first();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
     

        return view('frontend.product.category_view', compact('products','categories', 'breadcat', 'newProduct'));
    }

    public function SubCatWiseProduct(Request $request,$id,$slug){
        $products = Product::where('status','1')->where('subcategory_id', $id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $breadSubcat=SubCategory::where('id', $id)->first();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
     

        return view('frontend.product.subcategory_view', compact('products','categories', 'breadSubcat', 'newProduct'));
    }

    // public function ProductViewAjax($id) {
    //     $product = Product::with('category', 'brand')->findOrFail($id);
    
    //     // Cores e tamanhos
    //     $color = $product->product_color ?? '';
    //     $product_color = explode(',', $color);
    
    //     $size = $product->product_size ?? '';
    //     $product_size = explode(',', $size);
    
    //     // URL da imagem
    //     $imageUrl = $product->getFirstMediaUrl('cover'); // Retorna a URL da imagem
    
    //     // Retorna os dados em formato JSON
    //     return response()->json([
    //         'product' => $product,
    //         'color' => $product_color,
    //         'size' => $product_size,
    //         'image' => $imageUrl
    //     ]);
    // }

    public function ProductViewAjax($id) {
    $product = Product::with('category', 'brand')->findOrFail($id);
    $color = $product->product_color;
    $product_color = explode(',', $color);

    $size = $product->product_size;
    $product_size = explode(',', $size);

    // Obtém a URL da mídia associada ou usa uma imagem padrão
    $imageUrl = $product->getFirstMediaUrl('cover') ?: asset('upload/no_image.jpg');

    return response()->json([
        'product' => $product,
        'color' => $product_color,
        'size' => $product_size,
        'image' => $imageUrl, // Retorna apenas a URL da imagem
    ]);
}

    
    
    public function TicketViewAjax($id) {
        // Obtendo o ticket com as relações necessárias
        $ticket = Ticket::with('vendor')->findOrFail($id);
    
        // Obtendo a imagem do ticket
        $imageHtml = $ticket->getFirstMedia('ticket') 
            ? $ticket->getFirstMedia('ticket')->img()->attributes(["style" => 'width:900px; height:300px;'])->toHtml() 
            : '<img src="'.asset('upload/no_image.jpg').'" style="width:900px; height:300px;" alt="Imagem Padrão">';
    
        // Preparando os dados para retorno
        return response()->json(array(
            'event_name' => $ticket->event_name,
            'event_date' => \Carbon\Carbon::parse($ticket->event_date)->format('d/m/Y H:i'),
            'location' => $ticket->location,
            'price_normal' => $ticket->price_normal,
            'price_vip' => $ticket->price_vip,
            'description' => $ticket->description,
            'vendor_name' => $ticket->vendor ? $ticket->vendor->name : 'Proprietário',
            'image' => $imageHtml,
            'id' => $ticket->id
        ));
    }
    public function showAllTickets() {
        $tickets = Ticket::where('status', 1)->orderBy('id', 'DESC')->get(); // Obtém todos os tickets ativos
        return view('frontend.ticket.ticket_show_all', compact('tickets'));
    }
}
