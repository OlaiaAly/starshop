<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

public function UserDashboard(){
    $id= Auth::user()->id;
    $userData = User::find($id);
    return view('index', compact('userData'));

}//fim do metodo

public function UserProfileStore(Request $request){
    $id=Auth::user()->id;
    $data=User::find($id);
    $data->name = $request->name;
    $data->username = $request->username;
   $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;


    if ($request->file('photo')) {
        $file = $request->file('photo');
        @unlink(public_path('upload/user_images/'.$data->photo));
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images/'), $filename);
        $data['photo']=$filename;
    }
    $data->save();
    $notification = array(
        'message'=>'O Perfil Do Usuario Foi Atualizado Com Sucesso',
        'alert-type'=>'success'



    );

    return redirect()->back()->with($notification);
}

public function UserLogout(Request $request)
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            $notification = array(
                'message'=>'Usuario Saiu Com Sucesso',
                'alert-type'=>'success'
        
        
        
            );

            return redirect('/login')->with($notification);
        }

}
