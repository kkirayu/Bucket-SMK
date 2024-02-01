<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.produk-index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.produk-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $photo = $request->file('photo');
        $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(300,300)->save('upload/produk/'.$genNama);
        $save_url = 'upload/produk/'.$genNama;

        Produk::insert([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'descripsi' => $request->descripsi,
            'inovasi' => $request->inovasi,
            'sekolah' => $request->sekolah,
            'photo' => $save_url,
            'nama_tim' => $request->nama_tim,
            'jurusan' => $request->jurusan,
            'material' => $request->material,
            'harga' => $request->harga,
            'tahun_produksi' => $request->tahun_produksi,
            'merk_dagang' => $request->merk_dagang,
            'sertifikasi_haki' => $request->sertifikasi_haki,
            'sertifikasi_halal' => $request->sertifikasi_halal,
            'sni' => $request->sni,
        ]);
        $notif = array(
            'message' => 'Category Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('produk.index')->with($notif);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Produk::findOrFail($dId);
        return view('admin.produk.produk-form', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $produkId = $request->id;
        $photoLama = $request->photoLama;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save('upload/category/'.$genNama);
            $save_url = 'upload/category/'.$genNama;


            Produk::findOrFail($produkId)->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'descripsi' => $request->descripsi,
            'inovasi' => $request->inovasi,
            'sekolah' => $request->sekolah,
            'photo' => $save_url,
            'nama_tim' => $request->nama_tim,
            'jurusan' => $request->jurusan,
            'material' => $request->material,
            'harga' => $request->harga,
            'tahun_produksi' => $request->tahun_produksi,
            'merk_dagang' => $request->merk_dagang,
            'sertifikasi_haki' => $request->sertifikasi_haki,
            'sertifikasi_halal' => $request->sertifikasi_halal,
            'sni' => $request->sni,
        ]);
        $notif = array(
            'message' => 'Category Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('produk.index')->with($notif);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dId = decrypt($id);
        $produk = Produk::findOrFail($dId);
        $img = $produk->category_photo;

        @unlink(public_path($img));

        $produk->delete();

        $notif = array(
            'message' => 'Category Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
