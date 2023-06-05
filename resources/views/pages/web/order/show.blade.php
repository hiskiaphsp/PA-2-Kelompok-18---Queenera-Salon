<x-web-layout title="Order">
    @section('css')
        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="config('midtrans.client_key')"></script>
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
                        <div class="table-content table-responsive">
                            <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-product-name">Order Number</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Order Amount</th>
                                        <th class="product-quantity">Status</th>
                                        <th class="product-subtotal">Payment Method</th>
                                        <th class="product-remove">Create At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$item->order_number}}</td>
                                            <td>
                                                 @foreach($item->orderItems as $orderItem)
                                                        <p>{{ $orderItem->product->product_name }} - {{ $orderItem->product->product_price }} - {{$orderItem->quantity}} <p>
                                                @endforeach
                                            </td>
                                            <td>{{$item->order_amount}}</td>
                                            <td>{{$item->order_status}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        @if ($item->order_status == "Unpaid")
                        <div class="row justify-content-end">
                            <div class="col-md-5 ">
                                <div class="col-lg-12 mt-20 mb-20">
                                    <div class="cart-page-total">
                                    <h2>Price Total</h2>
                                    <ul class="mb-20">
                                        <li>Total <span>Rp. {{number_format($item->order_amount, 2, ',', '.')}}</span></li>
                                    </ul>
                                    <button id="pay-button" class="tp-btn tp-color-btn banner-animation" type="submit">Bayar</button>
                                </form>
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
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
    @endsection
    @endif

</x-web-layout>
