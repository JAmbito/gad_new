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
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Dashboard</a></li></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="dashboard-container">
            <div class="row">
                <div class="col-4">
                    <h5>NO. OF EMPLOYEES</h5>
                    <canvas id="employee_graph"></canvas>
                </div>
                <div class="col-8">
                    <h5>NO. OF EMPLOYEES PER MANAGEMENT TYPE</h5>
                    <canvas id="management_graph"></canvas>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-4 dash-card">
                    <div class="dash-title">NO. OF EMPLOYEES DIFFERENTLY-ABLED</div>
                    <div class="dash-value">
                        <table>
                            <thead>
                                <th class="male_text">MALE</th>
                                <th class="female_text">FEMALE</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="d_male">0</td>
                                    <td id="d_female">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4 dash-card">
                    <div class="dash-title">NO. OF EMPLOYEES FROM IP GROUPS</div>
                    <div class="dash-value">
                        <table>
                            <thead>
                                <th class="male_text">MALE</th>
                                <th class="female_text">FEMALE</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="i_male">0</td>
                                    <td id="i_female">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4 dash-card">
                    <div class="dash-title">NO. OF EMPLOYEES WHO ARE SOLO PARENTS</div>
                    <div class="dash-value">
                        <table>
                            <thead>
                                <th class="male_text">MALE</th>
                                <th class="female_text">FEMALE</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="s_male">0</td>
                                    <td id="s_female">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-3">
                    <h5>NO. OF EMPLOYEES WITH CHILDREN BELOW 7 YEARS OLD</h5>
                    <canvas id="children_graph"></canvas>
                </div>
                <div class="col-3">
                    <h5>NO. OF EMPLOYEES WITH DIFFERENTLY-ABLED CHILDREN</h5>
                    <canvas id="children_graph_d"></canvas>
                </div>
                <div class="col-6">
                    <h5>NO. OF EMPLOYEES PER EMPLOYEE STATUS</h5>
                    <table class="employee_status_tbl">
                        <thead>
                            <th></th>
                            <th>MALE</th>
                            <th>FEMALE</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="emp_status">PERMANENT EMPLOYMENT</td>
                                <td id="male_per">0</td>
                                <td id="female_per">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">CASUAL EMPLOYMENT</td>
                                <td id="male_cas">0</td>
                                <td id="female_cas">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">CONTRACT OF SERVICE OR JOB ORDER EMPLOYMENT</td>
                                <td id="male_job">0</td>
                                <td id="female_job">0</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <h5>NO. OF FACULTY MEMBERS PER CIVIL STATUS</h5>
                    <table class="employee_status_tbl">
                        <thead>
                            <th></th>
                            <th>MALE</th>
                            <th>FEMALE</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="emp_status">SINGLE</td>
                                <td id="male_single">0</td>
                                <td id="female_single">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">MARRIED</td>
                                <td id="male_married">0</td>
                                <td id="female_married">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">WIDOWED</td>
                                <td id="male_widowed">0</td>
                                <td id="female_widowed">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">SEPARATED</td>
                                <td id="male_separated">0</td>
                                <td id="female_separated">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-4 dash-card">
                    <div class="dash-title">NO. OF FACULTY WITH DOCTORATE DEGREE</div>
                    <div class="dash-value">
                        <table>
                            <thead>
                                <th class="male_text">MALE</th>
                                <th class="female_text">FEMALE</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="doc_male">0</td>
                                    <td id="doc_female">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4 dash-card">
                    <div class="dash-title">NO. OF FACULTY WITH UP TO MASTERS DEGREE</div>
                    <div class="dash-value">
                        <table>
                            <thead>
                                <th class="male_text">MALE</th>
                                <th class="female_text">FEMALE</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="masters_male">0</td>
                                    <td id="masters_female">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4 dash-card">
                    <div class="dash-title">NO. OF FACULTY WITH UP TO COLLEGE DEGREE</div>
                    <div class="dash-value">
                        <table>
                            <thead>
                                <th class="male_text">MALE</th>
                                <th class="female_text">FEMALE</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="college_male">0</td>
                                    <td id="college_female">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-12">
                    <h3>ALL ABOUT NON-TEACHING EMPLOYEES</h3>
                    <br>
                    <h5>NO. OF NONE TEACHING EMPLOYEES PER CIVIL STATUS</h5>
                    <table class="employee_status_tbl">
                        <thead>
                            <th></th>
                            <th>MALE</th>
                            <th>FEMALE</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="emp_status">SINGLE</td>
                                <td id="male_non_single" style="text-align: center;">0</td>
                                <td id="female_non_single" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">MARRIED</td>
                                <td id="male_non_married" style="text-align: center;">0</td>
                                <td id="female_non_married" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">WIDOWED</td>
                                <td id="male_non_widowed" style="text-align: center;">0</td>
                                <td id="female_non_widowed" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">SEPARATED</td>
                                <td id="male_non_separated" style="text-align: center;">0</td>
                                <td id="female_non_separated" style="text-align: center;">0</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    
                    <h5>NO. OF NONE TEACHING EMPLOYEES PER EDUCATIONAL STATUS</h5>
                    <table class="employee_status_tbl">
                        <thead>
                            <th></th>
                            <th>MALE</th>
                            <th>FEMALE</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="emp_status">DOCTORATE DEGREE</td>
                                <td id="male_non_doc" style="text-align: center;">0</td>
                                <td id="female_non_doc" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">MASTERS DEGREE</td>
                                <td id="male_non_masters" style="text-align: center;">0</td>
                                <td id="female_non_masters" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">COLLEGE DEGREE</td>
                                <td id="male_non_college" style="text-align: center;">0</td>
                                <td id="female_non_college" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">POST-SECONDARY EDUCATION</td>
                                <td id="male_non_post" style="text-align: center;">0</td>
                                <td id="female_non_post" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">SECONDARY EDUCATION</td>
                                <td id="male_non_secondary" style="text-align: center;">0</td>
                                <td id="female_non_secondary" style="text-align: center;">0</td>
                            </tr>
                            <tr>
                                <td class="emp_status">ELEMENTARY EDUCATION</td>
                                <td id="male_non_elementary" style="text-align: center;">0</td>
                                <td id="female_non_elementary" style="text-align: center;">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('backend.partial.header')
    </main>

