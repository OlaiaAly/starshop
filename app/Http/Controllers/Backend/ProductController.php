<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\MultiImag;

use Image;

class ProductController extends Controller{
    public function AllProduct(){
        $products = Product::latest()->get();
            return view('backend.product.product_all', compact('products'));
        }//fim do metodo
    
        public function AddProduct(){
            $activeVendor= User::where('status', 'active')->where('role', 'vendor')->latest()->get();
            $brands = Brand::latest()->get();
            $categories = Category::latest()->get();


        return view('backend.product.product_add', compact('brands', 'categories', 'activeVendor'));
        
        
            }//fim do metodo
        public function StoreProduct(Request $request){
                

               
                $product=Product::create([
                        'brand_id'=>$request->brand_id,
                        'category_id'=>$request->category_id,
                        'subcategory_id'=>$request->subcategory_id,
                        'product_name'=>$request->product_name,
                        'product_slug'=>strtolower(str_replace(' ', '-', $request->product_name)),
                        'product_code'=>$request->product_code,
                        'product_tags'=>$request->product_tags,
                        'product_color'=>$request->product_color,
                        'product_size'=>$request->product_size,
                        'selling_price'=>$request->selling_price,
                        'product_qty'=>$request->product_qty,
                        'discount_price'=>$request->discount_price,
                        'short_descp'=>$request->short_descp,
                        'long_descp'=>$request->long_descp,
                        // 'hot_deals'=>$request->hot_deals,
                        // 'featured'=>$request->featured	,
                        // 'special_offer'=>$request->special_offer,
                        // 'special_deals'=>$request->special_deals,
                        'vendor_id'=>$request->vendor_id,
                        'status'=>1,
                        'created_at'=>Carbon::now(),
                        

                        


                ]);

                if ($request->product_thambnail) {
                    //$product->clearMediaCollection('cover');
                    // Adicione a nova imagem à coleção de mídia
                    $product->addMedia($request->product_thambnail)->toMediaCollection('cover');
                    $product->save();
                }

                if ($request->multi_img) {
                    foreach($request->multi_img as $file){
                        if ($file) {
                            // Remova a imagem antiga (opcional, depende da implementação do pacote)
                           // $product->clearMediaCollection('brands');
                    
                            // Adicione a nova imagem à coleção de mídia
                            $product->addMedia($file)->toMediaCollection('products');
                            $product->save();
                        } else {
                            // Se não foi enviado, retorne um erro ou defina um valor padrão
                            return redirect()->back()->withErrors(['brand_image' => 'A imagem da marca é obrigatória']);
                        }                

                    }}
            $notification = array(
                'message'=>'Produto Inserido Com Sucesso',
                'alert-type'=>'success'
            );
            return redirect()->route('all.product')->with($notification);

        }

    public function EditProduct($id){
        $activeVendor= User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory= SubCategory::latest()->get();
        $products=Product::findOrFail($id);

        return view('backend.product.product_edit', compact('brands', 'categories', 'activeVendor', 'products','subcategory'));

    }
        public function UpdateProduct(Request  $request){
            $product_id = $request->id;
            
            Product::findOrFail($product_id)->update([
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'product_name'=>$request->product_name,
                'product_slug'=>strtolower(str_replace(' ', '-', $request->product_name)),
                'product_code'=>$request->product_code,
                'product_tags'=>$request->product_tags,
                'product_color'=>$request->product_color,
                'product_size'=>$request->product_size,
                'product_qty'=>$request->product_qty,
                'selling_price'=>$request->selling_price,
                'discount_price'=>$request->discount_price,
                'short_descp'=>$request->short_descp,
                'long_descp'=>$request->long_descp,
                'hot_deals'=>$request->hot_deals,
                'featured'=>$request->featured	,
                'special_offer'=>$request->special_offer,
                'special_deals'=>$request->special_deals,
                'vendor_id'=>$request->vendor_id,
                'status'=>1,
                'created_at'=>Carbon::now(),

         ]);


            return redirect()->route('all.product');
        }

        public function UpdateProductThambnail(Request $request){
            $pro_id=$request->id;
            $oldImage=$request->old_img;

           

            if ($request->multi_img) {
                foreach($request->multi_img as $file){
                    if ($file) {
                        // Remova a imagem antiga (opcional, depende da implementação do pacote)
                       // $product->clearMediaCollection('brands');
                
                        // Adicione a nova imagem à coleção de mídia
                        $product->addMedia($file)->toMediaCollection('products');
                        $product->save();
                    } else {
                        // Se não foi enviado, retorne um erro ou defina um valor padrão
                        return redirect()->back()->withErrors(['brand_image' => 'A imagem da marca é obrigatória']);
                    }                

                }}
        }

        public function ProductInactive($id){
            Product::findOrFail($id)->update(['status'=>0]);
            return redirect()->back();

        }
        public function ProductActive($id){
            Product::findOrFail($id)->update(['status'=>1]);
            return redirect()->back();

        }
        
        public function DeleteProduct($id){
        $product = Product::findOrFail($id);

        // Deleta todas as mídias associadas à coleção 'products' (se aplicável)
        $product->clearMediaCollection('products');

        // Exclui o registro do produto da base de dados
        $product->delete();

        // Notificação de sucesso
        $notification = [
            'message' => 'Produto Deletado Com Sucesso',
            'alert-type' => 'success'
        ];

        // Redireciona para a página anterior com a notificação
        return redirect()->back()->with($notification);
    }
}
