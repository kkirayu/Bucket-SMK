@extends('admin.admin-dashboard')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Jurusan</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-category"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Jurusan</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('jurusan.create') }}" class="btn btn-primary">Tambah Jurusan</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h4 class="mb-0 text-uppercase">Data Semua Jurusan</h4>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jurusan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurusan as $index => $jurusan)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $jurusan->nama_jurusan }}</td>
                                <td>{{ $jurusan->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('jurusan.edit', encrypt($jurusan->id)) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('jurusan.destroy', encrypt($jurusan->id)) }}" class="btn btn-danger" id="delete">Delete</a>
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
