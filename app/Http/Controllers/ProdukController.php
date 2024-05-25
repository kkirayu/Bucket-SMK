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
        $request->validate([
            'jenis' => 'required',
            'nama' => 'required|string|max:255',
            'kategori' => 'required',
            'descripsi' => 'required',
            'inovasi' => 'required',
            'photo' => 'required',
            'jumlah_tim' => 'required',
            'nama_tim' => 'required',
            'jurusan' => 'required',
            'material' => 'required',
            'sekolah' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save(public_path('upload/produk/' . $genNama));
            $produkPhoto = 'upload/produk/' . $genNama;
        } else {
            $produkPhoto = '';
        }

        if ($request->hasFile('sertifikasi_haki')) {
            $sertifikasi_haki = $request->file('sertifikasi_haki');
            $genNamaHaki = hexdec(uniqid()) . '.' . $sertifikasi_haki->getClientOriginalExtension();
            Image::make($sertifikasi_haki)->resize(300, 300)->save(public_path('upload/produk/' . $genNamaHaki));
            $produkSertifikasi_haki = 'upload/produk/' . $genNamaHaki;
        } else {
            $produkSertifikasi_haki = '';
        }

        if ($request->hasFile('sertifikasi_halal')) {
            $sertifikasi_halal = $request->file('sertifikasi_halal');
            $genNamaHalal = hexdec(uniqid()) . '.' . $sertifikasi_halal->getClientOriginalExtension();
            Image::make($sertifikasi_halal)->resize(300, 300)->save(public_path('upload/produk/' . $genNamaHalal));
            $produkSertifikasi_halal = 'upload/produk/' . $genNamaHalal;
        } else {
            $produkSertifikasi_halal = '';
        }

        if ($request->hasFile('sni')) {
            $sni = $request->file('sni');
            $genNamaSNI = hexdec(uniqid()) . '.' . $sni->getClientOriginalExtension();
            Image::make($sni)->resize(300, 300)->save(public_path('upload/produk/' . $genNamaSNI));
            $produkSertifikasi_sni = 'upload/produk/' . $genNamaSNI;
        } else {
            $produkSertifikasi_sni = '';
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $filename);
            $produkFile = $filename;
        } else {
            $produkFile = '';
        }


        Produk::insert([
            'jenis' => $request->jenis,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'descripsi' => $request->descripsi,
            'inovasi' => $request->inovasi,
            'user_id' => $request->sekolah,
            'photo' => $produkPhoto,
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
            'file' => $produkFile,
            'sertifikasi_haki' => $produkSertifikasi_haki,
            'sertifikasi_halal' => $produkSertifikasi_halal,
            'sertifikasi_sni' => $produkSertifikasi_sni,
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
            $file->move(public_path('upload/bmc/'), $filename);
            $produk->file = $filename;
            $save_urlfile = 'upload/bmc/'.$filename;
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
        $filePath = public_path('upload/bmc/'.$file->file);

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
