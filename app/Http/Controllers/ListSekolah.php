<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ListSekolah extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'sekolah')->get();
        return view('admin.users.ssekolah-index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.users-form');
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah sesuai kebutuhan
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'role' => 'required|in:admin,dinas,sekolah,user',
            'status' => 'required|in:aktif,nonaktif',
            'sekolah_info' => 'nullable|string',
        ]);

        // Proses penyimpanan foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $photo->move('upload/users/', $genNama);
            $save_url = 'upload/users/' . $genNama;
        } else {
            $save_url = '';
        }

        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->photo = $save_url;
        $user->phone = $validatedData['phone'];
        $user->alamat = $validatedData['alamat'];
        $user->role = $validatedData['role'];
        $user->status = $validatedData['status'];
        $user->sekolah_info = $validatedData['sekolah_info'];

        $user->save();

        return redirect()->route('list.index')->with('success', 'User created successfully');
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
        return view('admin.users.users-form', compact('edit', 'user'));
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
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah sesuai kebutuhan
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'role' => 'required|in:admin,dinas,sekolah,user',
            'status' => 'required|in:aktif,nonaktif',
            'sekolah_info' => 'nullable|string',
        ]);

        // Dapatkan data user yang akan diupdate
        $user = User::findOrFail($id);

        // Proses penyimpanan foto jika ada perubahan foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $genNama = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $photo->move('upload/users/', $genNama);
            $save_url = 'upload/users/' . $genNama;

            if (file_exists($user->photo)) {
                unlink($user->photo);
            }

            $user->photo = $save_url;
        }

        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->phone = $validatedData['phone'];
        $user->alamat = $validatedData['alamat'];
        $user->role = $validatedData['role'];
        $user->status = $validatedData['status'];
        $user->sekolah_info = $validatedData['sekolah_info'];

        $user->save();
        return redirect()->route('list.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $dId = decrypt($id);
        $user = User::findOrFail($dId);
        $img = $user->photo;

        @unlink(public_path($img));
        $user->delete();

        $notif = array(
            'message' => 'Category Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
