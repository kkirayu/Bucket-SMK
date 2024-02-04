@extends('admin.admin-dashboard')

@section('content')
<style>
    td {
        white-space:normal;
    }
</style>
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb sub="Asesmen Produk" icon="bx bx-list-check" subsub="Index" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">List Produk {{ $judul }}</h5>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Inovasi</th>
                                <th>Deskripsi</th>
                                <th>Sekolah</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $index => $produk)
                                <tr>
                                    <td width="2%">{{ $index + 1 }}</td>
                                    <td width="3%">{{ $produk->kategori }}</td>
                                    <td width="20%">
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                <img src="{{ asset($produk->photo) }}" alt="">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1 font-14">{{ $produk->nama }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="20%">{{ $produk->inovasi }}</td>
                                    <td width="25%">{{ $produk->descripsi }}</td>
                                    <td width="10%">{{ $produk->user->name }}</td>
                                    <td width="13%">Rp. {{ number_format($produk->harga, 0, ",", ".") }}</td>
                                    <td width="2%">
                                        @if ($produk->status == 0)
                                            <span class="badge bg-danger text-white">Tidak<br>Aktif</span>
                                        @elseif ($produk->status == 1)
                                            <span class="badge bg-warning text-white">Proses<br>Assesmen</span>
                                        @elseif ($produk->status == 2)
                                            <span class="badge bg-success text-white">Produk<br>Verifikasi</span>
                                        @endif
                                    </td>
                                    <td width="5%">
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('asesmen.show', encrypt($produk->id)) }}"
                                                class="ms-1 text-white" style="background: #0d6efd;" data-toggle="tooltip"
                                                title="Detail"><i class="bx bx-info-circle"></i></a>
                                        </div>
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
