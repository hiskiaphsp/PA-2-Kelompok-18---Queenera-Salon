<x-admin-layout title="Tambah Produk">
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Edit User</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">User</li>
<li class="breadcrumb-item active">E User</li>
@endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit User</h5>
                    </div>
                    <div class="card-body">
                        <form enctype='multipart/form-data' class="theme-form" method="post" action="{{route('admin.user.update', $user->id)}}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name<span class="text-danger">*</span></label>
                                <input value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="User Name" autofocus old="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Email Address<span class="text-danger">*</span></label>
                                <input value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Test@gmail.com" autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Phone Number<span class="text-danger">*</span></label>
                                <input value="{{ old('nohp', $user->nohp) }}" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" type="text" placeholder="62xxxxxxxxx">
                                @error('nohp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password<span class="text-danger">*</span></label>
                                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" autocomplete="new-password" placeholder="*********">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <a class="btn btn-secondary" href="{{route('admin.user.index')}}">Cancel</a>
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

