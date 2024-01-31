@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sub-Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-category-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ isset($edit) ? 'Edit Sub-Category' : 'Tambah Sub-Category' }}</li>
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
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} Sub-Category</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ isset($edit) ? route('subcategory.update', $edit->id) : route('subcategory.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                    @method('PATCH')
                                    <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Category</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="category" class="form-select mb-3" aria-label="Select Category">
                                                <option readonly="true">Open this select menu</option>
                                                @foreach ($getCategory as $r)
                                                    <option value="{{ $r->id }}" {{ isset($edit) && $edit->category_id === $r->id ? 'selected' : '' }}>{{ $r->category_nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Sub-Category</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="subcategoryNama" class="form-control" value="{{ old('subcategoryNama', isset($edit) ? $edit->subcategory_nama : '') }}" placeholder="Ex: Website"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-success px-4" value="{{ isset($edit) ? 'Ubah Sub-Category' : 'Tambah Sub-Category' }}" />
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
                    subcategoryNama: {
                        required : true,
                    },
                },
                messages: {
                    subcategoryNama: {
                        required : 'Masukkan Nama Sub-Categoory',
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
