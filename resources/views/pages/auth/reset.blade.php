<x-auth-layout title="Reset Password">
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <div>
                            <div><a class="logo" href="{{ route('home') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
                            <div class="login-main">
                                <form method="POST" action="{{ route('password.update') }}" class="theme-form">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <h4>Create Your Password</h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Email Address<span class="text-danger">*</span></label>
                                        <div>
                                            <input value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Test@gmail.com">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="password">New Password</label>
                                        <div>
                                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="col-form-label">Retype Password</label>
                                        <div>
                                            <input name="password_confirmation" class="form-control" type="password" id="password_confirmation" required="" placeholder="*********">
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="checkbox p-0">
                                            <input id="checkbox1" type="checkbox">
                                            <label class="text-muted" for="checkbox1">Remember password</label>
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Done</button>
                                    </div>
                                    <p class="mt-4 mb-0">Don't have an account? <a class="ms-2" href="{{ route('auth.register') }}">Create Account</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
