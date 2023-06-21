<x-web-layout title="Make Booking">
    @section('css')
        {{-- <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen"> --}}
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-time-picker.css')}}">
    @endsection
    <main class="grey-bg">
        <div class="container">
            <section class="row justify-content-center">
                <div class="tpproduct col-lg-6 mt-60 mb-60">
                    <div class="tpform__wrapper ml-60 mt-60 mb-60 mr-60">
                        <h4 class="tpform__title">Booking Now</h4>
                        <div class="tpform__box">
                            <form method="post" action="{{route('booking.store')}}" id="booking_form">
                                @csrf
                                <div class="row gx-7">
                                    <div class="col-lg-12">
                                        <label for="username" class="mx-2">Name<span class="text-danger">*</span> </label>
                                        <div class="tpform__input">
                                            <input class="form-control" type="text" name="username" id="username" placeholder="Your Name" value="{{old('username')}}">
                                            @error('username')
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-20 mb-20">
                                        <label for="service_id" class="mx-2">Service<span class="text-danger">*</span> </label>
                                        <div class="ml-2  tpform__select">
                                            <select class="form-control" name="service_id"  id='service_id'>
                                                <option value="" selected disabled>Please choose service</option>
                                                @foreach ($service as $item)
                                                    <option value="{{$item->id}}" {{old('service_id') == $item->id ? 'selected' : ''}}>{{$item->service_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                                <div class="text-danger">
                                                    Please select a service.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="phone_number" class="mx-2">Phone<span class="text-danger">*</span> </label>
                                        <div class="tpform__input mb-20">
                                            <input class="form-control"  type="text" placeholder="Phone" name="phone_number" id="phone_number" value="{{old('phone_number')}}">
                                            @error('phone_number')
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="tpform__input">
                                            <label for="start_booking_date" class="mx-2">Start Time<span class="text-danger">*</span> </label>
                                            <div class="input-group date" id="dt-enab-disab-date" data-target-input="nearest">
                                                <input  onkeydown="return false" id="start_booking_date" class="@error('start_booking_date') is-invalid @enderror form-control datetimepicker-input digits" type="text" name="start_booking_date" data-target="#dt-enab-disab-date" value="{{old('start_booking_date')}}">
                                                <div class="input-group-text" data-target="#dt-enab-disab-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @error('start_booking_date')
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tpform__input">
                                            <label for="end_booking_date" class="mx-2">End Time<span class="text-danger">*</span> </label>
                                            <div class="input-group date" id="dt-enab-disab-date-end" data-target-input="nearest">
                                                <input  onkeydown="return false" class="@error('end_booking_date') is-invalid @enderror form-control datetimepicker-input digits" type="text" name="end_booking_date" id="end_booking_date" data-target="#dt-enab-disab-date-end" value="{{old('end_booking_date')}}">
                                                <div class="input-group-text" data-target="#dt-enab-disab-date-end" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @error('end_booking_date')
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-20 mb-20">
                                        <label for="payment_method" class="mx-2">Payment Method<span class="text-danger">*</span> </label>
                                        <div class="ml-2  tpform__select">
                                            <select class="form-control" name="payment_method"  id='payment_method'>
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
                                            <textarea name="booking_description" id="booking_description" placeholder="Description..." cols="30" rows="10">{{old('booking_description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="mr-10 ml-10">
                                            <a class="btn btn-outline-danger" href="{{url('booking')}}">Cancel</a>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-success rounded">Make Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @section('script')
        <script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
    @endsection
</x-web-layout>
