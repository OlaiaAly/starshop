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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class PromoterTicketController extends Controller
{
    public function PromoterAllTicket()
    {
        $id = Auth::user()->id;
        $tickets = Ticket::where('promoter_id', $id)->latest()->get();
        return view('promoter.backend.ticket.promoter_ticket_all', compact('tickets'));
    }

    public function PromoterAddTicket()
    {
        $categories = Category::latest()->get();
        return view('promoter.backend.ticket.promoter_ticket_add', compact('categories'));
    }

    public function PromoterGetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcat);
    }

    public function PromoterStoreTicket(Request $request)
    {
        $ticket = Ticket::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'event_name' => $request->event_name,
            'ticket_slug' => strtolower(str_replace(' ', '-', $request->event_name)),
            'event_date' => $request->event_date,
            'ticket_type' => $request->ticket_type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'promoter_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        if ($request->ticket_image) {
            $ticket->addMedia($request->ticket_image)->toMediaCollection('cover');
            $ticket->save();
        }

        $notification = [
            'message' => 'Bilhete Inserido Com Sucesso',
            'alert-type' => 'success'
        ];
        return redirect()->route('promoter.all.ticket')->with($notification);
    }

    public function PromoterEditTicket($id)
    {
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $ticket = Ticket::findOrFail($id);
        return view('promoter.backend.ticket.promoter_ticket_edit', compact('categories', 'ticket', 'subcategory'));
    }

    public function PromoterUpdateTicket(Request $request)
    {
        $ticket_id = $request->id;
        Ticket::findOrFail($ticket_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'event_name' => $request->event_name,
            'ticket_slug' => strtolower(str_replace(' ', '-', $request->event_name)),
            'event_date' => $request->event_date,
            'ticket_type' => $request->ticket_type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'promoter_id' => Auth::user()->id,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('promoter.all.ticket');
    }

    public function PromoterTicketInactive($id)
    {
        Ticket::findOrFail($id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function PromoterTicketActive($id)
    {
        Ticket::findOrFail($id)->update(['status' => 1]);
        return redirect()->back();
    }
}

