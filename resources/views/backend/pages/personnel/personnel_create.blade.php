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
                </div>
                <div id="bom-details-parent-id" style="padding-bottom: 1px; padding-top: 27px;">
                        @include('backend.pages.personnel.partial.faker')

                        <!-- CREATE BOM CONTAINER -->
                        <div id="create-bom-cont-id" style="border: 0px solid #A2A2A2; border-radius: 6px; padding: 20px 30px 20px 30px; margin-bottom: -23px; margin-top: 10px;">

                            <div id="bom-details-parent-id1" style="border: none;">

                                <div style="margin-bottom: 28px; margin-top: -40px; margin-bottom: 5px;">
                                    <label style="font-size: 18px; text-decoration: underline;">CREATE NEW PERSONNEL</label>
                                </div>

                            </div>
                            @include('backend.pages.personnel.section.personal_info')
                            @include('backend.pages.personnel.section.family')
                            @include('backend.pages.personnel.section.children')
                            @include('backend.pages.personnel.section.educational')
                            @include('backend.pages.personnel.section.civil_service')
                            @include('backend.pages.personnel.section.work_experience')
                            @include('backend.pages.personnel.section.voluntary_work')
                            @include('backend.pages.personnel.section.learning')
                            @include('backend.pages.personnel.section.other_info')
                        </div>
                        <div class="insert-btn-cont" id="submit-cont-id" style="margin-top: 5px; margin-bottom: 25px;">
                            <h1 style="margin-right: auto;"></h1>
                            <button class="btn-del" name="sub-insert" onclick="saveRecord(this)" style="padding-left: 20px; padding-right: 20px; font-size: 10px; background-color: #3D9EFF; border: 1px solid #3D9EFF;">Submit</button>
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

        let wait = false;
        function saveRecord(btn) {
            $(btn).attr('disabled', 'disabled');
            $(btn).text('Please wait...');
            if (wait) {
                return;
            }

            wait = true;
            var data = {
                _token: '{{csrf_token()}}',
                personnel_id: $('#personnel_id').val(),
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                lastname: $('#lastname').val(),
                extension: $('#extension').val(),
                birthday: $('#birthday').val(),
                birth_place: $('#birth_place').val(),
                employee_status: $('#employee_status').val(),
                sex: $('#sex').val(),
                civil_status: $('#civil_status').val(),
                height: $('#height').val(),
                weight: $('#weight').val(),
                blood: $('#blood').val(),
                gsis: $('#gsis').val(),
                pagibig: $('#pagibig').val(),
                philhealth: $('#philhealth').val(),
                sss: $('#sss').val(),
                tin: $('#tin').val(),
                id_no: $('#id_no').val(),
                citizenship: $('#citizenship').val(),
                by_birth: $('#by_birth').val(),
                dual_indication: $('#dual_indication').val(),
                residential_lot_no: $('#residential_lot_no').val(),
                residential_street: $('#residential_street').val(),
                residential_subdivision: $('#residential_subdivision').val(),
                residential_barangay: $('#residential_barangay').val(),
                residential_city: $('#residential_city').val(),
                residential_province: $('#residential_province').val(),
                residential_zipcode: $('#residential_zipcode').val(),
                permanent_lot_no: $('#permanent_lot_no').val(),
                permanent_street: $('#permanent_street').val(),
                permanent_subdivision: $('#permanent_subdivision').val(),
                permanent_barangay: $('#permanent_barangay').val(),
                permanent_city: $('#permanent_city').val(),
                permanent_province: $('#permanent_province').val(),
                permanent_zipcode: $('#permanent_zipcode').val(),
                tel_no: $('#tel_no').val(),
                mobile_no: $('#mobile_no').val(),
                email: $('#email').val(),
                academic_rank_id: $('#academic_rank_id').val(),
                administrative_rank_id: $('#administrative_rank_id').val(),
                designation_id: $('#designation_id').val(),
                department_id: $('#department_id').val(),
                campus_id: $('#campus_id').val(),
                // FAMILY
                spouse_firstname: $('#spouse_firstname').val(),
                spouse_middlename: $('#spouse_middlename').val(),
                spouse_lastname: $('#spouse_lastname').val(),
                spouse_extension: $('#spouse_extension').val(),
                spouse_occupation: $('#spouse_occupation').val(),
                spouse_business_name: $('#spouse_business_name').val(),
                spouse_business_address: $('#spouse_business_address').val(),
                spouse_tel_no: $('#spouse_tel_no').val(),
                father_firstname: $('#father_firstname').val(),
                father_middlename: $('#father_middlename').val(),
                father_lastname: $('#father_lastname').val(),
                father_extension: $('#father_extension').val(),
                mother_maiden_name: $('#mother_maiden_name').val(),
                mother_firstname: $('#mother_firstname').val(),
                mother_middlename: $('#mother_middlename').val(),
                mother_lastname: $('#mother_lastname').val(),
                mother_extension: $('#mother_extension').val(),
                question_34a: $('input[type=radio][name=question_34a]:checked').val(),
                question_34b: $('input[type=radio][name=question_34b]:checked').val(),
                question_34b_detail: $('#question_34b_detail').val(),
                question_35a: $('input[type=radio][name=question_35a]:checked').val(),
                question_35a_detail:$('#question_35a_detail').val(),
                question_35b: $('input[type=radio][name=question_35b]:checked').val(),
                question_35b_detail:$('#question_35b_detail').val(),
                question_36a:$('input[type=radio][name=question_36a]:checked').val(),
                question_36a_detail:$('#question_36a_detail').val(),
                question_37a:$('input[type=radio][name=question_37a]:checked').val(),
                question_37a_detail:$('#question_37a_detail').val(),
                question_38a:$('input[type=radio][name=question_38a]:checked').val(),
                question_38a_detail:$('#question_38a_detail').val(),
                question_38b:$('input[type=radio][name=question_38b]:checked').val(),
                question_38b_detail:$('#question_38b_detail').val(),
                question_39a:$('input[type=radio][name=question_39a]:checked').val(),
                question_39a_detail:$('#question_39a_detail').val(),
                question_40a:$('input[type=radio][name=question_40a]:checked').val(),
                question_40a_detail:$('#question_40a_detail').val(),
                question_40b:$('input[type=radio][name=question_40b]:checked').val(),
                question_40b_detail:$('#question_40b_detail').val(),
                question_40c:$('input[type=radio][name=question_40c]:checked').val(),
                reference_name:$('#reference_name').val(),
                reference_address:$('#reference_address').val(),
                reference_tel_no:$('#reference_tel_no').val(),
                government_issued_id: $('#government_issued_id').val(),
                government_issued_passport: $('#government_issued_passport').val(),
                government_date_issuance: $('#government_date_issuance').val(),
                government_place_issuance: $('#government_place_issuance').val(),
                government_issued_image: $('#government_issued_image').val(),
                government_issued_appointment: $('#government_issued_appointment').val(),
                children_records: children(),
                educational_records: educational(),
                service_records: service(),
                work_records: work(),
                voluntary_records: voluntary(),
                learning_records: learning(),
                hobby_records: hobby(),
                academic_records: academic(),
                membership_records: membership(),
                action: action,
            };

            $('.error-message').remove();

            $.post('/personnel/save', data).done(function(response){
                toastr.success('Record saved');
                $(btn).text('Saved!');
                setTimeout(() => {
                    $(btn).removeAttr('disabled');
                    window.location.href = `{{ route('personnel.index') }}`;
                }, 3000);
            }).fail(function(response) {
                wait = false;
                $(btn).removeAttr('disabled');
                $(btn).text('Submit');
                for (var field in response.responseJSON.errors) {
                    $('#'+field+"_error_message").remove();
                    $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
                }
                toastr.error(response.responseJSON.message);
            });
        }

        $("#add-children").click(function() {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="hidden" name="children_id[]" placeholder="----" autocomplete="off" class="children_id_class"><input type="text" name="children_name[]" placeholder="----" autocomplete="off" class="children_name_class" style="width: 500px"></td>';
            cols += '<td><select name="children_sex[]" style="height: 38px; margin-bottom: 25px;" class="children_sex_class"><option value="">-SELECT SEX-</option><option value="MALE">MALE</option><option value="FEMALE">FEMALE</option></select></td>';
            cols += '<td><input type="date" name="children_bday[]" placeholder="----" autocomplete="off" class="children_bday_class"></td>';
            cols += '<td><select name="children_disability[]" style="height: 38px; margin-bottom: 25px;" class="children_disability_class"><option value="NONE">NONE</option><option value="COGNITIVE">COGNITIVE</option><option value="HEARING">HEARING</option><option value="MOTOR">MOTOR</option><option value="VISUAL">VISUAL</option><option value="OTHERS">OTHERS</option></select></td>';
            cols += '<td class="remove_children" style="min-width: 30px!important; cursor: pointer	;"><i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i></td>';

            newRow.append(cols);
            $("#family_children_table_id").append(newRow);
            return false;
        });

        $(document).on('click', '.remove_children', function() {
            $(this).closest('tr').remove();
            return false;
        });

        $("#add-membership").click(function() {
			  const html = `
			    <div style="margin-top: 5px; margin-bottom:-30px; display: flex; align-items: center;">
			      <input name="others_membership[]" placeholder="----" style="margin-bottom: 23px; color: #333C46!important;" value="">
			      <span class="remove-membership" style="cursor: pointer; margin-bottom: 10px; margin-left: 7px">
			        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
			      </span>
			    </div>`;
			  $('#membership-container').append(html);
			});

        $(document).on('click', '.remove-membership', function() {
            $(this).parent().remove();
        });

        // NON-ACADEMIC

        $("#add-non-academic").click(function() {
            const html = `
            <div style="margin-top: 5px; margin-bottom:-30px; display: flex; align-items: center;">
                <input name="others_non_academic[]" placeholder="----" style="margin-bottom: 23px; color: #333C46!important;" value="">
                <span class="remove-non-academic" style="cursor: pointer; margin-bottom: 10px; margin-left: 7px">
                <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                </span>
            </div>`;
            $('#non-academic-container').append(html);
        });

        $(document).on('click', '.remove-non-academic', function() {
            $(this).parent().remove();
        });

        // HOBBIES
        $("#add-hobby").click(function() {
            const html = `<tr>
                        <td>
                            <input type="hidden" name="hobby_id[]"  class="hobby_id_class">
                            <input type="text" name="hobby_hobby[]" class="hobby_hobby_class" placeholder="----" autocomplete="off" style="width: 400px">
                        </td>
                        <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                        </td>
                    </tr>`;
            $('#hobby_table_id').append(html);
        });

         // ACADEMIC
         $("#add-academic").click(function() {
            const html = `<tr>
                        <td>
                            <input type="hidden" name="academic_id[]" class="academic_id_class">
                            <input type="text" name="others_non_academic[]" class="others_non_academic_class" placeholder="----" autocomplete="off" style="width: 400px">
                        </td>
                        <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                        </td>
                    </tr>`;
            $('#academic_table_id').append(html);
        });


        // ACADEMIC
        $("#add-membership").click(function() {
            const html = `<tr>
                        <td>
                            <input type="hidden" name="membership_id[]" class="membership_id_class">
                            <input type="text" name="membership[]" class="membership_class" placeholder="----" autocomplete="off" style="width: 400px">
                        </td>
                        <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
                        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
                        </td>
                    </tr>`;
            $('#membership_table_id').append(html);
        });

        $(document).on('click', '.remove-hobbies', function() {
            $(this).parent().remove();
        });

        // LEARNING
        $("#add-learning").click(function() {
			  const html = `<tr>
			    <td>
			      <input type="hidden" name="learning_training[]" class="learning_id_class">
			      <input type="text" name="learning_training[]" class="learning_training_class" placeholder="----" autocomplete="off" style="width: 400px">
			    </td>
			    <td>
			      <input type="date" name="learning_date_from[]" class="learning_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
			      <input type="date" name="learning_date_to[]" class="learning_to_class" placeholder="----" autocomplete="off" style="width: 180px">
			    </td>
			    <td>
			      <input type="text" name="learning_no_hrs[]" class="learning_hours_class" placeholder="----" autocomplete="off">
			    </td>
			    <td>
			      <select name="learning_ld_type[]" class="learning_id_type_class"style="height: 38px; margin-bottom: 25px;" class="educational_level_class">
			        <option value="">-SELECT-</option>
			        <option value="EXECUTIVE/MANAGERIAL">EXECUTIVE/MANAGERIAL</option>
			        <option value="QUALITY">QUALITY</option>
			        <option value="SOFT SKILLS">SOFT SKILLS</option>
			        <option value="SUPERVISORY">SUPERVISORY</option>
			        <option value="TECHNICAL OR SKILLS">TECHNICAL OR SKILLS</option>
			      </select>
			    </td>
			    <td>
			      <input type="text" name="learning_sponsored[]" class="learning_sponsored_class" placeholder="----" autocomplete="off">
			    </td>
			    <td class="remove-learning" style="min-width: 30px!important; cursor: pointer;">
			      <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
			    </td>
			  </tr>`;
			  $('#learning_table_id').append(html);
			});

			// handle click event for removing a row
			$(document).on('click', '.remove-learning', function() {
			  $(this).closest('tr').remove();
			});

            // VOLUNTARY
            $("#add-voluntary-work").click(function() {
			    const html = `<tr>
			        <td>
			            <input type="hidden" name="voluntary_id[]" class="voluntary_id_class">
			            <input type="text" name="voluntary_name[]" class="voluntary_name_class" placeholder="----" autocomplete="off" style="width: 400px">
			        </td>
			        <td>
			            <input type="text" name="voluntary_address[]" class="voluntary_address_class" placeholder="----" autocomplete="off">
			        </td>
			        <td>
			            <input type="date" name="voluntary_date_from[]" class="voluntary_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
			            <input type="date" name="voluntary_date_to[]" class="voluntary_to_class" placeholder="----" autocomplete="off" style="width: 180px">
			        </td>
			        <td>
			            <input type="text" name="voluntary_no_of_hrs[]" class="voluntary_hours_class" placeholder="----" autocomplete="off">
			        </td>
			        <td>
			            <input type="text" name="voluntary_position[]" class="voluntary_position_class" placeholder="----" autocomplete="off">
			        </td>
			        <td class="remove-voluntary" style="min-width: 30px!important; cursor: pointer;">
			            <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
			        </td>
			    </tr>`;
			    $('#voluntary_work_table_id').append(html);
			});

			$(document).on('click', '.remove-voluntary', function() {
			    $(this).closest('tr').remove();
			});

            // WORK
			  $("#add-work").click(function() {
			    var html = '<tr>' +
			      '<td>' +
			      '<input type="hidden" name="work_id[]" class="work_id_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">' +
			      '<input type="date" name="work_inclusive_date_from[]" class="work_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">' +
			      '<input type="date" name="work_inclusive_date_to[]" class="work_to_class" placeholder="----" autocomplete="off" style="width: 180px">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_position[]" class="work_position_class" placeholder="----" autocomplete="off" style="width: 350px">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_agency[]" class="work_agency_class" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_salary[]" class="work_salary_class" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_pay_grade[]" class="work_pay_class" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_appoinment[]" class="work_appointment_class" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_gov_service[]" class="work_gov_service_class" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td class="remove_work" style="min-width: 30px!important; cursor: pointer;">' +
			      '<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>' +
			      '</td>' +
			      '</tr>';
			    $('#work_table_id').append(html);
			  });

			  // Remove row
			  $(document).on('click', '.remove_work', function() {
			    $(this).closest('tr').remove();
			  });

            //   SERVICE
              $("#add-service").click(function() {
    			var html = '<tr>' +
                    '<td>' +
                        '<input type="hidden" name="service_id[]" class="service_id_class" placeholder="----" autocomplete="off" style="width: 350px">' +
                        '<input type="text" name="service_career[]" class="service_career_class" placeholder="----" autocomplete="off" style="width: 350px">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="service_rating[]" class="service_rating_class" placeholder="----" autocomplete="off">' +
                    '</td>' +
                    '<td>' +
                        '<input type="date" name="service_date_of_exam[]" class="service_exam_date_class" placeholder="----" autocomplete="off">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="service_place_of_exam[]" class="service_exam_place_class" placeholder="----" autocomplete="off">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="service_license[]" class="service_license_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">' +
                        '<input type="date" name="service_license_date[]" class="service_license_date_class" placeholder="----" autocomplete="off" style="width: 184px">' +
                    '</td>' +
                    '<td class="remove_service" style="min-width: 30px!important; cursor: pointer;">' +
                        '<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>' +
                    '</td>' +
                '</tr>';

			    $('#service_table_id').append(html);

			    $(document).on('click', '.remove_service', function() {
			        $(this).closest('tr').remove();
			    });


                });

        $(function() {
            const menuBar = document.querySelector('#content nav #desktop-menu');
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hide');

            $("#add-educational").click(function() {
                var newRow = $("<tr>");
                newRow.append(
                    '<td>' +
                    '<input type="hidden" name="educational_id[]" placeholder="----" autocomplete="off" class="education_id_class" style="width: 400px">' +
                    '<select name="education_level[]" style="height: 38px; margin-bottom: 25px;" class="education_level_class">' +
                    '<option value="">-SELECT LEVEL-</option>' +
                    '<option value="ELEMENTARY">ELEMENTARY</option>' +
                    '<option value="SECONDARY">SECONDARY</option>' +
                    '<option value="VOCATIONAL">VOCATIONAL</option>' +
                    '<option value="BACHELORS DEGREE">BACHELORS DEGREE</option>' +
                    '<option value="MASTERS DEGREE">MASTERS DEGREE</option>' +
                    '<option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option>' +
                    '</select>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="educational_school_name[]" placeholder="----" autocomplete="off" class="educational_school_class" style="width: 400px">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="educational_course[]" placeholder="----" autocomplete="off" class="educational_course_class" style="width: 400px">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="educational_from[]" placeholder="----" autocomplete="off" class="educational_from_class" style="width: 150px; margin-right: 10px;">' +
                    '<input type="text" name="educational_to[]" placeholder="----" autocomplete="off" class="educational_to_class" style="width: 153px">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="educational_units_earned[]" placeholder="----" autocomplete="off" class="educational_units_class" style="width: 400px">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="educational_year_graduated[]" placeholder="----" autocomplete="off" class="educational_graduated_class">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="educational_scholarship[]" placeholder="----" autocomplete="off" class="educational_scholarship_class">' +
                    '</td>'
                );
                var removeButton = $('<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>');
                newRow.append($('<td class="remove_educational" style="min-width: 30px!important; cursor: pointer;">').append(removeButton));

                $('#educational_table_id').append(newRow);

                removeButton.click(function() {
                    $(this).closest('tr').remove();
                });
            });
        });


        function children() {
            $.each($('table#family_children_table_id tbody tr'), function(i,v) {
                children_data.push({
                    "children": $('.children_name_class')[i].value,
                    "sex": $('.children_sex_class')[i].value,
                    "birthdate": $('.children_bday_class')[i].value,
                    "disability": $('.children_disability_class')[i].value,
                });
            })
            return children_data;
        }

        function service() {
            $.each($('table#service_table_id tbody tr'), function(i,v) {
                service_data.push({
                    "service_career": $('.service_career_class')[i].value,
                    "service_rating": $('.service_rating_class')[i].value,
                    "service_exam_date": $('.service_exam_date_class')[i].value,
                    "service_exam_place": $('.service_exam_place_class')[i].value,
                    "service_license": $('.service_license_class')[i].value,
                    "service_license_date": $('.service_license_date_class')[i].value,
                });
            })
            return service_data;
        }

        function educational() {
            $.each($('table#educational_table_id tbody tr'), function(i,v) {
                educational_data.push({
                    "education_level": $('.education_level_class')[i].value,
                    "educational_school_name": $('.educational_school_class')[i].value,
                    "educational_course": $('.educational_course_class')[i].value,
                    "educational_from": $('.educational_from_class')[i].value,
                    "educational_to": $('.educational_to_class')[i].value,
                    "educational_units_earned": $('.educational_units_class')[i].value,
                    "educational_year_graduated": $('.educational_graduated_class')[i].value,
                    "educational_scholarship_class": $('.educational_scholarship_class')[i].value,
                });
            })
            return educational_data;
        }

        function work() {
            $.each($('table#work_table_id tbody tr'), function(i,v) {
                work_data.push({
                    "work_from": $('.work_from_class')[i].value,
                    "work_to": $('.work_to_class')[i].value,
                    "work_position": $('.work_position_class')[i].value,
                    "work_agency": $('.work_agency_class')[i].value,
                    "work_salary": $('.work_salary_class')[i].value,
                    "work_pay_grade": $('.work_pay_class')[i].value,
                    "work_appointment": $('.work_appointment_class')[i].value,
                    "work_gov_service": $('.work_gov_service_class')[i].value,
                });
            })
            return work_data;
        }

        function voluntary() {
            $.each($('table#voluntary_work_table_id tbody tr'), function(i,v) {
                voluntary_data.push({
                    "voluntary_name": $('.voluntary_name_class')[i].value,
                    "voluntary_address": $('.voluntary_address_class')[i].value,
                    "voluntary_from": $('.voluntary_from_class')[i].value,
                    "voluntary_to": $('.voluntary_to_class')[i].value,
                    "voluntary_hours": $('.voluntary_hours_class')[i].value,
                    "voluntary_position": $('.voluntary_position_class')[i].value,
                });
            })
            return voluntary_data;
        }

        function learning() {
            $.each($('table#learning_table_id tbody tr'), function(i,v) {
                learning_data.push({
                    "learning_training": $('.learning_training_class')[i].value,
                    "learning_from": $('.learning_from_class')[i].value,
                    "learning_to": $('.learning_to_class')[i].value,
                    "learning_hours": $('.learning_hours_class')[i].value,
                    "learning_id_type": $('.learning_id_type_class')[i].value,
                    "learning_sponsored": $('.learning_sponsored_class')[i].value,
                });
            })
            return learning_data;
        }

        function hobby() {
            $.each($('table#hobby_table_id tbody tr'), function(i,v) {
                 hobby_data.push({
                    "hobby": $('.hobby_hobby_class')[i].value,
                });
            })
            return hobby_data;
        }

        function academic() {
            $.each($('table#academic_table_id tbody tr'), function(i,v) {
                 academic_data.push({
                    "others_non_academic": $('.others_non_academic_class')[i].value,
                });
            })
            return academic_data;
        }

        function membership() {
            $.each($('table#membership_table_id tbody tr'), function(i,v) {
                 membership_data.push({
                    "membership": $('.membership_class')[i].value,
                });
            })
            return membership_data;
        }
    </script>
    @endsection
