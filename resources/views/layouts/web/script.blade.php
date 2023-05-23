<script src="{{asset('web-assets/js/jquery.js')}}"></script>
<script src="{{asset('web-assets/js/waypoints.js')}}"></script>
<script src="{{asset('web-assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('web-assets/js/swiper-bundle.js')}}"></script>
<script src="{{asset('web-assets/js/nice-select.js')}}"></script>
<script src="{{asset('web-assets/js/slick.js')}}"></script>
<script src="{{asset('web-assets/js/magnific-popup.js')}}"></script>
<script src="{{asset('web-assets/js/counterup.js')}}"></script>
<script src="{{asset('web-assets/js/wow.js')}}"></script>
<script src="{{asset('web-assets/js/isotope-pkgd.js')}}"></script>
<script src="{{asset('web-assets/js/imagesloaded-pkgd.js')}}"></script>
<script src="{{asset('web-assets/js/countdown.js')}}"></script>
<script src="{{asset('web-assets/js/ajax-form.js')}}"></script>
<script src="{{asset('web-assets/js/parallax-effect.min.js')}}"></script>
<script src="{{asset('web-assets/js/meanmenu.js')}}"></script>
<script src="{{asset('web-assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('script')
<script>

    function showToast(message) {
        Toastify({
            text: message,
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: 'top',
            position: 'center',
            backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
            stopOnFocus: true
        }).showToast();
    }

    toastr.options = {
    "closeButton": true
    }

    @if(session('error'))

    // Mengambil nilai session error
    var errorMessage = '{{ session('error') }}';

    // Menampilkan toast dengan pesan error
    toastr.error(errorMessage);
    @endif

    @if(session('success'))
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

    @endif


    $(document).on('click', '.add-to-cart', function() {
        var productId = $(this).data('product-id');
        var quantity = $(this).siblings('input[name="quantity"]').val();

        $.ajax({
            url: '{{ route('product.addToCart') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                'product_id': productId,
                'quantity': quantity,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Menggunakan toaster ajax
                toastr.options = {
                    'positionClass': 'toast-top-right',
                    'backgroundColor': 'linear-gradient(to right, #00b09b, #96c93d)',
                    'progressBar': true,
                    "closeButton": true
                };
                toastr.success(response.message);
            },
            error: function(response) {
                // Menampilkan pesan error menggunakan toaster ajax
                toastr.options = {
                    'positionClass': 'toast-top-right',
                    'backgroundColor': 'linear-gradient(to right, #ff4d4d, #ff0000)',
                    'progressBar': true,
                    "closeButton": true
                };
                toastr.error('Something went wrong');
            }
        });
    });

</script>
