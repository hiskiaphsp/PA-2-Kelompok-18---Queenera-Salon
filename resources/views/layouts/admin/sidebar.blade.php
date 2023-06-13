    <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
      <div class="logo-wrapper"><a href="{{ url('admin/dashboard')}}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/queen2.jpg') }}" width="90" height="20" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/queen2.jpg') }}" width="90 alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="{{ url('/')}}"><img class="img-fluid" src="{{ asset('assets/images/logo/queen1.jpg') }}" alt="" width="35" height="35"></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ url('/admin/product') }}">
                    <i data-feather="package"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link active" href="{{ url('admin/service') }}">
                    <i data-feather="briefcase"></i>
                    <span>Service</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ url('admin/booking') }}">
                    <i data-feather="book-open"></i>
                    <span>Booking</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ url('admin/order') }}">
                    <i data-feather="shopping-cart"></i>
                    <span>Order</span>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ url('admin/user') }}">
                    <i data-feather="users"></i>
                    <span>User</span>
                </a>
            </li>
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
