<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()
    {

        $search = request('search');

        if ($search) {
            $category = Category::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $category = Category::paginate(5);
        }

        return view('category.categories', ['categories' => $category, 'search' => $search]);
    }

    public function create()
    {
        return view('category.categoryCreate');
    }

    public function store(Request $request)
    {
        $category = new Category;

        $category->title = $request->title;

        $category->save();

        return redirect('/categories')->with('msg', "Categoria criada com sucesso!");
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.categoryEdit', ['category' => $category]);
    }

    public function update(Request $request)
    {

        $data = $request->all();

        Category::findOrFail($request->id)->update($data);
        return redirect('/categories')->with('msg', 'Categoria editada com sucesso.');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/categories')->with('msg', 'Categoria deletada com sucesso.');
    }
}
