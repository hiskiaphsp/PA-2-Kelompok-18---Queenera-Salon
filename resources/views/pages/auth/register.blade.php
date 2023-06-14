<x-auth-layout title="Register">
<div class="container-fluid p-0">
   <div class="row m-0">
        <div class="col-md-12">
                     <div class="login-card">
            <div>
               <div class="login-main">
                <div><a class="logo text-center" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/queen1.jpg')}}" width="130" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/queen1.jpg')}}" width="130" alt="looginpage"></a></div>
                  <form class="theme-form" method="post" action="{{route('auth.do_register')}}">
                    @csrf
                     <div class="m-20">
                            <h4 class="text-center">Create your account</h4>
                        </div>
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
                     <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                     </div>

                     <p class="text-center mt-4 mb-0">Already have an account?<a class="ms-2" href="{{ route('auth.login') }}">Sign in</a></p>
                  </form>
               </div>
            </div>
         </div>
        </div>
   </div>
</div>
</x-auth-layout>
