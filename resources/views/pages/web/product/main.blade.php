<x-web-layout title="Product">
    @section('css')
        @csrf

        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    @endsection
    <main>

         <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="tp-breadcrumb__content">
                        <div class="tp-breadcrumb__list">
                           <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                           <span class="dvdr">/</span>
                           <span>Shop</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- breadcrumb-area-end -->

         <!-- shop-area-start -->
         <section class="shop-area-start grey-bg pb-200">
            <div class="container">
               <div class="row">
                  <div class="col-xl-2 col-lg-12 col-md-12">
                     <div class="tpshop__leftbar">
                        <div class="tpshop__widget mb-30 pb-25">
                           <h4 class="tpshop__widget-title">FILTER BY BRAND</h4>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
                              <label class="form-check-label" for="flexCheckDefault18">
                                 Chrome Hearts  (15)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault19">
                              <label class="form-check-label" for="flexCheckDefault19">
                                 Dominique Aurientis  (15)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault20">
                              <label class="form-check-label" for="flexCheckDefault20">
                                 Galliano  (15)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault21">
                              <label class="form-check-label" for="flexCheckDefault21">
                                 Georgine  (15)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
                              <label class="form-check-label" for="flexCheckDefault22">
                                 Matthew Christopher  (15)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault23">
                              <label class="form-check-label" for="flexCheckDefault23">
                                 Paul Gaultier  (15)
                              </label>
                           </div>
                        </div>
                        <div class="tpshop__widget">
                           <h4 class="tpshop__widget-title">FILTER BY RATING</h4>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault24">
                              <label class="form-check-label" for="flexCheckDefault24">
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 (45)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault25">
                              <label class="form-check-label" for="flexCheckDefault25">
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 (10)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault26">
                              <label class="form-check-label" for="flexCheckDefault26">
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 (05)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault27">
                              <label class="form-check-label" for="flexCheckDefault27">
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 (02)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault28">
                              <label class="form-check-label" for="flexCheckDefault28">
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 <i class="icon-star_rate"></i>
                                 (02)
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="tpshop__widget">
                        <div class="tpshop__sidbar-thumb mt-35">
                           <img src="{{asset('web-assets/img/shape/sidebar-product-1.')}}" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-10 col-lg-12 col-md-12">
                     <div class="tpshop__top ml-60">
                        <div class="tpshop__banner mb-30" data-background="{{asset('web-assets/img/banner/shop-bg-1.jpg')}}">
                           <div class="tpshop__content text-center">
                              <span>The Salad</span>
                              <h4 class="tpshop__content-title mb-20">Fresh & Natural <br>Healthy Food Special Offer</h4>
                              <p>Do not miss the current offers of us!</p>
                           </div>
                        </div>
                        <div class="product__filter-content mb-40">
                           <div class="row align-items-center">
                              <div class="col-sm-4">
                                 <div class="product__item-count">
                                    <span>Products</span>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="tpproductnav tpnavbar product-filter-nav d-flex align-items-center justify-content-center">
                                    <nav>
                                       <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                          <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="false">
                                             <i>
                                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M2 4C3.10457 4 4 3.10457 4 2C4 0.89543 3.10457 0 2 0C0.89543 0 0 0.89543 0 2C0 3.10457 0.89543 4 2 4Z" fill="currentColor"/>
                                                   <path d="M2 10C3.10457 10 4 9.10457 4 8C4 6.89543 3.10457 6 2 6C0.89543 6 0 6.89543 0 8C0 9.10457 0.89543 10 2 10Z" fill="currentColor"/>
                                                   <path d="M2 16C3.10457 16 4 15.1046 4 14C4 12.8954 3.10457 12 2 12C0.89543 12 0 12.8954 0 14C0 15.1046 0.89543 16 2 16Z" fill="currentColor"/>
                                                   <path d="M8 4C9.10457 4 10 3.10457 10 2C10 0.89543 9.10457 0 8 0C6.89543 0 6 0.89543 6 2C6 3.10457 6.89543 4 8 4Z" fill="currentColor"/>
                                                   <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" fill="currentColor"/>
                                                   <path d="M8 16C9.10457 16 10 15.1046 10 14C10 12.8954 9.10457 12 8 12C6.89543 12 6 12.8954 6 14C6 15.1046 6.89543 16 8 16Z" fill="currentColor"/>
                                                   <path d="M14 4C15.1046 4 16 3.10457 16 2C16 0.89543 15.1046 0 14 0C12.8954 0 12 0.89543 12 2C12 3.10457 12.8954 4 14 4Z" fill="currentColor"/>
                                                   <path d="M14 10C15.1046 10 16 9.10457 16 8C16 6.89543 15.1046 6 14 6C12.8954 6 12 6.89543 12 8C12 9.10457 12.8954 10 14 10Z" fill="currentColor"/>
                                                   <path d="M14 16C15.1046 16 16 15.1046 16 14C16 12.8954 15.1046 12 14 12C12.8954 12 12 12.8954 12 14C12 15.1046 12.8954 16 14 16Z" fill="currentColor"/>
                                                   <path d="M20 4C21.1046 4 22 3.10457 22 2C22 0.89543 21.1046 0 20 0C18.8954 0 18 0.89543 18 2C18 3.10457 18.8954 4 20 4Z" fill="currentColor"/>
                                                   <path d="M20 10C21.1046 10 22 9.10457 22 8C22 6.89543 21.1046 6 20 6C18.8954 6 18 6.89543 18 8C18 9.10457 18.8954 10 20 10Z" fill="currentColor"/>
                                                   <path d="M20 16C21.1046 16 22 15.1046 22 14C22 12.8954 21.1046 12 20 12C18.8954 12 18 12.8954 18 14C18 15.1046 18.8954 16 20 16Z" fill="currentColor"/>
                                                   </svg>
                                             </i>
                                          </button>


                                       </div>
                                    </nav>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="product__navtabs d-flex justify-content-end align-items-center">
                                    <div class="tpsideinfo__search tp-shop-selector">
                                        <form action="{{ route('product.index') }}" method="GET" class="form-inline">
                                            <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ isset($keyword) ? $keyword : '' }}">
                                            <button type="submit"><i class="icon-search"></i></button>
                                        </form>
                                       {{-- <div class="nice-select" tabindex="0">
                                          <form action="{{ route('product.index') }}" method="GET" class="form-inline">
                                            <div class="form-group">
                                                <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ isset($keyword) ? $keyword : '' }}">
                                            </div>
                                        </form>
                                       </div> --}}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade show active whight-product" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">

                              <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item" id="list-result">
                                @include('pages.web.product.load')

                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="d-flex justify-content-center mt-10">
                        {{-- {{ $products->links('pagination::bootstrap-4') }} --}}
                        {{ $products->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- shop-area-end -->


         <!-- feature-area-start -->
         <section class="feature-area mainfeature__bg grey-bg pt-50 pb-40" data-background="{{asset('web-assets/img/shape/footer-shape-1.svg')}}">
            <div class="container">
               <div class="mainfeature__border pb-15">
                  <div class="row row-cols-lg-5 row-cols-md-3 row-cols-2">
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="{{asset('web-assets/img/icon/feature-icon-1.svg')}}" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Fast Delivery</h4>
                              <p>Across West & East India</p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="{{asset('web-assets/img/icon/feature-icon-2.svg')}}" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">safe payment</h4>
                              <p>100% Secure Payment</p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="{{asset('web-assets/img/icon/feature-icon-3.svg')}}" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Online Discount</h4>
                              <p>Add Multi-buy Discount </p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="{{asset('web-assets/img/icon/feature-icon-4.svg')}}" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Help Center</h4>
                              <p>Dedicated 24/7 Support </p>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="mainfeature__item text-center mb-30">
                           <div class="mainfeature__icon">
                              <img src="{{asset('web-assets/img/icon/feature-icon-5.svg')}}" alt="">
                           </div>
                           <div class="mainfeature__content">
                              <h4 class="mainfeature__title">Curated items</h4>
                              <p>From Handpicked Sellers</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- feature-area-end -->

    </main>
      @section('script')

      @endsection
</x-web-layout>


