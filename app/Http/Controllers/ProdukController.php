<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
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
        $jurusans = Jurusan::all();
        return view('admin.produk.produk-form', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->resize(300, 300)->save('upload/produk/' . $genNama);
        $save_url = 'upload/produk/' . $genNama;

        if ($request->file('sertifikasi_haki')) {
            $sertifikasi_haki = $request->file('sertifikasi_haki');
            $genNamaHaki = hexdec(uniqid()) . '.' . $sertifikasi_haki->getClientOriginalExtension();
            Image::make($sertifikasi_haki)->resize(300, 300)->save('upload/produk/' . $genNamaHaki);
            $save_urlhaki = 'upload/produk/' . $genNamaHaki;
        } else {
            $save_urlhaki = null;
        }

        if ($request->file('sertifikasi_halal')) {
            $sertifikasi_halal = $request->file('sertifikasi_halal');
            $genNamaHalal = hexdec(uniqid()) . '.' . $sertifikasi_halal->getClientOriginalExtension();
            Image::make($sertifikasi_halal)->resize(300, 300)->save('upload/produk/' . $genNamaHalal);
            $save_urlhalal = 'upload/produk/' . $genNamaHalal;
        } else {
            $save_urlhalal = null;
        }

        if ($request->file('sni')) {
            $sni = $request->file('sni');
            $genNamaSNI = hexdec(uniqid()) . '.' . $sni->getClientOriginalExtension();
            Image::make($sni)->resize(300, 300)->save('upload/produk/' . $genNamaSNI);
            $save_urlsni = 'upload/produk/' . $genNamaSNI;
        } else {
            $save_urlsni = null;
        }

        Produk::insert([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'descripsi' => $request->descripsi,
            'inovasi' => $request->inovasi,
            'sekolah' => $request->sekolah,
            'photo' => $save_url,
            'vidio_produk' => $request->vidio_produk,
            'nama_tim' => $request->nama_tim,
            'jurusan' => $request->jurusan,
            'material' => $request->material,
            'harga' => $request->harga,
            'tahun_produksi' => $request->tahun_produksi,
            'merk_dagang' => $request->merk_dagang,
            'sertifikasi_haki' => $save_urlhaki,
            'sertifikasi_halal' => $save_urlhalal,
            'sni' => $save_urlsni,
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
        $jurusans = Jurusan::all();
        $dId = decrypt($id);
        $edit = Produk::findOrFail($dId);
        return view('admin.produk.produk-form', compact('edit', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $produkId = $request->id;
        $photoLama = $request->photoLama;

        $save_urlhaki = null;
        $save_urlhalal = null;
        $save_urlsni = null;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save('upload/produk/' . $genNama);
            $save_url = 'upload/produk/' . $genNama;
        }

        if ($request->file('sertifikasi_haki')) {
            $photo = $request->file('sertifikasi_haki');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save('upload/produk/' . $genNama);
            $save_urlhaki = 'upload/produk/' . $genNama;
        }


        if ($request->file('sertifikasi_halal')) {
            $photo = $request->file('sertifikasi_halal');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save('upload/produk/' . $genNama);
            $save_urlhalal = 'upload/produk/' . $genNama;
        }


        if ($request->file('sni')) {
            $photo = $request->file('sni');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save('upload/category/' . $genNama);
            $save_urlsni = 'upload/produk/' . $genNama;
        }

        Produk::findOrFail($produkId)->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'descripsi' => $request->descripsi,
            'inovasi' => $request->inovasi,
            'sekolah' => $request->sekolah,
            'photo' => $save_url,
            'vidio_produk' => $request->vidio_produk,
            'nama_tim' => $request->nama_tim,
            'jurusan' => $request->jurusan,
            'material' => $request->material,
            'harga' => $request->harga,
            'tahun_produksi' => $request->tahun_produksi,
            'merk_dagang' => $request->merk_dagang,
            'sertifikasi_haki' => $save_urlhaki,
            'sertifikasi_halal' => $save_urlhalal,
            'sni' => $save_urlsni,
        ]);
        $notif = array(
            'message' => 'Category Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('produk.index')->with($notif);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dId = decrypt($id);
        $produk = Produk::findOrFail($dId);
        $img = $produk->photo;
        $imghaki = $produk->sertifikasi_haki;
        $imghalal = $produk->sertifikasi_halal;
        $imgsni = $produk->sni;

        @unlink(public_path($img));
        @unlink(public_path($imghaki));
        @unlink(public_path($imghalal));
        @unlink(public_path($imgsni));

        $produk->delete();

        $notif = array(
            'message' => 'Category Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
