<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;


class BannerController extends Controller
{
    public function AllBanner(){
        $banners = Banner::latest()->get();
            return view('backend.banner.banner_all', compact('banners'));
        }//fim do metodo

        public function AddBanner(){
            return view('backend.banner.banner_add');
            
            
                }//fim do metodo
              
    
            public function StoreBanner(Request $request)
            {
    
                 $banner = Banner::create([
                    'banner_title' =>  $request->banner_title,
                    'banner_url' =>  $request->banner_url,

                 ]);
    
                 // Verifique se o arquivo 'category_image' foi enviado na requisição
                 if ($request->hasFile('banner_image')) {
                    $banner->addMedia($request->banner_image)->toMediaCollection('Banner');//procurar dimencionar 2376x807
                    $banner->save();
                 } else {
                     // Se não foi enviado, retorne um erro ou defina um valor padrão
                     return redirect()->back()->withErrors(['banner_image' => 'A imagem do Banner é obrigatória']);
                 }
             
                
                 $notification = [
                     'message' => 'Banner Adicionada Com Sucesso',
                     'alert-type' => 'success'
                 ];
             
                 return redirect()->route('all.banner')->with($notification);
            }



            public function DeleteBanner($id)
{
    // Busca o registro da categoria pelo ID
    $banner = Banner::findOrFail($id);

    // Remove todas as mídias associadas à coleção 'categories'
    $banner->clearMediaCollection('banner');

    // Exclui o registro da categoria do banco de dados
    $banner->delete();

    // Notificação de sucesso
    $notification = [
        'message' => 'banner Deletada Com Sucesso',
        'alert-type' => 'success'
    ];

    // Redireciona para a página com a lista de categorias com a notificação
    return redirect()->route('all.banner')->with($notification);
}

public function EditBanner($id){
    $banner=banner::findOrfail($id);
    return view ('backend.banner.banner_edit', compact('banner'));
    }
    public function Updatebanner(Request $request ){
        $sli_id = $request->id;
        $banner = banner::findOrFail($sli_id);
    
        // Atualiza os campos básicos (nome e slug)
        $banner->update([
           'banner_title' =>  $request->banner_title,
                    'banner_url' =>  $request->banner_url,

        ]);
    
        // Verifica se a imagem foi enviada
        if ($request->hasFile('banner_image')) {
            // Remove a imagem antiga da coleção, se necessário
            $banner->clearMediaCollection('banner');
            
            // Adiciona a nova imagem e redimensiona para 120x120
            $banner->addMedia($request->banner_image)->withResponsiveImages()->toMediaCollection('banner');
        } else {
            // Caso a imagem não seja enviada, retorna erro
            return redirect()->back()->withErrors(['banner_image' => 'A imagem da categoria é obrigatória para atualização']);
        }
    
        // Salva as alterações
        $banner->save();
    
        // Notificação de sucesso
        $notification = [
            'message' => 'Banner atualizado com sucesso',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('all.banner')->with($notification);
    }
    
    
}

