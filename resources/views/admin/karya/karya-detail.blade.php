@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Karya</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-basket"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Karya</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Detail Karya</h5>
                    </div>
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
                                <div>142 reviews</div>
                                <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> 134 orders</div>
                            </div>
                            <div class="mb-3">
                                <span class="price h4">RP. {{ $show->harga }}</span>
                                <span class="text-muted">/unit </span>
                            </div>
                            <p class="card-text fs-6 mb-0"><b>Deskripsi</b></p>
                            <p class="card-text fs-6">{{ $show->descripsi }}</p>
                            <dl class="row">
                                <dt class="col-sm-3">Inovasi</dt>
                                <dd class="col-sm-9">{{ $show->inovasi }}</dd>

                                <dt class="col-sm-3">Karya Sekolah</dt>
                                <dd class="col-sm-9">{{ $show->user->name }}</dd>

                                <dt class="col-sm-3">Kategori</dt>
                                <dd class="col-sm-9">{{ $show->category->category_nama }}</dd>

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
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh
                                mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan
                                aliquip quis cardigan american apparel, butcher voluptate nisi.</p>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh
                                mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan
                                aliquip quis cardigan american apparel, butcher voluptate nisi.</p>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
@endsection
