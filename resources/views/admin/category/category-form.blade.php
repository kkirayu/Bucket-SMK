@extends('admin.admin-dashboard')

@section('content')

    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb sub="Kategori" icon="bx bx-category" subsub="{{ isset($edit) ? 'Edit' : 'Tambah' }}" />

        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Category</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ isset($edit) ? route('category.update', $edit->id) : route('category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                    @method('PATCH')
                                    <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    <input type="hidden" value="{{ $edit->category_photo }}" name="photoLama" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Category</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="categoryNama" class="form-control" value="{{ old('categoryNama', isset($edit) ? $edit->category_nama : '') }}" placeholder="Ex: Fashion"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo Category</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="photo" class="form-control" id="photoCat" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showPhotoCat"
                                                src="{{ isset($edit) ? asset($edit->category_photo) : asset('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary" style="text-align: right;">
                                            <input type="submit" class="btn btn-success px-4" value="{{ isset($edit) ? 'Ubah Category' : 'Tambah Category' }}" />
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
                    categoryNama: {
                        required : true,
                    },
                },
                messages: {
                    categoryNama: {
                        required : 'Masukkan Nama Category',
                    },
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
            $('#photoCat').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPhotoCat').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
