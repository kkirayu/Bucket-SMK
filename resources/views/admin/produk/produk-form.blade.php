@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Produk</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-basket"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ isset($edit) ? 'Edit Produk' : 'Tambah Produk' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Produk</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ isset($edit) ? route('produk.update', $edit->id) : route('produk.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PATCH')
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Produk</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="nama" class="form-control" value="{{ old('nama', isset($edit) ? $edit->nama : '') }}" placeholder="Nama Produk"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Kategori</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="kategori" class="form-control" value="{{ old('kategori', isset($edit) ? $edit->kategori : '') }}" placeholder="Kategori"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Deskripsi</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="descripsi" class="form-control" placeholder="Deskripsi">{{ old('descripsi', isset($edit) ? $edit->descripsi : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Inovasi</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="inovasi" class="form-control" placeholder="inovasi">{{ old('inovasi', isset($edit) ? $edit->inovasi : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sekolah</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="sekolah" class="form-control" value="{{ old('sekolah', isset($edit) ? $edit->sekolah : '') }}" placeholder="sekolah"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="photo" class="form-control" id="photo" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showPhoto"
                                                src="{{ isset($edit) ? asset($edit->photo) : asset('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Tim</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="nama_tim" class="form-control" placeholder="nama_tim">{{ old('nama_tim', isset($edit) ? $edit->nama_tim : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Jurusan</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="jurusan" class="form-control" placeholder="jurusan">{{ old('jurusan', isset($edit) ? $edit->jurusan : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Material</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="material" class="form-control" placeholder="material">{{ old('material', isset($edit) ? $edit->material : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Harga</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="number" name="harga" class="form-control" value="{{ old('harga', isset($edit) ? $edit->harga : '') }}" placeholder="harga"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tahun Produksi</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="date" name="tahun_produksi" class="form-control" value="{{ old('tahun_produksi', isset($edit) ? $edit->tahun_produksi : '') }}" placeholder="tahun_produksi"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Merk Dagang</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="merk_dagang" class="form-control" value="{{ old('merk_dagang', isset($edit) ? $edit->merk_dagang : '') }}" placeholder="merk dagang"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sertifikasi Haki</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="sertifikasi_haki" class="form-control" placeholder="sertifikasi_haki">{{ old('sertifikasi_haki', isset($edit) ? $edit->sertifikasi_haki : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sertifikasi Halal</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="sertifikasi_halal" class="form-control" placeholder="sertifikasi_halal">{{ old('sertifikasi_halal', isset($edit) ? $edit->sertifikasi_halal : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sertifikasi Halal</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="sertifikasi_halal" class="form-control" placeholder="sertifikasi_halal">{{ old('sertifikasi_halal', isset($edit) ? $edit->sertifikasi_halal : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">SNI</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="sni" class="form-control" placeholder="sni">{{ old('sni', isset($edit) ? $edit->sni : '') }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-success px-4" value="{{ isset($edit) ? 'Ubah Produk' : 'Tambah Produk' }}" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#myForm').validate({
                rules: {
                    nama: {
                        required : true,
                    },
                    kategori: {
                        required : true,
                    },
                    descripsi: {
                        required : true,
                    },
                    inovasi: {
                        required : true,
                    },
                    sekolah: {
                        required : true,
                    },
                    photo: {
                        required : true,
                    },
                    nama_tim: {
                        required : true,
                    },
                    jurusan: {
                        required : true,
                    },
                    material: {
                        required : true,
                    },
                    harga: {
                        required : true,
                    },
                    video_produk: {
                        required : false,
                    },
                    tahun_produksi: {
                        required : true,
                    },
                    merk_dagang: {
                        required : true,
                    },
                    sertifikasi_haki: {
                        required : true,
                    },
                    sertifikasi_halal: {
                        required : false,
                    },
                    sni: {
                        required : false,
                    },
                    ..
                },
                messages: {
                    nama: {
                        required : 'Masukkan Nama Produk',
                    },
                    kategori: {
                        required : 'Masukkan Kategori',
                    },
                    descripsi: {
                        required : 'Masukkan Deskripsi',
                    },.
                },
                errorElement: 'span',
                errorPlacement: function(error,element){
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
