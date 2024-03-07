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
                                {{ $total_personnel_count }}
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
                    @canany([
                        RoleSupport::PERMISSION_UPDATE_PERSONNEL,
                        RoleSupport::PERMISSION_READ_PERSONNEL,
                        RoleSupport::PERMISSION_DELETE_PERSONNEL,
                    ])
                        {
                            data: null, title: 'ACTION', orderable: false, render: function (data, type, row, meta) {

                                var html = '<div style="position: relative;">';
                                html += '<button data-id="1" class="btn-action"><i class="fi fi-rr-menu-dots"></i></button>';
                                html += '<div style="" class="action-cont" id="action-cont-id">';
                                @can(RoleSupport::PERMISSION_READ_PERSONNEL)
                                    html += '<div style="text-align: left;">';
                                html += '<a data-id="1" class="btn-update" href="/personnel/' + data.personnel_information.id + '">View</a>';
                                html += '</div>';
                                @endcan
                                    @can(RoleSupport::PERMISSION_UPDATE_PERSONNEL)
                                    html += '<div style="text-align: left;">';
                                html += '<a data-id="1" class="btn-update" href="/personnel/edit/' + data.personnel_information.id + '">Edit</a>';
                                html += '</div>';
                                @endcan
                                    @can(RoleSupport::PERMISSION_UPDATE_PERSONNEL)
                                    html += '<div style="text-align: left;">';
                                html += '<button data-id="2" class="btn-delete" onclick="confirmDelete(' + data.personnel_information.id + ')">Delete</button>';
                                html += '</div>';
                                @endcan

                                    html += '</div>';
                                html += '</div>';
                                return html;
                            }
                        },
                    @endcanany
                    {data: 'personnel_information.firstname', title: 'firstname'},
                    {data: 'personnel_information.lastname', title: 'lastname'},
                    {data: 'personnel_information.academic_rank.academic_rank', title: 'Academic Rank'},
                    {data: 'personnel_information.administrative_rank.administrative_rank', title: 'Administrative Rank'},
                    {data: 'personnel_information.designation.designation', title: 'Position'},
                    {data: 'personnel_information.department.department', title: 'Department'},
                    {data: 'personnel_information.campus.campus_name', title: 'Campus'},
                    {data: 'personnel_information.employee_status', title: 'Employment Status'},
                    {
                        data: 'personnel_information.created_by.name', title: 'Created by', render: function (data, type, row, meta) {
                            if (data) {
                                return data;
                            }

                            return 'Super Admin';
                        }
                    },
                    {
                        data: 'personnel_information.reviewed_by.name', title: 'Reviewed by', render: function (data, type, row, meta) {
                            if (data) {
                                return data;
                            }

                            return '-';
                        }
                    },
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
