<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;



class CategoryController extends Controller
{
    public function AllCategory(){
        $categories = Category::latest()->get();
            return view('backend.category.category_all', compact('categories'));
        }//fim do metodo
    
        public function AddCategory(){
        return view('backend.category.category_add');
        
        
            }//fim do metodo
          

        public function StoreCategory(Request $request)
        {

             $category = Category::create([
                'category_name' =>  $request->category_name,
                'category_slug' => '',
             ]);

            // Verifique se o arquivo 'category_image' foi enviado na requisição
            if ($request->hasFile('category_image')) {
               $category->addMedia($request->category_image)->toMediaCollection('categories');//procurar dimencionar 120x120
               $category->save();
            } else {
                // Se não foi enviado, retorne um erro ou defina um valor padrão
                return redirect()->back()->withErrors(['category_image' => 'A imagem da Category é obrigatória']);
            }
        
           
            $notification = [
                'message' => 'Category Adicionada Com Sucesso',
                'alert-type' => 'success'
            ];
        
            return redirect()->route('all.category')->with($notification);
        }

public function DeleteCategory($id)
{
    // Busca o registro da categoria pelo ID
    $category = Category::findOrFail($id);

    // Remove todas as mídias associadas à coleção 'categories'
    $category->clearMediaCollection('categories');

    // Exclui o registro da categoria do banco de dados
    $category->delete();

    // Notificação de sucesso
    $notification = [
        'message' => 'Categoria Deletada Com Sucesso',
        'alert-type' => 'success'
    ];

    // Redireciona para a página com a lista de categorias com a notificação
    return redirect()->route('all.category')->with($notification);
}
public function EditCategory($id){
$category=Category::findOrfail($id);
return view ('backend.category.category_edit', compact('category'));
}
public function UpdateCategory(Request $request ){
    $cat_id = $request->id;
    $category = Category::findOrFail($cat_id);

    // Atualiza os campos básicos (nome e slug)
    $category->update([
        'category_name' => $request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
    ]);

    // Verifica se a imagem foi enviada
    if ($request->hasFile('category_image')) {
        // Remove a imagem antiga da coleção, se necessário
        $category->clearMediaCollection('categories');
        
        // Adiciona a nova imagem e redimensiona para 120x120
        $category
            ->addMedia($request->category_image)
            ->withResponsiveImages() // Garante variações responsivas (opcional)
            ->toMediaCollection('categories');
    } else {
        // Caso a imagem não seja enviada, retorna erro
        return redirect()->back()->withErrors(['category_image' => 'A imagem da categoria é obrigatória para atualização']);
    }

    // Salva as alterações
    $category->save();

    // Notificação de sucesso
    $notification = [
        'message' => 'Categoria atualizada com sucesso',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.category')->with($notification);
}

}
