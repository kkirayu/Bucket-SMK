@extends('frontend.app')

@section('content')
    <div class="col-xl-10 col-lg-12 m-auto">
        <div class="product-detail accordion-detail">
            <div class="row mb-50 mt-30">
                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                    <div class="detail-gallery">
                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                        <!-- MAIN SLIDES -->
                        <div class="product-image-slider">
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->photo != '' ? asset($product->photo) : asset('upload/no_image.jpg') }}"
                                    alt="product image" />
                            </figure>
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->sertifikasi_haki != '' ? asset($product->sertifikasi_haki) : asset('upload/sertif/haki.png') }}"
                                    alt="product image" />
                            </figure>
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->sertifikasi_halal != '' ? asset($product->sertifikasi_halal) : asset('upload/sertif/halal.png') }}"
                                    alt="product image" />
                            </figure>
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->sertifikasi_sni != '' ? asset($product->sertifikasi_sni) : asset('upload/sertif/sni.png') }}"
                                    alt="product image" />
                            </figure>
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->photo != '' ? asset($product->photo) : asset('upload/no_image.jpg') }}"
                                    alt="product image" />
                            </figure>
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->sertifikasi_haki != '' ? asset($product->sertifikasi_haki) : asset('upload/sertif/haki.png') }}"
                                    alt="product image" />
                            </figure>
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->sertifikasi_halal != '' ? asset($product->sertifikasi_halal) : asset('upload/sertif/halal.png') }}"
                                    alt="product image" />
                            </figure>
                            <figure class="border-radius-10">
                                <img style="width:550px"
                                    src="{{ $product->sertifikasi_sni != '' ? asset($product->sertifikasi_sni) : asset('upload/sertif/sni.png') }}"
                                    alt="product image" />
                            </figure>
                        </div>
                        <!-- THUMBNAILS -->
                        <div class="slider-nav-thumbnails">
                            <div><img
                                    src="{{ $product->photo != '' ? asset($product->photo) : asset('upload/no_image.jpg') }}"
                                    alt="product image" /></div>
                            <div><img
                                    src="{{ $product->sertifikasi_haki != '' ? asset($product->sertifikasi_haki) : asset('upload/sertif/haki.png') }}"
                                    alt="product image" /></div>
                            <div><img
                                    src="{{ $product->sertifikasi_halal != '' ? asset($product->sertifikasi_halal) : asset('upload/sertif/halal.png') }}"
                                    alt="product image" /></div>
                            <div><img
                                    src="{{ $product->sertifikasi_sni != '' ? asset($product->sertifikasi_sni) : asset('upload/sertif/sni.png') }}"
                                    alt="product image" /></div>
                            <div><img
                                    src="{{ $product->photo != '' ? asset($product->photo) : asset('upload/no_image.jpg') }}"
                                    alt="product image" /></div>
                            <div><img
                                    src="{{ $product->sertifikasi_haki != '' ? asset($product->sertifikasi_haki) : asset('upload/sertif/haki.png') }}"
                                    alt="product image" /></div>
                            <div><img
                                    src="{{ $product->sertifikasi_halal != '' ? asset($product->sertifikasi_halal) : asset('upload/sertif/halal.png') }}"
                                    alt="product image" /></div>
                            <div><img
                                    src="{{ $product->sertifikasi_sni != '' ? asset($product->sertifikasi_sni) : asset('upload/sertif/sni.png') }}"
                                    alt="product image" /></div>

                        </div>
                    </div>
                    <!-- End Gallery -->
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="detail-info pr-30 pl-30">
                        {{-- <span class="stock-status out-stock"> Sale Off </span> --}}
                        <h2 class="title-detail">{{ $product->nama }}</h2>
                        <div class="product-detail-rating">
                            <div class="product-rate-cover text-end">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                            </div>
                        </div>
                        <div class="clearfix product-price-cover">
                            <div class="product-price primary-color float-left">
                                <span
                                    class="current-price text-brand">{{ 'Rp. ' . number_format($product->harga, 0, ',', '.') . ',-' }}</span>
                                {{-- <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span> --}}
                            </div>
                        </div>
                        <div class="short-desc mb-30">
                            <p class="font-lg">{{ 'Inovasi: ' . $product->inovasi }}</p>
                        </div>
                        <div class="font-xs">
                            <dl class="row">
                                <dt class="col-sm-3">Inovasi</dt>
                                <dd class="col-sm-9">{{ $product->kategori }}</dd>

                                <dt class="col-sm-3">Karya Sekolah</dt>
                                <dd class="col-sm-9">{{ $product->user->name }}</dd>

                                <dt class="col-sm-3">Jurusan</dt>
                                <dd class="col-sm-9">{{ $product->jurusan->nama_jurusan }}</dd>

                                <dt class="col-sm-3">Nama Tim</dt>
                                <dd class="col-sm-9">{{ $product->nama_tim }}</dd>

                                <dt class="col-sm-3">Link Vidio</dt>
                                <dd class="col-sm-9">{{ $product->video_produk }}</dd>

                                <dt class="col-sm-3">Merk Dagang</dt>
                                <dd class="col-sm-9">{{ $product->merk_dagang }}</dd>

                                <dt class="col-sm-3">Material</dt>
                                <dd class="col-sm-9">{{ $product->material }}</dd>

                                <dt class="col-sm-3">Tahun Rilis</dt>
                                <dd class="col-sm-9">{{ $product->tahun_produksi }}</dd>
                            </dl>
                        </div>
                    </div>
                    <!-- Detail Info -->
                </div>
            </div>
            <div class="product-info">
                <div class="tab-style3">
                    <ul class="nav nav-tabs text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                href="#Description">Deskripsi</a>
                        </li>
                    </ul>
                    <div class="tab-content shop_info_tab entry-main-content">
                        <div class="tab-pane fade show active" id="Description">
                            <div class="">
                                <p>{{ $product->descripsi }}</p>

                                <hr class="wp-block-separator is-style-dots">

                                <h4 class="mt-30">Inovasi &amp; Delivery</h4>
                                <hr class="wp-block-separator is-style-wide">
                                <p>{{ $product->inovasi }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
