@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb sub="Produk" icon="bx bx-barcode" subsub="Index" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List Produk</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <div class="btn-group">
                            <button type="button" onclick="window.location.href='{{ route('jurusan.create') }}'"
                                class="btn btn-primary">Tambah Produk</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Sekolah</th>
                                <th>Photo</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $index => $produk)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->kategori }}</td>
                                    <td>{{ $produk->descripsi }}</td>
                                    <td>{{ $produk->sekolah }}</td>
                                    <td><img src="{{ asset($produk->photo) }}" style="width: 40px; height: 40px;"></td>
                                    <td>{{ $produk->harga }}</td>
                                    <td>
                                        <a href="{{ route('produk.edit', encrypt($produk->id)) }}"
                                            class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                            title="Edit"><i class="bx bx-edit"></i></a>
                                        <a href="{{ route('produk.destroy', encrypt($produk->id)) }}"
                                            class="ms-1 text-white" style="background: #0d6efd" data-toggle="tooltip"
                                                title="Delete"><i class="bx bx-trash"></i></a>
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
