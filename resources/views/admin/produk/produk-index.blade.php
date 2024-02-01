@extends('admin.admin-dashboard')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Produk</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-category"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Produk</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h4 class="mb-0 text-uppercase">Data Semua Produk</h4>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Inovasi</th>
                            <th>Sekolah</th>
                            <th>Photo</th>
                            <th>Video Produk</th>
                            <th>Nama Tim</th>
                            <th>Material</th>
                            <th>Harga</th>
                            <th>Tahun Produksi</th>
                            <th>Merk Dagang</th>
                            <th>Sertifikasi HAKI</th>
                            <th>Sertifikasi Halal</th>
                            <th>SNI</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $index => $produk)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->kategori }}</td>
                                <td>{{ $produk->descripsi }}</td>
                                <td>{{ $produk->inovasi }}</td>
                                <td>{{ $produk->sekolah }}</td>
                                <td><img src="{{ asset($produk->photo) }}" style="width: 40px; height: 40px;"></td>
                                <td>{{ $produk->video_produk }}</td>
                                <td>{{ $produk->nama_tim }}</td>
                                <td>{{ $produk->material }}</td>
                                <td>{{ $produk->harga }}</td>
                                <td>{{ $produk->tahun_produksi }}</td>
                                <td>{{ $produk->merk_dagang }}</td>
                                <td>{{ $produk->sertifikasi_haki }}</td>
                                <td>{{ $produk->sertifikasi_halal }}</td>
                                <td>{{ $produk->sni }}</td>
                                <td>{{ $produk->jurusan }}</td>
                                <td>
                                    <a href="{{ route('produk.edit', encrypt($produk->id)) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('produk.destroy', encrypt($produk->id)) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Jurusan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
