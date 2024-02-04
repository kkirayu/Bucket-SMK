@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Asesmen Produk" icon="bx bx-list-check" subsub="Show" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Show Produk {{ $show->kategori == 'atm' ? Str::upper($show->kategori) : Str::ucfirst($show->kategori) }}</h5>
                    </div>
                    @if (Auth::user()->role == 'admin' && $show->status == 1)
                        <div class="font-22 ms-auto">
                            <div class="btn-group">
                                <button type="button" onclick="window.location.href='{{ route('approve.asesmen', $show->id) }}'" class="btn btn-primary">Approve
                                    Produk</button>
                            </div>
                        </div>
                    @endif
                </div>
                <hr>


                <div class="row g-0">
                    <div class="col-md-4 border-end">
                        <img src="{{ asset($show->photo) }}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $show->nama }}</h4>
                            <div class="d-flex gap-3 py-3">
                                <div class="cursor-pointer">
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-secondary'></i>
                                </div>
                                <div>{{ $komentars->count() }} reviews</div>
                            </div>
                            <div class="mb-3">
                                <span class="price h4">RP. {{ number_format($show->harga, 0, ",", ".") }}</span>
                                {{-- <span class="text-muted">/unit </span> --}}
                            </div>
                            <p class="card-text fs-6 mb-0"><b>Deskripsi</b></p>
                            <p class="card-text fs-6">{{ $show->descripsi }}</p>
                            <dl class="row">
                                <dt class="col-sm-3">Inovasi</dt>
                                <dd class="col-sm-9">{{ $show->inovasi }}</dd>

                                <dt class="col-sm-3">Karya Sekolah</dt>
                                <dd class="col-sm-9">{{ $show->user->name }}</dd>

                                <dt class="col-sm-3">Jurusan</dt>
                                <dd class="col-sm-9">{{ $show->jurusan->nama_jurusan }}</dd>

                                <dt class="col-sm-3">Nama Tim</dt>
                                <dd class="col-sm-9">{{ $show->nama_tim }}</dd>
                            </dl>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#review" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Reviews</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="review" role="tabpanel">
                            <p>
                                @foreach ($komentars as $komentar)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-12">
                                            <label for="user" class="form-label d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ !empty($komentar->user->photo) ? asset('upload/admin-image/' . $komentar->user->photo) : asset('upload/no_image.jpg') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14"><b>{{ $komentar->user->name }}</b></h6>
                                                    <h6 class="mb-1" style="font-size: 10px ">{{ ucFirst($komentar->user->role) }}</h6>
                                                </div>
                                            </label>
                                            <p>{{ $komentar->komentar }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </p>
                            <p>
                            <div class="card">
                                <div class="card-body">
                                    <form id="myForm" action="{{ route('komentar.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="author" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="produk" value="{{ $show->id }}">
                                        <div class="col-12">
                                            <label for="komentar" class="form-label"><i class="bx bxs-message"></i><b>
                                                    Tinggalkan Masukan / Komentar</b></label>
                                            <textarea class="form-control" id="komentar" name="komentar" placeholder="Masukan / Komentar" rows="3"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-secondary" style="text-align: right;">
                                                <input type="submit" class="btn btn-primary mt-2 px-4" value="Submit" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myForm').validate({
                rules: {
                    komentar: {
                        required : true,
                    },
                },
                messages: {
                    komentar: {
                        required : 'Masukkan Komentar',
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
