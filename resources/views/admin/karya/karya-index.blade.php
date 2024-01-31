@extends('admin.admin-dashboard')

@section('content')
{{-- <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Karya</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-right-arrow-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Karya</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('karya.create') }}" class="btn btn-primary">Tambah Karya</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h4 class="mb-0 text-uppercase">Data Semua Karya</h4>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Nama Karya</th>
                            <th>Kategori</th>
                            <th>Inovasi</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Komentar</th>
                            <th>Uploaded</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karya as $index => $r)
                            <td>{{ $index+1 }}</td>
                            <td><img src="{{ asset($r->photo) }}" style="width: 40px; height: 40px;"></td>
                            <td>{{ $r->nama }}</td>
                            <td>{{ $r->category_id }}</td>
                            <td>{{ $r->inovasi }}</td>
                            <td>{{ $r->descripsi }}</td>
                            <td>{{ $r->harga }}</td>
                            <td>{{ $r->komentar }}</td>
                            <td>{{ $r->uploaded }}</td>
                            <td>
                                <a href="{{ route('karya.edit', encrypt($r->id)) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('karya.destroy', encrypt($r->id)) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}

<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Karya</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-basket"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Karya</li>
                </ol>
            </nav>
        </div>

    </div>
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">List Karya SMK</h5>
                </div>
                <div class="font-22 ms-auto"><div class="btn-group">
                    <a href="{{ route('karya.create') }}" class="btn btn-primary">Tambah Karya</a>
                </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" width="100%">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Karya</th>
                            <th>Kategori</th>
                            <th>Inovasi</th>
                            {{-- <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Komentar</th> --}}
                            <th>Uploaded</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karya as $index => $r)
                        <tr>
                            <td>#{{ $index+1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        <img src="{{ asset($r->photo) }}" alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">{{ $r->nama }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $r->category->category_nama }}</td>
                            <td>{{ $r->inovasi }}</td>
                            {{-- <td>{{ $r->descripsi }}</td> --}}
                            {{-- <td>{{ $r->harga }}</td> --}}
                            {{-- <td>{{ $r->komentar }}</td> --}}
                            <td>{{ $r->user->name }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('karya.show', encrypt($r->id)) }}" class="ms-1" data-toggle="tooltip" title="Detail"><i class="bx bx-info-circle"></i></a>
                                    @if (Auth::user()->role == 'admin')
                                        <a href="{{ route('karya.edit', encrypt($r->id)) }}" class="ms-1" data-toggle="tooltip" title="Edit"><i class="bx bx-edit"></i></a>
                                        <a href="{{ route('karya.destroy', encrypt($r->id)) }}" class="ms-1" data-toggle="tooltip" title="Hapus"><i class="bx bx-trash"></i></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
