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
    <!-- Full screen below md-->
    <div class="modal fade" id="exampleModalfullscreen-md" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Full Screen Below md</h1>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body dark-modal">
            <div class="large-modal-header"><i data-feather="chevrons-right"></i>
                <h6>Web Design </h6>
            </div>
            <p class="modal-padding-space">We build specialised websites for companies, list them on digital directories, and set up a sales funnel to boost ROI.</p>
            <h6>Wed Designer</h6>
            <div class="d-flex mt-3">
                <div class="flex-shrink-0"><i class="svg-modal" data-feather="arrow-right-circle"></i></div>
                <div class="flex-grow-1 ms-2">
                <p>For a site to be successful, a designer must be able to communicate their ideas, chat with a firm about what they want, and inquire about the target audience.</p>
                </div>
            </div>
            <div class="d-flex my-2">
                <div class="flex-shrink-0"><i class="svg-modal" data-feather="arrow-right-circle"></i></div>
                <div class="flex-grow-1 ms-2">
                <p class="pb-4">Most businesses employ a certain font or typography so that clients can quickly distinguish them from their rivals. Since designers now have access to a wider variety of fonts, firms may more easily and precisely communicate their brands through typography.</p>
                </div>
            </div>
            <h6>UX Designer </h6>
            <div class="d-flex mt-3">
                <div class="flex-shrink-0"><i class="svg-modal" data-feather="arrow-right-circle"></i></div>
                <div class="flex-grow-1 ms-2">
                <p>User research, persona creation, building wireframes and interactive prototypes, and testing ideas are among the common tasks of a UX designer. These duties can differ greatly between organizations.</p>
                </div>
            </div>
            <div class="d-flex mt-3">
                <div class="flex-shrink-0"><i class="svg-modal" data-feather="arrow-right-circle"></i></div>
                <div class="flex-grow-1 ms-2">
                <p>Keep in mind that you are creating solutions to particular challenges for a particular population living in a particular habitat. Always remember to correctly contextualise your thoughts and determine whether they are actually appropriate for the situation. It's sometimes necessary to concede that a digital solution is not the most appropriate choice in a certain circumstance.</p>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="button">Save changes              </button>
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
