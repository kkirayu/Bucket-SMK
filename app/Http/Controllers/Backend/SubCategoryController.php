<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $getSub = Subcategory::orderBy('category_id','ASC')->get();
        return view('admin.subcategory.subcategory-index', compact('getSub'));
    }

    public function create()
    {
        $getCategory = Category::orderBy('category_slug','ASC')->get();
        return view('admin.subcategory.subcategory-form', compact('getCategory'));
    }

    public function store(Request $request)
    {
        Subcategory::insert([
            'subcategory_nama' => $request->subcategoryNama,
            'category_id' => $request->category,
            'subcategory_slug' =>  strtolower(str_replace(' ', '-', $request->subcategoryNama)),
        ]);
        $notif = array(
            'message' => 'Sub-Category Berhasil Ditambah',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategory.index')->with($notif);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dId = decrypt($id);
        $edit = Subcategory::findOrFail($dId);
        $getCategory = Category::orderBy('category_slug','ASC')->get();
        return view('admin.subcategory.subcategory-form', compact('edit','getCategory'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $update = Subcategory::findOrFail($id);

        $update->update([
            'subcategory_nama' => $request->subcategoryNama,
            'category_id' => $request->category,
            'subcategory_slug' =>  strtolower(str_replace(' ', '-', $request->subcategoryNama)),
        ]);
        $notif = array(
            'message' => 'Sub-Category Berhasil Diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategory.index')->with($notif);
    }

    public function destroy(string $id)
    {
        $dId = decrypt($id);
        $subcategory = Subcategory::findOrFail($dId);

        $subcategory->delete();

        $notif = array(
            'message' => 'Sub-Category Telah Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
