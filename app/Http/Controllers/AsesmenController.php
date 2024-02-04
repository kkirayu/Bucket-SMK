<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexAsesmen(Request $request, $id)
    {

        $show = Produk::where('kategori', $id)->where('status', '!=', 0)->get();
        if ($id == 'atm') {
            $judul = Str::upper($id);
        } else {
            $judul = Str::ucfirst($id);
        }
        return view('admin.asesmen.asesmen-index', compact('show', 'judul'));
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
        $show = Produk::findOrFail($dId);
        $komentars = Komentar::where('produk_id', $dId)->get();
        return view('admin.asesmen.asesmen-show', compact('show', 'komentars'));
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function approveAsesmen($id)
    {
        $update = Produk::findOrFail($id);
        $update->update([
            'status' => 2
        ]);

        $notif = array(
            'message' => 'Produk Berhasil DiACC',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
