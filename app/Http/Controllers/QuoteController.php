<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::paginate(7);

        return view('quotes.index', ['quotes' => $quotes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('quotes.create', ['authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:quotes,name']
        ]);

        $quote = new Quote();
        $quote->name = $request->name;
        $quote->author_id = $request->author_id;
        $quote->categories_id = $request->categories_id;
        $quote->save();

        return redirect()->route('quotes.index')->with('message', 'New quote created');
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
        $quote = Quote::find($id);
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('quotes.edit', ['quote' => $quote, 'authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $quote = Quote::find($id);
        $quote->name = $request->name;
        $quote->author_id = $request->author_id;
        $quote->categories_id = $request->categories_id;
        $quote->save();

        return redirect()->route('quotes.index')->with('message', 'Quote updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quote = Quote::find($id);
        $check = $quote->delete();

        if($check){
            return redirect()->back()->with('message', 'Quote deleted');
        }else{
            return redirect()->back()->with('message', 'Quote can not be deleted');
        }
    }
}
