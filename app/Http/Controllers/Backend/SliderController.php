<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;


class SliderController extends Controller
{
    public function AllSlider(){
        $sliders = Slider::latest()->get();
            return view('backend.slider.slider_all', compact('sliders'));
        }//fim do metodo

        public function AddSlider(){
            return view('backend.slider.slider_add');
            
            
                }//fim do metodo
              
    
            public function StoreSlider(Request $request)
            {
    
                 $slider = Slider::create([
                    'slider_title' =>  $request->slider_title,
                    'short_title' =>  $request->short_title,

                 ]);
    
                // Verifique se o arquivo 'category_image' foi enviado na requisição
                if ($request->hasFile('slider_image')) {
                   $slider->addMedia($request->slider_image)->toMediaCollection('slider');//procurar dimencionar 2376x807
                   $slider->save();
                } else {
                    // Se não foi enviado, retorne um erro ou defina um valor padrão
                    return redirect()->back()->withErrors(['slider_image' => 'A imagem do Slider é obrigatória']);
                }
            
               
                $notification = [
                    'message' => 'Slider Adicionada Com Sucesso',
                    'alert-type' => 'success'
                ];
            
                return redirect()->route('all.slider')->with($notification);
            }



            public function DeleteSlider($id)
{
    // Busca o registro da categoria pelo ID
    $slider = Slider::findOrFail($id);

    // Remove todas as mídias associadas à coleção 'categories'
    $slider->clearMediaCollection('slider');

    // Exclui o registro da categoria do banco de dados
    $slider->delete();

    // Notificação de sucesso
    $notification = [
        'message' => 'Slider Deletada Com Sucesso',
        'alert-type' => 'success'
    ];

    // Redireciona para a página com a lista de categorias com a notificação
    return redirect()->route('all.slider')->with($notification);
}

public function EditSlider($id){
    $slider=Slider::findOrfail($id);
    return view ('backend.slider.slider_edit', compact('slider'));
    }
    public function UpdateSlider(Request $request ){
        $sli_id = $request->id;
        $slider = Slider::findOrFail($sli_id);
    
        // Atualiza os campos básicos (nome e slug)
        $slider->update([
           'slider_title' =>  $request->slider_title,
         'short_title' =>  $request->short_title,

        ]);
    
        // Verifica se a imagem foi enviada
        if ($request->hasFile('slider_image')) {
            // Remove a imagem antiga da coleção, se necessário
            $slider->clearMediaCollection('slider');
            
            // Adiciona a nova imagem e redimensiona para 120x120
            $slider->addMedia($request->slider_image)->withResponsiveImages()->toMediaCollection('slider');
        } else {
            // Caso a imagem não seja enviada, retorna erro
            return redirect()->back()->withErrors(['slider_image' => 'A imagem da categoria é obrigatória para atualização']);
        }
    
        // Salva as alterações
        $slider->save();
    
        // Notificação de sucesso
        $notification = [
            'message' => 'Slide atualizado com sucesso',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('all.slider')->with($notification);
    }
    
    
}
