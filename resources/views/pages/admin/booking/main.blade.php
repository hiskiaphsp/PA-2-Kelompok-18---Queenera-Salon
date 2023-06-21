<x-admin-layout title="Booking">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
    @endsection
    @section('breadcrumb-title')
    <h3>Booking</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Booking</li>
        <li class="breadcrumb-item active">Booking Data</li>
    @endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Booking</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ route('admin.booking.create') }}">Create Booking</a>
                        </div>
                        <div class="table-responsive user-datatable">
                            <table class="display"  id="export-button">
                                <thead>
                                    <tr class="text-center">
                                        <th>Username</th>
                                        <th >Service Name</th>
                                        <th >Start Time</th>
                                        <th >End Time</th>
                                        <th>Booking Code</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking as $item)
                                        <tr>
                                            <td>{{$item->username}}</td>
                                            <td>{{$item->service_name}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->start_booking_date)->format('d F Y, l \a\t H:i')}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->end_booking_date)->format('d F Y, l \a\t H:i')}}</td>
                                            <td>{{$item->booking_code}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <div class="dropdown-basic me-0">
                                                    <div class="btn-group dropstart">
                                                        <a class="dropdown-toggle btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                        <ul class="dropdown-menu dropdown-block">
                                                        @if ($item->status == "Accepted" || $item->status =="Paid")
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.booking.complete', $item->id) }}" onclick="event.preventDefault(); document.getElementById('complete-booking-form').submit();">Complete</a>
                                                                <form id="complete-booking-form" action="{{ route('admin.booking.complete',$item->id) }}" method="POST" style="display: none;">
                                                                    @method('PUT')
                                                                    @csrf
                                                                </form>
                                                            </li>
                                                            @if($item->status == "Accepted" || $item->status == 'Unpaid')
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('admin.booking.cancel', ['id' => $item->id]) }}" onclick="event.preventDefault(); document.getElementById('cancel-booking-form').submit();">Cancel</a>
                                                                    <form id="cancel-booking-form" action="{{ route('admin.booking.cancel', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                                        @method('PUT')
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                            @endif
                                                        @endif
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.booking.edit', $item->id) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); confirmDelete('{{ $item->id }}');">Delete</a>
                                                            <form id="delete-booking-form-{{ $item->id }}" action="{{ route('admin.booking.delete', ['id' => $item->id]) }}" method="POST" style="display: none;">
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
                                        <th>Username</th>
                                        <th >Service Name</th>
                                        <th >Start Time</th>
                                        <th >End Time</th>
                                        <th>Booking Code</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
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
    <script>
        function confirmDelete(bookingId) {
            Swal.fire({
                title: "Confirmation",
                text: "Are you sure you want to delete this booking?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form
                    document.getElementById('delete-booking-form-' + bookingId).submit();
                }
            });
        }
    </script>
@endsection
</x-admin-layout>
