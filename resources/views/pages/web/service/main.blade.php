
<x-web-layout title="Service">
    @section('css')
        <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-time-picker.css')}}">
    @endsection
    <section class="about-area tpabout__inner-bg pt-175 pb-170 mb-50" data-background="{{asset('web-assets/img/banner/service-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tpabout__inner text-center">
                    <h5 class="tpabout__inner-sub mb-15">Queenera Salon</h5>
                    <h3 class="tpabout__inner-title mb-35">Services</h3>

                    <div class="btn btn-outline-danger">
                        <a href="#booking_form">Make Booking</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-area tpabout__inner-bg pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="tpsection mb-35">
                    <h4 class="tpsection__sub-title">~ Queen Salon ~</h4>
                    <h4 class="tpsection__title">Our Service</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($service as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-box__wrapper text-center mb-30">
                    <div class="img-box__thumb mb-30">
                        <img src="{{asset('images/'.$item->service_image)}}" height="400px">
                    </div>
                    <div class="img-box__content">
                        <h4 class="img-box__title mb-10"><a href="{{route('service.show', $item->id)}}">{{ $item->service_name }}</a></h4>
                        <span>{{$item->price_formatted}}</span>
                    </div>
                    @php
                        $total = 0;
                        $index = 0;
                        if ($item->booking) {
                            foreach ($item->booking as $key) {
                                if ($key->ratings) {
                                    $rating = $key->ratings->product_rate;
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
                        {{$hasil}}/5

                        @for ($i = 1; $i <= $hasil; $i++)
                            <i class="fa fa-star text-warning"></i>
                        @endfor
                        @if ($hasHalfStar)
                            <i class="fa fa-star-half-full text-warning"></i>
                        @endif
                        @for ($i = 0; $i <= 4; $i++)
                            @if ($hasil <= $i)
                                <i class="fa fa-star-o text-warning"></i>
                            @endif
                        @endfor

                    </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="map-area tpmap__box">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 col-md-6 order-2 order-md-1">
                    <div class="tpmap__wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.323034536973!2d99.18032977461775!3d2.398469097580753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e01b4ecb1ad7b%3A0x58e335b6b1acdde8!2sQueenera%20Rias%20Pengantin!5e0!3m2!1sid!2sid!4v1686556586005!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 order-1 order-md-2">
                    <div class="tpform__wrapper pt-120 pb-80 ml-60">
                        <h4 class="tpform__title">Booking Now</h4>
                        <div class="tpform__box">
                            <form action="{{ route('booking.store') }}" method="post" id="booking_form">
                                @csrf
                                <div class="row gx-7">
                                    <div class="col-lg-12">
                                        <label for="username" class="mx-2">Name<span class="text-danger">*</span> </label>
                                        <div class="tpform__input">
                                            <input type="text" name="username" id="username" placeholder="Your Name" class="@error('username') is-invalid @enderror">
                                        </div>
                                        @error('username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mt-20 mb-20">
                                        <label for="service_id" class="mx-2">Service<span class="text-danger">*</span> </label>
                                        <div class="ml-2 tpform__select">
                                            <select name="service_id" id="service_id" class="@error('service_id') is-invalid @enderror">
                                                <option value="" selected disabled>Please choose service</option>
                                                @foreach ($service as $item)
                                                    <option value="{{ $item->id }}">{{ $item->service_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('service_id')
                                            <div class="text-danger">Please select the service.</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="phone_number" class="mx-2">Phone<span class="text-danger">*</span> </label>
                                        <div class="tpform__input mb-20">
                                            <input type="text" placeholder="Phone" name="phone_number" id="phone_number" class="@error('phone_number') is-invalid @enderror">
                                        </div>
                                        @error('phone_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="tpform__input">
                                            <label for="start_booking_date" class="mx-2">Start Time<span class="text-danger">*</span> </label>
                                            <div class="input-group date" id="dt-enab-disab-date" data-target-input="nearest">
                                                <input  onkeydown="return false" id="start_booking_date" class="form-control datetimepicker-input digits @error('start_booking_date') is-invalid @enderror" type="text" name="start_booking_date" data-target="#dt-enab-disab-date">
                                                <div class="input-group-text" data-target="#dt-enab-disab-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('start_booking_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tpform__input">
                                            <label for="end_booking_date" class="mx-2">End Time<span class="text-danger">*</span> </label>
                                            <div class="input-group date" id="dt-enab-disab-date-end" data-target-input="nearest">
                                                <input  onkeydown="return false" class="form-control datetimepicker-input digits @error('end_booking_date') is-invalid @enderror" type="text" name="end_booking_date" id="end_booking_date" data-target="#dt-enab-disab-date-end">
                                                <div class="input-group-text" data-target="#dt-enab-disab-date-end" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('end_booking_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mt-20 mb-20">
                                        <label for="payment_method" class="mx-2">Payment Method<span class="text-danger">*</span> </label>
                                        <div class="ml-2 tpform__select">
                                            <select class="form-control" name="payment_method" id='payment_method'>
                                                <option value="" selected disabled>Please choose Payment Method</option>
                                                <option value="Transfer">Transfer</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                            @error('payment_method')
                                                <div class="text-danger">
                                                    Please select payment method.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="booking_description" class="mx-2">Description (optional)</label>
                                        <div class="tpform__textarea">
                                            <textarea name="booking_description" id="booking_description" placeholder="Description..." cols="30" rows="10" class="@error('booking_description') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('booking_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="tpform__textarea">
                                        <button type="submit" class="">Make Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('script')
        <script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
    @endsection

</x-web-layout>



