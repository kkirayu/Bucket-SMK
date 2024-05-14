<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ListDinas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role','kurator')->get();
        return view('admin.users.kurator-index', ['user' => $user]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.kurator-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,kurator,sekolah,user',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];

        $user->save();
        return redirect()->route('users-kurator.index')->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::all();
        $dId = decrypt($id);
        $edit = User::findOrFail($dId);
        return view('admin.users.kurator-form', compact('edit', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',

            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,kurator,sekolah,user',
        ]);

        // Dapatkan data user yang akan diupdate
        $users = User::findOrFail($id);

        $user = new $users;
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];

        $user->save();

        return redirect()->route('users-kurator.index')->with('success', 'User update successfully');
    }

    public function destroy($id)
    {
        $dId = decrypt($id);
        $user = User::findOrFail($dId);
        $img = $user->photo;

        @unlink(public_path($img));
        $user->delete();

        $notif = array(
            'message' => 'User Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
