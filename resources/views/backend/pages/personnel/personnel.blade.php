@extends('backend.master.template')

@section('content')
<section id="content">
    <main>

        <div class="head-title" style="margin-bottom: 35px;">
            <div class="left">
                <h1 class="paragraph" style="letter-spacing: -.1px">Personnel</h1>
                <div class="loc-date">
                    <ul class="header-main">
                        <li style="margin-top: 6px;"><i class="fi fi-rr-chart-pie-alt" style="color:#C30000; margin-left: 15px;"></i></li>
                        <li><i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i></li>
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Manage</a></li></li>
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Data Management</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @include('backend.partial.header')

        <div class="add-user-container">
            <div class="add-btns btn-insert" style="margin-left: 10px">
                <i class='bx bx-plus' ></i>
                <button id="add_data">ADD PERSONNEL</button>
            </div>

        </div>

        <div style="margin-left: 30px;" class="selection-cont">
                <div class="table-pad">
                    <div class="table-header" id="header">

                        <span class="id-count-class">
                            <span style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px;">
                                {{ App\Personnel::count() }}
                            </span>
                        </span>

                        <span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;" class="proj-data">All Personnel</span>

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
    {{-- MODAL --}}
    <div id="personnel_modal" class="insert-cont" style="display: none;">
        <div class="insert-modal">
        <div class="header-fixed">
            <div class="insert-header" style="position: relative;">
            <h4>Create NEW PERSONNEL</h4>
            <div><i class='bx bx-x' id="x-close-id"></i></div>
            </div>
        </div>
            <div class="insert-middle">
                    <div>
                        <label>FIRST NAME</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <div>
                        <input type="text" id="firstname" name="firstname" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                    </div>
                    <div>
                        <label>MIDDLE NAME</label><span class="additional-span"></span>
                    </div>
                    <div>
                        <input type="text" id="middlename" name="middlename" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                    </div>
                    <div>
                        <label>LAST NAME</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <div>
                        <input type="text" id="lastname" name="lastname" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                    </div>
                    <div>
                        <label>EXTENSION</label><span class="additional-span"></span>
                    </div>
                    <div>
                        <input type="text" id="extension" name="extension" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                    </div>
                    <div>
                        <div style="margin-bottom: 13px">
                            <label>ACADEMIC RANK</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <select id="academic_rank_id" name="academic_rank_id" class="province_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="">--SELECT ACADEMIC RANK--</option>
                                @foreach ($academic_ranks as $academic_rank)
                                    <option value="{{ $academic_rank->id }}">{{ $academic_rank->academic_rank }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div style="margin-bottom: 13px">
                            <label>ADMINISTRATIVE RANK</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <select id="administrative_rank_id" name="administrative_rank_id" class="province_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="">--SELECT ADMINISTRATIVE RANK--</option>
                                @foreach ($administrative_ranks as $administrative_rank)
                                    <option value="{{ $administrative_rank->id }}">{{ $administrative_rank->administrative_rank }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <div style="margin-bottom: 13px">
                            <label>POSITION</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <select id="designation_id" name="designation_id" class="province_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="">--SELECT POSITION--</option>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <div style="margin-bottom: 13px">
                            <label>DEPARTMENT</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <select id="department_id" name="department_id" class="province_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="">--SELECT DEPARTMENT--</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <div style="margin-bottom: 13px">
                            <label>CAMPUS</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <select id="campus_id" name="campus_id" class="province_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="">--SELECT CAMPUS--</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">{{ $campus->campus_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


            </div>

            <div class="insert-btn-cont">
                <h1 style="margin-right: auto;"></h1>
                <button class="btn-del" name="sub-insert" onclick="saveRecord()">Submit</button>
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

        function edit(id){
            action = 'update';
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/personnel/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {

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

            $.post('/personnel/save', data).done(function(response){
                clearField();
                $('#personnel_modal').hide();
                toastr.success('Record saved');
                table.clear().draw();
            }).fail(function(response) {
                for (var field in response.responseJSON.errors) {
                    $('#'+field+"_error_message").remove();
                    $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
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
            $.get('/personnel/destroy/' + hold_id).done(function(response) {
                $('#confirmModal').hide();
                clearField();
                table.clear().draw();
            });
        }

        function setStatus(id){
            hold_id = id;
            $('.action-cont').css('display','none');

            $.get('/personnel/get_record/'+id, function(response) {
                var record = response.personnel;
                $('.full-name').text(record.firstname + ' ' + (record.middlename !== null && record.middlename !== ''?record.middlename+' ':'') + record.lastname);
                $('#status').val(record.status);
                $('#status_modal').show();
            });
        }

        function saveStatus() {
            var data = {
                _token: "{{csrf_token()}}",
                id: hold_id,
                status: $('#status').val()
            };

            $.post('/personnel/save_status', data).done(function(response) {
                table.clear().draw();
                $('#status_modal').hide();
                toastr.success('Record Saved');
            });
        }

        function closeModal() {
            $('#status_modal').hide();
        }

        $(function() {
            table = $('#personnel_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            pageLength: 20,
            scrollX:true,
            ajax: {
                url: '/personnel/get',
                type: 'GET'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'firstname', title: 'firstname'},
                { data: 'academic_rank.academic_rank', title: 'Academic Rank'},
                { data: 'administrative_rank.administrative_rank', title: 'Administrative Rank'},
                { data: 'designation.designation', title: 'Position'},
                { data: 'department.department', title: 'Department'},
                { data: 'campus.campus_name', title: 'Campus'},
                { data: 'employee_status', title: 'Employee Status'},
                { data: 'status', title: 'Status', render: function(data, type, row, meta) {
                    switch(row.status) {
                        case 0:
                            return '<span style="color:orange;">PENDING</span>';
                            break;
                        case 1:
                            return '<span style="color:blue;">ON-HOLD</span>';
                            break;
                        case 2:
                            return '<span style="color:red;">REJECTED</span>';
                            break;
                        case 3:
                            return '<span style="color:lime;">APPROVED</span>';
                            break;
                    }
                }},
                { data: null, title: 'ACTION', render: function(data, type, row, meta) {
                    var html = '<div style="position: relative;">';
                        html += '<button data-id="1" class="btn-action"><i class="fi fi-rr-menu-dots"></i></button>';
                        html += '<div style="" class="action-cont" id="action-cont-id">';
                        html += '<div style="text-align: left;">';
                        html += '<a data-id="1" class="button-menu btn-update" href="/personnel/edit/'+row.id+'">Edit</a>';
                        html += '</div>';
                        html += '<div style="text-align: left;">';
                        html += '<button data-id="2" class="button-menu btn-delete" onclick="confirmDelete('+row.id+')">DELETE</button>';
                        html += '<button data-id="2" class="button-menu btn-status" onclick="setStatus('+row.id+')">SET STATUS</button>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    return html;
                }},
            ]
        });

            $(document).on('click','.btn-action', function() {
                $(this).parent().find('.action-cont').toggle(300);
            })

            $('#add_data').click(function(){
                $('#personnel_modal').show();
            })

            $('#x-close-id').click(function(){
                $('#personnel_modal').hide();
            })
        });
    </script>
@endsection
