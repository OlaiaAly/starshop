<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function VendorDashboard(){


        return view('vendor.index');
    }
    public function VendorLogin(){

        return view('vendor.vendor_login');


    }

    public function VendorDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }

    public function VendorProfile(){

        $id= Auth::user()->id;
        $vendorData = User::find($id);
        return view ('vendor.vendor_profile_view', compact('vendorData'));
        }

    public function VendorProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name = $request->name;
        // $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_short_info = $request->vendor_short_info;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/'.$data->photo));

            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $filename);
            $data['photo']=$filename;
        }
        $data->save();
        $notification = array(
            'message'=>'O Perfil Do Vendedor Foi Atualizado Com Sucesso',
            'alert-type'=>'success'



        );

        return redirect()->back()->with($notification);
    }


    public function VendorChangePassword(){


        return view('vendor.vendor_change_password');
    }
    

    public function VendorUpdatePassword(Request $request){
        
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required|confirmed'
        ]);
    
    
            if (!Hash::check($request->old_password, auth::user()->password)) {
                return back()->with("error","A Senha Antiga esta errada!!");
            }
            User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
    
    
            ]);
            return back()->with("status", "Senha Mudada com Sucesso!!");
    }

    public function BecomeVendor(){

        return view('auth.become_vendor');
    }

    public function VendorRegister(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'vendor' ,
            'status' => 'inactive',

        ]);

      
        $notification = array(
            'message'=>'O Perfil Do Vendedor Foi Registrado Com Sucesso',
            'alert-type'=>'success'

        );

        return redirect()->route('vendor.login')->with($notification);
    }

}
