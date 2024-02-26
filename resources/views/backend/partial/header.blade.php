<di v class="navbar">
<div class="nav-overlay" style="margin-right: 25px; z-index: 99999999!important;">
</div>
<nav style="z-index: 99999999!important;">
    <i class='bx bx-menu-alt-left' id="desktop-menu"></i>
    <i class='bx bx-menu-alt-left' id="mobile-menu" style="display: none;"></i>
    <form action="#">
        <div class="form-input" style="display: none;">
            <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            <input type="search" placeholder="Search . . . " id="search_input" autocomplete="off">
        </div>
        <div class="search-dropdown" id="search_list">
            <div class="dropdown-list" onclick="window.location.href='admin_list_table_view.php';">Admin Profile</div>
            <div class="dropdown-list" onclick="window.location.href='employee_list.php';">Employee Profile</div>
            <div class="dropdown-list" onclick="window.location.href='employee_leave_view.php';">Employee Leave</div>
            <div class="dropdown-list" onclick="window.location.href='attendance_table_view.php';">Employee Attendance</div>
            <div class="dropdown-list" onclick="window.location.href='schedule_employee_table_view.php';">Employee Schedule</div>
            <div class="dropdown-list" onclick="window.location.href='payslip_individual_table_view.php';" style="border-bottom: none;">Employee Payroll</div>
        </div>
    </form>


    <!-- BELL ICON -->

    @canany([
        \App\Support\RoleSupport::PERMISSION_REVIEW_PERSONNEL_STATUS,
    ])
    <div class="bell-cont" style="position: relative; cursor: pointer;" id="bell-btn">
        <i class="fa-solid fa-bell"></i>
        <span class="id-count-class" style="position: absolute; top: -13px; right: -10px;">
            <span style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px; " id="noti_number">
                {{
                    \App\Personnel::where([
                        ['campus_id','=',Auth::user()->campus_id],
                        ['status','=',\App\Support\StatusSupport::STATUS_PENDING]
                    ])->count()
                }}
            </span>
        </span>
    </div>
    @endcanany


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
        <div class="logs-2nd" onclick="window.location.href='#';">
            <i class='bx bx-user'></i>
            <h4> My Profile</h4>
        </div>
        <div class="logs-2nd" onclick="window.location.href='#';">
            <i class='bx bx-cog' ></i>
            <h4> Account Settings</h4>
        </div>
        <div class="logs-3rd">
            <i class='bx bx-log-out-circle' ></i>
            <h4 href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Log-out</h4>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</a>


<div class="notif-drop" id="notif-dropdown" style="border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;">
    <div class="notif-header">
        <span>Notifications</span>
    </div>


    <div style="height: 248px; overflow-y: auto;" id="notif-id">
        @foreach(
            \App\Personnel::where([
                ['campus_id','=',Auth::user()->campus_id],
                ['status','=',\App\Support\StatusSupport::STATUS_PENDING]
            ])->get() as $personnel
        )
            <a href="{{route('personnel.view', ['id' => $personnel->id])}}" class="notif-mid-cont">{{$personnel->firstname}} {{$personnel->lastname}} data needs review.<span>{{$personnel->updated_at}}</span></a>

        @endforeach

    </div>

    <div class="notif-header" style="border-bottom: none; border-top: 1px solid #E9E9E9; text-align: center; padding: 8px 20px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;">
{{--         <a href="View_All_Notifications.php">View All Notifications</a>--}}
    </div>

</div>

</div>


