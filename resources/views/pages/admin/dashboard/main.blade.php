<x-admin-layout title="Dashboard">
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/app.css') }}">
    @endsection
        <div class="container-fluid">
            <div class="row size-column">
                <div class="col-xxl-10 col-md-12 box-col-8 grid-ed-12">
                    <div class="row">
                        <div class="col-xxl-5 col-md-7 box-col-7">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card o-hidden">
                                        <div class="card-body balance-widget"><span class="f-w-500 f-light">Total Balance</span>
                                            <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22">$<span class="counter">245,154.00
                                                </span><span class="f-light f-14 f-w-400 ms-1">this month</span></h4><a
                                                class="purchase-btn btn btn-primary btn-hover-effect f-w-500" href="#">Tap
                                                Up Balance</a>
                                            <div class="mobile-right-img"><img class="left-mobile-img"
                                                    src="{{ asset('assets/images/dashboard-2/widget-img.png') }}" alt=""><img
                                                    class="mobile-img" src="{{ asset('assets/images/dashboard-2/mobile.gif') }}"
                                                    alt="mobile with coin"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card small-widget">
                                        <div class="card-body primary"> <span class="f-light">New Orders</span>
                                            <div class="d-flex align-items-end gap-1">
                                                <h4>2,435</h4><span class="font-primary f-12 f-w-500"><i
                                                        class="icon-arrow-up"></i><span>+50%</span></span>
                                            </div>
                                            <div class="bg-gradient">
                                                <svg class="stroke-icon svg-fill">
                                                    <use href="{{ asset('assets/svg/icon-sprite.svg#new-order') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card small-widget">
                                        <div class="card-body warning"><span class="f-light">New Customers</span>
                                            <div class="d-flex align-items-end gap-1">
                                                <h4>2,908</h4><span class="font-warning f-12 f-w-500"><i
                                                        class="icon-arrow-up"></i><span>+20%</span></span>
                                            </div>
                                            <div class="bg-gradient">
                                                <svg class="stroke-icon svg-fill">
                                                    <use href="{{ asset('assets/svg/icon-sprite.svg#customers') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card small-widget">
                                        <div class="card-body secondary"><span class="f-light">Average Sale</span>
                                            <div class="d-flex align-items-end gap-1">
                                                <h4>$389k</h4><span class="font-secondary f-12 f-w-500"><i
                                                        class="icon-arrow-down"></i><span>-10%</span></span>
                                            </div>
                                            <div class="bg-gradient">
                                                <svg class="stroke-icon svg-fill">
                                                    <use href="{{ asset('assets/svg/icon-sprite.svg#sale') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card small-widget">
                                        <div class="card-body success"><span class="f-light">Gross Profit</span>
                                            <div class="d-flex align-items-end gap-1">
                                                <h4>$3,908</h4><span class="font-success f-12 f-w-500"><i
                                                        class="icon-arrow-up"></i><span>+80%</span></span>
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
                        </div>
                        <div class="col-xxl-3 col-md-5 col-sm-6 box-col-5">
                            <div class="appointment">
                                <div class="card">
                                    <div class="card-header card-no-border">
                                        <div class="header-top">
                                            <h5 class="m-0">Valuable Customer</h5>
                                            <div class="card-header-right-icon">
                                                <div class="dropdown icon-dropdown">
                                                    <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="icon-more-alt"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                            href="#">Today</a><a class="dropdown-item"
                                                            href="#">Tomorrow</a><a class="dropdown-item"
                                                            href="#">Yesterday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="appointment-table customer-table table-responsive">
                                            <table class="table table-bordernone">
                                                <tbody>
                                                    <tr>
                                                        <td><img class="img-fluid img-40 rounded-circle me-2"
                                                                src="{{ asset('assets/images/dashboard/user/1.jpg') }}" alt="user"></td>
                                                        <td class="img-content-box"><a class="f-w-500"
                                                                href="{{ url('user-profile')}}">Jane Cooper</a><span
                                                                class="f-light">alma.lawson@gmail.com</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img class="img-fluid img-40 rounded-circle me-2"
                                                                src="{{ asset('assets/images/dashboard/user/2.jpg') }}" alt="user">
                                                        </td>
                                                        <td class="img-content-box"><a class="f-w-500"
                                                                href="{{ url('user-profile')}}">Cameron Willia</a><span
                                                                class="f-light">tim.jennings@gmail.com</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img class="img-fluid img-40 rounded-circle me-2"
                                                                src="{{ asset('assets/images/dashboard/user/9.jpg') }}" alt="user">
                                                        </td>
                                                        <td class="img-content-box"><a class="f-w-500"
                                                                href="{{ url('user-profile')}}">Floyd Miles</a><span
                                                                class="f-light">kenzi.lawson@gmail.com</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img class="img-fluid img-40 rounded-circle me-2"
                                                                src="{{ asset('assets/images/dashboard/user/5.jpg') }}" alt="user">
                                                        </td>
                                                        <td class="img-content-box"><a class="f-w-500"
                                                                href="{{ url('user-profile')}}">Dianne Russell</a><span
                                                                class="f-light">curtis.weaver@gmail.com</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img class="img-fluid img-40 rounded-circle me-2"
                                                                src="{{ asset('assets/images/dashboard/user/3.jpg') }}" alt="user">
                                                        </td>
                                                        <td class="img-content-box"><a class="f-w-500"
                                                                href="{{ url('user-profile')}}">Guy Hawkins</a><span
                                                                class="f-light">curtis.weaver@gmail.com</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-sm-6 box-col-6">
                            <div class="card">
                                <div class="card-header card-no-border">
                                    <h5>Monthly Profits</h5><span class="f-light f-w-500 f-14">(Total profit growth of
                                        30%)</span>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="monthly-profit">
                                        <div id="profitmonthly"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-9 box-col-12">
                            <div class="card">
                                <div class="card-header card-no-border">
                                    <h5>Order Overview</h5>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row m-0 overall-card overview-card">
                                        <div class="col-xl-9 col-md-8 col-sm-7 p-0 box-col-7">
                                            <div class="chart-right">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="card-body p-0">
                                                            <ul class="balance-data">
                                                                <li><span class="circle bg-secondary"></span><span
                                                                        class="f-light ms-1">Refunds</span></li>
                                                                <li><span class="circle bg-primary"> </span><span
                                                                        class="f-light ms-1">Earning</span></li>
                                                                <li><span class="circle bg-success"> </span><span
                                                                        class="f-light ms-1">Order</span></li>
                                                            </ul>
                                                            <div class="current-sale-container order-container">
                                                                <div class="overview-wrapper" id="orderoverview"></div>
                                                                <div class="back-bar-container">
                                                                    <div id="order-bar"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-5 p-0 box-col-5">
                                            <div class="row g-sm-3 g-2">
                                                <div class="col-md-12">
                                                    <div class="light-card balance-card widget-hover">
                                                        <div class="svg-box">
                                                            <svg class="svg-fill">
                                                                <use href="{{ asset('assets/svg/icon-sprite.svg#orders') }}"></use>
                                                            </svg>
                                                        </div>
                                                        <div> <span class="f-light">Orders</span>
                                                            <h6 class="mt-1 mb-0">10,098 </h6>
                                                        </div>
                                                        <div class="ms-auto text-end">
                                                            <div class="dropdown icon-dropdown">
                                                                <button class="btn dropdown-toggle" id="orderdropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false"><i
                                                                        class="icon-more-alt"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="orderdropdown"><a class="dropdown-item"
                                                                        href="#">Today</a><a class="dropdown-item"
                                                                        href="#">Tomorrow</a><a class="dropdown-item"
                                                                        href="#">Yesterday </a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="light-card balance-card widget-hover">
                                                        <div class="svg-box">
                                                            <svg class="svg-fill">
                                                                <use href="{{ asset('assets/svg/icon-sprite.svg#expense') }}"></use>
                                                            </svg>
                                                        </div>
                                                        <div> <span class="f-light">Earning</span>
                                                            <h6 class="mt-1 mb-0">$12,678</h6>
                                                        </div>
                                                        <div class="ms-auto text-end">
                                                            <div class="dropdown icon-dropdown">
                                                                <button class="btn dropdown-toggle" id="earningdropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false"><i
                                                                        class="icon-more-alt"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="earningdropdown"><a class="dropdown-item"
                                                                        href="#">Today</a><a class="dropdown-item"
                                                                        href="#">Tomorrow</a><a class="dropdown-item"
                                                                        href="#">Yesterday </a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="light-card balance-card widget-hover">
                                                        <div class="svg-box">
                                                            <svg class="svg-fill">
                                                                <use href="{{ asset('assets/svg/icon-sprite.svg#doller-return') }}"></use>
                                                            </svg>
                                                        </div>
                                                        <div> <span class="f-light">Refunds</span>
                                                            <h6 class="mt-1 mb-0">3,001</h6>
                                                        </div>
                                                        <div class="ms-auto text-end">
                                                            <div class="dropdown icon-dropdown">
                                                                <button class="btn dropdown-toggle" id="incomedropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false"><i
                                                                        class="icon-more-alt"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="incomedropdown"><a class="dropdown-item"
                                                                        href="#">Today</a><a class="dropdown-item"
                                                                        href="#">Tomorrow</a><a class="dropdown-item"
                                                                        href="#">Yesterday</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 box-col-6 wow zoomIn">
                            <div class="card purchase-card discover"><img class="img-fluid"
                                    src="{{ asset('assets/images/dashboard-2/discover.png') }}" alt="vector discover">
                                <div class="card-body pt-3">
                                    <h5 class="mb-1">Discover Pro</h5>
                                    <p class="f-light">Amet minim mollit non deserunt ullamco est sit aliqua dolor </p><a
                                        class="purchase-btn btn btn-hover-effect btn-primary f-w-500"
                                        href="https://1.envato.market/3GVzd" target="_blank">Update Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-sm-6 box-col-6">
                            <div class="card visitor-card">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <h5 class="m-0">Visitors<span class="f-14 font-primary f-w-500 ms-1">
                                                <svg class="svg-fill me-1">
                                                    <use href="{{ asset('assets/svg/icon-sprite.svg#user-visitor') }}"></use>
                                                </svg>(+2.8)</span></h5>
                                        <div class="card-header-right-icon">
                                            <div class="dropdown icon-dropdown">
                                                <button class="btn dropdown-toggle" id="visitorButton" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="icon-more-alt"></i></button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="visitorButton">
                                                    <a class="dropdown-item" href="#">Today</a><a class="dropdown-item"
                                                        href="#">Tomorrow</a><a class="dropdown-item"
                                                        href="#">Yesterday</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="visitors-container">
                                        <div id="visitor-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-4 box-col-12">
                            <div class="card recent-order">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <h5 class="m-0">Recent Orders</h5>
                                        <div class="card-header-right-icon">
                                            <div class="dropdown icon-dropdown">
                                                <button class="btn dropdown-toggle" id="recentButton" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="icon-more-alt"></i></button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="recentButton"><a
                                                        class="dropdown-item" href="#">Today</a><a
                                                        class="dropdown-item" href="#">Tomorrow</a><a
                                                        class="dropdown-item" href="#">Yesterday</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="recent-sliders">
                                        <div class="nav nav-pills" id="v-pills-tab" role="tablist">
                                            <button class="active frame-box" id="v-pills-shirt-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-shirt" type="button" role="tab"
                                                aria-controls="v-pills-shirt" aria-selected="true"><span
                                                    class="frame-image"><img src="{{ asset('assets/images/dashboard-2/order/1.png') }}"
                                                        alt="vector T-shirt"></span></button>
                                            <button class="frame-box" id="v-pills-television-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-television" type="button" role="tab"
                                                aria-controls="v-pills-television" aria-selected="false"><span
                                                    class="frame-image"><img src="{{ asset('assets/images/dashboard-2/order/2.png') }}"
                                                        alt="vector television"></span></button>
                                            <button class="frame-box" id="v-pills-headphone-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-headphone" type="button" role="tab"
                                                aria-controls="v-pills-headphone" aria-selected="false"><span
                                                    class="frame-image"><img src="{{ asset('assets/images/dashboard-2/order/3.png') }}"
                                                        alt="vector headphone"></span></button>
                                            <button class="frame-box" id="v-pills-chair-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-chair" type="button" role="tab"
                                                aria-controls="v-pills-chair" aria-selected="false"><span
                                                    class="frame-image"><img src="{{ asset('assets/images/dashboard-2/order/4.png') }}"
                                                        alt="vector chair"></span></button>
                                            <button class="frame-box" id="v-pills-lamp-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-lamp" type="button" role="tab"
                                                aria-controls="v-pills-lamp" aria-selected="false"><span
                                                    class="frame-image"><img src="{{ asset('assets/images/dashboard-2/order/5.png') }}"
                                                        alt="vector lamp"></span></button>
                                        </div>
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-shirt" role="tabpanel"
                                                aria-labelledby="v-pills-shirt-tab">
                                                <div class="recent-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="f-light">Item</th>
                                                                <th class="f-light">Qty</th>
                                                                <th class="f-light">Price</th>
                                                                <th class="f-light">Status</th>
                                                                <th class="f-light">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/4.png') }}"
                                                                                alt="t-shirt"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">T-shirt</a></h6>
                                                                            <span class="f-light f-12">Id : #CFDE-2163</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X1</td>
                                                                <td class="f-w-500">$56.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-success">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Verified
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$100.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/3.png') }}"
                                                                                alt="t-shirt"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Pink T-shirt</a>
                                                                            </h6><span class="f-light f-12">Id :
                                                                                #CFDE-2780</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X2</td>
                                                                <td class="f-w-500">$156.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-danger">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Rejected
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$870.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-television" role="tabpanel"
                                                aria-labelledby="v-pills-television-tab">
                                                <div class="recent-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="f-light">Item</th>
                                                                <th class="f-light">Qty</th>
                                                                <th class="f-light">Price</th>
                                                                <th class="f-light">Status</th>
                                                                <th class="f-light">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/5.png') }}"
                                                                                alt="television"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Sony</a></h6>
                                                                            <span class="f-light f-12">Id : #CFDE-2163</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X1</td>
                                                                <td class="f-w-500">$56.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-danger">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Rejected
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$390.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/6.png') }}"
                                                                                alt="television"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Samsung</a></h6>
                                                                            <span class="f-light f-12">Id : #CFDE-2780</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X2</td>
                                                                <td class="f-w-500">$100.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-success">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Verified
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$870.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-headphone" role="tabpanel"
                                                aria-labelledby="v-pills-headphone-tab">
                                                <div class="recent-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="f-light">Item</th>
                                                                <th class="f-light">Qty</th>
                                                                <th class="f-light">Price</th>
                                                                <th class="f-light">Status</th>
                                                                <th class="f-light">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/1.png') }}"
                                                                                alt="headephones"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Sony</a></h6>
                                                                            <span class="f-light f-12">Id : #CFDE-2163</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X1</td>
                                                                <td class="f-w-500">$56.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-success">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Verified
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$100.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/2.png') }}"
                                                                                alt="headephones"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Sennheiser</a>
                                                                            </h6><span class="f-light f-12">Id :
                                                                                #CFDE-2780</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X2</td>
                                                                <td class="f-w-500">$156.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-danger">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Rejected
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$100.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-chair" role="tabpanel"
                                                aria-labelledby="v-pills-chair-tab">
                                                <div class="recent-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="f-light">Item</th>
                                                                <th class="f-light">Qty</th>
                                                                <th class="f-light">Price</th>
                                                                <th class="f-light">Status</th>
                                                                <th class="f-light">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/7.png') }}"
                                                                                alt="chair"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Chair</a></h6>
                                                                            <span class="f-light f-12">Id : #CFDE-2163</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X1</td>
                                                                <td class="f-w-500">$48.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-success">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Verified
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$50.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/8.png') }}"
                                                                                alt="chair"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Office chair</a>
                                                                            </h6><span class="f-light f-12">Id :
                                                                                #CFDE-2780</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X2</td>
                                                                <td class="f-w-500">$73.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-danger">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Rejected
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$75.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-lamp" role="tabpanel"
                                                aria-labelledby="v-pills-lamp-tab">
                                                <div class="recent-table table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="f-light">Item</th>
                                                                <th class="f-light">Qty</th>
                                                                <th class="f-light">Price</th>
                                                                <th class="f-light">Status</th>
                                                                <th class="f-light">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/9.png') }}"
                                                                                alt="lamp"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Lamp</a></h6>
                                                                            <span class="f-light f-12">Id : #CFDE-2163</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X1</td>
                                                                <td class="f-w-500">$20.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-success">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Verified
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$25.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="product-content">
                                                                        <div class="order-image"><img
                                                                                src="{{ asset('assets/images/dashboard-2/order/sub-product/10.png') }}"
                                                                                alt="lamp"></div>
                                                                        <div>
                                                                            <h6 class="f-14 mb-0"><a
                                                                                    href="{{ url('order-history')}}">Bedside lamp</a>
                                                                            </h6><span class="f-light f-12">Id :
                                                                                #CFDE-2780</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">X2</td>
                                                                <td class="f-w-500">$70.00</td>
                                                                <td class="f-w-500">
                                                                    <div class="recent-status font-danger">
                                                                        <svg class="me-1">
                                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#24-hour') }}">
                                                                            </use>
                                                                        </svg>Rejected
                                                                    </div>
                                                                </td>
                                                                <td class="f-w-500">$88.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @section('script')
        <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
        <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
        <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
    @endsection
</x-admin-layout>
