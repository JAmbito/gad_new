@php use App\Support\StatusSupport; @endphp
@extends('backend.master.template')
@section('links')

@endsection


@section('content')

    <section id="content">
        @include('backend.partial.header')

        <main>
            <div class="table2-container" style="margin-top: 30px; padding-bottom: 5px;">

                <div class="return-class">
                    <a href="DTM_Personnels.php"><i class='bx bx-arrow-back'></i></a>
                    <input type="hidden" id="personnel_id" value="{{ $personnel->id }} ">
                </div>
                <div id="bom-details-parent-id" style="padding-bottom: 1px; padding-top: 27px;">
                    <!-- CREATE BOM CONTAINER -->
                    <div id="create-bom-cont-id"
                         style="border: 0px solid #A2A2A2; border-radius: 6px; padding: 20px 30px 20px 30px; margin-bottom: -23px; margin-top: 10px;">

                        <div id="bom-details-parent-id1" style="border: none;">

                            <div style="margin-bottom: 28px; margin-top: -40px; margin-bottom: 5px;">
                                <label style="font-size: 18px; text-decoration: underline;">REVIEW PERSONNEL</label>
                            </div>

                        </div>
                        @include('backend.pages.personnel.review.personal_info')
                        @include('backend.pages.personnel.view.family')
                        @include('backend.pages.personnel.view.children')
                        @include('backend.pages.personnel.view.educational')
                        @include('backend.pages.personnel.view.civil_service')
                        @include('backend.pages.personnel.view.work_experience')
                        @include('backend.pages.personnel.view.voluntary_work')
                        @include('backend.pages.personnel.view.learning')
                        @include('backend.pages.personnel.view.other_info')
                    </div>
                </div>
            </div>

            <div id="rejectModal" class="delete-cont">
                <div class="delete-modal">
                    <div class="delete-header">
                        <i class="las la-exclamation-triangle"></i>
                        <h4>Reject Personnel Data</h4>
                    </div>
                    <div class="delete-middle">
                        <h4>Please put a reason for rejection</h4>
                        <textarea id="reject_reason" class="form-control" style="margin-top: 25px" rows="5"></textarea>
                    </div>
                    <div class="delete-btn-cont">
                        <h1 style="margin-right: auto;"></h1>
                        <span class="btn-cancel" id="cancel-btn" onclick="closeModal()">CANCEL</span>
                        <button class="btn-del" name="sub_delete" onclick="confirmReject(this)">PROCEED</button>
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
        var children_data = [];
        var educational_data = [];
        var service_data = [];
        var work_data = [];
        var voluntary_data = [];
        var learning_data = [];
        var hobby_data = [];
        var academic_data = [];
        var membership_data = [];

        function edit_personnel(id) {
            action = 'update';
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/personnel/edit_personnel/' + id,
                method: 'get',
                data: {},
                success: function (data) {
                    $.each(data, function () {
                        $.each(this, function (k, v) {
                            if (v === null || v === '') {
                                v = '-';
                            }
                            $('#' + k).text(v);
                        });
                    });

                    $.each(data.personnel.family, function () {
                        $.each(this, function (k, v) {
                            $('#' + k).text(v);
                        });
                    });

                    $.each(data.personnel.question, function () {
                        $.each(this, function (k, v) {
                            if (v == "yes" || v == "no") {
                                $("#" + k).text(v);
                            } else {
                                $('#' + k).html(v || '');
                            }
                        });
                    });

                    $.each(data.personnel.reference, function () {
                        $.each(this, function (k, v) {
                            $('#' + k).html(v || '');
                        });
                    });

                    $.each(data.personnel.government, function() {
                        $.each(this, function(k, v) {
                            if (k === 'government_issued_image' && v) {
                                $('#'+k).attr('src', `/${v}`);
                            } else {
                                $('#'+k).text(v);
                            }
                        });
                    });

                    children_info = data.personnel.children
                    if (children_info != null) {
                        $("#children_tbl").empty();
                        for (let index = 0; index < children_info.length; index++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td>' + children_info[index].children_name + '</td>';
                            cols += '<td>' + children_info[index].children_sex + '</td>';
                            cols += '<td>' + children_info[index].children_birthday + '</td>';
                            cols += '<td>' + children_info[index].children_disability + '</td>';
                            newRow.append(cols);

                            $("#family_children_table_id").append(newRow);
                            $('#children_' + children_info[index].id).val(children_info[index].children_sex);
                            $('#disability_' + children_info[index].id).val(children_info[index].children_disability);
                        }
                    }

                    educational_info = data.personnel.educational
                    if (educational_info != null) {
                        $("#educational_tbl").empty();
                        for (let index = 0; index < educational_info.length; index++) {
                            var newRow = $("<tr>");
                            newRow.append(
                                '<td id="level_' + educational_info[index].id + '"></td>' +
                                '<td>' + educational_info[index].educational_school_name + '</td><td>' + educational_info[index].educational_course + '</td>' +
                                '<td>' + educational_info[index].educational_from + ' - ' + educational_info[index].educational_to + '</td>' +
                                '<td>' + educational_info[index].educational_units_earned + '</td>' +
                                '<td>' + educational_info[index].educational_year_graduated + '</td>' +
                                '<td>' + educational_info[index].educational_scholarship_class + '</td>');

                            $('#educational_table_id').append(newRow);
                            $('#level_' + educational_info[index].id).text(educational_info[index].education_level);
                        }
                    }

                    service_info = data.personnel.service
                    if (service_info != null) {
                        $("#service_tbl").empty();
                        for (let index = 0; index < service_info.length; index++) {
                            var html = '<tr>' +
                                '<td>' +
                                service_info[index].service_career +
                                '</td>' +
                                '<td>' +
                                service_info[index].service_rating +
                                '</td>' +
                                '<td>' +
                                service_info[index].service_exam_date +
                                '</td>' +
                                '<td>' +
                                service_info[index].service_exam_place +
                                '</td>' +
                                '<td>' +
                                service_info[index].service_license + ' ' +
                                service_info[index].service_license_date +
                                '</td>' +
                                '</tr>';

                            $('#service_table_id').append(html);
                        }
                    }

                    work_info = data.personnel.work
                    if (work_info != null) {
                        $("#work_tbl").empty();
                        for (let index = 0; index < work_info.length; index++) {
                            var html = '<tr>' +
                                '<td>' +
                                work_info[index].work_from + ' - ' +
                                work_info[index].work_to +
                                '</td>' +
                                '<td>' +
                                work_info[index].work_position +
                                '</td>' +
                                '<td>' +
                                work_info[index].work_agency +
                                '</td>' +
                                '<td>' +
                                work_info[index].work_salary +
                                '</td>' +
                                '<td>' +
                                work_info[index].work_pay_grade +
                                '</td>' +
                                '<td>' +
                                work_info[index].work_appointment +
                                '</td>' +
                                '<td>' +
                                work_info[index].work_gov_service +
                                '</td>' +
                                '</tr>';
                            $('#work_table_id').append(html);
                        }
                    }

                    voluntary_info = data.personnel.voluntary
                    if (voluntary_info != null) {
                        $("#voluntary_tbl").empty();
                        for (let index = 0; index < voluntary_info.length; index++) {
                            const html = `<tr>
                                    <td>
                                        ` + voluntary_info[index].voluntary_name + `
                                    </td>
                                    <td>
                                        ` + voluntary_info[index].voluntary_address + `
                                    </td>
                                    <td>
                                        ` + voluntary_info[index].voluntary_from + ` -
                                        ` + voluntary_info[index].voluntary_to + `
                                    </td>
                                    <td>
                                        ` + voluntary_info[index].voluntary_hours + `
                                    </td>
                                    <td>
                                        ` + voluntary_info[index].voluntary_position + `
                                    </td>
                                </tr>`;
                            $('#voluntary_work_table_id').append(html);
                        }
                    }

                    learning_info = data.personnel.learning
                    if (learning_info.length != 0) {
                        $("#learning_tbl").empty();
                        for (let index = 0; index < learning_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                        ` + learning_info[index].learning_training + `
                                        </td>
                                        <td>
                                        ` + learning_info[index].learning_from + ` -
                                        ` + learning_info[index].learning_to + `
                                        </td>
                                        <td>
                                        ` + learning_info[index].learning_hours + `
                                        </td>
                                        <td>
                                        ` + learning_info[index].learning_id_type + `
                                        </td>
                                        <td>
                                        ` + learning_info[index].learning_sponsored + `
                                        </td>
                                    </tr>`;
                            $('#learning_table_id').append(html);
                            $('#learning_' + learning_info[index].id).val(learning_info[index].learning_id_type);

                        }
                    }


                    hobby_info = data.personnel.hobby
                    if (hobby_info.length != 0) {
                        $("#hobby_tbl").empty();
                        for (let index = 0; index < hobby_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                            ` + hobby_info[index].hobby + `
                                        </td>
                                    </tr>`;
                            $('#hobby_table_id').append(html);
                        }
                    }

                    academic_info = data.personnel.academic
                    if (academic_info.length != 0) {
                        $("#academic_tbl").empty();
                        for (let index = 0; index < academic_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                            ` + academic_info[index].others_non_academic + `
                                        </td>
                                    </tr>`;
                            $('#academic_table_id').append(html);
                        }
                    }

                    membership_info = data.personnel.membership
                    if (membership_info.length != 0) {
                        $("#membership_tbl").empty();
                        for (let index = 0; index < membership_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                            ` + membership_info[index].membership + `
                                        </td>
                                    </tr>`;
                            $('#membership_table_id').append(html);
                        }
                    }
                }
            });
        }

        $(function () {
            edit_personnel($('#personnel_id').val());
            const menuBar = document.querySelector('#content nav #desktop-menu');
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hide');
        });

        let wait;

        let statusHolder = null;
        function rejectStatus(status, element) {
            statusHolder = status;
            $('#rejectModal').show();
        }

        function confirmReject(element) {
            reject(statusHolder, element);
        }

        function closeModal() {
            $('#rejectModal').hide();
        }

        function reject(status, element) {
            const btn = $(element);
            if (wait) {
                return;
            }
            wait = true;
            var data = {
                _token: "{{csrf_token()}}",
                id: hold_id,
                status,
                reject_reason: $('#reject_reason').val(),
            };
            var originalText = btn.text();
            btn.text('Please wait...');
            $.post('/personnel/save_status', data).done(function (response) {
                toastr.success('Personnel was updated successfully!');
                btn.text(originalText);
                setTimeout(() => {
                    if (status == {{StatusSupport::STATUS_APPROVED}}) {
                        window.location.href = '/personnel/' + hold_id;
                    } else {
                        window.location.href = '/personnel/review';
                    }
                }, 3000);
            }).fail(() => {
                wait = false;
                btn.text(originalText);
            });
        }

        function saveStatus(status, element) {
            const btn = $(element);
            if (wait) {
                return;
            }
            wait = true;
            var data = {
                _token: "{{csrf_token()}}",
                id: hold_id,
                status,
            };
            var originalText = btn.text();
            btn.text('Please wait...');
            $.post('/personnel/save_status', data).done(function (response) {
                toastr.success('Personnel was updated successfully!');
                btn.text(originalText);
                setTimeout(() => {
                    if (status == {{StatusSupport::STATUS_APPROVED}}) {
                        window.location.href = '/personnel/' + hold_id;
                    } else {
                        window.location.href = '/personnel/review';
                    }
                }, 3000);
            }).fail(() => {
                wait = false;
                btn.text(originalText);
            });
        }

    </script>
@endsection
