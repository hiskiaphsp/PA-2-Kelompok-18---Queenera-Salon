<x-admin-layout title="Order">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
    @endsection
    @section('breadcrumb-title')
    <h3>Order</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Order</li>
        <li class="breadcrumb-item active">Order Data</li>
    @endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Order</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ route('admin.order.create') }}">Add Order</a>
                        </div>
                        <div class="table-responsive user-datatable">
                            <table class="display" id="export-button">
                                <thead>
                                    <tr class="text-center">
                                        <th>Order Number</th>
                                        <th >Order Amount</th>
                                        <th >Status</th>
                                        <th>Payment Method</th>
                                        <th>Create At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{$item->order_number}}</td>
                                            <td>{{$item->order_amount}}</td>
                                            <td>{{$item->order_status}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <div class="dropdown-basic me-0">
                                                    <div class="btn-group dropstart">
                                                        <a class="dropdown-toggle btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                        <ul class="dropdown-menu dropdown-block">
                                                            @if ($item->order_status == "Pending")
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('admin.order.accept', ['id' => $item->id]) }}" onclick="event.preventDefault(); document.getElementById('accept-order-form-{{$item->id}}').submit();">Accept</a>
                                                                    <form id="accept-order-form-{{$item->id}}" action="{{ route('admin.order.accept', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                                        @method('PUT')
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('admin.order.reject', ['id' => $item->id]) }}" onclick="event.preventDefault(); document.getElementById('reject-order-form-{{$item->id}}').submit();">Reject</a>
                                                                    <form id="reject-order-form-{{$item->id}}" action="{{ route('admin.order.reject', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                                        @method('PUT')
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                            @endif
                                                            @if ($item->order_status == 'Accepted' || $item->order_status == 'Paid')
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('admin.order.complete', ['id' => $item->id]) }}" onclick="event.preventDefault(); document.getElementById('complete-order-form-{{$item->id}}').submit();">Complete</a>
                                                                    <form id="complete-order-form-{{$item->id}}" action="{{ route('admin.order.complete', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                                        @method('PUT')
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.order.delete', ['id' => $item->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-order-form-{{$item->id}}').submit();">Delete</a>
                                                                <form id="delete-order-form-{{$item->id}}" action="{{ route('admin.order.delete', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                                    @method('delete')
                                                                    @csrf
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Order Number</th>
                                        <th >Order Amount</th>
                                        <th >Status</th>
                                        <th>Payment Method</th>
                                        <th>Create At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
@endsection
</x-admin-layout>
