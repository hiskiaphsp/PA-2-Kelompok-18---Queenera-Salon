<x-admin-layout title="User">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
    @endsection
    @section('breadcrumb-title')
    <h3>User</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">User Data</li>
    @endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>List User</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{route('admin.user.create')}}" class="btn btn-primary">Create User</a>
                        </div>
                        <div class="table-responsive user-datatable">
                            <table class="display"  id="export-button">
                                <thead>
                                    <tr class="text-center">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        <th>Create At</th>
                                        <th>Update At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->nohp }}</td>
                                            <td>
                                                @foreach($item->roles as $role)
                                                    {{ $role->name }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{\Carbon\Carbon::parse($item->create_at)->format('d F Y, l \a\t H:i')}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->update_at)->format('d F Y, l \a\t H:i')}}</td>
                                            <td>
                                                <div class="dropdown-basic me-0">
                                                    <div class="btn-group dropstart">
                                                        <a class="dropdown-toggle btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                        <ul class="dropdown-menu dropdown-block">
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.user.edit', $item->id) }}">Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.user.change_role', ['id' => $item->id, 'newRole' => 'admin']) }}" onclick="event.preventDefault(); document.getElementById('change-role-form-{{ $item->id }}').submit();">
                                                                Change to Admin
                                                                </a>
                                                                <form id="change-role-form-{{ $item->id }}" action="{{ route('admin.user.change_role', ['id' => $item->id, 'newRole' => 'admin']) }}" method="POST" style="display: none;">
                                                                    @method('PUT')
                                                                    @csrf
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.user.change_role', ['id' => $item->id, 'newRole' => 'customer']) }}" onclick="event.preventDefault(); document.getElementById('change-role-to-customer-{{ $item->id }}').submit();">
                                                                Change to Customer
                                                                </a>
                                                                <form id="change-role-to-customer-{{ $item->id }}" action="{{ route('admin.user.change_role', ['id' => $item->id, 'newRole' => 'customer']) }}" method="POST" style="display: none;">
                                                                    @method('PUT')
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
                                    <tr class="text-center">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        <th>Create At</th>
                                        <th>Update At</th>
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
