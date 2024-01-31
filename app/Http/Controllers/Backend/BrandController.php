<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $getBrands = Brand::latest()->get();
        return view('admin.brand.brand-index', compact('getBrands'));
    }

    public function create()
    {
        return view('admin.brand.brand-form');
    }

    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(300,300)->save('upload/brand/'.$genNama);
        $save_url = 'upload/brand/'.$genNama;

        Brand::insert([
            'brand_nama' => $request->brandNama,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brandNama)),
            'brand_photo' => $save_url,
        ]);

        $notif = array(
            'message' => 'Brand Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.index')->with($notif);
    }

    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Brand::findOrFail($dId);
        return view('admin.brand.brand-form', compact('edit'));
    }

    public function update(Request $request)
    {
        $brandId = $request->id;
        $photoLama = $request->photoLama;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save('upload/brand/'.$genNama);
            $save_url = 'upload/brand/'.$genNama;


            Brand::findOrFail($brandId)->update([
                'brand_nama' => $request->brandNama,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brandNama)),
                'brand_photo' => $save_url,
            ]);

            $notif = array(
                'message' => 'Nama dan Gambar Brand Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('brand.index')->with($notif);
        } else {
            Brand::findOrFail($brandId)->update([
                'brand_nama' => $request->brandNama,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brandNama)),
            ]);

            $notif = array(
                'message' => 'Nama Brand Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('brand.index')->with($notif);
        }
    }

    public function destroy($id)
    {
        $dId = decrypt($id);
        $brand = Brand::findOrFail($dId);
        $img = $brand->brand_photo;

        @unlink(public_path($img));

        $brand->delete();

        $notif = array(
            'message' => 'Brand Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }

}
