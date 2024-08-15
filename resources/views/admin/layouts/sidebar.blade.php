<div class="sidebar" data-background-color="dark">
    {{-- style="width:200px !important;" --}}
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark"
            <a href="index.html" class="logo">
                {{-- style="width:200px !important;" --}}
                <img src="{{ asset('admin') }}/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="#dashboard" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#category">
                        <i class="fas fa-layer-group"></i>
                        <p>Category</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('addCategory')}}">
                                    <span class="sub-item">Add Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('allCategory')}}">
                                    <span class="sub-item">All Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('addSubcategory')}}">
                                    <span class="sub-item">Add Subcategory</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('allSubcategory')}}">
                                    <span class="sub-item">All Subcategory</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#product">
                        <i class="fas fa-layer-group"></i>
                        <p>Product</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('addProduct')}}">
                                    <span class="sub-item">Add Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('allProduct')}}">
                                    <span class="sub-item">All Product</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#order">
                        <i class="fas fa-layer-group"></i>
                        <p>Order</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="order">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('pendingOrder')}}">
                                    <span class="sub-item">Pending Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('approvedOrder')}}">
                                    <span class="sub-item">Confirmed Order</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
