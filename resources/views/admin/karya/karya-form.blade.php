@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Karya</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-basket"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ isset($edit) ? 'Edit Karya' : 'Tambah Karya' }}</li>
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
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Karya</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ isset($edit) ? route('karya.update', $edit->id) : route('karya.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                    @method('PATCH')
                                    <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    <input type="hidden" value="{{ $edit->photo }}" name="photoLama" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Karya</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="karyaNama" class="form-control" value="{{ old('karyaNama', isset($edit) ? $edit->nama : '') }}" placeholder="Ex: Tas Batik"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo Karya</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="photo" class="form-control" id="photo" value="{{ old('photo') }}" />
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
                                            <h6 class="mb-0">Kategori Karya</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="category" class="form-control" required="">
                                                <option value="" readonly>--Pilih--</option>
                                                @foreach ($getCategory as $r)
                                                    <option value="{{ $r->id }}"
                                                        {{ isset($edit) && $edit->category_id === $r->id ? 'selected' : '' }}>
                                                        {{ $r->category_nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Inovasi</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="inovasi" class="form-control" value="{{ old('inovasi', isset($edit) ? $edit->inovasi : '') }}" placeholder="Ex: Inovasi karya"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Deskripsi</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Karya">{{ old('deskripsi', isset($edit) ? $edit->descripsi : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Harga</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="harga" class="form-control" value="{{ old('harga', isset($edit) ? $edit->harga : '') }}" placeholder="Ex: 50000"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary" style="text-align: right;">
                                            <input type="submit" class="btn btn-success px-4" value="{{ isset($edit) ? 'Ubah Karya' : 'Tambah Karya' }}" />
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
                    karyaNama: {
                        required : true,
                    },
                    category: {
                        required : true,
                    },
                    photo: {
                        required : true,
                    },
                    inovasi: {
                        required : true,
                    },
                    harga: {
                        required : true,
                    },
                    deskripsi: {
                        required : true,
                    }

                },
                messages: {
                    karyaNama: {
                        required : 'nama karya wajib diisi',
                    },
                    category: {
                        required : 'kategori wajib dipilih',
                    },
                    photo: {
                        required : 'photo wajib dipilih',
                    },
                    inovasi: {
                        required : 'inovasi wajib diisi',
                    },
                    deskripsi: {
                        required : 'deskripsi wajib diisi',
                    },
                    harga: {
                        required : 'harga wajib diisi',
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
            $('#photo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPhoto').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
