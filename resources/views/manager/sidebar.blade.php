<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
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
                    <li>
                        <a href="apps-ecommerce-orders.html">Đơn hủy</a>
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
                    <li>
                        <a href="apps-projects-gantt.html">Gantt <span
                                class="badge badge-pill badge-light-lighten font-10 float-right">New</span></a>
                    </li>
                    <li>
                        <a href="apps-projects-add.html">Create Project <span
                                class="badge badge-pill badge-success-lighten font-10 float-right">New</span></a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item">
                <a href="apps-social-feed.html" class="side-nav-link">

                    <span> Social Feed </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">

                    <span> Tasks </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="apps-tasks.html">List</a>
                    </li>
                    <li>
                        <a href="apps-tasks-details.html">Details</a>
                    </li>
                    <li>
                        <a href="apps-kanban.html">Kanban Board</a>
                    </li>
                </ul>
            </li>


    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