</section>
@endsection

@section('scripts')
<script>
    $(function() {

        $.get('/dashboard/get_records', function(response) {
            var record = response;
            
            createBarGraph(
                'management_graph', 
                '', 
                ['FACULTY', 'NON-TEACHING', 'MIDDLE TO TOP MANAGMENT', 'TECHNICAL POSITIONS'], 
                [
                    [record.total_employees_managment.male.faculty, record.total_employees_managment.male.non_teaching, record.total_employees_managment.male.top_management, record.total_employees_managment.male.techincal],
                    [record.total_employees_managment.female.faculty, record.total_employees_managment.female.non_teaching, record.total_employees_managment.female.top_management, record.total_employees_managment.female.techincal]
                ],
                [
                    '#004eff6b',
                    '#ff00006b'
                ]
            );

            createPieGraph(
                'employee_graph', 
                'Count', 
                ['MALE', 'FEMALE'], 
                [record.total_employees.male, record.total_employees.female],
                [
                    '#004eff6b',
                    '#ff00006b'
                ]
            );
            
            createPolarGraph(
                'children_graph', 
                'Count', 
                ['MALE', 'FEMALE'], 
                [record.total_employees_children.male, record.total_employees_children.female],
                [
                    '#004eff6b',
                    '#ff00006b'
                ]
            );
            
            createPolarGraph(
                'children_graph_d', 
                'Count', 
                ['MALE', 'FEMALE'], 
                [record.total_employees_children_d.male, record.total_employees_children_d.female],
                [
                    '#004eff6b',
                    '#ff00006b'
                ]
            );

            // ===============================================================================
            $('#d_male').text(record.total_employees_questions.male.differently_able);
            $('#i_male').text(record.total_employees_questions.male.ip_groups);
            $('#s_male').text(record.total_employees_questions.male.solo_parents);

            $('#d_female').text(record.total_employees_questions.female.differently_able);
            $('#i_female').text(record.total_employees_questions.female.ip_groups);
            $('#s_female').text(record.total_employees_questions.female.solo_parents);
            
            // ===============================================================================
            $('#male_per').text(record.total_employees_status.male.permanent);
            $('#male_cas').text(record.total_employees_status.male.casual);
            $('#male_job').text(record.total_employees_status.male.job_order);

            $('#female_per').text(record.total_employees_status.female.permanent);
            $('#female_cas').text(record.total_employees_status.female.casual);
            $('#female_job').text(record.total_employees_status.female.job_order);

            // ===============================================================================
            $('#male_single').text(record.total_employees_civil.male.single);
            $('#male_married').text(record.total_employees_civil.male.married);
            $('#male_separated').text(record.total_employees_civil.male.separated);
            $('#male_widowed').text(record.total_employees_civil.male.widowed);

            $('#female_single').text(record.total_employees_civil.female.single);
            $('#female_married').text(record.total_employees_civil.female.married);
            $('#female_separated').text(record.total_employees_civil.female.separated);
            $('#female_widowed').text(record.total_employees_civil.female.widowed);

            // ===============================================================================
            $('#doc_male').text(record.total_faculty_education.male.doctorate);
            $('#masters_male').text(record.total_faculty_education.male.masters);
            $('#college_male').text(record.total_faculty_education.male.college);

            $('#doc_female').text(record.total_faculty_education.female.doctorate);
            $('#masters_female').text(record.total_faculty_education.female.masters);
            $('#college_female').text(record.total_faculty_education.female.college);

            // ===============================================================================
            $('#male_non_single').text(record.total_non_teaching_status.male.single);
            $('#male_non_married').text(record.total_non_teaching_status.male.married);
            $('#male_non_widowed').text(record.total_non_teaching_status.male.widowed);
            $('#male_non_separated').text(record.total_non_teaching_status.male.separated);

            $('#female_non_single').text(record.total_non_teaching_status.female.single);
            $('#female_non_married').text(record.total_non_teaching_status.female.married);
            $('#female_non_widowed').text(record.total_non_teaching_status.female.widowed);
            $('#female_non_separated').text(record.total_non_teaching_status.female.separated);

            // ===============================================================================
            $('#male_non_doc').text(record.total_non_teaching_education.male.doctorate);
            $('#male_non_masters').text(record.total_non_teaching_education.male.masters);
            $('#male_non_college').text(record.total_non_teaching_education.male.college);
            $('#male_non_post').text(record.total_non_teaching_education.male.post_secondary);
            $('#male_non_secondary').text(record.total_non_teaching_education.male.secondary);
            $('#male_non_elementary').text(record.total_non_teaching_education.male.elementary);

            $('#female_non_doc').text(record.total_non_teaching_education.female.doctorate);
            $('#female_non_masters').text(record.total_non_teaching_education.female.masters);
            $('#female_non_college').text(record.total_non_teaching_education.female.college);
            $('#female_non_post').text(record.total_non_teaching_education.female.post_secondary);
            $('#female_non_secondary').text(record.total_non_teaching_education.female.secondary);
            $('#female_non_elementary').text(record.total_non_teaching_education.female.elementary);

        });
    });
        
    function createPieGraph(id, title, labels, data, bg) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: title,
                    data: data,
                    fill: false,
                    backgroundColor: bg,
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }
    
    function createPolarGraph(id, title, labels, data, bg) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: title,
                    data: data,
                    fill: false,
                    backgroundColor: bg,
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
    }
    
    function createBarGraph(id, title, labels, data, bg) {
        const ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: 'MALE',
                    data: data[0],
                    fill: false,
                    backgroundColor: '#004eff6b',
                    borderWidth: 1
                },{
                    axis: 'y',
                    label: 'FEMALE',
                    data: data[1],
                    fill: false,
                    backgroundColor: '#ff00006b',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                indexAxis: 'x',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: 'darkred', }
                    }
                }
            }
        });
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
    margin: 15px;
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