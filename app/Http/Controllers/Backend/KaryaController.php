<?php

namespace App\Http\Controllers\Backend;

use App\Models\Karya;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karya = Karya::orderBy('nama', 'asc')->get();
        return view('admin.karya.karya-index', compact('karya'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getCategory = Category::orderBy('category_nama', 'ASC')->get();
        return view('admin.karya.karya-form', compact('getCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(300,300)->save('upload/karya/'.$genNama);
        $save_url = 'upload/karya/'.$genNama;

        Karya::insert([
            'nama' => $request->karyaNama,
            'category_id' => $request->category,
            'inovasi' => $request->inovasi,
            'descripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'user_id' => Auth::user()->id,
            'photo' => $save_url
        ]);

        $notif = array(
            'message' => 'Karya Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('karya.index')->with($notif);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dId = decrypt($id);
        $show = Karya::findOrFail($dId);
        return view('admin.karya.karya-detail', compact('show',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Karya::findOrFail($dId);
        $getCategory = Category::orderBy('category_slug','ASC')->get();
        return view('admin.karya.karya-form', compact('edit','getCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $karyaId = $request->id;
        $photoLama = $request->photoLama;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save('upload/karya/'.$genNama);
            $save_url = 'upload/karya/'.$genNama;


            Karya::findOrFail($karyaId)->update([
                'nama' => $request->karyaNama,
                'category_id' => $request->category,
                'inovasi' => $request->inovasi,
                'descripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'photo' => $save_url
            ]);

            $notif = array(
                'message' => 'Data dan Foto Karya Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('karya.index')->with($notif);
        } else {
            Karya::findOrFail($karyaId)->update([
                'nama' => $request->karyaNama,
                'category_id' => $request->category,
                'inovasi' => $request->inovasi,
                'descripsi' => $request->deskripsi,
                'harga' => $request->harga
            ]);

            $notif = array(
                'message' => 'Data Karya Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('karya.index')->with($notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karya $karya)
    {
        //
    }
}
