<x-web-layout title="Home">
      <main>

         <!-- hero-area-start -->
         <section class="hero-area tphero__bg" data-background="{{asset('web-assets/img/slider/shape-bg-2.jpg')}}" >
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-7">
                        <div class="tpslider__content pt-20">
                            <span class="tpslider__sub-title mb-35">Top Seller In The Week</span>
                            <h2 class="tpslider__title mb-30">The Best <br> Health Fresh.</h2>
                            <p>Presentation matters. Our fresh Vietnamese vegetable rolls <br> look good and taste even better.</p>
                            <div class="tpslider__btn">
                                <a class="tp-btn" href="{{url('service/#booking_form')}}">Book Now</a>
                            </div>
                        </div>
                    </div>
                        <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-6 col-sm-5">
                            <div class="tpslider__thumb p-relative pt-70">
                                <img class="tpslider__thumb-img" src="{{asset('web-assets/component/ban-2.png')}}" alt="slider-bg">
                                <div class="tpslider__shape d-none d-md-block">
                                    <img class="tpslider__shape-one" src="{{asset('web-assets/component/blush-3.png')}}" alt="shape">
                                    <img class="tpslider__shape-two" src="{{asset('web-assets/component/blush-2.png')}}" alt="shape">
                                    <img class="tpslider__shape-three" src="{{asset('web-assets/component/blush-2.png')}}" alt="shape">
                                    <img class="tpslider__shape-four" src="{{asset('web-assets/component/blush-2.png')}}" alt="shape">
                                </div>
                            </div>
                        </div>
               </div>
            </div>
         </section>
         <!-- hero-area-end -->

         <!-- about-area-start -->
         <section class="about-area pt-55">
            <div class="container">
               <div class="tpabout__border pb-35">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="tpabout__title-img text-center mb-45">
                           <img class="tpcbout__thumb-title mb-25" src="{{asset('web-assets/component/banner-2.png')}}" alt="">
                           <p>We are Online Market of Cosmetics. <br> You can also find organic & healthy juice, processed food as <br>well as gentle skin tcare at our store.</p>
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tpabout__item text-center mb-40">
                           <div class="tpabout__icon mb-15">
                              <img src="{{asset('web-assets/img/icon/about-svg')}}2.svg')}}" alt="">
                           </div>
                           <div class="tpabout__content">
                              <h4 class="tpabout__title">Our Shop Orfarm </h4>
                              <p>We provide 100+ products, provide <br> enough nutrition for your family.
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tpabout__item text-center mb-40">
                           <div class="tpabout__icon mb-15">
                              <img src="{{asset('web-assets/img/icon/about-svg')}}3.svg')}}" alt="">
                           </div>
                           <div class="tpabout__content">
                              <h4 class="tpabout__title">Delivery To Your </h4>
                              <p>Delivery to your door. Up to 100km  <br> and it's completely free.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about-area-end -->

         <!-- brand-product-area-start -->
         <section class="grey-bg brand-product pt-75 pb-60">
            <div class="container">
               <div class="pb-40 brand-product">
                  <div class="row">
                     <div class="col-lg-12 text-center">
                        <div class="tpsection mb-35">
                           <h4 class="tpsection__sub-title">~ Our Products ~</h4>
                           <h4 class="tpsection__title">Latest</h4>
                           <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
                        </div>
                     </div>
                  </div>
                  <div class="row gx-3">
                        <div class="row justify-content-center row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
                            @include('pages.web.product.load')
                        </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- brand-product-area-end -->
      </main>

</x-web-layout>
