@php use App\Support\RoleSupport; @endphp
@extends('backend.master.template')

@section('content')
    <section id="content">
        <main>

            <div class="head-title" style="margin-bottom: 35px;">
                <div class="left">
                    <h1 class="paragraph" style="letter-spacing: -.1px">Personnel</h1>
                    <div class="loc-date">
                        <ul class="header-main">
                            <li style="margin-top: 6px;"><i class="fi fi-rr-chart-pie-alt"
                                                            style="color:#C30000; margin-left: 15px;"></i></li>
                            <li><i class="fa-solid fa-chevron-right"
                                   style="font-size: 10px; margin-left: 10px; color: #585563;"></i></li>
                            <li style="margin-top: 2px"><a href="#" class="active"
                                                           style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Manage</a>
                            </li>
                            <li style="margin-top: 2px"><a href="#" class="active"
                                                           style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Data
                                    Management</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            @include('backend.partial.header')

            @can(RoleSupport::PERMISSION_CREATE_PERSONNEL)
                <div class="add-user-container">
                    <a class="add-btns btn-insert" href="{{ route('personnel.create') }}" style="margin-left: 10px">
                        <i class='bx bx-plus'></i>
                        <button>ADD PERSONNEL</button>
                    </a>

                </div>
            @endcan

            <div style="margin-left: 30px;" class="selection-cont">
                <div class="table-pad">
                    <div class="table-header" id="header">

                        <span class="id-count-class">
                            <span
                                style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px;">
                                {{ App\Personnel::count() }}
                            </span>
                        </span>

                        <span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;"
                              class="proj-data">All Personnel</span>

                    </div>
                </div>
            </div>
            <!-- TABLE -->
            <div class="table2-container" id="teach-full-time-cont">
                <div class="table-data2">
                    <div class="table-pad">
                        <table id="personnel_table" class="table table-striped" style="width:100%"></table>
                    </div>
                </div>
            </div>
            @include('backend.partial.function.delete')

            <div id="status_modal" class="insert-cont" style="display: none;">
                <div class="insert-modal">
                    <div class="header-fixed">
                        <div class="insert-header" style="position: relative;">
                            <h4>SET STATUS</h4>
                        </div>
                        <div class="set_status">
                            <div class="label">FULL NAME:</div>
                            <div class="full-name">-</div>
                            <div class="form-group">
                                <label for="status">STATUS</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0">PENDING</option>
                                    <option value="1">ON-HOLD</option>
                                    <option value="2">REJECTED</option>
                                    <option value="3">APPROVED</option>
                                </select>
                            </div>
                            <div class="action-item">
                                <button class="action-button" onclick="closeModal()">CLOSE</button>
                                <button class="action-button primary" onclick="saveStatus()">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </section>
@endsection

@section('scripts')
    <script>
        var table;
        var action = 'save';
        var hold_id = null;

        function edit(id) {
            action = 'update';
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/personnel/edit/' + id,
                method: 'get',
                data: {},
                success: function (data) {

                }
            });
        }

        function saveRecord() {
            var data = {
                _token: '{{csrf_token()}}',
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                lastname: $('#lastname').val(),
                extension: $('#extension').val(),
                academic_rank_id: $('#academic_rank_id').val(),
                administrative_rank_id: $('#administrative_rank_id').val(),
                designation_id: $('#designation_id').val(),
                department_id: $('#department_id').val(),
                campus_id: $('#campus_id').val(),
                action: action,
                id: hold_id
            };

            $('.error-message').remove();

            $.post('/personnel/save', data).done(function (response) {
                clearField();
                $('#personnel_modal').hide();
                toastr.success('Record saved');
                table.clear().draw();
            }).fail(function (response) {
                for (var field in response.responseJSON.errors) {
                    $('#' + field + "_error_message").remove();
                    $('.' + field).append('<span id="' + field + '_error_message" class="error-message">' + response.responseJSON.errors[field][0] + '</span>');
                }
                toastr.error(response.responseJSON.message);
            });
        }

        function clearField() {
            hold_id = null;
            action = 'save';

            $('#personnel').val("");
        }

        function confirmDelete(id) {
            hold_id = id;
            action = 'delete';
            $('#confirmModal').show();
        }

        function closeModal() {
            $('#confirmModal').hide();
        }

        function deleteRecord() {
            $.get('/personnel/destroy/' + hold_id).done(function (response) {
                $('#confirmModal').hide();
                clearField();
                table.clear().draw();
            });
        }

        $(function () {
            table = $('#personnel_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                scrollX: true,
                ajax: {
                    url: '/personnel/get',
                    type: 'GET'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'firstname', title: 'firstname'},
                    {data: 'academic_rank.academic_rank', title: 'Academic Rank'},
                    {data: 'administrative_rank.administrative_rank', title: 'Administrative Rank'},
                    {data: 'designation.designation', title: 'Position'},
                    {data: 'department.department', title: 'Department'},
                    {data: 'campus.campus_name', title: 'Campus'},
                    {data: 'employee_status', title: 'Employment Status'},
                    {
                        data: 'created_by.name', title: 'Created by', render: function (data, type, row, meta) {
                            if (data) {
                                return data;
                            }

                            return 'Super Admin';
                        }
                    },
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
                        @can(RoleSupport::PERMISSION_REVIEW_PERSONNEL_STATUS)
                    {
                        data: null,
                        title: '<div class="text-center">STATUS ACTION</div>',
                        render: function (data, type, row, meta) {

                            var html = '<div style="position: relative;" class="text-center">';
                            html += '<a href="/personnel/'+row.id+'" data-id="1" class="btn-action">Review</a>';
                            html += '</div>';
                            return html;
                        }
                    },
                        @endcan
                        @canany([
                            RoleSupport::PERMISSION_UPDATE_PERSONNEL,
                            RoleSupport::PERMISSION_READ_PERSONNEL,
                            RoleSupport::PERMISSION_DELETE_PERSONNEL,
                        ])
                    {
                        data: null, title: 'ACTION', render: function (data, type, row, meta) {

                            var html = '<div style="position: relative;">';
                            html += '<button data-id="1" class="btn-action"><i class="fi fi-rr-menu-dots"></i></button>';
                            html += '<div style="" class="action-cont" id="action-cont-id">';
                            @can(RoleSupport::PERMISSION_READ_PERSONNEL)
                                html += '<div style="text-align: left;">';
                                html += '<a data-id="1" class="button-menu btn-update" href="/personnel/' + row.id + '">View</a>';
                                html += '</div>';
                            @endcan
                            @can(RoleSupport::PERMISSION_UPDATE_PERSONNEL)
                                html += '<div style="text-align: left;">';
                                html += '<a data-id="1" class="button-menu btn-update" href="/personnel/edit/' + row.id + '">Edit</a>';
                                html += '</div>';
                            @endcan
                            @can(RoleSupport::PERMISSION_UPDATE_PERSONNEL)
                                html += '<div style="text-align: left;">';
                                html += '<button data-id="2" class="button-menu btn-delete" onclick="confirmDelete(' + row.id + ')">DELETE</button>';
                                html += '</div>';
                            @endcan

                            html += '</div>';
                            html += '</div>';
                            return html;
                        }
                    },
                    @endcanany
                ]
            });

            $(document).on('click', '.btn-action', function () {
                $(this).parent().find('.action-cont').toggle(100);
            })

            $('#add_data').click(function () {
                $('#personnel_modal').show();
            })

            $('#x-close-id').click(function () {
                $('#personnel_modal').hide();
            })
        });
    </script>
@endsection
