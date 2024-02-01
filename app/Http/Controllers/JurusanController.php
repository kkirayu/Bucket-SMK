<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('admin.jurusan.jurusan-index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurusan.jurusan-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $jurusan = new Jurusan();
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->deskripsi = $request->deskripsi;

        $jurusan->save();
        $notif = array(
            'message' => 'Category Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('jurusan.index')->with($notif);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Jurusan::findOrFail($dId);
        return view('admin.jurusan.jurusan-form', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $jurusanId = $request->id;
        $jurusan = Jurusan::findOrFail($jurusanId);
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->deskripsi = $request->deskripsi;
        $jurusan->save();

        $notif = array(
            'message' => 'Nama Category Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('jurusan.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dId = decrypt($id);
        $jurusan = Jurusan::findOrFail($dId);
        $jurusan->delete();
        $notif = array(
            'message' => 'Category Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('jurusan.index')->with($notif);
    }

}
