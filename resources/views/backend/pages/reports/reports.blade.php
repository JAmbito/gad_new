@extends('backend.master.template')

@section('content')
    <section id="content">
        <main>

            <div class="head-title" style="margin-bottom: 35px;">
                <div class="left">
                    <h1 class="paragraph" style="letter-spacing: -.1px">Reports</h1>
                    <div class="loc-date">
                        <ul class="header-main">
                            <li style="margin-top: 6px;"><i class="fi fi-rr-file-medical-alt" style="color:#C30000; margin-left: 15px;"></i></li>
                            <li><i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i></li>
                            <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Reports</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="table2-container" id="teach-full-time-cont">
                <div class="table-data2">
                    <form method="post" action="{{ route('reports.download') }}">
                        <div class="table-pad">
                            @csrf
                            <div style="margin-bottom: 25px; margin-top: 25px">
                                @if (Auth::user()->campus)
                                    <h3>{{ Auth::user()->campus->campus_name  }}</h3>
                                @else
                                    <select class="form-control" name="campus_id" style="max-width: 30vw; font-size: 13px!important; font-family: 'sora'">
                                        <option value="">All Campuses</option>
                                        @foreach($campuses as $campus)
                                            <option value="{{$campus->id}}">{{$campus->campus_name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                                <br/>
                                <label style="font-size: 16.6px">Select reports based on the available criterias below:</label>
                                <div style="margin-top: 25px;">
                                    <input type="checkbox" onclick="selectAll(this)"/>
                                    <label>Select all</label>
                                </div>
                            </div>

                            <!-- INPUTS PARENT -->
                            <div style="margin-bottom: 10px; ">
                                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px;">
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="overall"/>
                                        <label>All employees</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="management_type"/>
                                        <label>Management Type</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="differently_abled"/>
                                        <label>Differently-abled</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="ip_groups"/>
                                        <label>From IP Groups</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="solo_parents"/>
                                        <label>Solo parents</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="young_children"/>
                                        <label>With Children Below 7 Years Old</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="diffrently_abled_children"/>
                                        <label>With Differently-abled Children</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="employment_status"/>
                                        <label>Employment Status</label>
                                    </div>
                                </div>

                                <h5 style="margin-top: 25px; margin-bottom: 15px;">Teaching Employees</h5>

                                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px;">
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="teaching_civil_status"/>
                                        <label>Civil Status</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="teaching_education_level"/>
                                        <label>Education Level</label>
                                    </div>
                                </div>

                                <h5 style="margin-top: 25px; margin-bottom: 15px;">Non-Teaching Employees</h5>

                                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px;">
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="non_teaching_civil_status"/>
                                        <label>Civil Status</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="report_types[]" value="non_teaching_education_level"/>
                                        <label>Education Level</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="insert-btn-cont" id="submit-cont-id" style="margin-top: 5px; margin-bottom: 25px;">
                            <h1 style="margin-right: auto;"></h1>
                            <button class="btn-del" type="submit" style="padding-left: 20px; padding-right: 20px; font-size: 10px; background-color: #3D9EFF; border: 1px solid #3D9EFF;">Generate</button>
                        </div>
                    </form>
                </div>
            </div>

            @include('backend.partial.header')
        </main>

    </section>
@endsection

@section('scripts')
    <script>
        function selectAll(element) {
            const checkbox = $(element);
            if (checkbox.is(':checked')) {
                $('[name="report_types[]"]').each((i, c) => {
                   $(c).attr('checked', true);
                });
            } else {
                $('[name="report_types[]"]').each((i, c) => {
                    $(c).attr('checked', false);
                });
            }
        }
    </script>
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
