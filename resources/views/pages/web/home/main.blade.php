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
                        <div class="row justify-content-center row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item" id="data-product">
                        </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- brand-product-area-end -->

         <!-- testimonial-area-start -->
         <section class="testimonial-area tptestimonial__bg pt-115 pb-120 p-relative" data-background="{{asset('web-assets/img/testimonial/testimonial-bg-1.jpg')}}">
            <div class="container">
               <div class="testimonial__shape p-relative d-none d-md-block">
                  <img src="{{asset('web-assets/img/shape/tree-leaf-4.svg')}}" alt="" class="testimonial__shape-one">
                  <img src="{{asset('web-assets/img/shape/tree-leaf-5.svg')}}" alt="" class="testimonial__shape-two">
                  <img src="{{asset('web-assets/img/shape/tree-leaf-6.png')}}" alt="" class="testimonial__shape-three">
               </div>
               <div class="swiper-container tptestimonial-active2 p-relative">
                  <div class="swiper-wrapper">
                     <div class="swiper-slide">
                        <div class="row justify-content-center p-relative">
                           <div class="col-md-12">
                              <div class="tptestimonial__item text-center ">
                                 <div class="tptestimonial__avata mb-25">
                                    <img src="{{asset('web-assets/img/testimonial/test-avata-1.png')}}" alt="">
                                 </div>
                                 <div class="tptestimonial__content tptestimonial__content2">
                                    <p>" I think Hub is the best theme I ever seen this year. Amazing <br> design, easy to customize and a design quality superlative <br> account on its cloud platform for the optimized performance. "
                                    </p>
                                    <div class="tptestimonial__rating mb-5">
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                    </div>
                                    <h4 class="tptestimonial__title">Algistino Lionel</h4>
                                    <span class="tptestimonial__avata-position">Web Designer at Blueskytechco</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="row justify-content-center p-relative">
                           <div class="col-md-12">
                              <div class="tptestimonial__item text-center ">
                                 <div class="tptestimonial__avata mb-25">
                                    <img src="{{asset('web-assets/img/testimonial/test-avata-2.png')}}" alt="">
                                 </div>
                                 <div class="tptestimonial__content tptestimonial__content2">
                                    <p>" Thanks guys, keep up the good work! Great job, I will <br>
                                       definitely be ordering again! Thanks guys, keep up the good <br> work! Garden was worth a fortune to my company. "
                                    </p>
                                    <div class="tptestimonial__rating mb-5">
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                    </div>
                                    <h4 class="tptestimonial__title">Jackson Roben</h4>
                                    <span class="tptestimonial__avata-position">Web Designer at Blueskytechco</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="row justify-content-center p-relative">
                           <div class="col-md-12">
                              <div class="tptestimonial__item text-center ">
                                 <div class="tptestimonial__avata mb-25">
                                    <img src="{{asset('web-assets/img/testimonial/test-avata-3.png')}}" alt="">
                                 </div>
                                 <div class="tptestimonial__content tptestimonial__content2">
                                    <p>" Love the easy and beautiful designed page builder <br>
                                       and the documentation. All in one landing and startup <br> solutions endless use-cases that make it highly. "
                                    </p>
                                    <div class="tptestimonial__rating mb-5">
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                       <a href="#"><i class="icon-star_outline1"></i></a>
                                    </div>
                                    <h4 class="tptestimonial__title">Lionel</h4>
                                    <span class="tptestimonial__avata-position">Web Designer at Blueskytechco</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tptestimonial-arrow d-none d-md-block">
               <button class="testi-arrow tptestimonial__prv">
                  <i class="icon-chevron-left"></i>
               </button>
               <button class="testi-arrow tptestimonial__nxt">
                  <i class="icon-chevron-right"></i>
               </button>
            </div>
         </section>
         <!-- testimonial-area-end -->


      </main>
    @section('script')
    <script>
        window.baseUrl = '{{ url('/') }}';
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function loadProducts() {
                $.ajax({
                    url: '{{ url("product/") }}?keyword=' + keyword ,
                    type: 'GET',
                    dataType: 'json',
                    success: function(products) {
                        let html = '';
                        $.each(products, function(index, product) {
                            html += `
                                <div class="col">
                                    <div class="tpproduct p-relative mb-20">
                                        <div class="tpproduct__thumb p-relative text-center">
                                            <a class="aspect-ratio" href="#"><img src="${window.baseUrl}/images/${product.product_image}" alt="" class="img-fluid" style="height:200px"></a>
                                            <div class="tpproduct__info bage">
                                            </div>
                                            <div class="tpproduct__shopping">
                                                <a  data-product-id="${ product.id }" class="add-to-cart tpproduct__shopping-wishlist" href="#"><i class="icon-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="white-bg tpproduct__content">
                                            <span class=" tpproduct__content-weight">
                                                <a href="#">Salon</a>
                                                <a href="#"></a>
                                            </span>
                                            <h4 class="tpproduct__title">
                                                <a href="shop-details-top-.html">${ product.product_name }</a>
                                            </h4>
                                            <div class="tpproduct__rating mb-5">
                                                <a href="#"><i class="icon-star_outline1"></i></a>
                                                <a href="#"><i class="icon-star_outline1"></i></a>
                                                <a href="#"><i class="icon-star_outline1"></i></a>
                                                <a href="#"><i class="icon-star_outline1"></i></a>
                                                <a href="#"><i class="icon-star_outline1"></i></a>
                                            </div>
                                            <div class="tpproduct__price">
                                                <span>${product.price_formatted}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#data-product').html(html);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
            loadProducts(); // memanggil fungsi loadProducts() secara otomatis

            // fungsi untuk melakukan auto load setiap 5 detik
            setInterval(function() {
                loadProducts();
            }, 5000);
        });
    </script>

      @endsection
</x-web-layout>
