@php use App\Support\RoleSupport; @endphp

<section id="sidebar">
    <div style="padding: 30px 25px 0px 27px;">
        <div class="bhc-img" style="overflow-x: hidden;">
            <img src="{{ asset('gad/Super_Admin/img/log123.png') }}">
            <h2 style="white-space: normal;">{{ Auth::user()->campus ? Auth::user()->campus->campus_name : 'All Campuses' }}</h2>
        </div>
    </div>
    <div class="padd-cont" style="margin-top: -70px;">

        <ul class="side-menu top">

            <div class="reports" style="margin-top: -10px;">
                <h4 class="report1">STATISTICS</h4>
            </div>
            {{--
                    <li>
                        <a href="index.php" class="side-btn">
                            <i class="fi fi-rr-home" style="margin-top: 3px;"></i>
                            <span class="text emp-chev">&nbsp; Home </span>
                        </a>
                    </li> --}}
            @can(RoleSupport::PERMSSION_READ_DASHBOARD)
                <li>
                    <a href="/dashboard" class="side-btn">
                        <i class="fi fi-rr-chart-pie-alt"></i>
                        <span class="text emp-chev">&nbsp; Dashboard </span>
                    </a>
                </li>

                <div class="reports" style="margin-top: 10px;">
                    <h4 class="report1">MANAGE</h4>
                </div>
            @endcan


            @if(RoleSupport::hasDataManagementPermissions(auth()->user()))
                <li class="">
                    <a href="#" class="dash-drop side-btn">
                        <i class="fi fi-rr-folder-open"></i>
                        <span class="text dash-chev" style="letter-spacing: .3px">&nbsp; Data Management </span>
                        <i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-right: 12px;"
                           id="chev-rotate"></i>
                        <input type="text" class="data_management_class" hidden>
                    </a>
                </li>
                <ul id="dash-dropdown" class="{{ (request()->is('campus*', 'designation*', 'management_type*', 'administrative*', 'academic_rank*', 'department*')) ? 'drop-dash' : '' }}">
                    <li class="emp-down-li emp-ac emp-paydas">
                        <a href="{{ url('campus') }}">
                            <h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
                            <span class="text ">&nbsp;Campus</span>
                            <input type="text" name="position" class="position_class" hidden>
                        </a>
                    </li>


                    <li class="emp-down-li emp-ac emp-paydas">
                        <a href="#" class="release-warehouse-drop act-hover" style="position: relative;">
                            <h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
                            <span class="text">&nbsp;Designation</span>
                            <i class="fa-solid fa-chevron-right "
                               style="font-size: 10px; position: absolute; right: 20px; transform: rotate(91deg);"
                               id="release-warehouse-chev-rotate"></i>
                            <input type="text" name="material" class="material_class" hidden>
                        </a>
                    </li>
                    <ul id="release-warehouse-dropdown">
                        <li class="emp-down-li emp-ac emp-paydas" style="height: 45px!important;">
                            <a href="{{ url('designation') }}" style="position: relative;">
                                <h4 style="color: #D5D5D5; margin-right: 5px; margin-left: 25px">—</h4>
                                <span class="text"
                                      style="letter-spacing: 0px; color: #fff">&nbsp;View Designation</span>
                            </a>
                        </li>
                        <li class="emp-down-li emp-ac emp-paydas" style="height: 45px!important;">
                            <a href="{{ url('management_type') }}">
                                <h4 style="color: #D5D5D5; margin-right: 5px; margin-left: 25px">—</h4>
                                <span class="text" style="letter-spacing: 0px;">&nbsp;Management Type</span>
                            </a>
                        </li>
                    </ul>
                    <li class="emp-down-li emp-ac emp-paydas">
                        <a href="{{ url('administrative') }}">
                            <h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
                            <span class="text ">&nbsp;Administrative Rank</span>
                            <input type="text" name="users" class="users_class" hidden>
                        </a>
                    </li>
                    <li class="emp-down-li emp-ac emp-paydas">
                        <a href="{{ url('academic_rank') }}">
                            <h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
                            <span class="text ">&nbsp;Academic Rank</span>
                            <input type="text" name="supplier" class="supplier_class" hidden>
                        </a>
                    </li>
                    <li class="emp-down-li emp-ac emp-paydas">
                        <a href="{{ url('department') }}">
                            <h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
                            <span class="text ">&nbsp;Department</span>
                            <input type="text" name="units" class="units_class" hidden>
                        </a>
                    </li>
                </ul>
            @endif


            @if(RoleSupport::hasPersonnelPermissions(auth()->user()))
                <li>
                    <a href="#" class="project-drop side-btn">
                        <i class="fi fi-rr-users"></i>
                        <span class="text emp-chev">&nbsp; Personnels </span>
                        <i class="fa-solid fa-chevron-right project_chev" style="font-size: 10px;" id="project-chev-rotate"></i>
                    </a>
                </li>
                <ul id="project-dropdown" class="{{ (request()->is('personnel*')) ? '' : 'project-dash' }}">
                    @can(RoleSupport::PERMISSION_READ_PERSONNEL)
                        <li class="emp-down-li emp-ac emp-paydas">
                            <a href="{{ url('personnel') }}">
                                <h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
                                <span class="text">&nbsp;Manage Personnels</span>
                                <input type="text" name="project_create" class="project_create_class" hidden>
                            </a>
                        </li>
                    @endcan
                        @can(RoleSupport::PERMISSION_REVIEW_PERSONNEL_STATUS)
                            <li class="emp-down-li emp-ac emp-paydas">
                                <a href="{{ route('personnel.review') }}">
                                    <h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
                                    <span class="text">&nbsp;Review Personnels</span>
                                    <input type="text" name="project_create" class="project_create_class" hidden>
                                </a>
                            </li>
                        @endcan
                    <!-- <li class="emp-down-li emp-ac emp-paydas">
                        <a href="DTM_Personnels_APPROVAL.php">
                            <h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
                            <span class="text">&nbsp;For Approval</span>
                            <input type="text" name="project_approved" class="project_approved_class" hidden>
                        </a>
                    </li> -->
                </ul>
            @endif
            @can(RoleSupport::PERMISSION_GENERATE_REPORT)
                <li>
                    <a href="/reports" class="report-drop side-btn">
                        <i class="fi fi-rr-file-medical-alt" style="font-size: 20px"></i>
                        <span class="text emp-chev">&nbsp; Generate Reports </span>
                        <input type="text" name="bom" class="bom_class" hidden>
                    </a>
                </li>
            @endif
            @if(RoleSupport::hasSystemPermissions(auth()->user()))
                <li>
                    <a href="#" class="bom-drop side-btn">
                        <i class="fi fi-rr-settings" style="font-size: 20px"></i>
                        <span class="text emp-chev">&nbsp; System </span>
                        <i class="fa-solid fa-chevron-right" style="font-size: 10px;" id="bom-chev-rotate"></i>
                        <input type="text" name="bom" class="bom_class" hidden>
                    </a>
                </li>
                <ul id="bom-dropdown" class="{{ (request()->is('users*', 'activity_logs*')) ? 'bom-dash' : '' }}">
                    <li class="emp-down-li emp-ac emp-paydas">
                        <a href="/users">
                            <h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
                            <span class="text">&nbsp;System Users</span>
                            <input type="text" name="bom_create" class="bom_create_class" hidden>
                        </a>
                    </li>
                    <li class="emp-down-li emp-ac emp-paydas">
                        <a href="/activity_logs">
                            <h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
                            <span class="text">&nbsp;Activity Logs</span>
                            <input type="text" name="bom_revise" class="bom_revise_class" hidden>
                        </a>
                    </li>
                </ul>
            @endif

            <li>
                <a href="#" onclick="document.getElementById('logout-form').submit();" class="project-drop side-btn">
                    <i class="fi fi-rr-exit" style="margin-left: 15px; font-size: 15px;"></i>
                    <span class="text emp-chev">&nbsp; Log-Out </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</section>
