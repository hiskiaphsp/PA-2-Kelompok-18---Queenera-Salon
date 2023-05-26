
<x-web-layout title="Service">
    @section('css')
        <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-time-picker.css')}}">
    @endsection
    <section class="about-area tpabout__inner-bg pt-175 pb-170 mb-50" data-background="{{asset('web-assets/img/banner/about-bg-1.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tpabout__inner text-center">
                    <h5 class="tpabout__inner-sub mb-15">Queenera Salon</h5>
                    <h3 class="tpabout__inner-title mb-35">Services</h3>
                    <p>Over 25 years of experience, we have crafted thousands of strategic discovery process that <br> enables us to peel back the layers which enable us to understand, connect.</p>
                    <div class="tpabout__inner-btn">
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
                    <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($service as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-box__wrapper text-center mb-30">
                    <div class="img-box__thumb mb-30">
                        <img src="{{asset('images/'.$item->service_image)}}" alt="">
                    </div>
                    <div class="img-box__content">
                        <h4 class="img-box__title mb-10">{{ $item->service_name }}</h4>
                        <span>{{$item->price_formatted}}</span>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d56215.718841453985!2d-0.19959027821222705!3d51.48739183082915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slondon%20eye!5e0!3m2!1sen!2sbd!4v1656749326947!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 order-1 order-md-2">
                    <div class="tpform__wrapper pt-120 pb-80 ml-60">
                    <h4 class="tpform__title">Booking Now</h4>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <div class="tpform__box">
                        <form action="{{route('booking.store')}}" method="post" id="booking_form">
                            @csrf
                            <div class="row gx-7">
                                <div class="col-lg-12">
                                    <label for="username" class="mx-2">Name<span class="text-danger">*</span> </label>
                                    <div class="tpform__input">
                                        <input type="text" name="username" id="username" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-20 mb-20">
                                    <label for="service_id" class="mx-2">Service<span class="text-danger">*</span> </label>
                                    <div class="ml-2  tpform__select">
                                        <select name="service_id" id='service_id'>
                                            <option value="" selected disabled>Please choose service</option>
                                            @foreach ($service as $item)
                                                <option value="{{$item->id}}">{{$item->service_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="phone_number" class="mx-2">Phone<span class="text-danger">*</span> </label>
                                    <div class="tpform__input mb-20">
                                        <input type="number" placeholder="Phone" name="phone_number" id="phone_number">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="tpform__input">
                                    <label for="start_booking_date" class="mx-2">Start Time<span class="text-danger">*</span> </label>
                                        <div class="input-group date" id="dt-enab-disab-date" data-target-input="nearest">
                                            <input id="start_booking_date" class="form-control datetimepicker-input digits" type="text" name="start_booking_date" data-target="#dt-enab-disab-date">
                                            <div class="input-group-text" data-target="#dt-enab-disab-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tpform__input">
                                    <label for="end_booking_date" class="mx-2">End Time<span class="text-danger">*</span> </label>
                                        <div class="input-group date" id="dt-enab-disab-date-end" data-target-input="nearest">
                                            <input class="form-control datetimepicker-input digits" type="text" name="end_booking_date" id="end_booking_date" data-target="#dt-enab-disab-date-end">
                                            <div class="input-group-text" data-target="#dt-enab-disab-date-end" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="booking_description" class="mx-2">Description (optional)</label>
                                    <div class="tpform__textarea">
                                        <textarea name="booking_description" id="booking_description" placeholder="Description..." cols="30" rows="10"></textarea>
                                    </div>
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



