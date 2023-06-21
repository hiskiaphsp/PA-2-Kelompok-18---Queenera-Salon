{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
<script src="{{asset('assets/ajax/jquery.js')}}"></script>
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
<script src="{{ asset('js/sweetalert.js') }}"></script>
{{-- <script src="{{ asset('js/method.js') }}"></script> --}}
<script src="{{ asset('js/toastify.js') }}"></script>

<script>

    @if(session('error'))

    // Mengambil nilai session error
    var errorMessage = '{{ session('error') }}';

    // Menampilkan toast dengan pesan error
    Toastify({
        text: response.message,
        duration: 3000,
        gravity: 'top',
        position: 'right',
        backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
        progressBar: true, // Add progress bar
        close: true,
    }).showToast();
    @endif

    @if(session('success'))
         // Mengambil nilai session error
        var successMessage = '{{ session('success') }}';
        Toastify({
            text: successMessage,
            duration: 3000,
            gravity: 'top',
            position: 'right',
            backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
            progressBar: true, // Add progress bar
            close: true,
        }).showToast();

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
                // Use Ajax toaster
                Toastify({
                    text: response.message,
                    duration: 3000,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
                    progressBar: true, // Add progress bar
                    close: true,
                }).showToast();
            },
            error: function(xhr) {
                if (xhr.status === 403) {
                    // User is forbidden, redirect to the login page
                    window.location.href = '{{ route('auth.login') }}';
                } else {
                    // Show error message using Ajax toaster
                    Toastify({
                        text: 'Something went wrong',
                        duration: 3000,
                        gravity: 'top',
                        position: 'right',
                        backgroundColor: 'linear-gradient(to right, #FF0000, #FF5733)',
                        progressBar: true, // Add progress bar
                        close: true,
                    }).showToast();
                }
            }
        });
    });


</script>
@auth
<script>
    localStorage.setItem("route_counter_notif", "{{ route('counter_notif') }}");
    localStorage.setItem("route_notification", "{{ route('notification.index') }}");
    localStorage.setItem("route_notification_read", "{{ route('notification.markRead') }}");
</script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/notif-user.js') }}"></script>
<script>
    function deleteNotification(notificationId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Once deleted, this notification will be permanently removed!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'notification/' + notificationId + '/delete',
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        toastr.options = {
                            'positionClass': 'toast-top-right',
                            'backgroundColor': 'linear-gradient(to right, #00b09b, #96c93d)',
                            'progressBar': true,
                            'closeButton': true
                        };
                        toastr.success(response.message);
                    },
                    error: function (xhr, status, error) {},
                });
            }
        });
    }
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
        $('#notification_items_top').slimScroll({
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
<script>
    $(document).ready(function(){
        function loadCart() {
            $.ajax({
                url: "{{ route('cart.load') }}",
                type: "GET",
                success: function(response) {
                    $('#cart-products').html(response.cart_details);
                    $('.tpcart__total-price .heilight-price').text(response.cart_subtotal);
                    $('.tpcart__checkout .tpcart-btn').attr('href', "{{url('cart')}}");
                    $('.tpcart__checkout .tpcheck-btn').attr('href', "{{ route('checkout') }}");
                    $('.tpcart__checkout #checkout-form').attr('action', "{{ route('checkout') }}");
                }
            });
        }
        setInterval(function() {
            loadCart();
        }, 2000);
        $(document).on('click', '.add-to-cart-btn', function(e){
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var quantity = $(this).data('quantity');
            $.ajax({
                url: "{{ url('product/add-to-cart') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: product_id,
                    quantity: quantity
                },
                success: function(response) {
                    loadCart();
                }
            });
        });
        $(document).on('click', '.tpcart__del a', function(e){
            e.preventDefault();
            var product_id = $(this).data('product-id');
            $.ajax({
                url: "{{ url('cart/remove') }}?product_id="+product_id,
                type: "GET",
                success: function(response) {
                    loadCart();
                }
            });
        });
    });
</script>
@endauth

@yield('script')
