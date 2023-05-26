<x-auth-layout title="Register">
<div class="container-fluid p-0">
   <div class="row m-0">
        <div class="col-md-12">
                     <div class="login-card">
            <div>
               {{-- <div><a class="logo" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div> --}}
               <div class="login-main">
                  <form class="theme-form" method="post" action="{{route('auth.do_register')}}">
                    @csrf
                     <h4>Create your account</h4>
                     <p>Enter your personal details to create account</p>
                     <div class="form-group">
                        <label for="name" class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Your Name" autofocus old="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Email Address<span class="text-danger">*</span></label>
                        <input value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Test@gmail.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Phone Number<span class="text-danger">*</span></label>
                        <input value="{{ old('nohp') }}" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" type="text" placeholder="62xxxxxxxxx">
                        @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Password<span class="text-danger">*</span></label>
                        <input value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="*********">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="show-hide"><span class="show"></span></div> --}}
                     </div>
                     <div class="form-group d-flex justify-content-end">

                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                     </div>

                     <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="{{ route('auth.login') }}">Sign in</a></p>
                  </form>
               </div>
            </div>
         </div>
        </div>
   </div>
</div>
</x-auth-layout>
