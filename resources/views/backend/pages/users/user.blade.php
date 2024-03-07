@php use App\Support\RoleSupport; @endphp
@extends('backend.master.template')

@section('content')
    <section id="content">
        <main>

            <div class="head-title" style="margin-bottom: 35px;">
                <div class="left">
                    <h1 class="paragraph" style="letter-spacing: -.1px">User Account</h1>
                    <div class="loc-date">
                        <ul class="header-main">
                            <li style="margin-top: 6px;"><i class="fi fi-rr-chart-pie-alt"
                                                            style="color:#C30000; margin-left: 15px;"></i></li>
                            <li><i class="fa-solid fa-chevron-right"
                                   style="font-size: 10px; margin-left: 10px; color: #585563;"></i></li>
                            <li style="margin-top: 2px"><a href="#" class="active"
                                                           style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Users</a>
                            </li>
                            </li>
                            <li style="margin-top: 2px"><a href="#" class="active"
                                                           style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @include('backend.partial.header')

            <div class="add-user-container" id="add_data">
                <div class="add-btns btn-insert" style="margin-left: 10px">
                    <i class='bx bx-plus'></i>
                    <button>ADD ACCOUNT</button>
                </div>
            </div>

            <div style="margin-left: 30px;" class="selection-cont">
                <div class="table-pad">
                    <div class="table-header" id="header">

                        <span class="id-count-class">
                            <span
                                style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px;">
                                {{ App\User::count() }}
                            </span>
                        </span>

                        <span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;"
                              class="proj-data">All Accounts</span>

                    </div>
                </div>
            </div>
            <!-- TABLE -->
            <div class="table2-container" id="teach-full-time-cont">
                <div class="table-data2">
                    <div class="table-pad">
                        <table id="user_table" class="table table-striped" style="width:100%"></table>
                    </div>
                </div>
            </div>
            {{-- MODAL --}}
            @include('backend.partial.function.delete')

            <div id="user_modal" class="insert-cont" style="display: none;">
                <div class="insert-modal">
                    <div class="header-fixed">
                        <div class="insert-header" style="position: relative;">
                            <h4>ACCOUNT INFORMATION</h4>
                        </div>
                        <div class="insert-middle form-module">
                            <div class="form-group name">
                                <label for="status">NAME (REQUIRED)</label>
                                <input type="text" class="form-control" id="name" name="name"/>
                            </div>
                            <div class="form-group email">
                                <label for="status">EMAIL (REQUIRED)</label>
                                <input type="email" class="form-control" id="email" name="email"/>
                            </div>
                            <div class="form-group">
                                <label for="status">ROLE (REQUIRED)</label>
                                <select class="form-control" id="role" name="role" onchange="roleChanged(this.value)">
                                    <option value="" disabled>--SELECT ROLE--</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group campus_id">
                                <label for="campus">CAMPUS (REQUIRED)</label>
                                <select name="campus_id" id="campus_id" class="form-control">
                                    <option id="all_campuses" value="">ALL CAMPUSES</option>
                                    @foreach ($campus as $item)
                                        <option value="{{$item->id}}">{{$item->campus_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="action-item">
                                <button class="action-button" onclick="closeModal2()">CLOSE</button>
                                <button class="action-button primary" onclick="saveRecord()">SAVE</button>
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

        function roleChanged(role, shouldChangeCampus = true) {
            if (role === '{{ RoleSupport::ROLE_SUPERADMINISTRATOR }}') {
                $('.campus_id').hide();
            } else if (role === '{{ RoleSupport::ROLE_ADMINISTRATOR }}' || role === '') {
                $('#all_campuses').show();
                $('.campus_id').show();
            } else {
                $('#all_campuses').hide();
                if (shouldChangeCampus) {
                    const campus = $('#campus_id');
                    campus.val(
                        campus.children('option').eq(1).attr('value')
                    );
                }
            }
        }

        function edit(id) {
            action = 'update';
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/edit/' + id,
                method: 'get',
                data: {},
                success: function (data) {
                    $('.action-cont').css('display', 'none');
                    $.each(data, function () {
                        $.each(this, function (k, v) {
                            if (k === 'roles') {
                                let role = '';
                                if (v.length > 0) {
                                    role = v[0].name;
                                }

                                roleChanged(role, false);
                                $('#role').val(role);
                            } else {
                                $('#' + k).val(v);
                            }
                        });
                    });
                    $('#user_modal').show();
                }
            });
        }

        function saveRecord() {
            var data = {
                _token: '{{csrf_token()}}',
                name: $('#name').val(),
                email: $('#email').val(),
                campus_id: $('#campus_id').val(),
                role: $('#role').val(),
                action: action,
                id: hold_id
            };

            $('.error-message').remove();

            $.post('/users/save', data).done(function (response) {
                clearField();
                $('#user_modal').hide();
                toastr.success('Record saved');
                table.clear().draw();
            }).fail(function (response) {
                toastr.error('Record not saved');
                for (var field in response.responseJSON.errors) {
                    $('#' + field + "_error_message").remove();
                    $('.' + field).append('<span id="' + field + '_error_message" class="error-message">' + response.responseJSON.errors[field][0] + '</span>');
                }
            });
        }

        function clearField() {
            hold_id = null;
            action = 'save';

            roleChanged('');
            $('#name').val("");
            $('#email').val("");
            $('#role').val("");
            $('#campus_id').val("");
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
            $.get('/users/destroy/' + hold_id).done(function (response) {
                $('#confirmModal').hide();
                clearField();
                table.clear().draw();
            });
        }


        function saveStatus() {
            var data = {
                _token: "{{csrf_token()}}",
                id: hold_id,
                status: $('#status').val()
            };

            $.post('/personnel/save_status', data).done(function (response) {
                table.clear().draw();
                $('#user_modal').hide();
                toastr.success('Record Saved');
            });
        }

        function closeModal2() {
            $('#user_modal').hide();
        }

        $(function () {
            table = $('#user_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                scrollX: true,
                ajax: {
                    url: '/users/get',
                    type: 'GET'
                },
                columns: [
                    {
                        data: null,
                        title: 'ACTION',
                        render: function (data, type, row, meta) {
                            var html = '<div style="position: relative;">';
                            html += '<button data-id="1" class="btn-action"><i class="fi fi-rr-menu-dots"></i></button>';
                            html += '<div style="" class="action-cont" id="action-cont-id">';
                            html += '<div style="text-align: left;">';
                            html += '<button data-id="2" class="btn-update" onclick="edit(' + row.id + ')">Edit</button>';
                            html += '</div>';
                            html += '<div style="text-align: left;">';
                            html += '<button data-id="2" class="btn-delete" onclick="confirmDelete(' + row.id + ')">Delete</button>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            return html;
                        }
                    },
                    {data: 'name', title: 'NAME'},
                    {data: 'email', title: 'EMAIL'},
                    {
                        data: 'campus',
                        title: 'CAMPUS ACCESS LEVEL',
                        render: function (campus, type, row) {
                            if (!campus) {
                                return 'ALL CAMPUSES';
                            }

                            return campus.campus_name;
                        }
                    },
                    {
                        data: 'roles',
                        title: 'ROLE',
                        orderable: false,
                        render: function (roles, type, row) {
                            if (roles.length <= 0) {
                                return `<span>No role set<span/>`;
                            }
                            // There can only be one role per user
                            const role = roles[0];
                            return role.name;
                        }
                    },
                ]
            });
            toastr.options = {
                "debug": false,
                "positionClass": "toast-bottom-full-width",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000
            }

            $(document).on('click', '.btn-action', function () {
                $(this).parent().find('.action-cont').toggle(300);
            })

            $('#add_data').click(function () {
                clearField();
                $('#user_modal').show();
                $('.error-message').remove();
                action = 'save';
                hold_id = null;
            })

        });
    </script>
@endsection
