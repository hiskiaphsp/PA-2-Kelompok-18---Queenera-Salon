
 <!-- latest jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/config.js')}}"></script>
<!-- Plugins JS start-->

<script id="menu" src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/slick/slick.js') }}"></script>
<script src="{{ asset('assets/js/header-slick.js') }}"></script>
@yield('script')

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/theme-customizer/customizer.js')}}"></script>


{{-- @if(Route::current()->getName() == 'index')
	<script src="{{asset('assets/js/layout-change.js')}}"></script>
@endif --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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


{{-- Notification --}}
<script src="{{ asset('js/notif.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

<script>
    localStorage.setItem("route_counter_notif", "{{ route('admin.counter_notif') }}");
    localStorage.setItem("route_notification", "{{ route('admin.notification.index') }}");
    localStorage.setItem("route_notification_read", "{{ route('admin.notification.markRead') }}");
</script>
<script>
    $(document).ready(function() {
        var height = $('.navi').data('height');
        var mobile_height = $('.navi').data('mobile-height');
        $('#notification_items').slimScroll({
            height: height,
            mobileHeight: mobile_height,
            color: '#fff',
            alwaysVisible: true,
            railVisible: true,
            railColor: '#fff',
            railOpacity: 1,
            wheelStep: 10,
            allowPageScroll: true,
            disableFadeOut: false
        });
    });
</script>
