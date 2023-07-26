<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(7);

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:categories,name']
        ]);

        $categoryname = $request->name;

        $category = new Category();
        $category->name = $categoryname;
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category "'.$categoryname.'" created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:categories,name']
        ]);

        $categoryname = $request->name;
        $category = Category::find($id);
        $category->name = $categoryname;
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category "'.$categoryname.'" updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $check = $category->delete();

        if($check){
            return redirect()->back()->with('message', 'Category deleted');
        }else{
            return redirect()->back()->with('message', 'Category can not be deleted');
        }

    }
}
