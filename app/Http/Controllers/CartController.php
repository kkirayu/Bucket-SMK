<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        return view('frontend.home.home-cart',compact('cartItems'));
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
        // dd($request->all());
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'kuantitas' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $harga_produk = $produk->harga;

        // Buat entri baru di Cart
        Cart::create([
            'user_id' => Auth::id(),
            'produk_id' => $request->produk_id,
            'kuantitas' => $request->kuantitas,
            'total_harga' => $request->total_harga,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke cart!');
    }



    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {
        //
    }
}
