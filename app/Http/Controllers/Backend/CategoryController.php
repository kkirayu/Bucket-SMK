<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $getCategory = Category::orderBy('category_nama','ASC')->get();
        return view('admin.category.category-index', compact('getCategory'));
    }

    public function create()
    {
        return view('admin.category.category-form');
    }

    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(300,300)->save('upload/category/'.$genNama);
        $save_url = 'upload/category/'.$genNama;

        Category::insert([
            'category_nama' => $request->categoryNama,
            'category_slug' => strtolower(str_replace(' ', '-', $request->categoryNama)),
            'category_photo' => $save_url,
        ]);

        $notif = array(
            'message' => 'Category Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notif);
    }

    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Category::findOrFail($dId);
        return view('admin.category.category-form', compact('edit'));
    }

    public function update(Request $request)
    {
        $categoryId = $request->id;
        $photoLama = $request->photoLama;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            @unlink(public_path($photoLama));
            $genNama = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save('upload/category/'.$genNama);
            $save_url = 'upload/category/'.$genNama;


            Category::findOrFail($categoryId)->update([
                'category_nama' => $request->categoryNama,
                'category_slug' => strtolower(str_replace(' ', '-', $request->categoryNama)),
                'category_photo' => $save_url,
            ]);

            $notif = array(
                'message' => 'Nama dan Gambar Category Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notif);
        } else {
            Category::findOrFail($categoryId)->update([
                'category_nama' => $request->categoryNama,
                'category_slug' => strtolower(str_replace(' ', '-', $request->categoryNama)),
            ]);

            $notif = array(
                'message' => 'Nama Category Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notif);
        }
    }

    public function destroy($id)
    {
        $dId = decrypt($id);
        $category = Category::findOrFail($dId);
        $img = $category->category_photo;

        @unlink(public_path($img));

        $category->delete();

        $notif = array(
            'message' => 'Category Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
