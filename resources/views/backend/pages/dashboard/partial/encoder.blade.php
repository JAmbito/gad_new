@php
    use App\Support\RoleSupport;
    use App\Support\StatusSupport;
    @endphp
<div class="row">
    <div class="col-12">
        <h3>ENCODED EMPLOYEES</h3>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-12 dash-card">
        <div class="dash-title dash-warning">PENDING</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_pending">{{ $total_employees_encoded_by_status[StatusSupport::STATUS_PENDING] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 dash-card">
        <div class="dash-title dash-success">APPROVED</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_approved">{{ $total_employees_encoded_by_status[StatusSupport::STATUS_APPROVED] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 dash-card">
        <div class="dash-title dash-info">ON HOLD</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_on_hold">{{ $total_employees_encoded_by_status[StatusSupport::STATUS_ONHOLD] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 dash-card">
        <div class="dash-title">REJECTED</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_rejected">{{ $total_employees_encoded_by_status[StatusSupport::STATUS_REJECTED] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 dash-card">
        <div class="dash-title dash-dark">TOTAL</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_total">{{ $total_employees_encoded }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<!-- TABLE -->
<div class="table2-container" id="teach-full-time-cont" style="margin-left: 0px;">
    <div class="table-data2">
        <div class="table-pad">
            <table id="personnel_table" class="table table-striped" style="width:100%"></table>
        </div>
    </div>
</div>

<script>
    $(function () {
        table = $('#personnel_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            pageLength: 20,
            scrollX: true,
            ajax: {
                url: '{{ route('dashboard.personnels.get') }}',
                type: 'GET'
            },
            columns: [
                    @canany([
                        RoleSupport::PERMISSION_READ_PERSONNEL,
                    ])
                {
                    data: null, title: 'ACTION', orderable: false, render: function (data, type, row, meta) {

                        var html = '<div style="position: relative;">';
                        html += '<button data-id="1" class="btn-action"><i class="fi fi-rr-menu-dots"></i></button>';
                        html += '<div style="" class="action-cont" id="action-cont-id">';
                        @can(RoleSupport::PERMISSION_READ_PERSONNEL)
                            html += '<div style="text-align: left;">';
                        html += '<a data-id="1" class="btn-update" href="/personnel/' + row.id + '">View</a>';
                        html += '</div>';
                        @endcan
                        html += '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                    @endcanany
                {
                    data: 'firstname', title: 'firstname'
                },
                {data: 'academic_rank.academic_rank', title: 'Academic Rank'},
                {data: 'administrative_rank.administrative_rank', title: 'Administrative Rank'},
                {data: 'designation.designation', title: 'Position'},
                {data: 'department.department', title: 'Department'},
                {data: 'employee_status', title: 'Employment Status'},
                {
                    data: 'reviewed_by.name', title: 'Reviewed by', render: function (data, type, row, meta) {
                        if (data) {
                            return data;
                        }

                        return '-';
                    }
                },
                {
                    data: 'status', title: 'Status', render: function (data, type, row, meta) {
                        switch (row.status) {
                            case 0:
                                return '<span style="color:orange;">{{App\Support\StatusSupport::getLabelByStatus(0)}}</span>';
                                break;
                            case 1:
                                return '<span style="color:blue;">{{App\Support\StatusSupport::getLabelByStatus(1)}}</span>';
                                break;
                            case 2:
                                return '<span style="color:red;">{{App\Support\StatusSupport::getLabelByStatus(2)}}</span>';
                                break;
                            case 3:
                                return '<span style="color:lime;">{{App\Support\StatusSupport::getLabelByStatus(3)}}</span>';
                                break;
                        }
                    }
                },
            ]
        });

        $(document).on('click', '.btn-action', function () {
            $(this).parent().find('.action-cont').toggle(100);
        })
    });

</script>
