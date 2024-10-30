<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listAllCategories(Request $request) {
        // lógica
        $categories = Category::all();
        return view('categories.listAllCategories', ['categories' => $categories]);
    }

    public function createCategory(Request $request) {
        if ($request->method() === 'GET') {

            return view('categories.createCategory');

        } else {

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                // 'created_at' => 'date_format:format',
                // 'updated_at' => 'date_format:format'

            ]);


            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ]);

            return redirect()
                    ->route('ListAllCategories')
                    ->with('success', 'Categoria criada com sucesso.');

        }

    }

    public function updateCategory(Request $request, $uid) {
        $category = Category::where('id', $uid)->first();
        $category->title = $request->title;
        $category->description = $request->description;


        $category->save();
        return redirect()->route('ListAllCategories', [$category->id])
                ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteCategory(Request $request, $uid) {
        Category::where('id', $uid)->delete();
        return redirect()->route('ListAllCategories')
                ->with('message', 'Atualizado com sucesso!');
    }

    public function listCategoryById(Request $request, $uid) {
        print($uid);
        $category = Category::where('id', $uid)->first();
        return view('categories.listCategory', ['category' => $category]);

    }
    public function editCategory(Request $request,$uid) {
        $category = Category::where('id', $uid)->first();
      return view('categories.editCategories', ['category' => $category]);
    }



}
