<x-admin-layout title="Tambah Booking">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/date-time-picker.css') }}">
    @endsection

    @section('breadcrumb-title')
        <h3>Create Booking</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Booking</li>
        <li class="breadcrumb-item active">Create Booking</li>
    @endsection

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Booking</h5>
                    </div>
                    <div class="card-body datetime-picker">
                        <form class="needs-validation" novalidate=""
                            action="{{ route('admin.booking.store') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="validationCustom01">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror"
                                    id="validationCustom01" type="text" placeholder="Enter Username"
                                    value="{{ old('username') }}" name="username">
                                @error('username')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="service_id">Service</label>
                                <select class="form-control js-example-basic-single col-sm-6 @error('service_id') is-invalid @enderror"
                                    id="service_id" name="service_id">
                                    <option value="" disabled selected>Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="invalid-feedback text-danger">
                                        Please choose service
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="col-form-label pt-0" for="phone_number">Phone Number</label>
                                <input class="form-control @error('phone_number') is-invalid @enderror"
                                    id="phone_number" type="text" placeholder="Enter Phone Number"
                                    name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="col-form-label pt-0" for="start_booking_date">Start Booking
                                    Date</label>
                                <div class="input-group date" id="dt-local" data-target-input="nearest">
                                    <input class="form-control datetimepicker-input digits @error('start_booking_date') is-invalid @enderror"
                                        type="text" placeholder="Enter Start Booking Date"
                                        name="start_booking_date" data-target="#dt-local"
                                        value="{{ old('start_booking_date') }}" onkeydown="return false">
                                    <div class="input-group-text" data-target="#dt-local"
                                        data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                @error('start_booking_date')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            </div>
                            <div class="mb-4">
                                <label class="col-form-label pt-0" for="end_booking_date">End Booking
                                    Date</label>
                                <div class="input-group date" id="end_booking_date"
                                    data-target-input="nearest">
                                    <input class="form-control datetimepicker-input digits @error('end_booking_date') is-invalid @enderror"
                                        type="text" placeholder="Enter Start Booking Date"
                                        name="end_booking_date" data-target="#end_booking_date"
                                        value="{{ old('end_booking_date') }}" onkeydown="return false">
                                    <div class="input-group-text" data-target="#end_booking_date"
                                        data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                @error('end_booking_date')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            </div>
                            <div class="mb-4">
                                <label class="col-form-label pt-0" for="booking_description">Booking
                                    Description</label>
                                <textarea id="text-box" name="booking_description" cols="10"
                                    rows="2">{{ old('booking_description') }}</textarea>
                                @error('booking_description')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                 <a class="btn btn-secondary" href="{{ route('admin.booking.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
        <script src="{{ asset('assets/js/email-app.js') }}"></script>
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('js/datepicker/date-time-picker/moment.min.js') }}"></script>
        <script src="{{ asset('js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('js/datepicker/date-time-picker/datetimepicker.custom.js') }}"></script>
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    @endsection
</x-admin-layout>
