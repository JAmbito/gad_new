@php
    use App\Personnel;
    use App\PersonnelEducational;
@endphp
<div class="row" style="margin-top: 0; margin-bottom: 25px">
    <h3>{{ Auth::user()->campus ? Auth::user()->campus->campus_name : 'All Campuses' }}</h3>
</div>
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
        <h5>NO. OF EMPLOYEES PER EMPLOYMENT STATUS</h5>
        <table class="employee_status_tbl">
            <thead>
            <th></th>
            <th>MALE</th>
            <th>FEMALE</th>
            </thead>
            <tbody>

            @foreach(Personnel::EMPLOYEE_STATUSES as $employmentStatus)
                <tr>
                    <td class="emp_status">{{ $employmentStatus }} EMPLOYMENT</td>
                    <td id="MALE_{{ str_replace(' ', '_', $employmentStatus) }}">0</td>
                    <td id="FEMALE_{{ str_replace(' ', '_', $employmentStatus) }}">0</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
        <h5>NO. OF TEACHING EMPLOYEES PER CIVIL STATUS</h5>
        <table class="employee_status_tbl">
            <thead>
            <th></th>
            <th>MALE</th>
            <th>FEMALE</th>
            </thead>
            <tbody>
            @foreach(Personnel::CIVIL_STATUSES as $civilStatus)
                <tr>
                    <td class="emp_status">{{ $civilStatus }}</td>
                    <td id="MALE_TEACHING_{{ str_replace(' ', '_', $civilStatus) }}">0</td>
                    <td id="FEMALE_TEACHING_{{ str_replace(' ', '_', $civilStatus) }}">0</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>
<br>
<div class="row">
    @foreach(PersonnelEducational::ALL_TEACHING_EDUCATION_LEVELS as $teachingEducationLevel)
        <div class="col-4 dash-card">
            <div class="dash-title">NO. OF TEACHING EMPLOYEES WITH {{$teachingEducationLevel}}</div>
            <div class="dash-value">
                <table>
                    <thead>
                    <th class="male_text">MALE</th>
                    <th class="female_text">FEMALE</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="MALE_TEACHING_{{ str_replace(' ', '_', $teachingEducationLevel) }}">0</td>
                        <td id="FEMALE_TEACHING_{{ str_replace(' ', '_', $teachingEducationLevel) }}">0</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
