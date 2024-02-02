@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-user"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($edit) ? 'Edit User' : 'Tambah User' }}</li>
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
                                <h4>Form {{ isset($edit) ? 'Edit' : 'Tambah' }} User</h4>
                            </div>
                            <div class="card-body">
                                <form id="myForm"
                                    action="{{ isset($edit) ? route('list.update', $edit->id) : route('list.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit))
                                        @method('PATCH')
                                        <input type="hidden" value="{{ $edit->id }}" name="id" />
                                    @endif
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', isset($edit) ? $edit->name : '') }}"
                                                placeholder="Nama" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Username</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="username" class="form-control"
                                                value="{{ old('username', isset($edit) ? $edit->username : '') }}"
                                                placeholder="Username" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', isset($edit) ? $edit->email : '') }}"
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone', isset($edit) ? $edit->phone : '') }}"
                                                placeholder="phone" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Role</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="role" class="form-control">
                                                <option value="admin" {{ old('role', isset($edit) && $edit->role == 'admin' ? 'selected' : '') }}>Admin</option>
                                                <option value="dinas" {{ old('role', isset($edit) && $edit->role == 'dinas' ? 'selected' : '') }}>Dinas</option>
                                                <option value="sekolah" {{ old('role', isset($edit) && $edit->role == 'sekolah' ? 'selected' : '') }}>Sekolah</option>
                                                <option value="user" {{ old('role', isset($edit) && $edit->role == 'user' ? 'selected' : '') }}>User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Alamat</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="alamat" class="form-control"
                                                placeholder="Alamat" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sekolah Info</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <textarea name="sekolah_info" class="form-control" placeholder="Sekolah Info"></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Status</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="status" class="form-control">
                                                <option value="aktif" {{ old('status', isset($edit) && $edit->status == 'aktif' ? 'selected' : '') }}>Aktif</option>
                                                <option value="nonaktif" {{ old('status', isset($edit) && $edit->status == 'nonaktif' ? 'selected' : '') }}>Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Foto Profil</h6>
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

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-success px-4"
                                                value="{{ isset($edit) ? 'Ubah User' : 'Tambah User' }}" />
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
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    role: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    photo: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Masukkan Nama',
                    },
                    username: {
                        required: 'Masukkan Username',
                    },
                    email: {
                        required: 'Masukkan Email',
                        email: 'Masukkan Email yang valid',
                    },
                    password: {
                        required: 'Masukkan Password',
                        minlength: 'Password minimal 6 karakter',
                    },
                    role: {
                        required: 'Pilih Role',
                    },
                    status: {
                        required: 'Pilih Status',
                    },
                    photo: {
                        required: 'Pilih Foto Profil',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
