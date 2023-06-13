<x-admin-layout title="Edit Layanan">
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Edit Service</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Services</li>
<li class="breadcrumb-item active">Edit Service</li>
@endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Service</h5><span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                    </div>
                    <div class="card-body">
                        <form class="" enctype='multipart/form-data' action="{{route('admin.service.update', $service->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="service_name">Service Name</label>
                                <input class="form-control @error('service_name') is-invalid @enderror" id="service_name" value="{{ $service->service_name }}" type="text"placeholder="Enter service Name" name="service_name">
                                 @error('service_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="service_price">Service Price</label>
                                <input class="form-control @error('service_price') is-invalid @enderror" id="service_price" value="{{ $service->service_price}}"" type="text"placeholder="Enter service Price" name="service_price">
                                 @error('service_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <div class="col-form-label">Select</div>
                                <select class="js-example-basic-single col-sm-12">
                                    <optgroup label="Developer">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Designer">
                                        <option value="WY">Peter</option>
                                        <option value="WY">Hanry Die</option>
                                        <option value="WY">John Doe</option>
                                    </optgroup>
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="service_image">Service Image</label>
                                <input class="form-control @error('service_image') is-invalid @enderror" id="service_image" name="service_image" type="file">
                                @error('service_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="service_description">Service Description</label>
                                <textarea id="editor1" name="service_description" cols="10" rows="4">{{ $service->service_description}}</textarea>
                                @error('service_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('assets/js/email-app.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>

@endsection
</x-admin-layout>

