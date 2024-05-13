<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class=""> New Product </h3>

        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">Temukan Karya Terbaik Anak SMK!</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                @if ($newProduct->count() != 0)
                                @foreach ($newProduct as $new)

                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.show', ['id' => encrypt($new->id)]) }}">
                                                    <img class="default-img" src="{{ asset($new->photo) }}"
                                                        alt="" />
                                                    <img class="hover-img" src="{{ asset($new->photo) }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">New</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ ucfirst($new->kategori) }}</a>
                                        </div>
                                        <h2><a href="shop-product-right.html">{{ $new->nama }}
                                            </a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.5)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">Inovasi: {{ Str::limit($new->inovasi,45) }}</span>
                                            <br>
                                            <span class="font-small text-muted">By <a
                                                    href="#">{{ $new->user->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom mb-3">
                                            <div class="product-price">
                                                <span>Rp. {{ number_format($new->harga, 0,",",".") }},-</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('product.show', ['id' => encrypt($new->id)]) }}" class="btn w-100 hover-up"><i
                                            class="fi-rs-eye mr-5"></i>View Produk</a>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                        data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a href="shop-product-right.html">{{ '-- Tidak Ada Data --' }}
                                            </a></h2>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!--End product Wrap-->
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->


                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>
