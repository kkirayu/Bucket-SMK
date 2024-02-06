@extends('admin.admin-dashboard')

@section('content')
    <div class="page-content">

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            @if (Auth::user()->role != 'sekolah')
                <div class="col">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $getSekolah->count() }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-buildings fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total Sekolah</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $getProduk->count() }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-barcode fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: {{ $getProduk->count() == 0 ? 0 : 100 }}%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Produk</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $getProduk->where('kategori', 'original')->count()  }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-diamond fs-3 text-white'></i>
                            </div>
                        </div>
                        @php
                            if ($getProduk->count() != 0) {
                                $persenOr = ($getProduk->where('kategori', 'original')->count() / $getProduk->count()) * 100;
                            } else {
                                $persenOr = 0;
                            }
                        @endphp
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: {{ $persenOr }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Produk Original</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $getProduk->where('kategori', 'atm')->count() }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-recycle fs-3 text-white'></i>
                            </div>
                        </div>
                        @php
                            if ($getProduk->count() != 0) {
                                $persenAtm = ($getProduk->where('kategori', 'atm')->count() / $getProduk->count()) * 100;
                            } else {
                                $persenAtm = 0;
                            }
                        @endphp
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: {{ $persenAtm }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Produk ATM</p>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 'sekolah')
                <div class="col">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $komentars == 0 ? 0 : $komentars->count() }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-message fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total Komentar</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div><!--end row-->

        <div class="">
            <div class="">
                <div class="container py-2">
                    <h2 class="font-weight-light text-center py-3">Amankan Data Anda!</h2>
                    <!-- timeline item 1 -->
                    <div class="row">
                        <!-- timeline item 1 left dot -->
                        <div class="col-auto text-center flex-column d-none d-sm-flex">
                            <div class="row h-50">
                                <div class="col">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                            <h5 class="m-2">
                                <span class="badge rounded-pill bg-primary border">&nbsp;</span>
                            </h5>
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                        </div>
                        <!-- timeline item 1 event content -->

                        <div class="col py-2">
                            <div class="card radius-15">
                                <div class="card-body">
                                    <h4 class="card-title">Ganti <a href="{{ route('admin.profile') }}">Password</a> Yang
                                        Aman</h4>
                                    <p class="card-text">Segera mengganti password awal Anda dengan yang baru demi keamanan
                                        akun Anda. Penggantian Password dapat dilakukan
                                        pada menu Profile atau bisa klik kata Password diatas. Buatlah Password yang kuat
                                        dan gampang diingat.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/row-->
                    <!-- timeline item 2 -->
                    <div class="row">
                        <div class="col-auto text-center flex-column d-none d-sm-flex">
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                            <h5 class="m-2">
                                <span class="badge rounded-pill bg-light border">&nbsp;</span>
                            </h5>
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                        </div>
                        <div class="col py-2">
                            <div class="card radius-15">
                                <div class="card-body">
                                    @if (Auth::user()->role == 'sekolah')
                                        <h4 class="card-title">Lengkapi <a href="{{ route('admin.profile') }}">Profil</a>
                                            Sekolah</h4>
                                        <p class="card-text">Silahkan Lengkapi Profil Sekolah Sesuai dengan Detail Dibawah
                                            ini. Profil sekolah dapat memudahkan Kurator dalam mengidentifikasi
                                            sekolah Anda. Untuk melengkapi Profil Sekolah masuk ke menu Profile atau klik
                                            kata Profile diatas.
                                        </p>
                                        <button class="btn btn-sm btn-outline-secondary" type="button"
                                            data-bs-target="#t2_details" data-bs-toggle="collapse">Lihat Details
                                            ▼</button>
                                        <div class="collapse border" id="t2_details">
                                            <div class="p-2 text-monospace">
                                                <div>- Foto: Inputkan Logo Sekolah</div>
                                                <div>- Alamat: Inputkan Alamat Lengkap Sekolah </div>
                                                <div>- Email: Inputkan Email Valid Sekolah</div>
                                                <div>- Nomor HP: Inputkan Nomor Sekolah Yang Dapat Dihubungi</div>
                                                <div>- Info Sekolah: Inputkan Brand Sekolah, contoh "Sekolah Perhotelan"
                                                </div>
                                            </div>
                                        </div>
                                    @elseif (Auth::user()->role == 'kurator')
                                    <h4 class="card-title">Isi <a href="{{ route('admin.profile') }}">Biodata</a> Lengkap</h4>
                                    <p class="card-text">Silahkan Lengkapi Profil Anda. Profil dapat memudahkan Sekolah dalam mengidentifikasi
                                        Anda. Untuk melengkapi Profil Sekolah masuk ke menu Profile atau klik kata Biodata diatas.
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <!-- timeline item 3 -->
                    <div class="row">
                        <div class="col-auto text-center flex-column d-none d-sm-flex">
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                            <h5 class="m-2">
                                <span class="badge rounded-pill bg-light border">&nbsp;</span>
                            </h5>
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                        </div>
                        <div class="col py-2">
                            <div class="card radius-15">
                                <div class="card-body">
                                    @if (Auth::user()->role == 'sekolah')
                                        <h4 class="card-title">Silahkan Tambahkan Produk</h4>
                                        <p>Silahkan Uploadkan Produk-Produk Inovasi yang menjadi keunggulan Sekolah, Baik itu
                                            Produk Original yang diciptakan baru dan terbarukan atau Produk ATM dengan
                                            mencantumkan keterangan inovasi yang dilakukan terhadap Produk yang ada sebelumnya.
                                            Produk yang di uploadkan oleh Sekolah boleh lebih dari 1.</p>
                                    @elseif (Auth::user()->role == 'kurator')
                                        <h4 class="card-title">Melakukan Asesmen Produk</h4>
                                        <p class="card-text">Kurator Melakukan Asesmen terhadap produk yang di-Upload oleh Sekolah, Baik itu
                                            Produk Original yang diciptakan baru dan terbarukan atau Produk ATM dengan
                                            dengan keterangan inovasi yang dilakukan terhadap Produk yang ada sebelumnya.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <!-- timeline item 4 -->
                    <div class="row">
                        <div class="col-auto text-center flex-column d-none d-sm-flex">
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                            <h5 class="m-2">
                                <span class="badge rounded-pill bg-light border">&nbsp;</span>
                            </h5>
                            <div class="row h-50">
                                <div class="col">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                        </div>
                        <div class="col py-2">
                            <div class="card radius-15">
                                <div class="card-body">
                                    @if (Auth::user()->role == 'sekolah')
                                        <h4 class="card-title">Tunggu Hasil Asesmen Produk Dari Kurator</h4>
                                        <p>Hasil asesmen merupakan hasil kurasi dari para Kurator, sehingga bisa menyatakan jika
                                            produk tersebut masuk kepada kategori Produk Original atau ATM dan layak untuk
                                            dilakukan Kurasi Lanjutan Sebelum diumumkan menjadi Produk yang akan di tampilkan
                                            pada Expo 2024.</p>
                                    @elseif (Auth::user()->role == 'kurator')
                                        <h4 class="card-title">Mengirimkan Hasil Asesmen Kepada Admin</h4>
                                        <p class="card-text">Kurator melakukan Upload SK hasil Kurasi dari Produk-produk inovasi yang dikirimkan masing-masing sekolah untuk di Approve oleh Admin.
                                            Peng-Upload-an dapat dilakukan pada menu Upload SK.

                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </div>
        </div>

    </div>
@endsection
