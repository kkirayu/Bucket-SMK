@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <x-breadcrumb sub="Produk" icon="bx bx-barcode" subsub="Detail" />

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Detail Produk</h5>
                    </div>
                </div>
                <hr>


                <div class="row g-0">
                    <div class="col-md-4 border-end">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset($show->photo) }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white">Produk</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset($show->sertifikasi_haki) }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white">Sertifikasi Haki</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset($show->sertifikasi_halal) }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white">Sertifikasi Halal</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset($show->sertifikasi_sni) }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white">Sertifikasi SNI</h5>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="prev" style="background: 0%; border:0;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="next" style="background: 0%; border:0;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
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
                                <span class="price h4">RP. {{ number_format($show->harga, 0, ',', '.') }}</span>
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

                                <dt class="col-sm-3">Link Vidio</dt>
                                <dd class="col-sm-9">{{ $show->video_produk }}</dd>

                                <dt class="col-sm-3">Merk Dagang</dt>
                                <dd class="col-sm-9">{{ $show->merk_dagang }}</dd>

                                <dt class="col-sm-3">Material</dt>
                                <dd class="col-sm-9">{{ $show->material }}</dd>

                                <dt class="col-sm-3">Tahun Rilis</dt>
                                <dd class="col-sm-9">{{ $show->tahun_produksi }}</dd>

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
                                                        <img src="{{ !empty($komentar->user->photo) ? asset('upload/admin-image/' . $komentar->user->photo) : asset('upload/no_image.jpg') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14"><b>{{ $komentar->user->name }}</b></h6>
                                                        <h6 class="mb-1" style="font-size: 10px ">
                                                            {{ ucFirst($komentar->user->role) }}</h6>
                                                    </div>
                                                </label>
                                                <p>{{ $komentar->komentar }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </p>
                            {{-- <p>
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
                            </p> --}}
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
@endsection
