<x-auth-layout title="Login">
<div class="container-fluid p-0">
   <div class="row m-0">
        <div class="col-12">
            <div class="login-card">
                <div>

                <div class="login-main">
                    <div><a class="logo text-center" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/queen1.jpg')}}" width="130" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/queen1.jpg')}}" width="130" alt="looginpage"></a></div>
                    <form class="theme-form" method="post" action="{{route('auth.do_login')}}">
                        <div class="m-20">
                            <h4 class="text-center">Sign in</h4>
                        </div>
                        @csrf
                        <div class="form-group mt-20">
                            <label class="col-form-label" for="email">Email Address</label>
                            <input value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" autofocus placeholder="Test@gmail.com">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="*********">
                            {{-- <div class="show-hide"><span class="show">                         </span></div> --}}
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <a href="{{route('password.request')}}">Forgot Password?</a>
                        </div>
                        <div class="form-group mt-20">
                            <div class="row justify-content-center">
                                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                            </div>
                        </div>

                        <p class="text-center mt-4 mb-0">Don't have account?<a class="ms-2" href="{{ route('auth.register') }}">Create Account</a></p>
                    </form>
                </div>
                </div>
            </div>
        </div>
   </div>
</div>
</x-auth-layout>
