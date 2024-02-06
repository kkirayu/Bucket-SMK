<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use Illuminate\Http\Request;

class SkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sk = Sk::all();
        return view('admin.sk.sk', compact('sk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sk.sk-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'file' => 'required|file',
        ]);

        $sk = new Sk();
        $sk->name = $request->name;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $filename);
            $sk->file = $filename;
        }

        $sk->save();
        $notif = array(
            'message' => 'Nama Category Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('sk.index')->with($notif);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sk $sk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sk = Sk::all();
        $dId = decrypt($id);
        $edit = Sk::findOrFail($dId);
        return view('admin.sk.sk-form', compact('edit', 'sk', 'sk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'file' => 'nullable|file',
        ]);

        $sk = Sk::find($id);

        $sk->name = $request->name;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $filename);

            if ($sk->file) {
                unlink(public_path('files/' . $sk->file));
            }

            $sk->file = $filename;
        }

        $sk->save();
        $notif = array(
            'message' => 'Nama Category Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('sk.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sk = Sk::findOrFail($id);
    
        if ($sk->file) {
            unlink(public_path('upload/' . $sk->file));
        }
        $sk->delete();
        $notif = array(
            'message' => 'Category Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
    
}
