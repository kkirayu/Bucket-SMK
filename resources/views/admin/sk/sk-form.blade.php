@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb sub="SKS" icon="bx bx-file" subsub="{{ isset($edit) ? 'Edit' : 'Tambah' }}" />
        <!--end breadcrumb-->

        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} SKS</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ isset($edit) ? route('sk.update', $edit->id) : route('sk.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PATCH')
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama SK</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control" value="{{ old('name', isset($edit) ? $edit->name : '') }}" placeholder="Nama SKS"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">File SK</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="file" name="file" accept=".pdf,.doc" class="form-control" />
                                            <small class="text-muted">Accepted formats: PDF, DOC.</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary" style="text-align: right;">
                                            <input type="submit" class="btn btn-success px-4" value="{{ isset($edit) ? 'Ubah SK' : 'Tambah SK' }}" />
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
                    name: {
                        required : true,
                    },
                    file: {
                        required : true,
                    },
                },
                messages: {
                    name: {
                        required : 'Masukkan Nama SKS',
                    },
                    file: {
                        required : 'Pilih File',
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
@endsection
