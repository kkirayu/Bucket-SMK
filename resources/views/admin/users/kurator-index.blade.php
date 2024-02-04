@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Kurator</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-category"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Kurator</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('kurator.create') }}" class="btn btn-primary">Tambah Kurator</a>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" id="importButton">
                        Import Excel
                    </button>
                
                    <form method="post" action="{{ route('import.excel') }}" enctype="multipart/form-data" style="display: none;" id="importForm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <label for="fileInput">Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" id="fileInput" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetFileInput()">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <script>
                    document.getElementById('importButton').addEventListener('click', function () {
                        document.getElementById('fileInput').click();
                    });
                
                    function resetFileInput() {
                        document.getElementById('importForm').reset();
                    }
                </script>
            </div>
        </div>
        <!--end breadcrumb-->
        <h4 class="mb-0 text-uppercase">Data Semua Kurator</h4>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>
                                        <a href="{{ route('list.edit', encrypt($user->id)) }}"
                                            class="btn btn-info">Edit</a>
                                        <a href="{{ route('list.destroy', encrypt($user->id)) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
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
