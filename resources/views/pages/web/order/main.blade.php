<x-web-layout title="Order">
    @section('css')
        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="config('midtrans.client_key')"></script>
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
                        <span class="tp-breadcrumb__active"><a href="index.html">Cart</a></span>
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
                    <h3>Cart Info</h3>
                        <div class="table-content table-responsive">
                            <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-product-name">Order Number</th>
                                        <th class="product-price">Order Amount</th>
                                        <th class="product-quantity">Status</th>
                                        <th class="product-subtotal">Payment Method</th>
                                        <th class="product-remove">Create At</th>
                                        <th class="product-remove">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $index => $item)
                                        @if (Auth::user()->id == $item->user_id)
                                            <tr>
                                            <td>{{$item->order_number}}</td>
                                            <td>{{$item->order_amount}}</td>
                                            <td>{{$item->order_status}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <div class="dropdown-basic me-0">
                                                    <div class="btn-group dropstart">
                                                        <a class="dropdown-toggle btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                        <ul class="dropdown-menu dropdown-block">
                                                            <li>
                                                            @if ($item->order_status == 'Unpaid')
                                                                <li>
                                                                <a class="dropdown-item" href="{{route('order.show', $item->id)}}">Bayar</a>
                                                            </li>
                                                            @endif
                                                            @if ($item->order_status == "Pending")
                                                                <a class="dropdown-item" href="{{ route('order.cancel', ['id' => $item->id]) }}" onclick="event.preventDefault(); document.getElementById('cancel-order-form-{{$item->id}}').submit();">Cancel</a>
                                                                <form id="cancel-order-form-{{$item->id}}" action="{{ route('order.cancel', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                                    @method('PUT')
                                                                    @csrf
                                                                </form>
                                                            @endif
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    @section('script')

    @endsection
</x-web-layout>
