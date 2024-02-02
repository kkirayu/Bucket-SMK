@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb sub="Kategori" icon="bx bx-category" subsub="Index" />
        <!--end breadcrumb-->
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List Kategori</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <div class="btn-group">
                            <button type="button" onclick="window.location.href='{{ route('category.create') }}'"
                                class="btn btn-primary">Tambah Kategori</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Category</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbod>
                            @foreach ($getCategory as $index => $category)
                                <tr>
                                    <td width="5%">{{ $index + 1 }}</td>
                                    <td width="70%">
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                <img src="{{ asset($category->category_photo) }}" alt="">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1 font-14">{{ $category->category_nama }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10%">
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('category.edit', encrypt($category->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Edit"><i class="bx bx-edit"></i></a>
                                            <a href="{{ route('category.destroy', encrypt($category->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Delete"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbod y>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
