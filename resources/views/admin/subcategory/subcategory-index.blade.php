@extends('admin.admin-dashboard')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sub Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-category-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Sub-Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('subcategory.create') }}" class="btn btn-info">Tambah Sub-Category</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h4 class="mb-0 text-uppercase">Data Semua Sub-Category</h4>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Category</th>
                            <th>Nama Sub-Category</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getSub as $index => $subcategory)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $subcategory->category->category_nama }}</td>
                                <td>{{ $subcategory->subcategory_nama }}</td>
                                <td>
                                    <a href="{{ route('subcategory.edit', encrypt($subcategory->id)) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('subcategory.destroy', encrypt($subcategory->id)) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Category</th>
                            <th>Photo</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
