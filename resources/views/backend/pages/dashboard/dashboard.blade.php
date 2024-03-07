@extends('backend.master.template')

@section('content')
<section id="content">
    <main>

        <div class="head-title" style="margin-bottom: 35px;">
            <div class="left">
                <h1 class="paragraph" style="letter-spacing: -.1px">Dashboard</h1>
                <div class="loc-date">
                    <ul class="header-main">
                        <li style="margin-top: 6px;"><i class="fi fi-rr-chart-pie-alt" style="color:#C30000; margin-left: 15px;"></i></li>
                        <li><i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i></li>
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="dashboard-container">
            @if(Auth::user()->hasRole(App\Support\RoleSupport::ROLE_ENCODER))
                @include('backend.pages.dashboard.partial.encoder')
            @elseif(Auth::user()->hasRole(App\Support\RoleSupport::ROLE_APPROVER))
                @include('backend.pages.dashboard.partial.approver')
            @elseif(Auth::user()->hasRole([App\Support\RoleSupport::ROLE_SUPERADMINISTRATOR, App\Support\RoleSupport::ROLE_ADMINISTRATOR]))
                @include('backend.pages.dashboard.partial.administrator')
            @endif
        </div>

        @include('backend.partial.header')
    </main>

</section>
@endsection

@section('scripts')

@endsection



@section('styles')
<style>
.dashboard-container .row {
    display: flex !important;
}

.dash-card {
    padding: 15px 20px;
    background: #fff;
    margin-right: 30px;
    border-radius: 10px;
}

.dash-title {
    padding: 5px 10px;
    font-size: 18px;
    text-align: center;
    background: #f54b55;
    color: #fff;
    border-radius: 5px;
    margin-bottom: 10px;
}

.dash-title.dash-error {
    background: #f54b55;
}

.dash-title.dash-success {
    background: #34DA54;
}

.dash-title.dash-warning {
    background: orange;
}

.dash-title.dash-info {
    background: #4573dc;
}

.dash-title.dash-dark {
    background: black;
}

.dash-value table {
    width: 100%;
    text-align: center;
}

.dash-value th {
    font-size: 20px;
}

th.male_text {
    color: #4573dc;
}

th.female_text {
    color: #dc456c;
}
.dash-value tbody td {
    font-size: 40px;
}
table.employee_status_tbl {
    width: 100%;
    background: #fff;
    border-spacing: 0;
}
table.employee_status_tbl th {
    padding: 10px;
    background: #f54b55;
    color: #fff;
    border: 0px;
}
table.employee_status_tbl tbody td {
    padding: 10px;
    font-size: 15px;
}
td.emp_status {
    background: #f88d8d;
    color: #ffff;
}
</style>
@endsection
