<x-admin-layout title="Edit Produk">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/filepond.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/filepond-plugin-image-preview.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/vendors/daterange-picker.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/simple-mde.css')}}">
    @endsection

    @section('breadcrumb-title')
        <h3>Edit Order</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Order</li>
        <li class="breadcrumb-item active">Edit Order</li>
    @endsection

    <div class="container-fluid select2-drpdwn">
        <form action="{{ route('admin.order.update', $order->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit</h5><span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="col-form-label">Product</div>
                                <select class="js-example-basic-multiple col-sm-6" name="product_id[]" multiple="multiple">
                                    <option disabled>Choose Product</option>
                                    @foreach ($products as $product)
                                        <option class="product-option" id="product-select" data-name="{{ $product->product_name }}" data-price="{{ $product->product_price }}" value="{{ $product->id }}" {{ in_array($product->id, $selectedProducts) ? 'selected' : '' }}>{{ $product->product_name }} - {{ $product->product_price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Product</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="order-history table-responsive wishlist">
                                    <table id="product-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->products as $orderProduct)
                                                <tr>
                                                    <td>
                                                        <div class="product-name"><a href="#">{{ $orderProduct->product->product_name }}</a></div>
                                                        <input type="text" hidden name="product_id[]" value="{{ $orderProduct->product_id }}">
                                                    </td>
                                                    <td class="price_product">{{ formatCurrency($orderProduct->product->product_price) }}</td>
                                                    <td>
                                                        <input class="form-control text-center quantity-input" name="quantity[]" data-price="{{ $orderProduct->product->product_price }}" type="number" value="{{ $orderProduct->quantity }}" min="1">
                                                    </td>
                                                    <td class="total-price">{{ formatCurrency($orderProduct->product->product_price * $orderProduct->quantity) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @section('script')
        <script src="{{URL::asset('assets/js/touchspin/vendors.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/touchspin/touchspin.js')}}"></script>

        <script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>
        <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
        <script src="{{asset('assets/js/editor/simple-mde/simplemde.min.js')}}"></script>
        <script src="{{asset('assets/js/editor/simple-mde/simplemde.custom.js')}}"></script>

        <script>
            // Event change pada elemen Select2 untuk menangani pemilihan produk
            $(document).on('change', '.js-example-basic-multiple', function() {
                var selectedProducts = $(this).val();
                var productTable = $('#product-table tbody');
                var totalPriceElement = $('.total-amount-value');

                // Clear existing rows in the table
                productTable.empty();

                // Add selected products to the table
                var totalAmount = 0; // Total amount of all selected products
                selectedProducts.forEach(function(productId) {
                    var selectedOption = $('.product-option[value="' + productId + '"]');
                    var productName = selectedOption.data('name');
                    var productPrice = selectedOption.data('price');
                    var quantity = 1; // You can set the initial quantity here

                    // Calculate total price for the current product
                    var totalPrice = productPrice * quantity;

                    // Add the current product's total price to the total amount
                    totalAmount += totalPrice;

                    // Create table row with the selected product details
                    var row = `
                        <tr>
                            <td>
                                <div class="product-name"><a href="#">${productName}</a></div>
                                <input type="text" hidden name="product_id[]" value="${productId}">
                            </td>
                            <td class="price_product">${formatCurrency(productPrice)}</td>
                            <td>
                                <input class="form-control text-center quantity-input" name="quantity[]" data-price="${productPrice}" type="number" value="${quantity}" min="1">
                            </td>
                            <td class="total-price">${formatCurrency(totalPrice)}</td>
                        </tr>
                    `;

                    // Append the row to the table
                    productTable.append(row);
                });

                // Update the total amount value
                totalPriceElement.text(formatCurrency(totalAmount));

                // Initialize total price row
                var totalPriceRow = `
                    <tr>
                        <td class="total-amount" colspan="3">
                            <h6 class="m-0 text-end"><span class="f-w-600">Total Price :</span></h6>
                        </td>
                        <td><span class="total-amount-value">${formatCurrency(totalAmount)}</span></td>
                    </tr>
                    <tr>
                        <td class="total-amount" colspan="4">
                            <input type="text" hidden class="form-control total-amount-value" name="order_amount" value="${totalAmount}">
                        </td>
                    </tr>
                `;
                productTable.append(totalPriceRow);
            });

            // Event change pada elemen input quantity
            $(document).on('input', '.quantity-input', function() {
                var quantity = $(this).val();
                var productPrice = parseFloat($(this).closest('tr').find('.price_product').text().replace(/\D/g, ''));

                if (quantity !== '') {
                    quantity = parseInt(quantity);
                    var totalPrice = quantity * productPrice;
                    $(this).closest('tr').find('.total-price').text(formatCurrency(totalPrice));

                    // Update the total amount value
                    updateTotalAmount();
                } else {
                    $(this).closest('tr').find('.total-price').text('0');
                }
            });

            // Function to update the total amount value
            function updateTotalAmount() {
                var totalAmount = 0;
                $('.total-price').each(function() {
                    var price = parseFloat($(this).text().replace(/\D/g, ''));
                    if (!isNaN(price)) {
                        totalAmount += price;
                    }
                });
                $('.total-amount-value').text(formatCurrency(totalAmount));
                $('.total-amount-value').val(totalAmount);
            }

            // Function to format currency
            function formatCurrency(amount) {
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                });
                return formatter.format(amount);
            }
        </script>
    @endsection
</x-admin-layout>
