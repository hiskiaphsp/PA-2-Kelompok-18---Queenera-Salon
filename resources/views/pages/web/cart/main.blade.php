<x-web-layout title="Cart">
    <main>
        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="index.html">Cart</a></span>
                        <span class="dvdr">/</span>
                        <span>Cart Info</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- breadcrumb-area-end -->
        <section class="cart-area pb-80 mt-20">
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Cart Info</h3>
                        <div class="table-content table-responsive">
                            <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-product-name">Product Name</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(empty(session('cart')))

                                        <tr>
                                            <td colspan="8">You haven't cart</td>
                                        </tr>
                                    @endif
                                    @if (!empty(session('cart')))
                                    @foreach ($cart as $productId => $item)
                                        <tr>
                                            <td class="product-name">
                                                <a href="#">{{ $item['name'] }}</a>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">Rp.{{ number_format( $item['price'], 2, ',', '.')}}</span>
                                            </td>
                                            <td class="product-quantity">
                                                    <input readonly class="cart-input" type="text" value="{{ $item['quantity'] }}">
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">Rp. {{ number_format( $item['price']*$item['quantity'], 2, ',', '.')}}</span>
                                            </td>
                                            <td class="product-remove">
                                                <a href="{{ url('/cart/remove?product_id='.$item['id']) }}" onclick="event.preventDefault(); document.getElementById('remove-form-{{ $item['id'] }}').submit();"><i class="fa fa-times"></i></a>
                                                <form id="remove-form-{{ $item['id'] }}" action="{{ url('/cart/remove') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-end">
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart as $item)
                            @php
                                $total += $item['price'] * $item['quantity'];
                            @endphp
                            @endforeach
                            @if (!empty(session('cart')))
                                <div class="col-md-5 ">
                                    <div class="col-lg-12 mt-20 mb-20">
                                    <form id="checkout-form" method="POST" action="{{ route('checkout') }}">
                                    @csrf
                                        <label for="payment_method" class="mx-2">Payment Method<span class="text-danger">*</span> </label>
                                        <div class="ml-2  tpform__select">

                                            <select name="payment_method" class="@error('payment_method') is-invalid @enderror" id='payment_method'>
                                                <option value="" selected disabled>Please choose Payment Method</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Transfer">Transfer</option>
                                            </select>
                                            @error('payment_method')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul class="mb-20">
                                                <li>Total <span>Rp. {{number_format($total, 2, ',', '.')}}</span></li>
                                            </ul>
                                        <button class="tp-btn tp-color-btn banner-animation" type="submit">Checkout</button>
                                    </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
            </div>
            </div>
        </section>
    </main>
</x-web-layout>
