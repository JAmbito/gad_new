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
                    <div id="create-bom-cont-id" style="border: 0px solid #A2A2A2; border-radius: 6px; padding: 20px 30px 20px 30px; margin-bottom: -23px; margin-top: 10px;">

                        <div id="bom-details-parent-id1" style="border: none;">

                            <div style="margin-bottom: 28px; margin-top: -40px; margin-bottom: 5px;">
                                <label style="font-size: 18px; text-decoration: underline;">VIEW PERSONNEL</label>
                            </div>

                        </div>
                        @include('backend.pages.personnel.view.personal_info')
                        @include('backend.pages.personnel.section.family')
                        @include('backend.pages.personnel.section.children')
                        @include('backend.pages.personnel.section.educational')
                        @include('backend.pages.personnel.section.civil_service')
                        @include('backend.pages.personnel.section.work_experience')
                        @include('backend.pages.personnel.section.voluntary_work')
                        @include('backend.pages.personnel.section.learning')
                        @include('backend.pages.personnel.section.other_info')
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

        function edit_personnel(id){
            action = 'update';
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/personnel/edit_personnel/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            if (v === null || v === '') {
                                v = '-';
                            }
                            $('#'+k).text(v);
                        });
                    });

                    $.each(data.personnel.family, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });

                    $.each(data.personnel.question, function() {
                        $.each(this, function(k, v) {
                            if(v == "yes" || v == "no") {
                                $("input[name="+ k +"][value='" + v + "']").prop("checked",true);
                            } else {
                                $('#'+k).val(v);
                            }
                        });
                    });

                    $.each(data.personnel.reference, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });

                    $.each(data.personnel.government, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });

                    children_info = data.personnel.children
                    if(children_info != null) {
                        $("#children_tbl").empty();
                        for (let index = 0; index < children_info.length; index++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="hidden" name="children_id[]" value="'+ children_info[index].id +'" class="children_id_class"><input type="text" name="children_name[]" placeholder="----" autocomplete="off" class="children_name_class" style="width: 500px" value="'+ children_info[index].children_name +'"></td>';
                            cols += '<td><select id="children_'+children_info[index].id+'" name="children_sex[]" style="height: 38px; margin-bottom: 25px;" class="children_sex_class" value="'+ children_info[index].children_sex +'"><option value="">-SELECT SEX-</option><option value="MALE">MALE</option><option value="FEMALE">FEMALE</option></select></td>';
                            cols += '<td><input type="date" name="children_bday[]" placeholder="----" autocomplete="off" class="children_bday_class" value="'+ children_info[index].children_birthday +'"></td>';
                            cols += '<td><select id="disability_'+children_info[index].id+'" name="children_disability[]" style="height: 38px; margin-bottom: 25px;" class="children_disability_class" value="'+ children_info[index].children_disability +'"><option value="NONE">NONE</option><option value="COGNITIVE">COGNITIVE</option><option value="HEARING">HEARING</option><option value="MOTOR">MOTOR</option><option value="VISUAL">VISUAL</option><option value="OTHERS">OTHERS</option></select></td>';
                            cols += '<td class="remove_children" style="min-width: 30px!important; cursor: pointer	;"><i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i></td>';
                            newRow.append(cols);

                            $("#family_children_table_id").append(newRow);
                            $('#children_'+children_info[index].id).val(children_info[index].children_sex);
                            $('#disability_'+children_info[index].id).val(children_info[index].children_disability);
                        }
                    }

                    educational_info = data.personnel.educational
                    if(educational_info != null) {
                        $("#educational_tbl").empty();
                        for (let index = 0; index < educational_info.length; index++) {
                            var newRow = $("<tr>");
                            newRow.append('<td><input type="hidden" value="'+ educational_info[index].id +'" name="educational_id[]" placeholder="----" autocomplete="off" class="education_id_class" style="width: 400px"><select id="level_'+educational_info[index].id+'" name="education_level[]" style="height: 38px; margin-bottom: 25px;" class="education_level_class"><option value="">-SELECT LEVEL-</option><option value="ELEMENTARY">ELEMENTARY</option><option value="SECONDARY">SECONDARY</option><option value="VOCATIONAL">VOCATIONAL</option><option value="BACHELORS DEGREE">BACHELORS DEGREE</option><option value="MASTERS DEGREE">MASTERS DEGREE</option><option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option></select></td><td><input type="text" value="'+ educational_info[index].educational_school_name +'" name="educational_school_name[]" placeholder="----" autocomplete="off" class="educational_school_class" style="width: 400px"></td><td><input type="text" value="'+ educational_info[index].educational_course +'" name="educational_course[]" placeholder="----" autocomplete="off" class="educational_course_class" style="width: 400px"></td><td><input type="text" value="'+ educational_info[index].educational_from +'" name="educational_from[]" placeholder="----" autocomplete="off" class="educational_from_class" style="width: 150px; margin-right: 10px;"><input type="text" value="'+ educational_info[index].educational_to +'" name="educational_to[]" placeholder="----" autocomplete="off" class="educational_to_class" style="width: 153px"></td><td><input type="text" value="'+ educational_info[index].educational_units_earned +'" name="educational_units_earned[]" placeholder="----" autocomplete="off" class="educational_units_class" style="width: 400px"></td><td><input type="text" value="'+ educational_info[index].educational_year_graduated +'" name="educational_year_graduated[]" placeholder="----" autocomplete="off" class="educational_graduated_class"></td><td><input type="text"  value="'+ educational_info[index].educational_scholarship_class +'" name="educational_scholarship[]" placeholder="----" autocomplete="off" class="educational_scholarship_class"></td>');
                            var removeButton = $('<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>');
                            newRow.append($('<td class="remove_educational" style="min-width: 30px!important; cursor: pointer;">').append(removeButton));

                            $('#educational_table_id').append(newRow);
                            $('#level_'+educational_info[index].id).val(educational_info[index].education_level);
                        }
                    }

                    service_info = data.personnel.service
                    if(service_info != null) {
                        $("#service_tbl").empty();
                        for (let index = 0; index < service_info.length; index++) {
                            var html = '<tr>' +
                                '<td>' +
                                '<input type="hidden" name="service_id[]" value="'+ service_info[index].id +'" class="service_id_class" placeholder="----" autocomplete="off" style="width: 350px">' +
                                '<input type="text" name="service_career[]" value="'+ service_info[index].service_career +'" class="service_career_class" placeholder="----" autocomplete="off" style="width: 350px">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="service_rating[]" value="'+ service_info[index].service_rating +'" class="service_rating_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td>' +
                                '<input type="date" name="service_date_of_exam[]" value="'+ service_info[index].service_exam_date +'" class="service_exam_date_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="service_place_of_exam[]" value="'+ service_info[index].service_exam_place +'" class="service_exam_place_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="service_license[]" value="'+ service_info[index].service_license +'" class="service_license_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">' +
                                '<input type="date" name="service_license_date[]" value="'+ service_info[index].service_license_date +'" class="service_license_date_class" placeholder="----" autocomplete="off" style="width: 184px">' +
                                '</td>' +
                                '<td class="remove_service" style="min-width: 30px!important; cursor: pointer;">' +
                                '<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>' +
                                '</td>' +
                                '</tr>';

                            $('#service_table_id').append(html);
                        }
                    }

                    work_info = data.personnel.work
                    if(work_info != null) {
                        $("#work_tbl").empty();
                        for (let index = 0; index < work_info.length; index++) {
                            var html = '<tr>' +
                                '<td>' +
                                '<input type="hidden" name="work_id[]" class="work_id_class" value="'+ work_info[index].id +'">' +
                                '<input type="date" name="work_inclusive_date_from[]" value="'+ work_info[index].work_from +'" class="work_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">' +
                                '<input type="date" name="work_inclusive_date_to[]" value="'+ work_info[index].work_to +'" class="work_to_class" placeholder="----" autocomplete="off" style="width: 180px">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="work_position[]" value="'+ work_info[index].work_position +'" class="work_position_class" placeholder="----" autocomplete="off" style="width: 350px">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="work_agency[]" value="'+ work_info[index].work_agency +'" class="work_agency_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="work_salary[]" value="'+ work_info[index].work_salary +'" class="work_salary_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="work_pay_grade[]" value="'+ work_info[index].work_pay_grade +'" class="work_pay_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="work_appoinment[]" value="'+ work_info[index].work_appointment +'" class="work_appointment_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" name="work_gov_service[]" value="'+ work_info[index].work_gov_service +'" class="work_gov_service_class" placeholder="----" autocomplete="off">' +
                                '</td>' +
                                '<td class="remove_work" style="min-width: 30px!important; cursor: pointer;">' +
                                '<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>' +
                                '</td>' +
                                '</tr>';
                            $('#work_table_id').append(html);
                        }
                    }

                    voluntary_info = data.personnel.voluntary
                    if(voluntary_info != null) {
                        $("#voluntary_tbl").empty();
                        for (let index = 0; index < voluntary_info.length; index++) {
                            const html = `<tr>
                                    <td>
                                        <input type="hidden" name="voluntary_id[]" value="`+ voluntary_info[index].id +`" class="voluntary_id_class">
                                        <input type="text" name="voluntary_name[]" value="`+ voluntary_info[index].voluntary_name +`" class="voluntary_name_class" placeholder="----" autocomplete="off" style="width: 400px">
                                    </td>
                                    <td>
                                        <input type="text" name="voluntary_address[]" value="`+ voluntary_info[index].voluntary_address +`" class="voluntary_address_class" placeholder="----" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="date" name="voluntary_date_from[]" value="`+ voluntary_info[index].voluntary_from +`" class="voluntary_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
                                        <input type="date" name="voluntary_date_to[]" value="`+ voluntary_info[index].voluntary_to +`" class="voluntary_to_class" placeholder="----" autocomplete="off" style="width: 180px">
                                    </td>
                                    <td>
                                        <input type="text" name="voluntary_no_of_hrs[]" value="`+ voluntary_info[index].voluntary_hours +`" class="voluntary_hours_class" placeholder="----" autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="text" name="voluntary_position[]" value="`+ voluntary_info[index].voluntary_position +`" class="voluntary_position_class" placeholder="----" autocomplete="off">
                                    </td>
                                    <td class="remove-voluntary" style="min-width: 30px!important; cursor: pointer;">
                                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                                    </td>
                                </tr>`;
                            $('#voluntary_work_table_id').append(html);
                        }
                    }

                    learning_info = data.personnel.learning
                    if(learning_info.length != 0) {
                        $("#learning_tbl").empty();
                        for (let index = 0; index < learning_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                        <input type="hidden" name="learning_training[]" value="`+ learning_info[index].id +`" class="learning_id_class">
                                        <input type="text" name="learning_training[]" value="`+ learning_info[index].learning_training +`" class="learning_training_class" placeholder="----" autocomplete="off" style="width: 400px">
                                        </td>
                                        <td>
                                        <input type="date" name="learning_date_from[]" value="`+ learning_info[index].learning_from +`" class="learning_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
                                        <input type="date" name="learning_date_to[]" value="`+ learning_info[index].learning_to +`" class="learning_to_class" placeholder="----" autocomplete="off" style="width: 180px">
                                        </td>
                                        <td>
                                        <input type="text" name="learning_no_hrs[]" value="`+ learning_info[index].learning_hours +`" class="learning_hours_class" placeholder="----" autocomplete="off">
                                        </td>
                                        <td>
                                        <select id="learning_`+learning_info[index].id+`" name="learning_ld_type[]" value="`+ learning_info[index].learning_id_type +`" class="learning_id_type_class"style="height: 38px; margin-bottom: 25px;" class="educational_level_class">
                                            <option value="">-SELECT-</option>
                                            <option value="EXECUTIVE/MANAGERIAL">EXECUTIVE/MANAGERIAL</option>
                                            <option value="QUALITY">QUALITY</option>
                                            <option value="SOFT SKILLS">SOFT SKILLS</option>
                                            <option value="SUPERVISORY">SUPERVISORY</option>
                                            <option value="TECHNICAL OR SKILLS">TECHNICAL OR SKILLS</option>
                                        </select>
                                        </td>
                                        <td>
                                        <input type="text" name="learning_sponsored[]" value="`+ learning_info[index].learning_sponsored +`" class="learning_sponsored_class" placeholder="----" autocomplete="off">
                                        </td>
                                        <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
                                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                                        </td>
                                    </tr>`;
                            $('#learning_table_id').append(html);
                            $('#learning_'+learning_info[index].id).val(learning_info[index].learning_id_type);

                        }
                    }


                    hobby_info = data.personnel.hobby
                    if(hobby_info.length != 0) {
                        $("#hobby_tbl").empty();
                        for (let index = 0; index < hobby_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                            <input type="hidden" name="hobby_id[]" value="`+ hobby_info[index].id +`" class="hobby_id_class">
                                            <input type="text" name="hobby_hobby[]" value="`+ hobby_info[index].hobby +`" class="hobby_hobby_class" placeholder="----" autocomplete="off" style="width: 400px">
                                        </td>
                                        <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
                                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                                        </td>
                                    </tr>`;
                            $('#hobby_table_id').append(html);
                        }
                    }

                    academic_info = data.personnel.academic
                    if(academic_info.length != 0) {
                        $("#academic_tbl").empty();
                        for (let index = 0; index < academic_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                            <input type="hidden" name="academic_id[]" value="`+ academic_info[index].id +`" class="academic_id_class">
                                            <input type="text" name="others_non_academic[]" value="`+ academic_info[index].others_non_academic +`" class="others_non_academic_class" placeholder="----" autocomplete="off" style="width: 400px">
                                        </td>
                                        <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
                                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                                        </td>
                                    </tr>`;
                            $('#academic_table_id').append(html);
                        }
                    }

                    membership_info = data.personnel.membership
                    if(membership_info.length != 0) {
                        $("#membership_tbl").empty();
                        for (let index = 0; index < membership_info.length; index++) {
                            const html = `<tr>
                                        <td>
                                            <input type="hidden" name="membership_id[]" value="`+ membership_info[index].id +`" class="membership_id_class">
                                            <input type="text" name="membership[]" value="`+ membership_info[index].membership +`" class="membership_class" placeholder="----" autocomplete="off" style="width: 400px">
                                        </td>
                                        <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
                                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                                        </td>
                                    </tr>`;
                            $('#membership_table_id').append(html);
                        }
                    }
                }
            });
        }

        $(function() {
            edit_personnel($('#personnel_id').val());
            const menuBar = document.querySelector('#content nav #desktop-menu');
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hide');

            $("#add-educational").click(function() {
                var newRow = $("<tr>");
                newRow.append('<td><input type="hidden" name="educational_id[]" placeholder="----" autocomplete="off" class="education_id_class" style="width: 400px"><select name="education_level[]" style="height: 38px; margin-bottom: 25px;" class="education_level_class"><option value="">-SELECT LEVEL-</option><option value="ELEMENTARY">ELEMENTARY</option><option value="SECONDARY">SECONDARY</option><option value="VOCATIONAL">VOCATIONAL</option><option value="BACHELORS DEGREE">BACHELORS DEGREE</option><option value="MASTERS DEGREE">MASTERS DEGREE</option><option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option></select></td><td><input type="text" name="educational_school_name[]" placeholder="----" autocomplete="off" class="educational_school_class" style="width: 400px"></td><td><input type="text" name="educational_course[]" placeholder="----" autocomplete="off" class="educational_course_class" style="width: 400px"></td><td><input type="text" name="educational_from[]" placeholder="----" autocomplete="off" class="educational_from_class" style="width: 150px; margin-right: 10px;"><input type="text" name="educational_to[]" placeholder="----" autocomplete="off" class="educational_to_class" style="width: 153px"></td><td><input type="text" name="educational_units_earned[]" placeholder="----" autocomplete="off" class="educational_units_class" style="width: 400px"></td><td><input type="text" name="educational_year_graduated[]" placeholder="----" autocomplete="off" class="educational_graduated_class"></td><td><input type="text" name="educational_scholarship[]" placeholder="----" autocomplete="off" class="educational_scholarship_class"></td>');
                var removeButton = $('<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>');
                newRow.append($('<td class="remove_educational" style="min-width: 30px!important; cursor: pointer;">').append(removeButton));

                $('#educational_table_id').append(newRow);

                removeButton.click(function() {
                    $(this).closest('tr').remove();
                });
            });
        });

        function saveStatus(status) {
            var data = {
                _token: "{{csrf_token()}}",
                id: hold_id,
                status,
            };

            $.post('/personnel/save_status', data).done(function (response) {
                toastr.success('Personnel was updated successfully!');
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            });
        }

    </script>
@endsection
