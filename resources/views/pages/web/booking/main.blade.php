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
                                                <td>{{\Carbon\Carbon::parse($item->start_booking_date)->format('d F Y, l \a\t H:i')}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->end_booking_date)->format('d F Y, l \a\t H:i')}}</td>
                                                <td>{{$item->booking_code}}</td>
                                                <td>{{$item->status}}</td>
                                                <td>
                                                    @if ( $item->status == 'Completed')
                                                        <div class="dropdown-basic me-0">
                                                            <div class="btn-group dropstart">
                                                                <a class="dropdown-toggle btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                                <ul class="dropdown-menu dropdown-block">
                                                                    <li>

                                                                        @if (!$item->ratings)
                                                                        <a class="dropdown-item" data-bs-toggle="modal"data-bs-target="#myModal-{{$item->id}}">
                                                                            Rate
                                                                        </a>
                                                                        @endif
                                                                        @if ($item->ratings)
                                                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal-{{$item->id}}-update">
                                                                            Update Rate
                                                                        </a>
                                                                        @endif
                                                                        @if ($item->status == "Accepted" || $item->status == "Completed")
                                                                            <a class="dropdown-item" href="{{route('booking.pdf', $item->id)}}">
                                                                                Download Pdf
                                                                            </a>
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    @elseif (!$item->status == 'Cancelled')
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
                                                    <div class="modal fade" id="myModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <form method="POST" action="{{route('rating.store-service' , $item->id)}}">
                                                                    @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Queenera Salon</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <!-- Modal Body -->
                                                                <div class="modal-body">
                                                                    <div style="margin:10px;">
                                                                        Product Name: {{ $item->service->service_name }}
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
                                                    @if($item->ratings)
                                                    <div class="modal fade" id="myModal-{{$item->id}}-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <form method="POST" action="{{route('rating.update', $item->ratings->id)}}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Queenera Salon</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <!-- Modal Body -->
                                                                    <div class="modal-body">
                                                                        <div style="margin:10px;">
                                                                            Product Name: {{ $item->service->service_name }}
                                                                        </div>
                                                                        <div class="mt-2" style="margin-bottom: 50px;">
                                                                        <select name="product_rate" class="mb-30 @error('product_rate') is-invalid @enderror" id='product_rate'>
                                                                            <option selected disabled>Please Choose Rate</option>
                                                                            <option value="1" @if($item->ratings && $item->ratings->product_rate == 1) selected @endif>
                                                                                1/5 Stars
                                                                            </option>
                                                                            <option value="2" @if($item->ratings && $item->ratings->product_rate == 2) selected @endif>
                                                                                2/5 Stars
                                                                            </option>
                                                                            <option value="3" @if($item->ratings && $item->ratings->product_rate == 3) selected @endif>
                                                                                3/5 Stars
                                                                            </option>
                                                                            <option value="4" @if($item->ratings && $item->ratings->product_rate == 4) selected @endif>
                                                                                4/5 Stars
                                                                            </option>
                                                                            <option value="5" @if($item->ratings && $item->ratings->product_rate == 5) selected @endif>
                                                                                5/5 Stars
                                                                            </option>
                                                                        </select>

                                                                        </div>
                                                                        <div  style="margin-top:50px;">
                                                                            <div class="tpform__textarea">
                                                                                <textarea name="description" id="description" placeholder="Comment  (optional)" cols="30" rows="10">{{$item->ratings->description}}</textarea>
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
                                        @endif
                                    </tbody>
                            </table>
                        </div>
                        <div class="mt-10">
                            {{ $booking->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-web-layout>
