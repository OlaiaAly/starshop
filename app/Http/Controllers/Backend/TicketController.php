<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\MultiImag;

// class TicketController extends Controller
// {
    
//     public function AllTicket(){
//         $products = Ticket::latest()->get();
//             return view('backend.ticket.ticket_all', compact('tickets'));
//         }//fim do metodo

// }

class TicketController extends Controller{
    public function AllTicket()
    {
        $tickets = Ticket::latest()->get();
        return view('backend.ticket.ticket_all', compact('tickets'));
    }

    public function AddTicket(){
        $activePromoters = User::where('status', 'active')->where('role', 'promoter')->latest()->get();
        $categories = Category::latest()->get();
        return view('backend.ticket.ticket_add', compact('categories', 'activePromoters'));
    }

    public function StoreTicket(Request $request){
        $ticket = Ticket::create([
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'price_normal' => $request->price_normal,
            'price_vip' => $request->price_vip,
            'quantity_normal' => $request->quantity_normal,
            'quantity_vip' => $request->quantity_vip,
            'event_type' => $request->event_type,
            'description' => $request->description,
            'status' => 1,
            'vendor_id' => $request->vendor_id,
            'slug' => strtolower(str_replace(' ', '-', $request->event_name)),
            'tags' => $request->tags,
            'created_at' => Carbon::now(),
        ]);
    
        if ($request->ticket_image) {
            $ticket->addMedia($request->ticket_image)->toMediaCollection('ticket');
        }
    
        $notification = [
            'message' => 'Bilhete Inserido Com Sucesso',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.ticket')->with($notification);
    }
    
    
    public function UpdateTicket(Request $request){
        $ticket_id = $request->id;
        
        $request->validate([
            'event_name' => 'required|min:3',
            'event_date' => 'required|date',
            'location' => 'required',
            'price_normal' => 'required|numeric',
            'price_vip' => 'nullable|numeric',
            'quantity_normal' => 'required|integer',
            'quantity_vip' => 'nullable|integer',
            'description' => 'required',
            'vendor_id' => 'required',
            'tags' => 'nullable',
        ]);
    
        Ticket::findOrFail($ticket_id)->update([
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'price_normal' => $request->price_normal,
            'price_vip' => $request->price_vip,
            'quantity_normal' => $request->quantity_normal,
            'quantity_vip' => $request->quantity_vip,
            'description' => $request->description,
            'vendor_id' => $request->vendor_id,
            'slug' => strtolower(str_replace(' ', '-', $request->event_name)),
            'tags' => $request->tags,
            'updated_at' => Carbon::now(),
        ]);
    
        $notification = [
            'message' => 'Ticket Atualizado Com Sucesso',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('all.ticket')->with($notification);
    }
    
    
    

    public function EditTicket($id){
        $activePromoters = User::where('status', 'active')->where('role', 'promoter')->latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $ticket = Ticket::findOrFail($id);

        return view('backend.ticket.ticket_edit', compact('categories', 'activePromoters', 'ticket', 'subcategories'));
    }

    
    
    public function TicketInactive($id){
        Ticket::findOrFail($id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function TicketActive($id){
        Ticket::findOrFail($id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function DeleteTicket($id){
        $ticket = Ticket::findOrFail($id);
        $ticket->clearMediaCollection('ticket');
        $ticket->delete();

        $notification = [
            'message' => 'Bilhete Deletado Com Sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

