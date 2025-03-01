<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\MultiImag;

class PromoterController extends Controller{
    public function PromoterDashboard(){
        return view('promoter.index'); // Atualize o caminho da view se necessário
    }

    public function PromoterLogin(){
        return view('promoter.promoter_login'); // Atualize o caminho da view se necessário
    }

    public function PromoterDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/promoter/login'); // Atualize a rota de redirecionamento
    }

    public function PromoterProfile(){
        $id = Auth::user()->id;
        $promoterData = User::find($id); // Renomeado para promoterData
        return view('promoter.promoter_profile_view', compact('promoterData')); // Atualize o caminho da view se necessário
    }

    public function PromoterProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        // $data->email = $request->email; // Descomente se precisar atualizar o email
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_short_info = $request->vendor_short_info; // Considere renomear isso também

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/promoter_images/' . $data->photo)); // Atualize o caminho da imagem

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/promoter_images'), $filename); // Atualize o caminho da imagem
            $data['photo'] = $filename;
        }
        $data->save();
        
        $notification = array(
            'message' => 'O Perfil Do Promotor Foi Atualizado Com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PromoterChangePassword(){
        return view('promoter.promoter_change_password'); // Atualize o caminho da view se necessário
    }

    public function PromoterUpdatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "A Senha Antiga está errada!!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Senha Mudada com Sucesso!!");
    }

    public function BecomePromoter(){
        return view('auth.become_promoter'); // Atualize o caminho da view se necessário
    }

    public function PromoterRegister(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        User::insert([ // Use create() em vez de insert() para aproveitar as mutators do modelo
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'promoter',
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'O Perfil Do Promotor Foi Registrado Com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->route('promoter.login')->with($notification); // Atualize a rota de redirecionamento
    }
}
