    <header>
        <div class="header__top theme-bg-1 d-none d-md-block">

        </div>
        <div id="header-sticky" class="header__main-area d-none d-xl-block">
        <div class="container">
            <div class="header__for-megamenu p-relative">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                    <div class="header__logo">
                        <a href="#"><img src="{{asset('assets/images/logo/queen2.jpg')}}" width="170" alt="logo"></a>
                    </div>
                    </div>
                    <div class="col-xl-6">
                    <div class="header__menu main-menu text-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('product/')}}">Product</a>
                                </li>
                                <li><a href="{{url('service')}}">Service</a></li>
                            </ul>
                        </nav>
                    </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="header__info d-flex align-items-center">
                            @auth
                            <div class="dropdown topbar-head-dropdown header__info-cart tpcolor__oasis ml-10 ">
                                <a type="button" href="javascript:;" onclick="tombol_notif();" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i><span id="jmlh-notif"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0 " style="width: 25rem" aria-labelledby="page-header-notifications-dropdown">
                                    <div class="dropdown-head bg-success bg-pattern rounded-top">
                                        <div class="p-3">
                                            <div class="row align-items-center">
                                                    <div class="col">
                                                        <h6 class="m-0 fs-16 fw-semibold text-white">Notifications</h6>
                                                    </div>
                                                    <div class="col-auto dropdown-tabs">
                                                    </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-content" id="notificationItemsTabContent">
                                        <div class="tab-panel active" id="all-noti-tab" role="tabpanel">
                                            <div data-simplebar class="">
                                                <div id="notification_items">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav id="mobile-menu" class="header__menu main-menu">
                                <ul>

                                    <li class="has-dropdown">
                                        <div class="header__info-user tpcolor__yellow ml-10">
                                            <a href="#"><i class="icon-user"></i></a>
                                        </div>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('user.profile', Auth::user()->id)}}">Profile</a></li>
                                            <li><a href="{{url('/booking')}}">My Booking</a></li>
                                            <li><a href="{{url('order')}}">My Order</a></li>
                                            <li><a href="{{url('/logout')}}">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                                <button><i><img src="{{asset('web-assets/img/icon/cart-1.svg')}}" alt=""></i>
                                    @if (!empty(session('cart')))
                                        <span></span>
                                    @endif
                                </button>
                            </div>
                            @else
                                <div class="header__info-user tpcolor__yellow ml-10">
                                <a href="{{url('/login')}}"><i class="icon-user"></i></a>
                            </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- header-search -->
        <div class="tpsearchbar tp-sidebar-area">
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 pt-100 pb-100">

                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="search-body-overlay"></div>
        <!-- header-search-end -->

        <!-- header-cart-start -->
        <div class="tpcartinfo tp-cart-info-area p-relative">
            <button class="tpcart__close"><i class="icon-x"></i></button>
            <div class="tpcart">
                <h4 class="tpcart__title">Your Cart</h4>
                <div class="tpcart__product" id="cart-products">
                    @include('pages.web.home.cart-loader')
                </div>
            </div>
        </div>

        <div class="cartbody-overlay"></div>
        <!-- header-cart-end -->

        <!-- mobile-menu-area -->
        <div id="header-sticky-2" class="tpmobile-menu secondary-mobile-menu d-xl-none">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-3 col-sm-3">

                </div>
                <div class="col-lg-4 col-md-4 col-6 col-sm-4">
                    <div class="header__logo text-center">
                    <a href=""><img src="{{asset('assets/images/logo/q2.png')}}" width="170" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-3 col-sm-5">
                    <div class="header__info d-flex align-items-center">
                        @auth
                        <div class="dropdown topbar-head-dropdown header__info-cart tpcolor__oasis ml-10 ">
                            <a type="button" href="javascript:;" onclick="tombol_notif();" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell-o"></i><span id="top-notification-number"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0 " style="width: 25rem" aria-labelledby="page-header-notifications-dropdown">
                                <div class="dropdown-head bg-success bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-0 fs-16 fw-semibold text-white">Notifications</h6>
                                                </div>
                                                <div class="col-auto dropdown-tabs">
                                                </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-content" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active" id="all-noti-tab" role="tabpanel">
                                        <div data-simplebar style="max-height: 300px" class="">
                                            <div class="text-reset text-wrap position-relative" id="notification_items_top">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <nav id="mobile-menu" class="header__menu main-menu">
                            <ul>
                                <li class="has-dropdown">
                                    <div class="header__info-user tpcolor__yellow ml-10">
                                        <a href="#"><i class="icon-user"></i></a>
                                    </div>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('user.profile', Auth::user()->id)}}">Profile</a></li>
                                        <li><a href="{{url('/booking')}}">My Booking</a></li>
                                        <li><a href="{{url('order')}}">My Order</a></li>
                                        <li><a href="{{url('/logout')}}">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        @else
                            <div class="header__info-user tpcolor__yellow ml-10">
                                <a href="{{url('/login')}}"><i class="icon-user"></i></a>
                            </div>
                        @endauth
                    <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                        <button><i><img src="{{asset('web-assets/img/icon/cart-1.svg')}}" alt=""></i>
                            @if (!empty(session('cart')))
                                <span></span>
                            @endif
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="body-overlay"></div>
        <!-- mobile-menu-area-end -->

        <!-- sidebar-menu-area -->
        <div class="tpsideinfo">
        <div class="tpsideinfo__nabtab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Menu</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Categories</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="mobile-menu"></div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="tpsidebar-categories">
                    <ul>
                        @auth
                        <li><a href="{{url('/logout')}}"><i data-feather="log-out"> </i><span>Log Out</span></a></li>
                        @else
                        <li><a href="{{url('/login')}}"><i data-feather="log-out"> </i><span>Log In</span></a></li>

                        @endauth
                    </ul>
                    </div>
                </div>
            </div>
        </div>
        @auth
             <div class="tpsideinfo__account-link">
                <a href="{{url('/profile')}}"><i class="icon-user icons"></i> Profile</a>
            </div>
            <div class="tpsideinfo__account-link">
                <a href="{{url('/booking')}}"><i class="icon-book icons"></i> My Booking</a>
            </div>
            <div class="tpsideinfo__account-link">
                <a href="{{url('/cart')}}"><i class="icon-cart icons"></i> My Cart</a>
            </div>
            <div class="tpsideinfo__account-link">
                <a href="{{url('/order')}}"><i class="icon-shopping-cart icons"></i> My Order</a>
            </div>
            <div class="tpsideinfo__account-link">
                <a href="{{url('/order')}}"><i class="icon-power icons"></i> Logout</a>
            </div>

        @else
        <div class="tpsideinfo__account-link">
            <a href="{{route('auth.login')}}"><i class="icon-user icons"></i> Loginr</a>
        </div>
        @endauth


        <!-- sidebar-menu-area-end -->
    </header>
    @section('script')

    @endsection


