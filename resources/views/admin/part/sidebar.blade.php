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
        <li >
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
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
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li > <a href="{{ route('category.index') }}"><i class="bx bx-radio-circle"></i>Semua Category</a>
                </li>
                <li> <a href="{{ route('category.create') }}"><i class="bx bx-radio-circle"></i>Tambah Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category-alt"></i>
                </div>
                <div class="menu-title">Sub-Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('subcategory.index') }}"><i class="bx bx-radio-circle"></i>Semua Sub-Category</a>
                </li>
                <li> <a href="{{ route('subcategory.create') }}"><i class="bx bx-radio-circle"></i>Tambah Sub-Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-basket"></i>
                </div>
                <div class="menu-title">Karya Master</div>
            </a>
            <ul>
                <li class="{{ Request::is('admin/karya/*') && !Request::is('admin/karya/create') ? 'mm-active' :'' }}"> <a href="{{ route('karya.index') }}"><i class="bx bx-radio-circle"></i>Semua Karya</a>
                </li>
                <li> <a href="{{ route('karya.create') }}"><i class="bx bx-radio-circle"></i>Tambah Karya</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">eCommerce</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products.html"><i class="bx bx-radio-circle"></i>Products</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class="bx bx-radio-circle"></i>Product
                        Details</a>
                </li>
                <li> <a href="ecommerce-add-new-products.html"><i class="bx bx-radio-circle"></i>Add New
                        Products</a>
                </li>
                <li> <a href="ecommerce-orders.html"><i class="bx bx-radio-circle"></i>Orders</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Components</div>
            </a>
            <ul>
                <li> <a href="component-alerts.html"><i class="bx bx-radio-circle"></i>Alerts</a>
                </li>
                <li> <a href="component-accordions.html"><i class="bx bx-radio-circle"></i>Accordions</a>
                </li>
                <li> <a href="component-badges.html"><i class="bx bx-radio-circle"></i>Badges</a>
                </li>
                <li> <a href="component-buttons.html"><i class="bx bx-radio-circle"></i>Buttons</a>
                </li>
                <li> <a href="component-cards.html"><i class="bx bx-radio-circle"></i>Cards</a>
                </li>
                <li> <a href="component-carousels.html"><i class="bx bx-radio-circle"></i>Carousels</a>
                </li>
                <li> <a href="component-list-groups.html"><i class="bx bx-radio-circle"></i>List Groups</a>
                </li>
                <li> <a href="component-media-object.html"><i class="bx bx-radio-circle"></i>Media
                        Objects</a>
                </li>
                <li> <a href="component-modals.html"><i class="bx bx-radio-circle"></i>Modals</a>
                </li>
                <li> <a href="component-navs-tabs.html"><i class="bx bx-radio-circle"></i>Navs & Tabs</a>
                </li>
                <li> <a href="component-navbar.html"><i class="bx bx-radio-circle"></i>Navbar</a>
                </li>
                <li> <a href="component-paginations.html"><i class="bx bx-radio-circle"></i>Pagination</a>
                </li>
                <li> <a href="component-popovers-tooltips.html"><i class="bx bx-radio-circle"></i>Popovers
                        & Tooltips</a>
                </li>
                <li> <a href="component-progress-bars.html"><i class="bx bx-radio-circle"></i>Progress</a>
                </li>
                <li> <a href="component-spinners.html"><i class="bx bx-radio-circle"></i>Spinners</a>
                </li>
                <li> <a href="component-notifications.html"><i
                            class="bx bx-radio-circle"></i>Notifications</a>
                </li>
                <li> <a href="component-avtars-chips.html"><i class="bx bx-radio-circle"></i>Avatrs &
                        Chips</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Content</div>
            </a>
            <ul>
                <li> <a href="content-grid-system.html"><i class="bx bx-radio-circle"></i>Grid System</a>
                </li>
                <li> <a href="content-typography.html"><i class="bx bx-radio-circle"></i>Typography</a>
                </li>
                <li> <a href="content-text-utilities.html"><i class="bx bx-radio-circle"></i>Text
                        Utilities</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Icons</div>
            </a>
            <ul>
                <li> <a href="icons-line-icons.html"><i class="bx bx-radio-circle"></i>Line Icons</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="bx bx-radio-circle"></i>Boxicons</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-radio-circle"></i>Feather Icons</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class="bx bx-radio-circle"></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bx bx-radio-circle"></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class="bx bx-radio-circle"></i>Highcharts</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
