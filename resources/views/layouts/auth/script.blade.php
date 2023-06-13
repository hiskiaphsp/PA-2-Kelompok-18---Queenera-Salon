<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
@yield('script')
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<!-- Plugin used-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if(session('error'))
<script>
    // Mengambil nilai session error
    var errorMessage = '{{ session('error') }}';

    // Menampilkan toast dengan pesan error
    toastr.options = {
        'positionClass': 'toast-top-right',
        'backgroundColor': 'linear-gradient(to right, #ff4d4d, #ff0000)',
        'progressBar': true,
        "closeButton": true
    };
    toastr.error(errorMessage);
</script>
@endif
@if(session('success'))
<script>
    // Mengambil nilai session error
    var successMessage = '{{ session('success') }}';

    // Menampilkan toast dengan pesan error
    toastr.options = {
        'positionClass': 'toast-top-right',
        'backgroundColor': 'linear-gradient(to right, #00b09b, #96c93d)',
        'progressBar': true,
        "closeButton": true
    };
    toastr.success(successMessage);
</script>
@endif
