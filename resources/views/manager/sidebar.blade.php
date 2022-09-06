<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">

        </span>
        <span class="logo-sm">

        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">

        </span>
        <span class="logo-sm">

        </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">



            <li class="side-nav-title side-nav-item">Manager</li>




            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">

                    <span> Đơn đặt </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('order.index')}}">Chờ duyệt</a>
                    </li>
                    <li>
                        <a href="{{route('order.approve')}}">Đã duyệt</a>
                    </li>

                </ul>
            </li>
            <li class="side-nav-item">
                <a href="{{route('bill.index')}}" class="side-nav-link">

                    <span> Hóa Đơn </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">

                    <span> Quản lý sân </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('field.index')}}">Xem</a>
                    </li>
                    <li>
                        <a href="{{route('calendar.index')}}">Xem lịch sân</a>
                    </li>
                    <li>
                        <a href="{{route('field.create')}}">Thêm sân</a>
                    </li>
                    <li>
                        <a href="{{route('calendar.create')}}">Thêm lịch sân</a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">

                    <span> Thống kê </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('statistic.index')}}">Doanh thu(Ngày)</a>
                    </li>
                    <li>
                        <a href="{{route('statistic.revenue_months')}}">Doanh thu(Tháng)</a>
                    </li>

                </ul>
            </li>




    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
