<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Jurusan;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $produk = Produk::all();
        } elseif (Auth::user()->role == 'sekolah') {
            $getUser = Auth::user()->id;
            $produk = Produk::where('user_id', $getUser)->where('status', '!=', 0)->get();
        }
        return view('admin.produk.produk-index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $sekolah = User::where('role', 'sekolah')->get();
        return view('admin.produk.produk-form', compact('jurusans','sekolah'));
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
            'user_id' => $request->sekolah,
            'photo' => $save_url,
            'video_produk' => $request->vidio_produk,
            'nama_tim' => $request->nama_tim,
            'jurusan_id' => $request->jurusan,
            'material' => $request->material,
            'harga' => $request->harga,
            'tahun_produksi' => $request->tahun_produksi,
            'merk_dagang' => $request->merk_dagang,
            'sertifikasi_haki' => $save_urlhaki,
            'sertifikasi_halal' => $save_urlhalal,
            'sertifikasi_sni' => $save_urlsni,
        ]);
        $notif = array(
            'message' => 'Produk Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('produk.index')->with($notif);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dId = decrypt($id);
        $show = Produk::findOrFail($dId);
        $komentars = Komentar::where('produk_id', $dId)->get();
        return view('admin.produk.produk-detail', compact('show','komentars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusans = Jurusan::all();
        $dId = decrypt($id);
        $edit = Produk::findOrFail($dId);
        $sekolah = User::where('role', 'sekolah')->get();
        return view('admin.produk.produk-form', compact('edit', 'jurusans', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $produkId = $request->id;
        $photoLama = $request->photoLama;
        $photoHaki = $request->photoHaki;
        $photoHalal = $request->photoHalal;
        $photoSni = $request->photoSni;

        if ($request->file('photos')) {
            $photo = $request->file('photos');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save('upload/produk/' . $genNama);
            $save_url = 'upload/produk/' . $genNama;
        } else {
            $save_url = $photoLama;
        }

        if ($request->file('sertifikasi_haki')) {
            $photo_haki = $request->file('sertifikasi_haki');
            @unlink(public_path($photoHaki));
            $genNama_haki = hexdec(uniqid()) . '.' . $photo_haki->getClientOriginalExtension();
            Image::make($photo_haki)->resize(300, 300)->save('upload/produk/' . $genNama_haki);
            $save_urlhaki = 'upload/produk/' . $genNama_haki;
        } else {
            $save_urlhaki = $photoHaki;
        }

        if ($request->file('sertifikasi_halal')) {
            $photo_halal = $request->file('sertifikasi_halal');
            @unlink(public_path($photoHalal));
            $genNama_halal = hexdec(uniqid()) . '.' . $photo_halal->getClientOriginalExtension();
            Image::make($photo_halal)->resize(300, 300)->save('upload/produk/' . $genNama_halal);
            $save_urlhalal = 'upload/produk/' . $genNama_halal;
        } else {
            $save_urlhalal = $photoHalal;
        }

        if ($request->file('sni')) {
            $photo_sni = $request->file('sni');
            @unlink(public_path($photoSni));
            $genNama_sni = hexdec(uniqid()) . '.' . $photo_sni->getClientOriginalExtension();
            Image::make($photo_sni)->resize(300, 300)->save('upload/category/' . $genNama_sni);
            $save_urlsni = 'upload/produk/' . $genNama_sni;
        } else {
            $save_urlsni = $photoSni;
        }

        Produk::findOrFail($produkId)->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'descripsi' => $request->descripsi,
            'inovasi' => $request->inovasi,
            'user_id' => $request->sekolah,
            'photo' => $save_url,
            'vidio_produk' => $request->vidio_produk,
            'nama_tim' => $request->nama_tim,
            'jurusan_id' => $request->jurusan,
            'material' => $request->material,
            'harga' => $request->harga,
            'tahun_produksi' => $request->tahun_produksi,
            'merk_dagang' => $request->merk_dagang,
            'sertifikasi_haki' => $save_urlhaki,
            'sertifikasi_halal' => $save_urlhalal,
            'sertifikasi_sni' => $save_urlsni,
        ]);
        $notif = array(
            'message' => 'Produk Berhasil Diubah',
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
        $destroy = Produk::findOrFail($dId);

        if($destroy->status == 1 || $destroy->status == 2){
            $destroy->update([
                'status' => 0
            ]);
        }

        $notif = array(
            'message' => 'Produk Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
