@extends('admin.admin-dashboard')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Brand</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-basket"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Brand</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('brand.create') }}" class="btn btn-primary">Tambah Brand</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h4 class="mb-0 text-uppercase">Data Semua Brand</h4>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Brand</th>
                            <th>Photo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getBrands as $index => $brand)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $brand->brand_nama }}</td>
                                <td><img src="{{ asset($brand->brand_photo) }}" style="width: 40px; height: 40px;"></td>
                                <td>
                                    <a href="{{ route('brand.edit', encrypt($brand->id)) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('brand.destroy', encrypt($brand->id)) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Brand</th>
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