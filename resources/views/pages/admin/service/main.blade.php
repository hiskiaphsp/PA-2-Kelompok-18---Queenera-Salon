<x-admin-layout title="service">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    @endsection
    @section('breadcrumb-title')
    <h3>Services</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item active">Data Services</li>
    @endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>List Services</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ url('/admin/service/create') }}">Add Service</a>
                        </div>
                        <div class="table-responsive user-datatable">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Description</th>
                                        {{-- <th>Category</th> --}}
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $item)
                                    <tr>
                                        <td> <img class="img-fluid table-avtar" src="{{ asset('images/'.$item->service_image) }}"alt="">{{$item->service_name}}</td>
                                        <td>{{\Illuminate\Support\Str::limit(strip_tags($item->service_description), 400, '...')}}</td>
                                        {{-- <td>{{$item->service_name}}</td> --}}
                                        <td>{{$item->service_price}}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="{{route('admin.service.edit', $item->id)}}"><i
                                                            class="icon-pencil-alt"></i></a></li>
                                                <li class="delete">
                                                    <a href="{{route('admin.service.destroy', $item->id)}}" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }"><i class="icon-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.service.destroy', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                         <th>service Name</th>
                                        <th>Description</th>
                                        {{-- <th>Category</th> --}}
                                        <th>Price</th>
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
@endsection
</x-admin-layout>
