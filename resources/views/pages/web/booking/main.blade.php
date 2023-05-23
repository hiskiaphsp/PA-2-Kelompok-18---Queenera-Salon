<x-web-layout title="My Booking">

    <section class="cart-area pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="d-flex justify-content-end mt-10 mb-10">
                            <div class="">
                                <a class="tp-btn tp-color-btn banner-animation" href="{{url('booking/create')}}" name="update_cart">Make Booking</a>
                            </div>
                        </div>
                        <div class="table-content table-responsive">
                            <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th >Service Name</th>
                                        <th >Start Time</th>
                                        <th >End Time</th>
                                        <th>Booking Code</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if ($booking->isEmpty())
                                            <tr>
                                                <td colspan="8">You haven't made a booking</td>
                                            </tr>
                                        @else
                                            @foreach ($booking as $item)
                                            <tr>
                                                <td>{{$item->username}}</td>
                                                <td>{{$item->service_name}}</td>
                                                <td>{{$item->start_booking_date}}</td>
                                                <td>{{$item->end_booking_date}}</td>
                                                <td>{{$item->booking_code}}</td>
                                                <td>{{$item->payment_method}}</td>
                                                <td>{{$item->status}}</td>
                                                <td>
                                                    @if (!$item->status == 'Cancelled')
                                                        <div class="dropdown">
                                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="icon-settings"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="{{route('booking.edit', $item->id)}}">Edit</a></li>
                                                            <li><a class="dropdown-item" href="{{ route('booking.cancel', ['id' => $item->id]) }}" onclick="event.preventDefault(); document.getElementById('cancel-booking-form').submit();">Cancel</a>
                                                                <form id="cancel-booking-form" action="{{ route('booking.cancel', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                                    @method('PUT')
                                                                    @csrf
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @else
                                                    No Action
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
