<x-admin-layout title="Edit Produk">
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
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
                                <label class="col-form-label pt-0" for="product_code">Product Code</label>
                                <input class="form-control @error('product_code') is-invalid @enderror" id="product_code" type="text"placeholder="Enter Product Code" name="product_code" value="{{$product->product_code}}">
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
                                <textarea id="text-box" name="product_description" cols="10" rows="2">{{$product->product_description}}</textarea>
                                @error('product_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <a href="{{route('admin.product.index')}}" class="btn btn-secondary">Cancel</a>
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
    <script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
@endsection
</x-admin-layout>

