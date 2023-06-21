<x-web-layout title="Order">
    @section('css')
        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        {{-- <script id="midtrans-script" src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" data-environment="production" data-client-key="{{ config('midtrans.client_key') }}" type="text/javascript"></script> --}}
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="config('midtrans.client_key')"></script>
        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    @endsection
    <main>
        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="#">Order</a></span>
                        <span class="dvdr">/</span>
                        <span>Order Info</span>
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
                        <h3>Order Info</h3>
                        <div class="col-md-12 cart-page-total">
                            <ul class="mb-20">
                                <li>Order Number<span>{{$item->order_number}}</span></li>
                                <li>Status <span>{{$item->order_status}}</span></li>
                                <li>Payment Method <span>{{$item->payment_method}}</span></li>
                                <li>Total <span>Rp. {{number_format($item->order_amount, 2, ',', '.')}}</span></li>
                            </ul>
                        </div>
                            <div class="table-content table-responsive">

                                <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="cart-product-name">Order Number</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-quantity">Total</th>
                                            <th class="product-remove">Create At</th>
                                            <th class="product-remove">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($item->orderItems as $orderItem)
                                                <tr>
                                                    <td>{{ $orderItem->product->product_name }}</td>
                                                    <td> {{ $orderItem->product->product_price }}</td>
                                                    <td>{{$orderItem->quantity}}</td>
                                                    <td>Rp. {{number_format($orderItem->quantity*$orderItem->product->product_price, 2)}}</td>
                                                    <td>{{$orderItem->created_at}} </td>
                                                    <td>
                                                        @if ( $item->order_status == 'Completed')
                                                        <div class="dropdown-basic me-0">
                                                            <div class="btn-group dropstart">
                                                                <a class="dropdown-toggle btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                                <ul class="dropdown-menu dropdown-block">
                                                                    <li>
                                                                        @if (!$orderItem->rate)
                                                                        <a class="dropdown-item" data-bs-toggle="modal"data-bs-target="#myModal-{{$orderItem->id}}">
                                                                            Rate
                                                                        </a>
                                                                        @endif
                                                                        @if ($orderItem->rate)
                                                                        <a class="dropdown-item" data-bs-toggle="modal"data-bs-target="#myModal-{{$orderItem->id}}-update">
                                                                            Update Rate
                                                                        </a>
                                                                        @endif

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal-{{$orderItem->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <form method="POST" action="{{route('rating.store' , $orderItem->id)}}">
                                                                    @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Queenera Salon</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <!-- Modal Body -->
                                                                <div class="modal-body">
                                                                    <div style="margin:10px;">
                                                                        Product Name: {{ $orderItem->product->product_name }}
                                                                    </div>
                                                                        <div class="mt-2" style="margin-bottom: 50px;">
                                                                            <select name="product_rate" class="mb-30 @error('product_rate')
                                                                                is-invalid
                                                                                @enderror" id='product_rate'>
                                                                                    <option selected disabled>Please Choose Rate</option>
                                                                                    <option value="1">
                                                                                        1/5 Stars
                                                                                    </option>
                                                                                    <option value="2">
                                                                                        2/5 Stars
                                                                                    </option>
                                                                                    <option value="3">
                                                                                        3/5 Stars
                                                                                    <option value="4">
                                                                                        4/5 Stars
                                                                                    </option>
                                                                                    <option value="5">
                                                                                        5/5 Stars
                                                                                    </option>
                                                                            </select>
                                                                            @error('product_rate')
                                                                                <div style="margin: 10px;" class="d-flex justify-content-left invalid-feedback">
                                                                                    {{$message}}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    <div  style="margin-top:50px;">
                                                                        <div class="tpform__textarea">
                                                                            <textarea name="description" id="description" placeholder="Comment  (optional)" cols="30" rows="10"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <!-- Modal Footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button id="buyButton" type="submit" class="btn btn-primary">Rate</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Update Modal -->
                                                    @if($orderItem->rate)
                                                    <div class="modal fade" id="myModal-{{$orderItem->id}}-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <form method="POST" action="{{route('rating.update', $orderItem->rate->id)}}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Queenera Salon</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <!-- Modal Body -->
                                                                    <div class="modal-body">
                                                                        <div style="margin:10px;">
                                                                            Product Name: {{ $orderItem->product->product_name }}
                                                                        </div>
                                                                        <div class="mt-2" style="margin-bottom: 50px;">
                                                                        <select name="product_rate" class="mb-30 @error('product_rate') is-invalid @enderror" id='product_rate'>
                                                                            <option selected disabled>Please Choose Rate</option>
                                                                            <option value="1" @if($orderItem->rate && $orderItem->rate->product_rate == 1) selected @endif>
                                                                                1/5 Stars
                                                                            </option>
                                                                            <option value="2" @if($orderItem->rate && $orderItem->rate->product_rate == 2) selected @endif>
                                                                                2/5 Stars
                                                                            </option>
                                                                            <option value="3" @if($orderItem->rate && $orderItem->rate->product_rate == 3) selected @endif>
                                                                                3/5 Stars
                                                                            </option>
                                                                            <option value="4" @if($orderItem->rate && $orderItem->rate->product_rate == 4) selected @endif>
                                                                                4/5 Stars
                                                                            </option>
                                                                            <option value="5" @if($orderItem->rate && $orderItem->rate->product_rate == 5) selected @endif>
                                                                                5/5 Stars
                                                                            </option>
                                                                        </select>

                                                                        </div>
                                                                        <div  style="margin-top:50px;">
                                                                            <div class="tpform__textarea">
                                                                                <textarea name="description" id="description" placeholder="Comment  (optional)" cols="30" rows="10">{{$orderItem->rate->description}}</textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <!-- Modal Footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        <button id="buyButton" type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                            @if ($item->order_status == "Unpaid")
                            <div class="row justify-content-end">
                                <div class="col-md-5 ">
                                    <div class="col-lg-12 mt-20 mb-20">
                                        <div class="cart-page-total d-flex justify-content-end">

                                        <button id="pay-button" class="tp-btn tp-color-btn banner-animation" type="submit">Pay</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>
    </main>
    @if ($item->order_status == "Unpaid")
    @section('script')
    <script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
            alert("Payment success!");
            console.log(result);
        },
        onPending: function(result){
            alert("Waiting for your payment!");
            console.log(result);
        },
        onError: function(result){
            alert("Payment failed!");
            console.log(result);
        },
        onClose: function(){
            alert('You closed the popup without finishing the payment');
        }
        });
    });
    </script>

    @endsection
    @endif

</x-web-layout>
