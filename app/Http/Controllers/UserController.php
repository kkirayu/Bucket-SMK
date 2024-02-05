<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $getUser = User::findOrFail($id);
        return view('user.index', compact('getUser'));
    }

    public function userProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $username = Auth::user()->username;
        $getUser = User::findOrFail($id);

        $getUser->username = $request->username;
        $getUser->name = $request->name;
        $getUser->email = $request->email;
        $getUser->phone = $request->phone;
        $getUser->alamat = $request->alamat;
        $getUser->sekolah_join_date = $request->join;
        $getUser->sekolah_info = $request->sekolah_info;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user-image/'.$getUser->photo));
            $filename = $username.'_'.date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user-image'),$filename);
            $getUser['photo'] = $filename ;
        }

        $getUser->save();

        $notif = array(
            'message' => 'Profile User Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notif = array(
            'message' => 'Anda Telah Keluar Dari Akun',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notif);
    }

    public function userUpdatePasswordt(Request $request)
    {
        $request->validate([
            'passwordLama' => 'required',
            'passwordBaru' => 'required|required_with:new_password_confirmation|same:new_password_confirmation'
        ]);

        if (!Hash::check($request->passwordLama, auth::user()->password)) {
            return back()->with("error", "Password Lama Tidak Cocok");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->passwordBaru)
        ]);

        return back()->with("status", "Password Berhasil Diubah");

    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import() 
    {
        Excel::import(new UsersImport, 'users.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }

    public function getuser()
    {
        $user = User::all();
        return view('admin.users.users-index', compact('user'));
    }
}
