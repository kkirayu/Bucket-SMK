@extends('frontend.app')

@section('content')
    <div class="col-xl-10 col-lg-12 m-auto">
        <div class="product-detail accordion-detail">
            <div class="row mb-50 mt-30">
                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                    <div class="detail-gallery">
                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                        <!-- MAIN SLIDES -->
                        {{-- <div class="product-image-slider slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track"
                                    style="opacity: 1; width: 8250px; transform: translate3d(-550px, 0px, 0px);">
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="-1"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-current slick-active"
                                        data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-2.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide" data-slick-index="1" aria-hidden="true"
                                        tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-1.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide" data-slick-index="2" aria-hidden="true"
                                        tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-3.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide" data-slick-index="3" aria-hidden="true"
                                        tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-4.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide" data-slick-index="4" aria-hidden="true"
                                        tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-5.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide" data-slick-index="5" aria-hidden="true"
                                        tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-6.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide" data-slick-index="6" aria-hidden="true"
                                        tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="7"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-2.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="8"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-1.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="9"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-3.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="10"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-4.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="11"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-5.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="12"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-6.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="13"
                                        id="" aria-hidden="true" tabindex="-1" style="width: 550px;">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                    </figure>
                                </div>
                            </div>






                        </div> --}}
                        <!-- THUMBNAILS -->
                        <div class="slider-nav-thumbnails slick-initialized slick-slider"><button type="button"
                                class="slick-prev slick-arrow" style=""><i
                                    class="fi-rs-arrow-small-left"></i></button>
                            <div class="slick-list draggable">
                                <div class="slick-track"
                                    style="opacity: 1; width: 2574px; transform: translate3d(-572px, 0px, 0px);">
                                    <div class="slick-slide slick-cloned" data-slick-index="-4" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="-3" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="-2" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="-1" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-current" data-slick-index="0" aria-hidden="false"
                                        tabindex="0" style="width: 123px;"><img src="assets/imgs/shop/thumbnail-3.jpg"
                                            alt="product image"></div>
                                    <div class="slick-slide" data-slick-index="1" aria-hidden="false" tabindex="0"
                                        style="width: 123px;"><img src="assets/imgs/shop/thumbnail-4.jpg"
                                            alt="product image"></div>
                                    <div class="slick-slide" data-slick-index="2" aria-hidden="false" tabindex="0"
                                        style="width: 123px;"><img src="assets/imgs/shop/thumbnail-5.jpg"
                                            alt="product image"></div>
                                    <div class="slick-slide" data-slick-index="3" aria-hidden="false" tabindex="0"
                                        style="width: 123px;"><img src="assets/imgs/shop/thumbnail-6.jpg"
                                            alt="product image"></div>
                                    <div class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1"
                                        style="width: 123px;"><img src="assets/imgs/shop/thumbnail-7.jpg"
                                            alt="product image"></div>
                                    <div class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1"
                                        style="width: 123px;"><img src="assets/imgs/shop/thumbnail-8.jpg"
                                            alt="product image"></div>
                                    <div class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1"
                                        style="width: 123px;"><img src="assets/imgs/shop/thumbnail-9.jpg"
                                            alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="7" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="8" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="9" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="10" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="11" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="12" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                    <div class="slick-slide slick-cloned" data-slick-index="13" id=""
                                        aria-hidden="true" tabindex="-1" style="width: 123px;"><img
                                            src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                </div>
                            </div>
                            <button type="button" class="slick-next slick-arrow" style=""><i
                                    class="fi-rs-arrow-small-right"></i></button>
                        </div>
                    </div>
                    <!-- End Gallery -->
                </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
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
                                    <span class="current-price text-brand">{{ $product->harga }}</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                            <div class="short-desc mb-30">
                                <p class="font-lg">{{ $product->descripsi }}</p>
                            </div>
                            <div class="detail-extralink mb-50">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="1"
                                        min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i
                                            class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul class="mr-50 float-start">
                                    <li class="mb-5">Type: <span class="text-brand">{{ $product->kategori }}</span></li>
                                </ul>
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
                                href="#Description">Description</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                href="#Additional-info">Additional info</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content shop_info_tab entry-main-content">
                        <div class="tab-pane fade show active" id="Description">
                            <div class="">
                                <p>{{ $product->descripsi }}</p>
                                
                                <ul class="product-more-infor mt-30">
                                    <li><span>Nama Tim</span> {{ $product->nama_tim }}</li>
                                    <li><span>Color</span> {{ $product->tahun_produksi }}</li>
                                    <li><span>Merk Dagang</span> {{ $product->merk_dagang }}</li>
                                    <li><span>Kategori</span> {{ $product->kategori }}</li>
                                </ul>
                                <hr class="wp-block-separator is-style-dots">
                               
                                <h4 class="mt-30">Inovasi &amp; Delivery</h4>
                                <hr class="wp-block-separator is-style-wide">
                                <p>{{ $product->inovasi }}</p>
                               
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="Vendor-info">
                            <div class="vendor-logo d-flex mb-30">
                                <img src="assets/imgs/vendor/vendor-18.svg" alt="">
                                <div class="vendor-name ml-15">
                                    <h6>
                                        <a href="vendor-details-2.html">{{ $product->merk_dagang }}</a>
                                    </h6>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="contact-infor mb-50">
                                <li><img src="assets/imgs/theme/icons/icon-location.svg" alt=""><strong>Address:
                                    </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt=""><strong>Contact
                                        Seller:</strong><span>(+91) - 540-025-553</span></li>
                            </ul>
                            <div class="d-flex mb-55">
                                <div class="mr-30">
                                    <p class="text-brand font-xs">Rating</p>
                                    <h4 class="mb-0">92%</h4>
                                </div>
                                <div class="mr-30">
                                    <p class="text-brand font-xs">Ship on time</p>
                                    <h4 class="mb-0">100%</h4>
                                </div>
                                <div>
                                    <p class="text-brand font-xs">Chat response</p>
                                    <h4 class="mb-0">89%</h4>
                                </div>
                            </div>
                            <p>Noodles &amp; Company is an American fast-casual restaurant that offers international and
                                American noodle dishes and pasta in addition to soups and salads. Noodles &amp; Company was
                                founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company
                                went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460
                                Noodles &amp; Company locations across 29 states and Washington, D.C.</p>
                        </div> --}}
                        <div class="tab-pane fade" id="Reviews">
                            <!--Comments-->
                            <div class="comments-area">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 class="mb-30">Customer questions &amp; answers</h4>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex mb-30">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/blog/author-2.png" alt="">
                                                        <a href="#" class="font-heading text-brand">Sienna</a>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="d-flex justify-content-between mb-10">
                                                            <div class="d-flex align-items-center">
                                                                <span class="font-xs text-muted">December 4, 2022 at 3:12
                                                                    pm </span>
                                                            </div>
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 100%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur
                                                            adipisicing elit. Delectus, suscipit exercitationem accusantium
                                                            obcaecati quos voluptate nesciunt facilis itaque modi commodi
                                                            dignissimos sequi repudiandae minus ab deleniti totam officia id
                                                            incidunt? <a href="#" class="reply">Reply</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/blog/author-3.png" alt="">
                                                        <a href="#" class="font-heading text-brand">Brenna</a>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="d-flex justify-content-between mb-10">
                                                            <div class="d-flex align-items-center">
                                                                <span class="font-xs text-muted">December 4, 2022 at 3:12
                                                                    pm </span>
                                                            </div>
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 80%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur
                                                            adipisicing elit. Delectus, suscipit exercitationem accusantium
                                                            obcaecati quos voluptate nesciunt facilis itaque modi commodi
                                                            dignissimos sequi repudiandae minus ab deleniti totam officia id
                                                            incidunt? <a href="#" class="reply">Reply</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/blog/author-4.png" alt="">
                                                        <a href="#" class="font-heading text-brand">Gemma</a>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="d-flex justify-content-between mb-10">
                                                            <div class="d-flex align-items-center">
                                                                <span class="font-xs text-muted">December 4, 2022 at 3:12
                                                                    pm </span>
                                                            </div>
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 80%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur
                                                            adipisicing elit. Delectus, suscipit exercitationem accusantium
                                                            obcaecati quos voluptate nesciunt facilis itaque modi commodi
                                                            dignissimos sequi repudiandae minus ab deleniti totam officia id
                                                            incidunt? <a href="#" class="reply">Reply</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="mb-30">Customer reviews</h4>
                                        <div class="d-flex mb-30">
                                            <div class="product-rate d-inline-block mr-15">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <h6>4.8 out of 5</h6>
                                        </div>
                                        <div class="progress">
                                            <span>5 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                        </div>
                                        <div class="progress">
                                            <span>4 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                        <div class="progress">
                                            <span>3 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 45%"
                                                aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                        </div>
                                        <div class="progress">
                                            <span>2 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 65%"
                                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                        </div>
                                        <div class="progress mb-30">
                                            <span>1 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                        </div>
                                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                    </div>
                                </div>
                            </div>
                            <!--comment form-->
                            <div class="comment-form">
                                <h4 class="mb-15">Add a review</h4>
                                <div class="product-rate d-inline-block mb-30"></div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <form class="form-contact comment_form" action="#" id="commentForm">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                            placeholder="Write Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" id="name"
                                                            type="text" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="email" id="email"
                                                            type="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input class="form-control" name="website" id="website"
                                                            type="text" placeholder="Website">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="button button-contactForm">Submit
                                                    Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <h2 class="section-title style-1 mb-30">Related products</h2>
                </div>
                <div class="col-12">
                    <div class="row related-products">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html" tabindex="0">
                                            <img class="default-img" src="assets/imgs/shop/product-2-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-search"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                            href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn small hover-up"
                                            href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="shop-product-right.html" tabindex="0">Ulstra Bass Headphone</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span> </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html" tabindex="0">
                                            <img class="default-img" src="assets/imgs/shop/product-3-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-search"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                            href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn small hover-up"
                                            href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="sale">-12%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="shop-product-right.html" tabindex="0">Smart Bluetooth Speaker</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span> </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$138.85 </span>
                                        <span class="old-price">$145.8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html" tabindex="0">
                                            <img class="default-img" src="assets/imgs/shop/product-4-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-search"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                            href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn small hover-up"
                                            href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="shop-product-right.html" tabindex="0">HomeSpeak 12UEA Goole</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span> </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$738.85 </span>
                                        <span class="old-price">$1245.8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6 d-lg-block d-none">
                            <div class="product-cart-wrap hover-up mb-0">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html" tabindex="0">
                                            <img class="default-img" src="assets/imgs/shop/product-5-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-search"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                            href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn small hover-up"
                                            href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="shop-product-right.html" tabindex="0">Dadua Camera 4K 2022EF</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span> </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$89.8 </span>
                                        <span class="old-price">$98.8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection