<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function AllBrand(){
    $brands = Brand::latest()->get();
        return view('backend.brand.brand_all', compact('brands'));
    }//fim do metodo

    public function AddBrand(){
        return view('backend.brand.brand_add');
    
    
        }//fim do metodo

    public function StoreBrand(Request $request) 
        {
            $request->validate([
                'brand_name' => 'required',
                'brand_image' => 'required|image', // Validação para garantir que a imagem seja enviada
            ]);
        
            $brand = Brand::create([ 
                'brand_name' =>  $request->brand_name,
                'brand_slug' => '',
                'brand_image' => ''
            ]);
        
            // Verifique se o arquivo 'brand_image' foi enviado na requisição
            if ($request->hasFile('brand_image')) {
                $brand->addMedia($request->brand_image)->toMediaCollection('brands');
                $brand->save();
            }
        
            $notification = [
                'message' => 'Marca Adicionada Com Sucesso',
                'alert-type' => 'success'
            ];
        
            // Redireciona para a página anterior com a notificação
            return redirect()->route('all.brand')->with($notification);
        }
        
    public function EditBrand($id){
            $brand=Brand::findOrFail($id);

                return view ('backend.brand.brand_edit', compact('brand'));

        }
        public function UpdateBrand(Request $request, $id)
        {
            // Encontre a instância de Brand pelo ID
            $brand = Brand::findOrFail($id);
        
            // Atualize os campos da marca
            $brand->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => '', // Atualize de acordo com a lógica de slug desejada
                'brand_image' => '', // Atualize se necessário
            ]);
        
            // Verifique se o arquivo 'brand_image' foi enviado na requisição
            if ($request->hasFile('brand_image')) {
                // Remova a imagem antiga (opcional, depende da implementação do pacote)
                $brand->clearMediaCollection('brands');
        
                // Adicione a nova imagem à coleção de mídia
                $brand->addMedia($request->brand_image)->toMediaCollection('brands');
                $brand->save();
            } else {
                // Se não foi enviado, retorne um erro ou defina um valor padrão
                return redirect()->back()->withErrors(['brand_image' => 'A imagem da marca é obrigatória']);
            }
        
            // Notificação de sucesso
            $notification = [
                'message' => 'Marca Atualizada Com Sucesso',
                'alert-type' => 'success'
            ];
        
            // Redirecione para a rota desejada com a notificação
            return redirect()->route('all.brand')->with($notification);
        }
        
        
        public function DeleteBrand($id)
        {
            // Busca o registro da marca pelo ID
            $brand = Brand::findOrFail($id);
        
            // Deleta todas as mídias associadas à coleção 'brands'
            $brand->clearMediaCollection('brands');
        
            // Exclui o registro da marca da base de dados
            $brand->delete();
        
            // Notificação de sucesso
            $notification = [
                'message' => 'Marca Deletada Com Sucesso',
                'alert-type' => 'success'
            ];
        
            // Redireciona para a página anterior com a notificação
            return redirect()->back()->with($notification);
        }
        
}
