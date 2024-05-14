@extends('admin.admin-dashboard')

@section('content')
<div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb sub="Produk" icon="bx bx-barcode" subsub="{{ isset($edit) ? 'Edit' : 'Tambah' }}" />

        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Produk</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ isset($edit) ? route('produk.update', $edit->id) : route('produk.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PATCH')
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                        <input type="hidden" value="{{ $edit->photo }}" name="photoLama" />
                                        <input type="hidden" value="{{ $edit->sertifikasi_haki }}" name="photoHaki" />
                                        <input type="hidden" value="{{ $edit->sertifikasi_halal }}" name="photoHalal" />
                                        <input type="hidden" value="{{ $edit->sertifikasi_sni }}" name="photoSni" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Produk<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ old('nama', isset($edit) ? $edit->nama : '') }}"
                                                placeholder="Nama Produk" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Kategori<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kategori"
                                                    id="kategori" value="atm"
                                                    {{ old('kategori', isset($edit) && $edit->kategori == 'atm' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="kategori">
                                                    ATM  (Amati Tiru Modifikasi)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kategori"
                                                    id="kategori" value="original"
                                                    {{ old('kategori', isset($edit) && $edit->kategori == 'original' ? 'checked' : '') }}>
                                                <label class="form-check-label" for="kategori">
                                                    Original 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Deskripsi Produk/Jasa<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="descripsi" class="form-control" id="descripsi" rows="5" 
                                                placeholder="Deskripsi Produk">{{ old('descripsi', isset($edit) ? $edit->descripsi : '') }}</textarea>
                                            <small id="descripsiHelp" class="form-text text-muted">
                                                Deskripsi harus memiliki minimal 200 kata.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Inovasi<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="inovasi" class="form-control" placeholder="inovasi">{{ old('inovasi', isset($edit) ? $edit->inovasi : '') }}</textarea>
                                            <small id="descripsiHelp" class="form-text text-muted">
                                                Deskripsi harus memiliki minimal 100 kata.
                                            </small>
                                        </div>
                                    </div>
                                    @if (Auth::user()->role == 'admin')
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Sekolah<i style="color: red">*</i></h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <select name="sekolah" class="form-control">
                                                    <option value="" selected disabled>--- Pilih Sekolah ---</option>
                                                    @foreach ($sekolah as $s)
                                                        <option value="{{ $s->id }}" {{ old('sekolah', isset($edit) ? $edit->user_id == $s->id ? 'selected' : '' : '') }}>{{ $s->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @elseif (Auth::user()->role == 'sekolah')
                                        <input type="hidden" name="sekolah" value="{{ Auth::user()->id }}">
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="{{ isset($edit) ? 'photos' : 'photo' }}" class="form-control" id="photo1" />
                                            <small class="text-muted">Accepted formats: PNG, JPG, JPEG.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showPhoto1"
                                                src="{{ isset($edit) ? asset($edit->photo) : asset('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Vidio Product</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="vidio_produk" class="form-control"
                                                value="{{ old('vidio_produk', isset($edit) ? $edit->vidio_produk : '') }}"
                                                placeholder="Link vidio produk" />
                                                <small class="text-muted">Accepted formats: Link vidio yang sudah di upload ke platform seperti Youtube dll.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Tim<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="nama_tim" class="form-control" placeholder="Nama Tim">{{ old('nama_tim', isset($edit) ? $edit->nama_tim : '') }}</textarea>
                                            <small class="text-muted">Accepted formats: Nama Tim Project dan Nama Orang yang termasuk ke dalam TIM.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Jumlah Tim<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="number" name="jumlah_tim" class="form-control" placeholder="Jumlah Tim">{{ old('jumlah_tim', isset($edit) ? $edit->jumlah_tim : '') }}</input>
                                            <small class="text-muted">Accepted formats: Dalam data angka.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Jurusan<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="jurusan" class="form-control">
                                                <option value="" selected disabled>--- Pilih Jurusan ---</option>
                                                @foreach ($jurusans as $jurusan)
                                                    <option value="{{ $jurusan->id }}" {{ old('jurusan', isset($edit) ? $edit->jurusan_id == $jurusan->id ? 'selected' : '' : '') }}>{{ $jurusan->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Material<i style="color: red">*</i></h6>
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
                                            <input type="number" name="harga" class="form-control"
                                                value="{{ old('harga', isset($edit) ? $edit->harga : '') }}"
                                                placeholder="harga" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tanggal Produksi</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="date" name="tahun_produksi" class="form-control"
                                                value="{{ old('tahun_produksi', isset($edit) ? $edit->tahun_produksi : '') }}"
                                                placeholder="tahun_produksi" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tanggal Mulai Produksi</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ old('start_date', isset($edit) ? $edit->start_date : '') }}"
                                                placeholder="start_date" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Merk Dagang</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="merk_dagang" class="form-control"
                                                value="{{ old('merk_dagang', isset($edit) ? $edit->merk_dagang : '') }}"
                                                placeholder="merk dagang" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Volume/bulan<i style="color: red">*</i></h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="number" name="volume" class="form-control" placeholder="volume">{{ old('volume', isset($edit) ? $edit->volume: '') }}</input>
                                            <small class="text-muted">Accepted formats: Dalam data angka.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">File BMC</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="file" name="file" class="form-control-file" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo HAKI</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="sertifikasi_haki" class="form-control"
                                                id="photoHaki" />
                                                <small class="text-muted">Accepted formats: PNG, JPG, JPEG.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showPhotoHaki"
                                                src="{{ isset($edit) ? asset($edit->sertifikasi_haki) : asset('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo Halal</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="sertifikasi_halal" class="form-control"
                                                id="photoHalal" />
                                                <small class="text-muted">Accepted formats: PNG, JPG, JPEG.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showPhotoHalal"
                                                src="{{ isset($edit) ? asset($edit->sertifikasi_halal) : asset('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo SNI</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="sni" class="form-control" id="photoSNI" />
                                            <small class="text-muted">Accepted formats: PNG, JPG, JPEG.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showPhotoSNI"
                                                src="{{ isset($edit) ? asset($edit->sertifikasi_sni) : asset('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary" style="text-align: right;">
                                            <input type="submit" class="btn btn-success px-4"
                                                value="{{ isset($edit) ? 'Ubah Produk' : 'Tambah Produk' }}"  onclick="return validateDescription()" />
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
                    tahun_produksi: {
                        required : true,
                    }
                },
                messages: {
                    nama: {
                        required : 'Masukkan Nama Produk',
                    },
                    kategori: {
                        required : 'Pilih Kategori',
                    },
                    descripsi: {
                        required : 'Masukkan Deskripsi',
                    },
                    inovasi: {
                        required : 'Masukkan Inovasi',
                    },
                    sekolah: {
                        required : 'Pilih Sekolah',
                    },
                    photo: {
                        required : 'Pilih Photo',
                    },
                    nama_tim: {
                        required : 'Masukkan Nama Tim',
                    },
                    jurusan: {
                        required : 'Masukkan Jurusan',
                    },
                    material: {
                        required : 'Masukkan Material',
                    },
                    tahun_produksi: {
                        required : 'Masukkan Tahun Produksi',
                    }
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#photo1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPhoto1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
        $(document).ready(function() {
            $('#photoHaki').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPhotoHaki').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
        $(document).ready(function() {
            $('#photoSNI').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPhotoSNI').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
        $(document).ready(function() {
            $('#photoHalal').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPhotoHalal').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });


    </script>


@endsection
