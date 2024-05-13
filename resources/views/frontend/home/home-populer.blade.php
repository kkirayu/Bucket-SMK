<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Product Populer </h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">

                    @if ($popProduct->count() != 0)

                    @foreach ($popProduct as $produk)

                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                            data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.show', ['id' => encrypt($produk->id)]) }}">
                                        <img class="default-img" src="{{ asset($produk->photo) }}"
                                            alt="" />
                                        <img class="hover-img" src="{{ asset($produk->photo) }}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ ucfirst($produk->kategori) }}</a>
                                </div>
                                <h2><a href="shop-product-right.html">{{ $produk->nama }}
                                    </a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.5)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">Inovasi: {{ Str::limit($produk->inovasi,45) }}</span>
                                    <br>
                                    <span class="font-small text-muted">By <a
                                            href="#">{{ $produk->user->name }}</a></span>
                                </div>
                                <div class="product-card-bottom mb-3">
                                    <div class="product-price">
                                        <span>Rp. {{ number_format($produk->harga, 0,",",".") }},-</span>
                                    </div>
                                </div>
                                <a href="{{ route('product.show', ['id' => encrypt($produk->id)]) }}" class="btn w-100 hover-up"><i
                                    class="fi-rs-eye mr-5"></i>View Produk</a>
                            </div>
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

                    <!--end product card-->

                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
    </div>


</section>