<br>
<br>
<div class="row">
    <div class="col-12">
        <h3>ALL ABOUT NON-TEACHING EMPLOYEES</h3>
        <br>
        <h5>NO. OF NON-TEACHING EMPLOYEES PER CIVIL STATUS</h5>
        <table class="employee_status_tbl">
            <thead>
            <th></th>
            <th>MALE</th>
            <th>FEMALE</th>
            </thead>
            <tbody>
            @foreach(Personnel::CIVIL_STATUSES as $civilStatus)
                <tr>
                    <td class="emp_status">{{ $civilStatus }}</td>
                    <td id="MALE_NON_TEACHING_{{ str_replace(' ', '_', $civilStatus) }}">0</td>
                    <td id="FEMALE_NON_TEACHING_{{ str_replace(' ', '_', $civilStatus) }}">0</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>

        <h5>NO. OF NON-TEACHING EMPLOYEES PER EDUCATIONAL LEVEL</h5>
        <table class="employee_status_tbl">
            <thead>
            <th></th>
            <th>MALE</th>
            <th>FEMALE</th>
            </thead>
            <tbody>
            @foreach(PersonnelEducational::ALL_EDUCATION_LEVELS as $educationLevel)
                <tr>
                    <td class="emp_status">{{ $educationLevel }}</td>
                    <td id="MALE_NON_TEACHING_{{ str_replace(' ', '_', $educationLevel) }}" style="text-align: center;">0</td>
                    <td id="FEMALE_NON_TEACHING_{{ str_replace(' ', '_', $educationLevel) }}" style="text-align: center;">0</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function () {

        $.get('/dashboard/get_records', function (response) {
            var record = response;

            let managementTypes = Object.keys(record.total_employees_by_gender_by_management_type.male);
            managementTypes = $.map(managementTypes, (managementType) => {
                return managementType.toUpperCase();
            });

            let totalMaleByManagementType = Object.values(record.total_employees_by_gender_by_management_type.male);
            let totalFemaleByManagementType = Object.values(record.total_employees_by_gender_by_management_type.female);
            createBarGraph(
                'management_graph',
                '',
                managementTypes,
                [
                    totalMaleByManagementType,
                    totalFemaleByManagementType
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
                [record.total_employees_by_gender.male, record.total_employees_by_gender.female],
                [
                    '#004eff6b',
                    '#ff00006b'
                ]
            );

            createPolarGraph(
                'children_graph',
                'Count',
                ['MALE', 'FEMALE'],
                [record.total_employees_with_young_children_by_gender.male, record.total_employees_with_young_children_by_gender.female],
                [
                    '#004eff6b',
                    '#ff00006b'
                ]
            );

            createPolarGraph(
                'children_graph_d',
                'Count',
                ['MALE', 'FEMALE'],
                [record.total_employees_with_disabled_children_by_gender.male, record.total_employees_with_disabled_children_by_gender.female],
                [
                    '#004eff6b',
                    '#ff00006b'
                ]
            );

            // ===============================================================================
            $('#d_male').text(record.total_disabled_employees_by_gender.male);
            $('#d_female').text(record.total_disabled_employees_by_gender.female);

            $('#i_male').text(record.total_indigenous_employees_by_gender.male);
            $('#i_female').text(record.total_indigenous_employees_by_gender.female);

            $('#s_male').text(record.total_solo_parent_employees_by_gender.male);
            $('#s_female').text(record.total_solo_parent_employees_by_gender.female);

            // ===============================================================================
            let employmentStatuses = Object.keys(record.total_employees_by_gender_by_employment_status.male);
            employmentStatuses = $.map(employmentStatuses, (employmentStatus) => {
                return employmentStatus.toUpperCase();
            });

            employmentStatuses.forEach((employmentStatus) => {
                $(`#MALE_${employmentStatus.replaceAll(' ', '_')}`).text(record.total_employees_by_gender_by_employment_status.male[employmentStatus]);
                $(`#FEMALE_${employmentStatus.replaceAll(' ', '_')}`).text(record.total_employees_by_gender_by_employment_status.female[employmentStatus]);
            });

            let civilStatuses = Object.keys(record.total_teaching_employees_by_gender_by_civil_status.male);
            civilStatuses = $.map(civilStatuses, (civilStatus) => {
                return civilStatus.toUpperCase();
            });

            civilStatuses.forEach((civilStatus) => {
                $(`#MALE_TEACHING_${civilStatus.replaceAll(' ', '_')}`).text(record.total_teaching_employees_by_gender_by_civil_status.male[civilStatus]);
                $(`#FEMALE_TEACHING_${civilStatus.replaceAll(' ', '_')}`).text(record.total_teaching_employees_by_gender_by_civil_status.female[civilStatus]);
            });

            let teachingEducationLevels = Object.keys(record.total_teaching_employees_by_gender_by_education_level.male);
            teachingEducationLevels = $.map(teachingEducationLevels, (teachingEducationLevel) => {
                return teachingEducationLevel.toUpperCase();
            });

            teachingEducationLevels.forEach((teachingEducationLevel) => {
                $(`#MALE_TEACHING_${teachingEducationLevel.replaceAll(' ', '_')}`).text(record.total_teaching_employees_by_gender_by_education_level.male[teachingEducationLevel]);
                $(`#FEMALE_TEACHING_${teachingEducationLevel.replaceAll(' ', '_')}`).text(record.total_teaching_employees_by_gender_by_education_level.female[teachingEducationLevel]);
            });

            civilStatuses.forEach((civilStatus) => {
                $(`#MALE_NON_TEACHING_${civilStatus.replaceAll(' ', '_')}`).text(record.total_non_teaching_employees_by_gender_by_civil_status.male[civilStatus]);
                $(`#FEMALE_NON_TEACHING_${civilStatus.replaceAll(' ', '_')}`).text(record.total_non_teaching_employees_by_gender_by_civil_status.female[civilStatus]);
            });

            // ===============================================================================
            let allEducationLevels = Object.keys(record.total_non_teaching_employees_by_gender_by_education_level.male);
            allEducationLevels = $.map(allEducationLevels, (educationLevel) => {
                return educationLevel.toUpperCase();
            });

            allEducationLevels.forEach((educationLevel) => {
                $(`#MALE_NON_TEACHING_${educationLevel.replaceAll(' ', '_')}`).text(record.total_non_teaching_employees_by_gender_by_education_level.male[educationLevel]);
                $(`#FEMALE_NON_TEACHING_${educationLevel.replaceAll(' ', '_')}`).text(record.total_non_teaching_employees_by_gender_by_education_level.female[educationLevel]);
            });

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
                        labels: {color: 'darkred',}
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
                        labels: {color: 'darkred',}
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
                }, {
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
                        labels: {color: 'darkred',}
                    }
                }
            }
        });
    }

</script>
