<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Bangga menggunakan produk SMK <br />
                                Karena SMK Bisa - SMK Hebat
                            </h2>
                            <p class="mb-45">Temukan produk SMK berkualitas hanya di <span class="text-brand">BucketSMK</span></p>
                            {{-- <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form> --}}
                        </div>
                        <img src="{{ asset('frontend/assets/imgs/banner/banner-9.png') }}" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img src="{{ asset('frontend/assets/imgs/theme/logo-img.png') }}"
                                    alt="logo" /></a>
                            <p class="font-lg text-heading">Semua Produk Inovasi SMK ada disini</p>
                        </div>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp"
                    data-wow-delay=".1s">
                    <ul class="contact-infor">
                        <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-location.svg') }}"
                                alt="" /><strong>Address: </strong> <span>Jl.Padang Sikabu, Latina ,Payakumbuh, Sumatra Barat Indonesia</span></li>
                        <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}"
                                alt="" /><strong>Call Us:</strong><span>(+62) -822-8449-2933</span>
                        </li>
                    </ul>
                    {{-- <h4 class=" widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Support Center</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul> --}}
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp"
                    data-wow-delay=".2s">
                    <ul class="contact-infor">
                        <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-email-2.svg') }}"
                                alt="" /><strong>Email:</strong><span>infobucketsmk@example.com</span></li>
                        <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-clock.svg') }}"
                                alt="" /><strong>Hours:</strong><span>09:00 - 18:00, Mon - Sat</span>
                        </li>
                    </ul>
                    {{-- <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Help Ticket</a></li>
                        <li><a href="#">Shipping Details</a></li>
                        <li><a href="#">Compare products</a></li>
                    </ul> --}}
                </div>


            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; {{ date('Y') }}, <strong class="text-brand">BucketSMK</strong> - Produk Inovasi SMK <br />Mini Coding School - TEFA RPL SMKN 4 PAYAKUMBUH</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">

                {{-- <div class="hotline d-lg-inline-flex">
                    <img src="assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                    <p>1900 - 8888<span>24/7 Support Center</span></p>
                </div> --}}
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                            alt="" /></a>
                </div>
                {{-- <p class="font-sm">Up to 15% discount on your first subscribe</p> --}}
            </div>
        </div>
    </div>
</footer>
