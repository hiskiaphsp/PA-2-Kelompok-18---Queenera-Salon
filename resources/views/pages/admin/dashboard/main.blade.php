<x-admin-layout title="Dashboard">

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.min.css">
    @endsection
    @section('breadcrumb-title')
    <h3>Dashboard</h3>
    @endsection

    @section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    @endsection
        <div class="container-fluid">
            <div class="row size-column">
                <div class="col-sm-12 ">
                    <div class="row">
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="card small-widget mb-sm-0">
                                    <div class="card-body success"> <span class="f-light">Booking Complete</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>{{$totalBookingComplete}}</h4>
                                            <span class="font-primary f-12 f-w-500">
                                                {{-- <i class="icon-arrow-up"></i><span>+50%</span> --}}
                                            </span>
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card small-widget mb-sm-0">
                                    <div class="card-body primary"> <span class="f-light">Orders Complete</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>{{$totalOrderComplete}}</h4>
                                            <span class="font-primary f-12 f-w-500">
                                                {{-- <i class="icon-arrow-up"></i><span>+50%</span> --}}
                                            </span>
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#new-order') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card small-widget">
                                    <div class="card-body success"><span class="f-light">Total User</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>{{$totalUser}}</h4>
                                            <span class="font-info f-12 f-w-500">
                                                {{-- <i class="icon-arrow-up"></i><span>+20%</span> --}}
                                            </span>
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#customers') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card small-widget">
                                    <div class="card-body warning"><span class="f-light">Total Order</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>{{$totalOrder}}</h4>
                                            <span class="font-warning f-12 f-w-500">
                                                {{-- <i class="icon-arrow-up"></i><span>+20%</span> --}}
                                            </span>
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#bag') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card small-widget">
                                    <div class="card-body secondary"><span class="f-light">Order Amount</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h6>Rp. {{number_format($totalAmount, 2)}}</h6>
                                            {{-- <span class="font-success f-12 f-w-500"><i class="icon-arrow-up"></i><span>+80%</span></span> --}}
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#profit') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Order Amount Chart </h5>
                                </div>
                                <div class="card-body">
                                    <div id="chart-amount"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Order Chart </h5>
                                </div>
                                <div class="card-body">
                                    <div id="chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Booking Chart </h5>
                                </div>
                                <div class="card-body">
                                    <div id="chart-booking"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.min.js"></script>
    <script>
        var chartData = @json($chartData);

        var options = {
            chart: {
                type: 'bar',
                height: 350,
                stacked: false,
            },
            series: [
                { name: 'Completed', data: [] },
                { name: 'Cancelled/Rejected', data: [] },
            ],
            xaxis: {
                categories: [],
            },
            colors: ['#B5EAEA', '#FFBCBC'],
        };

        chartData.forEach(function (data) {
            options.xaxis.categories.push(data.month);
            options.series[0].data.push(data.Completed);
            options.series[1].data.push(data['Cancelled/Rejected']);
        });

        var chart = new ApexCharts(document.querySelector('#chart'), options);
        chart.render();
    </script>
    <script>
        var chartBookingData = @json($chartBookingData);

        var options = {
            chart: {
                type: 'bar',
                height: 350,
                stacked: false,
            },
            series: [
                { name: 'Completed', data: [] },
                { name: 'Cancelled/Rejected', data: [] },
            ],
            xaxis: {
                categories: [],
            },
            colors: ['#B5EAEA', '#FFBCBC'],
        };

        chartBookingData.forEach(function (data) {
            options.xaxis.categories.push(data.month);
            options.series[0].data.push(data.Completed);
            options.series[1].data.push(data['Cancelled/Rejected']);
        });

        var chart = new ApexCharts(document.querySelector('#chart-booking'), options);
        chart.render();
    </script>
    <script>
        var chartData = @json($amountData);

        var options = {
            chart: {
                type: 'area',
                height: 350,
            },
            series: [{
                name: 'Total Amount',
                data: chartData
            }],
            xaxis: {
                type: 'category'
            },
            colors: ['#FFBCBC'],
        };

        var chart = new ApexCharts(document.querySelector('#chart-amount'), options);
        chart.render();
    </script>

    @endsection
</x-admin-layout>
