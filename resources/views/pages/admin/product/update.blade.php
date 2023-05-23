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
                        <h5>Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form class="" enctype='multipart/form-data' action="{{route('admin.product.update', $product->id   )}}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="product_name">Product Name</label>
                                <input class="form-control @error('product_name') is-invalid @enderror" id="product_name" type="text"placeholder="Enter Product Name" name="product_name" value="{{$product->product_name}}">
                                 @error('product_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="product_code">SKU</label>
                                <input class="form-control @error('product_code') is-invalid @enderror" id="product_code" type="text"placeholder="Enter SKU" name="product_code" value="{{$product->product_code}}">
                                 @error('product_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="product_price">Product Price</label>
                                <input class="form-control @error('product_price') is-invalid @enderror" id="product_price" type="text"placeholder="Enter Product Price" name="product_price" value="{{$product->product_price}}">
                                 @error('product_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="product_stock">Product Stock</label>
                                <input class="form-control @error('product_stock') is-invalid @enderror" id="product_stock" type="text"placeholder="Enter Product Stock" name="product_stock" value="{{$product->product_stock}}">
                                 @error('product_stock')
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
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="product_image">Product Image</label>
                                <input class="form-control @error('product_image') is-invalid @enderror" id="product_image" name="product_image" type="file">
                                @error('product_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="product_description">Product Description</label>
                                <textarea class="CodeMirror smde @error('product_description') is-invalid @enderror" id="product_description" name="product_description">{{$product->product_description}}</textarea>
                                @error('product_description')
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

