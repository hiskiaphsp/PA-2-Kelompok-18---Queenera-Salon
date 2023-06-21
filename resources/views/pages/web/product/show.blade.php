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
                                @php
                                    $total = 0;
                                    $index = 0;
                                    if ($product->orderItem) {
                                        foreach ($product->orderItem as $key) {
                                            if ($key->rate) {
                                                $rating = $key->rate->product_rate;
                                                $total += $rating;
                                                $index++;
                                            }
                                        }
                                    }
                                    $hasil = 0; // Default value if $index is zero
                                    if ($index > 0) {
                                        $hasil = $total / $index;
                                    }
                                    $wholeStars = floor($hasil); // Bagian bilangan bulat
                                    $hasHalfStar = $hasil - $wholeStars >= 0.4; // Memeriksa apakah terdapat setengah bintang
                                @endphp
                                <ul class="tpdetails__brand">
                                    <li><a href="#">Queenera Salon</a> </li>
                                    <li>
                                    {{$hasil}}/5

                                    @for ($i = 1; $i <= $hasil; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    @if ($hasHalfStar)
                                        <i class="fa fa-star-half-full text-warning"></i>
                                    @endif
                                    @if ($hasil<5)
                                        <i class="fa fa-star-o text-warning"></i>
                                    @endif
                                    <b>{{$index}} Reviews</b>
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
                                                                        <option selected value="" disabled>Please Choose Rate</option>
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
                                                <li>Availability: <i>{{$product->product_stock}} Instock</i></li>
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
                                    <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">
                                        Reviews
                                    </button>
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
                                    @php
                                        $hasReview = false;
                                    @endphp
                                    @foreach ($rate as $item)
                                    @php
                                        $hasReview = true;
                                    @endphp
                                    @if (!isset($item->orderItem->product_id))
                                        @else
                                        @if ($item->orderItem->product_id == $product->id)
                                            <div class="tpreview__comment">
                                                <div class="tpreview__comment-img mr-20">
                                                    <img src="{{asset('web-assets/img/testimonial/test-avata-1.png')}}" alt="">
                                                </div>
                                                <div class="tpreview__comment-text">
                                                    <div class="tpreview__comment-autor-info d-flex align-items-center justify-content-between">
                                                        <div class="tpreview__comment-author">
                                                        <span>{{$item->orderItem->order->user->name}}</span>
                                                        </div>
                                                        <div class="tpreview__comment-star">
                                                            @for ($i = 1; $i <= $item->product_rate; $i++)
                                                                <i class="fa fa-star text-warning"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <span class="date mb-20">{{$item->updated_at->diffForHumans()}}: </span>
                                                    <p>{{$item->description}}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    @endforeach
                                    @if (!$hasReview)
                                        <li>No Review</li>
                                    @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
                @if (isset($latestProduct))
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
                                    @php
                                        $total = 0;
                                        $index = 0;
                                        if ($latestProduct->orderItem) {
                                            foreach ($latestProduct->orderItem as $key) {
                                                if ($key->rate) {
                                                    $rating = $key->rate->product_rate;
                                                    $total += $rating;
                                                    $index++;
                                                }
                                            }
                                        }
                                        $hasil = 0; // Default value if $index is zero
                                        if ($index > 0) {
                                            $hasil = $total / $index;
                                        }
                                        $wholeStars = floor($hasil); // Bagian bilangan bulat
                                        $hasHalfStar = $hasil - $wholeStars >= 0.4; // Memeriksa apakah terdapat setengah bintang
                                    @endphp
                                    <div class="tpproduct__rating mb-5">
                                    {{$hasil}}
                                    @for ($i = 1; $i <= $hasil; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    @if ($hasHalfStar)
                                        <i class="fa fa-star-half-full text-warning"></i>
                                    @endif
                                    @if ($hasil<=4)
                                        <i class="fa fa-star-o text-warning"></i>
                                    @endif
                                    </div>
                                    <div class="tpproduct__price">
                                        <span>Rp. {{number_format($latestProduct->product_price,2)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </section>

    </main>

    @section('script')
    <script>
        document.getElementById('buyButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default submit behavior

            // Get the values of payment_method and quantity
            var paymentMethod = document.getElementById('payment_method').value;
            var quantity = document.getElementById('quantity').value;

            if (quantity <= 0) {
                // Show an error toast using Toastify
                Toastify({
                    text: 'Product quantity must be greater than 0',
                    duration: 3000,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
                    close: true,
                }).showToast();
            } else if (paymentMethod === '') {
                // Show an error toast using Toastify
                Toastify({
                    text: 'Please choose a payment method',
                    duration: 3000,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
                    close: true,
                }).showToast();
            } else {
                Swal.fire({
                    title: 'Confirmation',
                    text: 'Are you sure you want to buy this product?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "Yes", send an Ajax request
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{ route('order.makeOrder', $product->id) }}", true);
                        xhr.setRequestHeader('Content-Type', 'application/json');

                        // Add a check for the response status 401 (Unauthorized)
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        Swal.fire({
                                            title: 'Success',
                                            text: 'Your order has been placed.',
                                            icon: 'success'
                                        }).then(() => {
                                            window.location.href = response.redirectUrl; // Redirect to another page if needed
                                        });
                                    } else {
                                        Toastify({
                                            text: response.message,
                                            duration: 3000,
                                            gravity: 'top',
                                            position: 'left',
                                            backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
                                        }).showToast();
                                    }
                                } else if (xhr.status === 403) {
                                    // User is not logged in, redirect to the login page
                                    window.location.href = "{{ route('auth.login') }}";
                                }
                            }
                        };

                        var formData = new FormData(document.getElementById('buyForm'));
                        var jsonData = {};
                        formData.forEach(function(value, key) {
                            jsonData[key] = value;
                        });
                        xhr.send(JSON.stringify(jsonData));
                    }
                });
            }
        });
    </script>

    @endsection
</x-web-layout>
