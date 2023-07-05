<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:authors,name']
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->save();

        $newauthor = $author->name;

        return redirect()->route('authors.index')->with('message', 'Author "'.$newauthor.'" created');
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
        $author = Author::find($id);

        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:authors,name']
        ]);

        $newname = $request->name;

        $author = Author::find($id);
        $author->name = $newname;
        $author->save();

        return redirect()->route('authors.index')->with('message', 'Author "'.$newname.'" updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return true;
        $author = Author::find($id);
        $check = $author->delete();

        if($check){
            return redirect()->route('authors.index')->with('message', 'Author deleted');
        }else{
            return redirect()->route('authors.index')->with('message', 'Author can not be deleted');
        }
    }
}
