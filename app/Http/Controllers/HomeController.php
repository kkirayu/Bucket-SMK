<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoris = Category::all();
        $popProduct = Produk::orderBy('created_at', 'desc')->where('status', 2)->paginate(10);
        $newProduct = Produk::orderBy('created_at', 'desc')->where('status', 2)->paginate(7);
        $allProduct = Produk::where('status', 2)->get();
        return view('frontend.index', compact('categoris','popProduct', 'newProduct', 'allProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dId = decrypt($id);
        $product = Produk::findOrFail($dId);
        // dd($product);
        return view('frontend.home.home-detail', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
