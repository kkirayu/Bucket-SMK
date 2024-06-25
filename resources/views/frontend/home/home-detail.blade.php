@extends('frontend.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS (tambahkan ini) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                            <br>
                            <button type="button" class="btn btn-success openModalButton"
                                data-produk-id="{{ $product->id }}" data-toggle="modal" data-target="#cartModal">
                                Tambahkan ke Keranjang
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="cartModal" tabindex="-1" role="dialog"
                                aria-labelledby="cartModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cartModalLabel">Tambahkan ke Keranjang</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('cart.store') }}" method="POST" id="cartForm">
                                                @csrf
                                                <input type="hidden" name="produk_id" id="produk_id" value="{{ $product->id }}">
                                                <div class="form-group">
                                                    <label for="kuantitas">Kuantitas</label>
                                                    <div class="input-group">
                                                        <input type="number" name="kuantitas" id="kuantitas" class="form-control text-center" value="1" min="1" required onchange="updateHargaLast()">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-success" onclick="increaseQuantity()">+</button>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-danger" onclick="decreaseQuantity()">-</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga/1PCS</label>
                                                    <input type="number" name="harga" id="harga" class="form-control" min="1" value="{{ $product->harga }}" readonly>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="hargalast">Total</label>
                                                    <input type="number" id="hargalast" class="form-control" readonly placeholder="Total Harga akan ditampilkan di sini">
                                                </div> --}}
                                                <input type="hidden" name="total_harga" id="total_harga"> <!-- Input hidden untuk menyimpan total harga -->
                                                <button type="submit" class="btn btn-success">Tambahkan ke Cart</button>
                                            </form>
                                            <script>
                                                function decreaseQuantity() {
                                                    var quantityInput = document.getElementById('kuantitas');
                                                    var currentValue = parseInt(quantityInput.value);
                                                    if (currentValue > 1) {
                                                        quantityInput.value = currentValue - 1;
                                                        updateHargaLast();
                                                    }
                                                }
                                            
                                                function increaseQuantity() {
                                                    var quantityInput = document.getElementById('kuantitas');
                                                    quantityInput.value = parseInt(quantityInput.value) + 1;
                                                    updateHargaLast();
                                                }
                                            
                                                function updateHargaLast() {
                                                    var kuantitas = document.getElementById('kuantitas').value;
                                                    var harga = document.getElementById('harga').value;
                                                    var hargalast = kuantitas * harga;
                                                    document.getElementById('hargalast').value = hargalast;
                                                    document.getElementById('total_harga').value = hargalast; // Menyimpan total harga di input hidden
                                                }
                                            
                                                // Update total harga ketika kuantitas berubah secara manual
                                                document.getElementById('kuantitas').addEventListener('input', updateHargaLast);
                                            
                                                // Inisialisasi nilai total harga saat halaman dimuat
                                                document.addEventListener('DOMContentLoaded', updateHargaLast);
                                            </script>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const openModalButton = document.getElementById('openModalButton');
            const closeModalButton = document.getElementById('closeModalButton');
            const cartModal = document.getElementById('cartModal');

            openModalButton.addEventListener('click', () => {
                cartModal.classList.add('show');
                cartModal.style.display = 'block';
                cartModal.setAttribute('aria-modal', 'true');
                cartModal.setAttribute('role', 'dialog');
            });

            closeModalButton.addEventListener('click', () => {
                cartModal.classList.remove('show');
                cartModal.style.display = 'none';
                cartModal.removeAttribute('aria-modal');
                cartModal.removeAttribute('role');
            });

            window.addEventListener('click', (event) => {
                if (event.target === cartModal) {
                    cartModal.classList.remove('show');
                    cartModal.style.display = 'none';
                    cartModal.removeAttribute('aria-modal');
                    cartModal.removeAttribute('role');
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kuantitas').on('input', function() {
                var kuantitas = $(this).val();
                var harga = $('#harga').val();
                var total = kuantitas * harga;
                $('#total_harga').val(total);
            });
        });
    </script>
    <script>
        function updateHargaLast() {
            var kuantitas = document.getElementById('kuantitas').value;
            var harga = document.getElementById('harga').value;
            var hargalast = kuantitas * harga;
            document.getElementById('total_harga').value = hargalast;
        }
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const openModalButtons = document.querySelectorAll('.openModalButton');
            const closeModalButton = document.getElementById('closeModalButton');
            const cartModal = document.getElementById('cartModal');
            const produkIdInput = document.getElementById('produk_id');
            const kuantitasInput = document.getElementById('kuantitas');
            const totalHargaInput = document.getElementById('total_harga');
    
            openModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const produkId = button.getAttribute('data-produk-id');
                    const produkHarga = button.getAttribute('data-produk-harga');
                    produkIdInput.value = produkId;
                    kuantitasInput.value = 1;
                    totalHargaInput.value = produkHarga;
    
                    cartModal.classList.add('show');
                    cartModal.style.display = 'block';
                    cartModal.setAttribute('aria-modal', 'true');
                    cartModal.setAttribute('role', 'dialog');
    
                    kuantitasInput.addEventListener('input', () => {
                        const kuantitas = kuantitasInput.value;
                        const totalHarga = produkHarga * kuantitas;
                        totalHargaInput.value = totalHarga.toFixed(2);
                    });
                });
            });
    
            closeModalButton.addEventListener('click', () => {
                cartModal.classList.remove('show');
                cartModal.style.display = 'none';
                cartModal.removeAttribute('aria-modal');
                cartModal.removeAttribute('role');
            });
    
            window.addEventListener('click', (event) => {
                if (event.target === cartModal) {
                    cartModal.classList.remove('show');
                    cartModal.style.display = 'none';
                    cartModal.removeAttribute('aria-modal');
                    cartModal.removeAttribute('role');
                }
            });
        });
    </script> --}}
@endsection
