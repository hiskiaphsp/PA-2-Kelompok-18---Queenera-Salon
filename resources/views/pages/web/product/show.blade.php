<x-web-layout title="Product Detaill">
        <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="{{route('home')}}">Home</a></span>
                        <span class="dvdr">/</span>
                        <span class="tp-breadcrumb__active"><a href="{{route('product.index')}}">Product</a></span>
                        <span class="dvdr">/</span>
                        <span>{{$product->product_name}}</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area-start -->
        <section class="shopdetails-area grey-bg pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <form action="{{route('order.makeOrder', $product->id)}}" method="post" id="buyForm">
                        @csrf
                        <div class="tpdetails__area mr-60 pb-30">
                        <div class="tpdetails__product mb-30">
                            <div class="tpdetails__title-box">
                                <h3 class="tpdetails__title">{{$product->product_name}}</h3>
                                <ul class="tpdetails__brand">
                                    <li><a href="#">Queenera Salon</a> </li>
                                    <li>
                                    <i class="icon-star_outline1"></i>
                                    <i class="icon-star_outline1"></i>
                                    <i class="icon-star_outline1"></i>
                                    <i class="icon-star_outline1"></i>
                                    <i class="icon-star_outline1"></i>
                                    <b>02 Reviews</b>
                                    </li>
                                    <li>
                                    SKU: <span>{{$product->product_code}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tpdetails__box">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="tpproduct-details__nab">
                                        <div class="tab-content" id="nav-tabContents">
                                            <div class="tab-pane fade show active w-img" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                <img src="{{ asset('images/'.$product->product_image) }}" alt="{{$product->product_name}}">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="product__details">
                                        <div class="product__details-price-box">
                                            <h5 class="product__details-price">Rp. {{number_format($product->product_price, 2)}}</h5>
                                        </div>
                                        <div class="product__details-cart">
                                            <div class="product__details-quantity d-flex align-items-center mb-15">
                                                <b>Qty:</b>
                                                <div class="product__details-count mr-10">
                                                <span class="cart-minus"><i class="far fa-minus"></i></span>
                                                <input class="tp-cart-input @error('quantity')
                                                    is-invalid
                                                @enderror" name="quantity" type="text" value="1" id="quantity">
                                                @error('quantity')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                                <span class="cart-plus"><i class="far fa-plus"></i></span>
                                                </div>
                                                <div class="product__details-btn">
                                                <a data-product-id="{{ $product->id }}"href="#" class="add-to-cart"><i class="icon-cart"> </i>
                                                    add to cart
                                                </a>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-left">
                                            <div class="product__details-count">
                                                <a data-bs-toggle="modal"data-bs-target="#myModal">
                                                    <i class="icon-bag"> </i>Buy Now
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Queenera Salon</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <!-- Modal Body -->
                                                            <div class="modal-body">
                                                                <div style="margin:10px;">
                                                                    Product Name: {{$product->product_name}}
                                                                </div>
                                                                <div class="mt-2  tpform__select">
                                                                    <select name="payment_method" class="@error('payment_method')
                                                                    is-invalid
                                                                    @enderror" id='payment_method'>
                                                                        <option value="" selected disabled>Please choose Payment Method</option>
                                                                        <option value="Transfer">Transfer</option>
                                                                        <option value="Cash">Cash</option>
                                                                    </select>
                                                                    @error('payment_method')
                                                                        <div style="margin: 10px;" class="d-flex justify-content-left invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button id="buyButton" type="submit" class="btn btn-primary">Buy Product</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="product__details-stock mb-25">
                                            <ul>
                                                <li>Availability: <i>54 Instock</i></li>
                                                <li>Categories: <span>Queenera Salon Products</span></li>
                                            </ul>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tpdescription__box">
                            <div class="tpdescription__box-center d-flex align-items-center justify-content-center">
                                <nav>
                                    <div class="nav nav-tabs"  role="tablist">
                                    <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Product Description</button>
                                    <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews (1)</button>
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0">
                                    <div class="tpdescription__content">
                                    <p>
                                        {!! $product->product_description !!}
                                    </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
                                    <div class="tpreview__wrapper">
                                    <h4 class="tpreview__wrapper-title">Review</h4>
                                    <div class="tpreview__comment">
                                        <div class="tpreview__comment-img mr-20">
                                            <img src="{{asset('web-assets/img/testimonial/test-avata-1.png')}}" alt="">
                                        </div>
                                        <div class="tpreview__comment-text">
                                            <div class="tpreview__comment-autor-info d-flex align-items-center justify-content-between">
                                                <div class="tpreview__comment-author">
                                                <span>admin</span>
                                                </div>
                                                <div class="tpreview__comment-star">
                                                <i class="icon-star_outline1"></i>
                                                <i class="icon-star_outline1"></i>
                                                <i class="icon-star_outline1"></i>
                                                <i class="icon-star_outline1"></i>
                                                <i class="icon-star_outline1"></i>
                                                </div>
                                            </div>
                                            <span class="date mb-20">--April 9, 2022: </span>
                                            <p>very good</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-12">
                    <div class="tpsidebar pb-30">
                    <div class="tpsidebar__product">
                        <h4 class="tpsidebar__title mb-15">Latest Product</h4>
                        <div class="tpsidebar__product-item">
                            <div class="tpsidebar__product-thumb p-relative">
                                <img src="{{ asset('images/'.$latestProduct->product_image) }}" alt="">
                                <div class="tpsidebar__info bage">
                                <span class="tpproduct__info-hot bage__hot">New</span>
                                </div>
                            </div>
                            <div class="tpsidebar__product-content">
                                <span class="tpproduct__product-category">
                                <a href="{{route('product.index')}}">Queenera Products</a>
                                </span>
                                <h4 class="tpsidebar__product-title">
                                <a href="{{route('product.show', $latestProduct->id)}}">{{$latestProduct->product_name}}</a>
                                </h4>
                                <div class="tpproduct__rating mb-5">
                                <a href="#"><i class="icon-star_outline1"></i></a>
                                <a href="#"><i class="icon-star_outline1"></i></a>
                                <a href="#"><i class="icon-star_outline1"></i></a>
                                <a href="#"><i class="icon-star_outline1"></i></a>
                                <a href="#"><i class="icon-star_outline1"></i></a>
                                </div>
                                <div class="tpproduct__price">
                                <span>Rp. {{number_format($latestProduct->product_price,2)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

    </main>

    @section('script')
    <script>
        document.getElementById('buyButton').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default tombol "Submit"

            // Mendapatkan nilai dari select 'payment_method'
            var paymentMethod = document.getElementById('payment_method').value;
            var quantity = document.getElementById('quantity').value;


            if(quantity <= 0) {
                // Menampilkan pesan kesalahan menggunakan Toastify
                Toastify({
                    text: 'Product quantity must be greater than 0 ',
                    duration: 3000,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
                    close: true,
                }).showToast();
            }
            if (paymentMethod === '') {
                // Menampilkan pesan kesalahan menggunakan Toastify
                Toastify({
                    text: 'Please choose a payment method',
                    duration: 3000,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
                    close: true,
                }).showToast();
            }
            else {
                Swal.fire({
                    title: 'Confirmation',
                    text: 'Are you sure you want to buy this product?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengklik "Yes", kirim permintaan Ajax
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{ route('order.makeOrder', $product->id) }}", true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    // Menampilkan SweetAlert konfirmasi
                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Your order has been placed.',
                                        icon: 'success'
                                    }).then(() => {
                                        window.location.href = response.redirectUrl; // Redirect ke halaman lain jika diperlukan
                                    });
                                } else {
                                    // Menampilkan pesan kesalahan menggunakan Toastify
                                    Toastify({
                                        text: response.message,
                                        duration: 3000,
                                        gravity: 'top',
                                        position: 'left',
                                        backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
                                    }).showToast();
                                }
                            }
                        };
                        var formData = new FormData(document.getElementById('buyForm'));
                        xhr.send(new URLSearchParams(formData));
                    }
                });
            }
        });
    </script>
    @endsection
</x-web-layout>
