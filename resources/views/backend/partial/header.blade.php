<div class="navbar">
    <div class="nav-overlay" style="margin-right: 25px; z-index: 99999999!important;">
    </div>
    <nav style="z-index: 99999999!important;">
        <i class='bx bx-menu-alt-left' id="desktop-menu"></i>
        <i class='bx bx-menu-alt-left' id="mobile-menu" style="display: none;"></i>
        <form action="#">
            <div class="form-input" style="display: none;">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                <input type="search" placeholder="Search . . . " id="search_input" autocomplete="off">
            </div>
            <div class="search-dropdown" id="search_list">
                <div class="dropdown-list" onclick="window.location.href='admin_list_table_view.php';">Admin Profile
                </div>
                <div class="dropdown-list" onclick="window.location.href='employee_list.php';">Employee Profile</div>
                <div class="dropdown-list" onclick="window.location.href='employee_leave_view.php';">Employee Leave
                </div>
                <div class="dropdown-list" onclick="window.location.href='attendance_table_view.php';">Employee
                    Attendance
                </div>
                <div class="dropdown-list" onclick="window.location.href='schedule_employee_table_view.php';">Employee
                    Schedule
                </div>
                <div class="dropdown-list" onclick="window.location.href='payslip_individual_table_view.php';"
                     style="border-bottom: none;">Employee Payroll
                </div>
            </div>
        </form>

        @include('backend.partial.header.notification')

        <!-- PROFILE ICON -->
        <a href="#" class="profile">
            <span class="badge"></span>
            <img src="{{ asset('gad/Super_Admin/img/user.png') }}">
        </a>

    </nav>

    <a href="#" class="profile-drop" id="prof-dropdown">
        <div class="logs">
            <h3>{{ Auth::user()->name }}<br/><small>{{ Auth::user()->email }}</small></h3>
            <h4 style="text-transform: capitalize">{{ Auth::user()->getRoleNames()[0] }}</h4>
            <div class="logs-3rd">
                <i class='bx bx-log-out-circle'></i>
                <h4 href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Log-out</h4>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </a>
</div>


