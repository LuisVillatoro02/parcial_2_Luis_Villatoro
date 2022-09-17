<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    

    public function index()
    {
        $datos = Category::all();
        return view('Category.categories-list', compact('datos'));
    }
    public function create()
    {
        return view('Category.create-categories');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->description = $request->post('description');
        $category->save();
        return redirect()->route("categories.index")->with("Success");
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('Category.eliminar-categories',compact('category'));
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('Category.edit-categories',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->description = $request->post('description');
        $category->save();
        return redirect()->route("categories.index")->with("Success");
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route("categories.index")->with("Success");
    }
}
