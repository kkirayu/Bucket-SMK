<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backadmin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" style="color: #02ba5a">Bucket<b style="color: #3d3d3d">SMK</b></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            {{-- <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-at'></i>
                    </div>
                    <div class="menu-title">Brand</div>
                </a>
                <ul>
                    <li> <a href="{{ route('brand.index') }}"><i class="bx bx-radio-circle"></i>Semua Brand</a>
                    </li>
                    <li> <a href="{{ route('brand.create') }}"><i class="bx bx-radio-circle"></i>Tambah Brand</a>
                    </li>
                </ul>
            </li> --}}
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Category</div>
                </a>
                <ul>
                    <li> <a href="{{ route('category.index') }}"><i class="bx bx-radio-circle"></i>Semua Category</a>
                    </li>
                    <li> <a href="{{ route('category.create') }}"><i class="bx bx-radio-circle"></i>Tambah Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Users</div>
                </a>
                <ul>
                    <li> <a href="{{ route('user.index') }}"><i class="bx bx-radio-circle"></i>Semua Users</a>
                    </li>
                    <li> <a href="{{ route('kurator.index') }}"><i class="bx bx-radio-circle"></i>Semua Kurator</a>
                    </li>
                    <li> <a href="{{ route('list.index') }}"><i class="bx bx-radio-circle"></i>Semua Sekolah</a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category-alt"></i>
                    </div>
                    <div class="menu-title">Sub-Category</div>
                </a>
                <ul>
                    <li> <a href="{{ route('subcategory.index') }}"><i class="bx bx-radio-circle"></i>Semua
                            Sub-Category</a>
                    </li>
                    <li> <a href="{{ route('subcategory.create') }}"><i class="bx bx-radio-circle"></i>Tambah
                            Sub-Category</a>
                    </li>
                </ul>
            </li> --}}
        @endif
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'sekolah')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-basket"></i>
                    </div>
                    <div class="menu-title">Karya Master</div>
                </a>
                <ul>
                    <li
                        class="{{ Request::is('admin/karya/*') && !Request::is('admin/karya/create') ? 'mm-active' : '' }}">
                        <a href="{{ route('karya.index') }}"><i class="bx bx-radio-circle"></i>Semua Karya</a>
                    </li>
                    <li> <a href="{{ route('karya.create') }}"><i class="bx bx-radio-circle"></i>Tambah Karya</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-dna"></i>
                    </div>
                    <div class="menu-title">Jurusan</div>
                </a>
                <ul>
                    <li> <a href="{{ route('jurusan.index') }}"><i class="bx bx-radio-circle"></i>Semua Jurusan</a>
                    </li>
                    <li> <a href="{{ route('jurusan.create') }}"><i class="bx bx-radio-circle"></i>Tambah Jurusan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-barcode"></i>
                    </div>
                    <div class="menu-title">Produk</div>
                </a>
                <ul>
                    <li> <a href="{{ route('produk.index') }}"><i class="bx bx-radio-circle"></i>Semua Produk</a>
                    </li>
                    <li> <a href="{{ route('produk.create') }}"><i class="bx bx-radio-circle"></i>Tambah Produk</a>
                    </li>
                </ul>
            </li>
        @endif


        <!--end navigation-->
</div>
