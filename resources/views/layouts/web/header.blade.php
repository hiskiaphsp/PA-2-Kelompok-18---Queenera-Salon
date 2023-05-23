    <header>
        <div class="header__top theme-bg-1 d-none d-md-block">

        </div>
        <div id="header-sticky" class="header__main-area d-none d-xl-block">
        <div class="container">
            <div class="header__for-megamenu p-relative">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                    <div class="header__logo">
                        <a href="index.html"><img src="{{asset('web-assets/img/logo/logo.png')}}" alt="logo"></a>
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
                        <div class="header__info-search tpcolor__purple ml-10">
                            <button class="tp-search-toggle"><i class="icon-search"></i></button>
                        </div>
                        @auth
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
        </div>

        <!-- header-search -->
        <div class="tpsearchbar tp-sidebar-area">
        <button class="tpsearchbar__close"><i class="icon-x"></i></button>
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 pt-100 pb-100">
                        <h2 class="tpsearchbar__title">What Are You Looking For?</h2>
                        <div class="tpsearchbar__form">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search Product...">
                                <button class="tpsearchbar__search-btn"><i class="icon-search"></i></button>
                            </form>
                        </div>
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
                <div class="tpcart__free-shipping text-center">
                    <span>Free shipping for orders <b>under 10km</b></span>
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
                    <div class="mobile-menu-icon">
                    <button class="tp-menu-toggle"><i class="icon-menu1"></i></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 col-sm-4">
                    <div class="header__logo text-center">
                    <a href="index.html"><img src="{{asset('web-assets/img/logo/logo.png')}}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-3 col-sm-5">
                    <div class="header__info d-flex align-items-center">
                    <div class="header__info-search tpcolor__purple ml-10 d-none d-sm-block">
                        <button class="tp-search-toggle"><i class="icon-search"></i></button>
                    </div>
                    <div class="header__info-user tpcolor__yellow ml-10 d-none d-sm-block">
                        <a href="#"><i class="icon-user"></i></a>
                    </div>
                    <div class="header__info-wishlist tpcolor__greenish ml-10 d-none d-sm-block">
                        <a href="#"><i class="icon-heart icons"></i></a>
                    </div>
                    <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                        <button><i><img src="{{asset('web-assets/img/icon/cart-1.svg')}}" alt=""></i>
                            <span>5</span>
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
        <button class="tpsideinfo__close">Close<i class="fal fa-times ml-10"></i></button>
        <div class="tpsideinfo__search text-center pt-35">
            <span class="tpsideinfo__search-title mb-20">What Are You Looking For?</span>
            <form action="#">
                <input type="text" placeholder="Search Products...">
                <button><i class="icon-search"></i></button>
            </form>
        </div>
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
                        <li><a href="shop-details.html">Dairy Farm</a></li>
                        <li><a href="shop-details.html">Healthy Foods</a></li>
                        <li><a href="shop-details.html">Lifestyle</a></li>
                        <li><a href="shop-details.html">Organics</a></li>
                        <li><a href="shop-details.html">Photography</a></li>
                        <li><a href="shop-details.html">Shopping</a></li>
                        <li><a href="shop-details.html">Tips & Tricks</a></li>
                        <li><a href="{{url('/logout')}}"><i data-feather="log-out"> </i><span>Log Out</span></a></li>
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
            <a href="{{url('/login')}}"><i class="icon-user icons"></i> Loginr</a>
        </div>
        @endauth


        <!-- sidebar-menu-area-end -->
    </header>
    <script>
    $(document).ready(function(){
        function loadCart() {
            $.ajax({
                url: "{{ url('load') }}",
                type: "GET",
                success: function(response) {
                    $('#cart-products').html(response.cart_details);
                    $('.tpcart__total-price .heilight-price').text(response.cart_subtotal);
                    $('.tpcart__checkout .tpcart-btn').attr('href', "{{url('cart')}}");
                    $('.tpcart__checkout .tpcheck-btn').attr('href', "{{ route('checkout') }}");
                    $('.tpcart__checkout #checkout-form').attr('action', "{{ route('checkout') }}");
                }
            });
        }
        setInterval(function() {
            loadCart();
        }, 5000);
        $(document).on('click', '.add-to-cart-btn', function(e){
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var quantity = $(this).data('quantity');
            $.ajax({
                url: "{{ url('product/add-to-cart') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: product_id,
                    quantity: quantity
                },
                success: function(response) {
                    loadCart();
                }
            });
        });
        $(document).on('click', '.tpcart__del a', function(e){
            e.preventDefault();
            var product_id = $(this).data('product-id');
            $.ajax({
                url: "{{ url('cart/remove') }}?product_id="+product_id,
                type: "GET",
                success: function(response) {
                    loadCart();
                }
            });
        });
    });
    </script>


