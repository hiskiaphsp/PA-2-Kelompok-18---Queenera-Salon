<x-admin-layout title="Edit Produk">
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/filepond.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/filepond-plugin-image-preview.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/simple-mde.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Edit Product</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Product</li>
<li class="breadcrumb-item active">Edit Product</li>
@endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Default Form Layout</h5><span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                    </div>
                    <div class="card-body">
                        <form class="">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Input</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="exampleInputPassword1">Input</label>
                                <input class="form-control" id="exampleInputPassword1" type="text" placeholder="Password">
                            </div>
                            <div class="mb-3">
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
                            </div>
                            <div class="mb-3">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="image">Image</label>
                                <input class="show-preview" id="image" type="file">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="description">Description</label>
                                <textarea class="CodeMirror smde" id="description" name="description"></textarea>
                            </div>
                        </form>

                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script src="{{asset('assets/js/filepond/filepond-plugin-image-preview.js')}}"></script>
    <script src="{{asset('assets/js/filepond/filepond-plugin-file-rename.js')}}"></script>
    <script src="{{asset('assets/js/filepond/filepond-plugin-image-transform.js')}}"></script>
    <script src="{{asset('assets/js/filepond/filepond.js')}}"></script>
    <script src="{{asset('assets/js/filepond/custom-filepond.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('assets/js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('assets/js/editor/simple-mde/simplemde.custom.js')}}"></script>
@endsection
</x-admin-layout>

