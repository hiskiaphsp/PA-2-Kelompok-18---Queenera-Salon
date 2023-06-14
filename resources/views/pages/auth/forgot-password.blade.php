<x-auth-layout title="Forgot Paaword">
    <!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
   <div class="container-fluid p-0">
      <div class="row">
         <div class="col-12">
            <div class="login-card">
               <div>
                  {{-- <div><a class="logo" href="{{route('home')}}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div> --}}
                  <div class="login-main">
                     <form class="theme-form" method="POST" action="{{route('password.email')}}">
                        @csrf
                        <h4>Reset Your Password</h4>
                        <div class="form-group">
                            <label class="col-form-label">Email Address<span class="text-danger">*</span></label>
                            <input value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Test@gmail.com">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="col-12">
                                 <button class="btn btn-primary btn-block m-t-10" type="submit">Send</button>
                              </div>
                        </div>
                        
                        <p class="mt-4 mb-0">Already have an password?<a class="ms-2" href="{{ route('auth.login') }}">Sign in</a></p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</x-auth-layout>