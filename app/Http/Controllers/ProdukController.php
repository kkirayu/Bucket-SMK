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
use Illuminate\Support\Facades\Validator;

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
        return view('admin.produk.produk-form', compact('jurusans', 'sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'descripsi' => 'required|string|min:200',
        //     'inovasi' => 'required|string|min:100',
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:307200',
        //     'sertifikasi_haki' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:300',
        //     'sertifikasi_halal' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:300',
        //     'sni' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:300',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }


        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->descripsi = $request->descripsi;
        $produk->inovasi = $request->inovasi;
        $produk->jenis = $request->jenis;
        $produk->start_date = $request->start_date;
        $produk->volume = $request->volume;
        $produk->jumlah_tim = $request->jumlah_tim;
        $produk->user_id = $request->sekolah;
        $produk->video_produk = $request->vidio_produk;
        $produk->nama_tim = $request->nama_tim;
        $produk->jurusan_id = $request->jurusan;
        $produk->material = $request->material;
        $produk->harga = $request->harga;
        $produk->tahun_produksi = $request->tahun_produksi;
        $produk->merk_dagang = $request->merk_dagang;

        // Proses penyimpanan file gambar
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save(public_path('upload/produk/' . $genNama));
            $produk->photo = 'upload/produk/' . $genNama;
        }

        if ($request->hasFile('sertifikasi_haki')) {
            $sertifikasi_haki = $request->file('sertifikasi_haki');
            $genNamaHaki = hexdec(uniqid()) . '.' . $sertifikasi_haki->getClientOriginalExtension();
            Image::make($sertifikasi_haki)->resize(300, 300)->save(public_path('upload/produk/' . $genNamaHaki));
            $produk->sertifikasi_haki = 'upload/produk/' . $genNamaHaki;
        }

        if ($request->hasFile('sertifikasi_halal')) {
            $sertifikasi_halal = $request->file('sertifikasi_halal');
            $genNamaHalal = hexdec(uniqid()) . '.' . $sertifikasi_halal->getClientOriginalExtension();
            Image::make($sertifikasi_halal)->resize(300, 300)->save(public_path('upload/produk/' . $genNamaHalal));
            $produk->sertifikasi_halal = 'upload/produk/' . $genNamaHalal;
        }

        if ($request->hasFile('sni')) {
            $sni = $request->file('sni');
            $genNamaSNI = hexdec(uniqid()) . '.' . $sni->getClientOriginalExtension();
            Image::make($sni)->resize(300, 300)->save(public_path('upload/produk/' . $genNamaSNI));
            $produk->sertifikasi_sni = 'upload/produk/' . $genNamaSNI;
        }

        // Proses penyimpanan file tambahan
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $filename);
            $produk->file = $filename;
        }

        // Simpan data produk ke database
        $produk->save();


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
        return view('admin.produk.produk-detail', compact('show', 'komentars'));
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

        // $validator = Validator::make($request->all(), [
        //     'descripsi' => 'required|string|min:200',
        //     'inovasi' => 'required|string|min:100',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $produkId = $request->id;
        $photoLama = $request->photoLama;
        $photoHaki = $request->photoHaki;
        $photoHalal = $request->photoHalal;
        $photoSni = $request->photoSni;
        $fileFile = $request->fileFile;

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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            @unlink(public_path($fileFile));
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $filename);
            $produk->file = $filename;
            $save_urlfile = 'upload/'.$filename;
        } else {
            $save_urlfile = $fileFile;
        }

        Produk::findOrFail($produkId)->update([
            'jenis' => $request->jenis,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'descripsi' => $request->descripsi,
            'inovasi' => $request->inovasi,
            'user_id' => $request->sekolah,
            'photo' => $save_url,
            'video_produk' => $request->vidio_produk,
            'jumlah_tim' => $request->jumlah_tim,
            'nama_tim' => $request->nama_tim,
            'jurusan_id' => $request->jurusan,
            'material' => $request->material,
            'harga' => $request->harga,
            'tahun_produksi' => $request->tahun_produksi,
            'start_date' => $request->start_date,
            'merk_dagang' => $request->merk_dagang,
            'volume' => $request->volume,
            'file' => $save_urlfile,
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

        if ($destroy->status == 1 || $destroy->status == 2) {
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

    public function downloadTemplatePlan()
    {
        $filePath = public_path('upload/TemplatePlan.pdf');

        // Memeriksa apakah file ada
        if (file_exists($filePath)) {
            // Mengirimkan file untuk diunduh
            return response()->download($filePath, 'TemplatePlan.pdf');
        } else {
            // Jika file tidak ditemukan, tampilkan pesan atau redirect ke halaman lain
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }

    public function downloadBmc($id)
    {
        $dId = decrypt($id);
        $file = Produk::findOrFail($dId);
        $filePath = public_path('upload/'.$file->file);

        // Memeriksa apakah file ada
        if (file_exists($filePath)) {
            // Mengirimkan file untuk diunduh
            return response()->download($filePath, $file->nama . '-BMC.pdf');
        } else {
            // Jika file tidak ditemukan, tampilkan pesan atau redirect ke halaman lain
            $notif = array(
                'message' => 'File tidak ditemukan.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notif);
        }
    }
}
