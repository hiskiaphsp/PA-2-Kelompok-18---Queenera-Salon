<x-web-layout title="My Booking">
    @section('css')
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endsection
    <section class="cart-area pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="d-flex justify-content-end mt-10 mb-10">
                            <div class="">
                                <a class="tp-btn tp-color-btn banner-animation" href="{{ url('booking/create') }}" name="update_cart">Make Booking</a>
                            </div>
                        </div>
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Service Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Booking Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (empty($bookings))
                                        <tr>
                                            <td colspan="7">You haven't made a booking</td>
                                        </tr>
                                    @else
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->username }}</td>
                                                <td>{{ $booking->service_name }} - {{ $booking->service_price }}</td>
                                                <td>{{ \Carbon\Carbon::parse($booking->start_booking_date)->format('d F Y, l \a\t H:i') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($booking->end_booking_date)->format('d F Y, l \a\t H:i') }}</td>
                                                <td>{{ $booking->booking_code }}</td>
                                                <td>{{ $booking->status }}</td>
                                                <td>
                                                    @if ($booking->status == 'Completed' || $booking->status == "Accepted" || $booking->status == "Unpaid")
                                                        <div class="dropdown-basic me-0">
                                                            <div class="btn-group dropstart">
                                                                <a class="dropdown-toggle btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                                <ul class="dropdown-menu dropdown-block">
                                                                    @if ($booking->status == 'Unpaid')
                                                                        <button id="pay-button-{{ $booking->id }}" class="dropdown-item pay-button" type="button" data-snap-token="{{ $snapTokens[$booking->id] }}">Bayar</button>
                                                                    @endif
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{ route('booking.edit', $booking->id) }}">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{ route('booking.cancel', ['id' => $booking->id]) }}" onclick="event.preventDefault(); document.getElementById('cancel-booking-form-{{ $booking->id }}').submit();">Cancel</a>
                                                                        <form id="cancel-booking-form-{{ $booking->id }}" action="{{ route('booking.cancel', ['id' => $booking->id]) }}" method="POST" style="display: none;">
                                                                            @method('PUT')
                                                                            @csrf
                                                                        </form>
                                                                    </li>
                                                                    <li>
                                                                        @if (!$booking->ratings && $booking->status == "Completed")
                                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal-{{ $booking->id }}">
                                                                                Rate
                                                                            </a>
                                                                        @endif
                                                                        @if ($booking->ratings)
                                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal-{{ $booking->id }}-update">
                                                                                Update Rate
                                                                            </a>
                                                                        @endif
                                                                        @if ($booking->status == "Accepted" || $booking->status == "Completed")
                                                                            <a class="dropdown-item" href="{{ route('booking.pdf', $booking->id) }}">
                                                                                Download Pdf
                                                                            </a>
                                                                        @endif

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($booking->status == "Cancelled")
                                                        No Action
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal-{{ $booking->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <form method="POST" action="{{ route('rating.store-service', $booking->id) }}">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Queenera Salon</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <!-- Modal Body -->
                                                            <div class="modal-body">
                                                                <div style="margin:10px;">
                                                                    Product Name: {{ $booking->service->service_name }}
                                                                </div>
                                                                <div class="mt-2" style="margin-bottom: 50px;">
                                                                    <select name="product_rate" class="mb-30 @error('product_rate') is-invalid @enderror" id="product_rate">
                                                                        <option selected disabled>Please Choose Rate</option>
                                                                        <option value="1">1/5 Stars</option>
                                                                        <option value="2">2/5 Stars</option>
                                                                        <option value="3">3/5 Stars</option>
                                                                        <option value="4">4/5 Stars</option>
                                                                        <option value="5">5/5 Stars</option>
                                                                    </select>
                                                                    @error('product_rate')
                                                                        <div style="margin: 10px;" class="d-flex justify-content-left invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-top: 50px;">
                                                                    <div class="tpform__textarea">
                                                                        <textarea name="description" id="description" placeholder="Comment (optional)" cols="30" rows="10"></textarea>
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
                                            @if($booking->ratings)
                                            <div class="modal fade" id="myModal-{{ $booking->id }}-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <form method="POST" action="{{ route('rating.update', $booking->ratings->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Queenera Salon</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <!-- Modal Body -->
                                                            <div class="modal-body">
                                                                <div style="margin:10px;">
                                                                    Product Name: {{ $booking->service->service_name }}
                                                                </div>
                                                                <div class="mt-2" style="margin-bottom: 50px;">
                                                                    <select name="product_rate" class="mb-30 @error('product_rate') is-invalid @enderror" id="product_rate">
                                                                        <option selected disabled>Please Choose Rate</option>
                                                                        <option value="1" @if($booking->ratings->product_rate == 1) selected @endif>
                                                                            1/5 Stars
                                                                        </option>
                                                                        <option value="2" @if($booking->ratings->product_rate == 2) selected @endif>
                                                                            2/5 Stars
                                                                        </option>
                                                                        <option value="3" @if($booking->ratings->product_rate == 3) selected @endif>
                                                                            3/5 Stars
                                                                        </option>
                                                                        <option value="4" @if($booking->ratings->product_rate == 4) selected @endif>
                                                                            4/5 Stars
                                                                        </option>
                                                                        <option value="5" @if($booking->ratings->product_rate == 5) selected @endif>
                                                                            5/5 Stars
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div style="margin-top:50px;">
                                                                    <div class="tpform__textarea">
                                                                        <textarea name="description" id="description" placeholder="Comment (optional)" cols="30" rows="10">{{ $booking->ratings->description }}</textarea>
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
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-10">
                            {{ $bookings->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@section('script')
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    var payButtons = document.querySelectorAll('.pay-button');
    var snapTokens = {!! json_encode($snapTokens) !!};

    payButtons.forEach(function(button) {
        button.addEventListener('click', function () {
            var snapToken = button.getAttribute('data-snap-token');
            snap.pay(snapToken, {
                onSuccess: function(result) {
                    Swal.fire("Payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    Swal.fire("Waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    Swal.fire("Payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    Swal.fire('You closed the popup without finishing the payment');
                }
            });
        });
    });
</script>
@endsection

</x-web-layout>

