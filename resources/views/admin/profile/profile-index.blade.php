@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-user"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ !empty($getUser->photo) ? asset('upload/admin-image/' . $getUser->photo) : asset('upload/no_image.jpg') }}"
                                            alt="Admin" class="rounded-circle p-1 bg-success" width="110">
                                        <div class="mt-3">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-secondary mb-1">{{ $getUser->email }}</p>
                                            <p class="text-muted font-size-sm">{{ $getUser->alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Ubah Password</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.profile.updatePassword') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                        @if (session('status'))
                                            <div class="alert alert-success border-0 bg-success alert-dismissible fade show" role="alert">
                                                <div class="text-white">{{ session('status') }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @elseif (session('error'))
                                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show" role="alert">
                                                <div class="text-white">{{ session('error') }}</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif

                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Password Lama</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <input id="current_password" type="password" name="passwordLama" class="form-control @error('passwordLama') is-invalid @enderror" placeholder="Password Lama"/>
                                                @error('passwordLama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Password Baru</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <input id="new_password" type="password" name="passwordBaru" class="form-control @error('passwordBaru') is-invalid @enderror" placeholder="Password Baru"/>
                                                @error('passwordBaru')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Konfirmasi Password</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <input id="new_password_confirmation" type="password" name="new_password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-8 text-secondary">
                                                <input type="submit" class="btn btn-success px-4" value="Ubah Password" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h3>Data Admin</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Username</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $getUser->username }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Panjang</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $getUser->name }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $getUser->email }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">No Handphone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ $getUser->phone }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Alamat</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea class="form-control" name="alamat">{{ $getUser->alamat }}</textarea>
                                        </div>
                                    </div>
                                    @if (Auth::user()->role == 'sekolah')
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Info Sekolah</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="sekolah_info" class="form-control"
                                                    value="{{ $getUser->sekolah_info}}" />
                                            </div>
                                        </div>
                                    @endif
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
                                                src="{{ !empty($getUser->photo) ? asset('upload/admin-image/' . $getUser->photo) : asset('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-success px-4" value="Ubah Data" />
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
