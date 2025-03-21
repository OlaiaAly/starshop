<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    public function AllSubCategory(){
        $subcategories = SubCategory::latest()->get();
            return view('backend.subcategory.subcategory_all', compact('subcategories'));
        }//fim do metodo

        public function AddSubCategory(){
            $categories = Category::orderBy('category_name', 'ASC')->get();
            return view('backend.subcategory.subcategory_add', compact('categories'));
                }//fim do metodo



                public function StoreSubCategory(Request $request)
                {
        
                    SubCategory::insert([

                        'category_id'=>$request->category_id,
                        'subcategory_name'=>$request->subcategory_name,
                        'subcategory_slug'=>strtolower(str_replace(' ', '-', $request->subcategory_name)),
                    ]);
                    $notification = [
                        'message' => 'SubCategoria Adicionada Com Sucesso',
                        'alert-type' => 'success'
                    ];
                
                    return redirect()->route('all.subcategory')->with($notification);
                }


        public function EditSubCategory($id){

            $categories = Category::orderBy('category_name', 'ASC')->get();
            $subcategory= SubCategory::findOrfail($id);
            return view('backend.subcategory.subcategory_edit', compact('categories','subcategory'));
        }
        public function UpdateSubCategory(Request $request){
        $subcat_id= $request->id;
        SubCategory::findOrfail($subcat_id)->update([

            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);
        $notification = [
            'message' => 'SubCategoria foi atualizada Com Sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.subcategory')->with($notification);

        }

        public function DeleteSubCategory($id){
            SubCategory::findOrFail($id)->delete();
            $notification = [
                'message' => 'SubCategoria foi Deletada Com Sucesso',
                'alert-type' => 'success'
            ];
    
            return redirect()->back()->with($notification);
        }


        public function GetSubCategory($category_id){
            
            $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();

             return json_encode($subcat);
        }





}
