@auth
    <div class="tpcart__product-list">
        <ul>
            @php
                $userId = Auth::id();
                $cart = session()->get('cart.'.$userId, []);
                $total = 0;
            @endphp
            @foreach ($cart as $productId => $item)
                <li>
                    <div class="tpcart__item"id="">
                        <div class="tpcart__img">
                            <img src="{{asset('images/'.$item['image'])}}" alt="">
                            <div class="tpcart__del">
                            <a href="{{ url('/cart/remove?product_id='.$item['id']) }}" onclick="event.preventDefault(); document.getElementById('remove-form-{{ $item['id'] }}').submit();"><i class="icon-x-circle"></i></a>
                                <form id="remove-form-{{ $item['id'] }}" action="{{ url('/cart/remove') }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                </form>
                            </div>
                        </div>
                        <div class="tpcart__content">
                            <span class="tpcart__content-title"><a href="#">{{$item['name']}}</a>
                            </span>
                            <div class="tpcart__cart-price">
                            <span class="quantity">{{$item['quantity']}}</span>
                            <span class="new-price">Rp. {{ number_format( $item['price']*$item['quantity'], 2, ',', '.')}}</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tpcart__checkout">
        <div class="tpcart__total-price d-flex justify-content-between align-items-center">
        <span> Subtotal:</span>
        @foreach ($cart as $item)
            @php
                $total += $item['price'] * $item['quantity'];
            @endphp
        @endforeach
        <span class="heilight-price">Rp. {{number_format($total, 2, ',', '.')}}</span>
        </div>
        <div class="tpcart__checkout-btn">
        <a class="tpcart-btn mb-10" href="{{url('cart')}}">View Cart</a>
        </div>
    </div>
@endauth
