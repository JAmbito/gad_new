	<?php

	include 'connect.php';

	session_start();
	date_default_timezone_set('Asia/Manila');


		$sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
	    $result1=mysqli_query($con,$sql1);
	    $row1=mysqli_fetch_assoc($result1);
	    $user_name=$row1['name'];
	    $campus_name=$row1['campus_name'];


if(isset($_POST['sub-insert'])){


	$phdate = date("Y-m-d H:i:s");
	$now = DateTime::createFromFormat('U.u', microtime(true));
	$datecreatedexact = $now->format("Y-m-d H:i:s.u");



	// I PERSONAL INFORMATION
	$personal_surname = $_POST['personal_surname'];
	$personal_firstname = $_POST['personal_firstname'];
	$personal_name_extension = $_POST['personal_name_extension'];
	$personal_middlename = $_POST['personal_middlename'];
	$personal_birthday = $_POST['personal_birthday'];
	$personal_bday_place = $_POST['personal_bday_place'];
	$personal_designation = $_POST['personal_designation'];
	$personal_department = $_POST['personal_department'];
	$personal_academic_rank = $_POST['personal_academic_rank'];
	$personal_administrative_rank = $_POST['personal_administrative_rank'];
	$personal_emp_status = $_POST['personal_emp_status'];
	$personal_campus = $_POST['personal_campus'];
	$personal_sex = $_POST['personal_sex'];
	$personal_civil_status = $_POST['personal_civil_status'];
	$personal_height = $_POST['personal_height'];
	$personal_weight = $_POST['personal_weight'];
	$personal_blood = $_POST['personal_blood'];
	$personal_gsis = $_POST['personal_gsis'];
	$personal_pagibig = $_POST['personal_pagibig'];
	$personal_philhealth = $_POST['personal_philhealth'];
	$personal_sss = $_POST['personal_sss'];
	$personal_tin = $_POST['personal_tin'];
	$personal_id_no = $_POST['personal_id_no'];
	$personal_citizenship = $_POST['personal_citizenship'];
	$personal_by_birth = $_POST['personal_by_birth'];
	$personal_dual_indication = $_POST['personal_dual_indication'];
	$personal_residential_lot_no = $_POST['personal_residential_lot_no'];
	$personal_residential_street = $_POST['personal_residential_street'];
	$personal_residential_subdivision = $_POST['personal_residential_subdivision'];
	$personal_residential_barangay = $_POST['personal_residential_barangay'];
	$personal_residential_city = $_POST['personal_residential_city'];
	$personal_residential_province = $_POST['personal_residential_province'];
	$personal_residential_zipcode = $_POST['personal_residential_zipcode'];
	$personal_permanent_lot_no = $_POST['personal_permanent_lot_no'];
	$personal_permanent_street = $_POST['personal_permanent_street'];
	$personal_permanent_subdivision = $_POST['personal_permanent_subdivision'];
	$personal_permanent_barangay = $_POST['personal_permanent_barangay'];
	$personal_permanent_city = $_POST['personal_permanent_city'];
	$personal_permanent_province = $_POST['personal_permanent_province'];
	$personal_permanent_zipcode = $_POST['personal_permanent_zipcode'];
	$personal_tel_no = $_POST['personal_tel_no'];
	$personal_mobile_no = $_POST['personal_mobile_no'];
	$personal_email = $_POST['personal_email'];


	// II FAMILY BACKGROUND
	$family_spouse_surname = $_POST['family_spouse_surname'];
	$family_spouse_firstname = $_POST['family_spouse_firstname'];
	$family_spouse_name_extension = $_POST['family_spouse_name_extension'];
	$family_spouse_middlename = $_POST['family_spouse_middlename'];
	$family_spouse_occupation = $_POST['family_spouse_occupation'];
	$family_spouse_business_name = $_POST['family_spouse_business_name'];
	$family_spouse_business_address = $_POST['family_spouse_business_address'];
	$family_spouse_tel_no = $_POST['family_spouse_tel_no'];
	$family_father_surname = $_POST['family_father_surname'];
	$family_father_firstname = $_POST['family_father_firstname'];
	$family_father_name_extension = $_POST['family_father_name_extension'];
	$family_father_middlename = $_POST['family_father_middlename'];
	$family_mother_maiden_name = $_POST['family_mother_maiden_name'];
	$family_mother_surname = $_POST['family_mother_surname'];
	$family_mother_firstname = $_POST['family_mother_firstname'];
	$family_mother_name_extension = $_POST['family_mother_name_extension'];
	$family_mother_middlename = $_POST['family_mother_middlename'];


	// ADD CHILDREN
	$family_children_name = $_POST['family_children_name'];
	$family_children_sex = $_POST['family_children_sex'];
	$family_children_bday = $_POST['family_children_bday'];
	$family_children_disability = $_POST['family_children_disability'];


	// III EDUCATIONAL BACKGROUND
	$educational_level = $_POST["educational_level"];
    $educational_school_name = $_POST["educational_school_name"];
    $educational_course = $_POST["educational_course"];
    $educational_attendance_from = $_POST["educational_attendance_from"];
    $educational_attendance_to = $_POST["educational_attendance_to"];
    $educational_units_earned = $_POST["educational_units_earned"];
    $educational_year_graduated = $_POST["educational_year_graduated"];
    $educational_scholarship = $_POST["educational_scholarship"];


    // IV SERVICE ELIGIBILITY
    $service_career = $_POST['service_career'];
	$service_rating = $_POST['service_rating'];
	$service_date_of_exam = $_POST['service_date_of_exam'];
	$service_place_of_exam = $_POST['service_place_of_exam'];
	$service_license = $_POST['service_license'];
	$service_license_date = $_POST['service_license_date'];


	// V WORK EXPERIENCE
	$work_inclusive_date_from = $_POST['work_inclusive_date_from'];
	$work_inclusive_date_to = $_POST['work_inclusive_date_to'];
	$work_position = $_POST['work_position'];
	$work_agency = $_POST['work_agency'];
	$work_salary = $_POST['work_salary'];
	$work_pay_grade = $_POST['work_pay_grade'];
	$work_appoinment = $_POST['work_appoinment'];
	$work_gov_service = $_POST['work_gov_service'];


	// IV VOLUNTARY WORK
	$voluntary_name = $_POST['voluntary_name'];
	$voluntary_address = $_POST['voluntary_address'];
	$voluntary_date_from = $_POST['voluntary_date_from'];
	$voluntary_date_to = $_POST['voluntary_date_to'];
	$voluntary_no_of_hrs = $_POST['voluntary_no_of_hrs'];
	$voluntary_position = $_POST['voluntary_position'];


	// VII LEARNING AND DEVELOPMENT
	$learning_training = $_POST['learning_training'];
	$learning_date_from = $_POST['learning_date_from'];
	$learning_date_to = $_POST['learning_date_to'];
	$learning_no_hrs = $_POST['learning_no_hrs'];
	$learning_ld_type = $_POST['learning_ld_type'];
	$learning_sponsored = $_POST['learning_sponsored'];



	// VIII OTHERS HOBBIES
	$others_special_skills = $_POST['others_special_skills'];

	// VIII OTHERS NON ACADEMIC
	$others_non_academic = $_POST['others_non_academic'];

	// VIII OTHERS MEMBERSHIP
	$others_membership = $_POST['others_membership'];



	// VIII OTHERS QUESTIONS
	$q_34 = $_POST['q_34'];
	$q_34_b = $_POST['q_34_b'];
	$q_35_a = $_POST['q_35_a'];
	$q_35_b = $_POST['q_35_b'];
	$q_36 = $_POST['q_36'];
	$q_37 = $_POST['q_37'];
	$q_38_a = $_POST['q_38_a'];
	$q_38_b = $_POST['q_38_b'];
	$q_39 = $_POST['q_39'];
	$q_40_a = $_POST['q_40_a'];
	$q_40_b = $_POST['q_40_b'];
	$q_40_c = $_POST['q_40_c'];


	// VIII OTHERS REFERENCE
	$reference_name = $_POST['reference_name'];
	$reference_address = $_POST['reference_address'];
	$reference_tel_no = $_POST['reference_tel_no'];


	// VIII OTHERS GOVERNMENT ISSUED
	$government_issued_id = $_POST['government_issued_id'];
	$government_issued_passport = $_POST['government_issued_passport'];
	$government_issued_date_issuance = $_POST['government_issued_date_issuance'];
	$government_issued_place_issuance = $_POST['government_issued_place_issuance'];
	$government_issued_date_appointment = $_POST['government_issued_date_appointment'];

	$file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $time = time();









		// PERSONAL INFO QUERY
		$sql = "INSERT INTO `main_i_personal_info`(`personal_surname`, `personal_firstname`, `personal_name_extension`, `personal_middlename`, `personal_birthday`, `personal_bday_place`, `personal_designation`, `personal_department`, `personal_academic_rank`, `personal_administrative_rank`, `personal_emp_status`, `personal_campus`, `personal_sex`, `personal_civil_status`, `personal_height`, `personal_weight`, `personal_blood`, `personal_gsis`, `personal_pagibig`, `personal_philhealth`, `personal_sss`, `personal_tin`, `personal_id_no`, `personal_citizenship`, `personal_by_birth`, `personal_dual_indication`, `personal_residential_lot_no`, `personal_residential_street`, `personal_residential_subdivision`, `personal_residential_barangay`, `personal_residential_city`, `personal_residential_province`, `personal_residential_zipcode`, `personal_permanent_lot_no`, `personal_permanent_street`, `personal_permanent_subdivision`, `personal_permanent_barangay`, `personal_permanent_city`, `personal_permanent_province`, `personal_permanent_zipcode`, `personal_tel_no`, `personal_mobile_no`, `personal_email`, `approval`, `date_created`)

	 	VALUES ('$personal_surname', '$personal_firstname', '$personal_name_extension', '$personal_middlename', '$personal_birthday', '$personal_bday_place', '$personal_designation', '$personal_department', '$personal_academic_rank', '$personal_administrative_rank', '$personal_emp_status', '$personal_campus', '$personal_sex', '$personal_civil_status', '$personal_height', '$personal_weight', '$personal_blood', '$personal_gsis', '$personal_pagibig', '$personal_philhealth', '$personal_sss', '$personal_tin', '$personal_id_no', '$personal_citizenship', '$personal_by_birth', '$personal_dual_indication', '$personal_residential_lot_no', '$personal_residential_street', '$personal_residential_subdivision', '$personal_residential_barangay', '$personal_residential_city', '$personal_residential_province', '$personal_residential_zipcode', '$personal_permanent_lot_no', '$personal_permanent_street', '$personal_permanent_subdivision', '$personal_permanent_barangay', '$personal_permanent_city', '$personal_permanent_province', '$personal_permanent_zipcode', '$personal_tel_no', '$personal_mobile_no', '$personal_email', 'PENDING', '$datecreatedexact')";

		$result = mysqli_query($con, $sql);



	    // FAMILY BACKGROUND QUERY
	    $sql_1 = "INSERT INTO `main_ii_family_background`(`family_spouse_surname`, `family_spouse_firstname`, `family_spouse_name_extension`, `family_spouse_middlename`, `family_spouse_occupation`, `family_spouse_business_name`, `family_spouse_business_address`, `family_spouse_tel_no`, `family_father_surname`, `family_father_firstname`, `family_father_name_extension`, `family_father_middlename`, `family_mother_maiden_name`, `family_mother_surname`, `family_mother_firstname`, `family_mother_name_extension`, `family_mother_middlename`, `date_created`)

           VALUES ('$family_spouse_surname', '$family_spouse_firstname', '$family_spouse_name_extension', '$family_spouse_middlename', '$family_spouse_occupation', '$family_spouse_business_name', '$family_spouse_business_address', '$family_spouse_tel_no', '$family_father_surname', '$family_father_firstname', '$family_father_name_extension', '$family_father_middlename', '$family_mother_maiden_name', '$family_mother_surname', '$family_mother_firstname', '$family_mother_name_extension', '$family_mother_middlename', '$datecreatedexact')";

        $result_1 = mysqli_query($con, $sql_1);



        // ADD CHILDREN QUERY
        foreach($family_children_name as $index => $value){

	    	$for_family_children_name = $value;
	    	$for_family_children_sex = $family_children_sex[$index];
	    	$for_family_children_bday = $family_children_bday[$index];
	    	$for_family_children_disability = $family_children_disability[$index];

	    	$sql_2 = "INSERT INTO `main_ii_add_children`(`family_children_name`, `family_children_sex`, `family_children_bday`, `family_children_disability`, `date_created`) VALUES ('$for_family_children_name','$for_family_children_sex','$for_family_children_bday','$for_family_children_disability','$datecreatedexact');";
	        $result_2 = mysqli_query($con, $sql_2);
        }



        // EDUCATIONAL BACKGROUND QUERY
        foreach($educational_school_name as $index => $value){

	    	$for_educational_school_name = $value;

	    	$for_educational_level = $educational_level[$index];
	    	$for_educational_course = $educational_course[$index];
	    	$for_educational_attendance_from = $educational_attendance_from[$index];
	    	$for_educational_attendance_to = $educational_attendance_to[$index];
	    	$for_educational_units_earned = $educational_units_earned[$index];
	    	$for_educational_year_graduated = $educational_year_graduated[$index];
	    	$for_educational_scholarship = $educational_scholarship[$index];

	    	$sql_3 = "INSERT INTO `main_iii_educational_background`(`educational_level`, `educational_school_name`, `educational_course`, `educational_attendance_from`, `educational_attendance_to`, `educational_units_earned`, `educational_year_graduated`, `educational_scholarship_class`, `date_created`)

	    	VALUES ('$for_educational_level','$for_educational_school_name','$for_educational_course','$for_educational_attendance_from','$for_educational_attendance_to','$for_educational_units_earned','$for_educational_year_graduated','$for_educational_scholarship','$datecreatedexact');";

	        $result_3 = mysqli_query($con, $sql_3);
        }



        // SERVICE ELIGIBILITY QUERY
        foreach($service_career as $index => $value){

	    	$for_service_career = $value;
	    	$for_service_rating = $service_rating[$index];
	    	$for_service_date_of_exam = $service_date_of_exam[$index];
	    	$for_service_place_of_exam = $service_place_of_exam[$index];
	    	$for_service_license = $service_license[$index];
	    	$for_service_license_date = $service_license_date[$index];

	    	$sql_4 = "INSERT INTO `main_iv_service_eligibility`(`service_career`, `service_rating`, `service_date_of_exam`, `service_place_of_exam`, `service_license`, `service_license_date`, `date_created`)

	    	 VALUES ('$for_service_career','$for_service_rating','$for_service_date_of_exam','$for_service_place_of_exam','$for_service_license','$for_service_license_date','$datecreatedexact');";

	        $result_4 = mysqli_query($con, $sql_4);
        }



        // WORK EXPERIENCE QUERY
        foreach($work_inclusive_date_from as $index => $value){

	    	$for_work_inclusive_date_from = $value;
	    	$for_work_inclusive_date_to = $work_inclusive_date_to[$index];
	    	$for_work_position = $work_position[$index];
	    	$for_work_agency = $work_agency[$index];
	    	$for_work_salary = $work_salary[$index];
	    	$for_work_pay_grade = $work_pay_grade[$index];
	    	$for_work_appoinment = $work_appoinment[$index];
	    	$for_work_gov_service = $work_gov_service[$index];

	    	$sql_5 = "INSERT INTO `main_v_work_experience`(`work_inclusive_date_from`, `work_inclusive_date_to`, `work_position`, `work_agency`, `work_salary`, `work_pay_grade`, `work_appoinment`, `work_gov_service`, `date_created`)

	    	 VALUES('$for_work_inclusive_date_from','$for_work_inclusive_date_to','$for_work_position','$for_work_agency','$for_work_salary','$for_work_pay_grade','$for_work_appoinment','$for_work_gov_service','$datecreatedexact');";

	        $result_5 = mysqli_query($con, $sql_5);
        }



        // VOLUNTARY WORK QUERY
        foreach($voluntary_name as $index => $value){

	    	$for_voluntary_name = $value;
	    	$for_voluntary_address = $voluntary_address[$index];
	    	$for_voluntary_date_from = $voluntary_date_from[$index];
	    	$for_voluntary_date_to = $voluntary_date_to[$index];
	    	$for_voluntary_no_of_hrs = $voluntary_no_of_hrs[$index];
	    	$for_voluntary_position = $voluntary_position[$index];

	    	$sql_6 = "INSERT INTO `main_vi_voluntary_work`(`voluntary_name`, `voluntary_address`, `voluntary_date_from`, `voluntary_date_to`, `voluntary_no_of_hrs`, `voluntary_position`, `date_created`)

	    	 VALUES ('$for_voluntary_name','$for_voluntary_address','$for_voluntary_date_from','$for_voluntary_date_to','$for_voluntary_no_of_hrs','$for_voluntary_position','$datecreatedexact');";

	        $result_6 = mysqli_query($con, $sql_6);
        }



        // WORK AND DEVELOPMENT QUERY
        foreach($learning_training as $index => $value){

	    	$for_learning_training = $value;
	    	$for_learning_date_from = $learning_date_from[$index];
	    	$for_learning_date_to = $learning_date_to[$index];
	    	$for_learning_no_hrs = $learning_no_hrs[$index];
	    	$for_learning_ld_type = $learning_ld_type[$index];
	    	$for_learning_sponsored = $learning_sponsored[$index];

	    	$sql_7 = "INSERT INTO `main_vii_learning_and_dev`(`learning_training`, `learning_date_from`, `learning_date_to`, `learning_no_hrs`, `learning_ld_type`, `learning_sponsored`, `date_created`)

	    	 VALUES ('$for_learning_training','$for_learning_date_from','$for_learning_date_to','$for_learning_no_hrs','$for_learning_ld_type','$for_learning_sponsored','$datecreatedexact');";

	        $result_7 = mysqli_query($con, $sql_7);
        }




        // ADD HOBBIES
        foreach($others_special_skills as $index => $value){

	    	$for_others_special_skills = $value;

	    	$sql_8 = "INSERT INTO `main_viii_others_hobbies`(`others_special_skills`, `date_created`)

	    	VALUES ('$for_others_special_skills','$datecreatedexact');";

	        $result_8 = mysqli_query($con, $sql_8);
        }



        // ADD NON ACADEMIC
        foreach($others_non_academic as $index => $value){

	    	$for_others_non_academic = $value;

	    	$sql_9 = "INSERT INTO `main_viii_others_non_academic`(`others_non_academic`, `date_created`)

	    	VALUES ('$for_others_non_academic','$datecreatedexact');";

	        $result_9 = mysqli_query($con, $sql_9);
        }



        // ADD MEMBERSHIP
        foreach($others_membership as $index => $value){

	    	$for_others_membership = $value;

	    	$sql_10 = "INSERT INTO `main_viii_membership`(`others_membership`, `date_created`)

	    	VALUES ('$for_others_membership','$datecreatedexact');";

	        $result_10 = mysqli_query($con, $sql_10);
        }



        // ADD QUESTIONS
        $sql_11 = "INSERT INTO `main_viii_others_questions`(`q_34`, `q_34_b`, `q_35_a`, `q_35_b`, `q_36`, `q_37`, `q_38_a`, `q_38_b`, `q_39`, `q_40_a`, `q_40_b`, `q_40_c`, `date_created`)

        VALUES ('$q_34', '$q_34_b', '$q_35_a', '$q_35_b', '$q_36', '$q_37', '$q_38_a', '$q_38_b', '$q_39', '$q_40_a', '$q_40_b', '$q_40_c', '$datecreatedexact')";

        $result_11 = mysqli_query($con, $sql_11);



        // ADD REFERENCE
        $sql_12 = "INSERT INTO `main_viii_others_reference`(`reference_name`, `reference_address`, `reference_tel_no`, `date_created`)

         VALUES ('$reference_name', '$reference_address', '$reference_tel_no', '$datecreatedexact')";

        $result_12 = mysqli_query($con, $sql_12);



        // ADD GOVERNMENT ISSUED
        $sql_13 = "INSERT INTO `main_viii_government_issued`(`government_issued_id`, `government_issued_passport`, `government_issued_date_issuance`, `government_issued_place_issuance`, `government_issued_img`, `government_issued_date_appointment`, `date_created`)

        VALUES ('$government_issued_id', '$government_issued_passport', '$government_issued_date_issuance', '$government_issued_place_issuance', '$time$file_name', '$government_issued_date_appointment', '$datecreatedexact')";

        $result_13 = mysqli_query($con, $sql_13);
        if($result_13){
            $location = "./uploads/";;
            move_uploaded_file($file_tmp, $location.$time.$file_name);
        }




        $_SESSION['status_insert'] = "Action Performed Successfully";
	    header("location:DTM_Personnels.php");

		/*$sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
		$result1=mysqli_query($con,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		$user_name=$row1['username'];
		$phdate = date("Y-m-d H:i:s");

		$sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Adding of Department','$phdate')";
		$result2 = mysqli_query($con, $sql2);   */

 }


	if(!isset($_SESSION['email'])){
		header('location:../index.php');
	}


	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
		<link href="http://fonts.cdnfonts.com/css/circular-std" rel="stylesheet">
		<script src="sweetalert2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="sweetalert2.min.css">
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_CLASS.css">
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_INV_91.css">
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_CLASS_RELEASE_WAREHOUSE_91.css">
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_CLASS_RELEASE_CONTRACTOR_91.css">
		<link rel="stylesheet" type="text/css" href="CSS/DTM_supplier_sub_create.css">
		<link rel="stylesheet" type="text/css" href="CSS/z_purchase_order_drop_none.css">
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/project_no_drop_sub.css">
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/bom_no_drop_sub.css">
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/project_bom_no_drop_sub.css">
		<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ntp_no_drop_sub.css">
		<link rel="stylesheet" type="text/css" href="CSS/z_warehouse_no_drop.css">

		<title>GAD - Add Personnel</title>
	</head>
	<body>



		<style type="text/css">

			.select2-dropdown{
				z-index: 999999999!important;
				font-size: 11px!important;
			}
			.select2-container{
				width: 100%!important;
			}

			.select2-selection {
				height: 38px!important;
				overflow: hidden!important;
				padding: 5px 0px 5px 5px!important;
				border: 1px solid #CACFD2!important;
				font-size: 12px!important;
				color: #34495F!important;
				text-transform: uppercase!important;
				border-radius: 4px!important;
			}

			.select2-container--default .select2-search--dropdown .select2-search__field{
				padding: 12px;
			}

			.select2-container--default .select2-selection--single .select2-selection__arrow{
				top: 0px!important;
				right: 4px!important;
			}


		</style>


		<!-- SIDE BAR START-->

	<div class="overlay2">

	</div>

	<section id="sidebar">



		<div style="padding: 30px 25px 0px 27px;">
			<div class="bhc-img" style="overflow-x: hidden;">
				<img src="img/log123.png">
				<h2 style="white-space: normal;"><?php echo $campus_name ?></h2>
			</div>
		</div>

		<div class="padd-cont" style="margin-top: -70px;">

		<ul class="side-menu top">

			<div class="reports" style="margin-top: -10px;">
				<h4 class="report1">STATISTICS</h4>
			</div>

			<li>
				<a href="index.php" class="side-btn">
					<i class="fi fi-rr-home" style="margin-top: 3px;"></i>
					<span class="text emp-chev">&nbsp; Home </span>
				</a>
			</li>

			<div class="reports" style="margin-top: 10px;">
				<h4 class="report1">MANAGE</h4>
			</div>

			<li>
				<a href="#" class="dash-drop side-btn">
					<i class="fi fi-rr-chart-pie-alt"></i>
					<span class="text dash-chev" style="letter-spacing: .3px">&nbsp; Data Management </span>
					<i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-right: 12px; " id="chev-rotate"></i>
					<input type="text" class="data_management_class" hidden>
				</a>
			</li>
				<ul id="dash-dropdown" style="margin-top: 0px;">
					<li class="emp-down-li emp-ac emp-paydas">
						<a href="DTM_Campus.php">
							<h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
							<span class="text ">&nbsp;Campus</span>
							<input type="text" name="position" class="position_class" hidden>
						</a>
					</li>


					<li class="emp-down-li emp-ac emp-paydas">
						<a href="#" class="release-warehouse-drop" style="position: relative;">
							<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
							<span class="text">&nbsp;Designation</span>
							<i class="fa-solid fa-chevron-right " style="font-size: 10px; position: absolute; right: 20px;" id="release-warehouse-chev-rotate"></i>
							<input type="text" name="material" class="material_class" hidden>
						</a>
					</li>
						<ul id="release-warehouse-dropdown" style="display: none;">
							<li class="emp-down-li emp-ac emp-paydas" style="height: 45px!important;">
								<a href="DTM_Designation.php" style="position: relative;">
									<h4 style="color: #D5D5D5; margin-right: 5px; margin-left: 25px">—</h4>
									<span class="text" style="letter-spacing: 0px;">&nbsp;View Designation</span>
								</a>
							</li>
							<li class="emp-down-li emp-ac emp-paydas" style="height: 45px!important;">
								<a href="DTM_Designation_Mananage_Type.php">
									<h4 style="color: #D5D5D5; margin-right: 5px; margin-left: 25px">—</h4>
									<span class="text" style="letter-spacing: 0px">&nbsp;Management Type</span>
								</a>
							</li>
						</ul>




					<li class="emp-down-li emp-ac emp-paydas">
						<a href="DTM_Admin_Rank.php">
							<h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
							<span class="text " >&nbsp;Administrative Rank</span>
							<input type="text" name="users" class="users_class" hidden>
						</a>
					</li>
					<li class="emp-down-li emp-ac emp-paydas">
						<a href="DTM_Academic_Rank.php">
							<h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
							<span class="text ">&nbsp;Academic Rank</span>
							<input type="text" name="supplier" class="supplier_class" hidden>
						</a>
					</li>
					<li class="emp-down-li emp-ac emp-paydas">
						<a href="DTM_Department.php">
							<h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
							<span class="text">&nbsp;Department</span>
							<input type="text" name="units" class="units_class" hidden>
						</a>
					</li>
				</ul>



			<li class="active">
				<a href="#" class="project-drop side-btn">
					<i class="fi fi-rr-users"></i>
					<span class="text emp-chev">&nbsp; Personnels </span>
					<i class="fa-solid fa-chevron-right" style="font-size: 10px;" id="project-chev-rotate"></i>
				</a>
			</li>
				<ul id="project-dropdown">
						<li class="emp-down-li emp-ac emp-paydas">
							<a href="DTM_Personnels.php" class="act-hover">
								<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
								<span class="text active">&nbsp;View Personnels</span>
								<input type="text" name="project_create" class="project_create_class" hidden>
							</a>
						</li>
						<li class="emp-down-li emp-ac emp-paydas">
							<a href="DTM_Personnels_EDIT.php">
								<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
								<span class="text" >&nbsp;Impending Edit</span>
								<input type="text" name="project_revise" class="project_revise_class" hidden>
							</a>
						</li>
						<li class="emp-down-li emp-ac emp-paydas">
							<a href="DTM_Personnels_APPROVAL.php">
								<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
								<span class="text">&nbsp;For Approval</span>
								<input type="text" name="project_approved" class="project_approved_class" hidden>
							</a>
						</li>
					</ul>



			<li >
				<a href="#" class="bom-drop side-btn">
					<i class="fi fi-rr-circle-user" style="font-size: 20px"></i>
					<span class="text emp-chev">&nbsp; Users </span>
					<i class="fa-solid fa-chevron-right" style="font-size: 10px;" id="bom-chev-rotate"></i>
					<input type="text" name="bom" class="bom_class" hidden>
				</a>
			</li>
				<ul id="bom-dropdown" style="margin-top: 10px">
						<li class="emp-down-li emp-ac emp-paydas">
							<a href="MAIN_View_Users.php">
								<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
								<span class="text ">&nbsp;View Users</span>
								<input type="text" name="bom_create" class="bom_create_class" hidden>
							</a>
						</li>
						<li class="emp-down-li emp-ac emp-paydas">
							<a href="MAIN_Activity_Log.php">
								<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
								<span class="text" >&nbsp;Activity Log</span>
								<input type="text" name="bom_revise" class="bom_revise_class" hidden>
							</a>
						</li>
					</ul>


			<li>
				<a href="logout.php" class="project-drop side-btn">
					<i class="fi fi-rr-exit" style="margin-left: 15px; font-size: 15px;"></i>
					<span class="text emp-chev">&nbsp; Log-Out </span>
				</a>
			</li>




		</ul>

		</div>

	</section>
	<!-- SIDE BAR END-->


		<!-- CONTENT START -->
		<section id="content">

			<!-- MAIN START -->

			<main>



				<div class="navbar">

					<?php

					include 'NAVBAR/navbar.php';

					?>

				</div>



				<!-- TABLE -->


				<div class="table2-container" style="margin-top: 30px; padding-bottom: 5px;">

					<div class="return-class">
			          <a href="DTM_Personnels.php"><i class='bx bx-arrow-back'></i></a>
			        </div>

					<form method="POST" class="form_validate" enctype="multipart/form-data" >


						<div id="bom-details-parent-id" style="padding-bottom: 1px; padding-top: 27px;">

						<!-- CREATE BOM CONTAINER -->
						<div id="create-bom-cont-id" style="border: 0px solid #A2A2A2; border-radius: 6px; padding: 20px 30px 20px 30px; margin-bottom: -23px; margin-top: 10px;">

							<div id="bom-details-parent-id1" style="border: none;">

								<div style="margin-bottom: 28px; margin-top: -40px; margin-bottom: 5px;">
									<label style="font-size: 18px; text-decoration: underline;">ADD NEW PERSONNEL</label>
								</div>

							</div>


							<!-- I. PERSONAL INFORMATION -->
							<div class="main-table-container-div">

								<div id="" class="project-details-div" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 50px 55px 20px 55px; margin-bottom: 30px;">

									<div style="margin-bottom: 25px;">
                                        <label style="font-size: 16.6px; text-decoration: underline;">I. PERSONAL INFORMATION</label>
                                    </div>

                                    <div style="margin-bottom: 40px">
                                    	<span style="color: #fff; font-size: 12px!important; font-weight: 500; margin-left: 0px; background-color: #F5B041; border: 0px!important; padding: 5px 15px; border-radius: 25px; text-transform: uppercase;">NOTE : All required fields would be indicated with a label ( REQUIRED ).</span>
                                    </div>

                                    <!-- INPUTS PARENT -->
                                    <div style="margin-bottom: 10px; border-top: 1px solid #939393; padding-top: 22px">

                                    	<div>
                                    		<label>Surname</label><span class="additional-span">( REQUIRED )</span>
                                    	</div>
                                    	<div>
                                    		<input name="personal_surname" placeholder="----" required style="margin-bottom: 23px;" value="">
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                                    		<div>
	                                    		<label>First Name</label><span class="additional-span">( REQUIRED )</span>
	                                    		<input name="personal_firstname" placeholder="----" required style="margin-bottom: 23px;" value="">
	                                    	</div>
	                                    	<div>
	                                    		<label>NAME EXTENSION(JR, SR)</label>
	                                    		<input name="personal_name_extension" placeholder="----" style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>

                                    	<div>
                                    		<label>Middle Name</label><span class="additional-span">( REQUIRED )</span>
                                    	</div>
                                    	<div>
                                    		<input name="personal_middlename" placeholder="----" required style="margin-bottom: 23px;" value="">
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                                    		<div>
	                                    		<label>Birthday</label><span class="additional-span">( REQUIRED )</span>
	                                    		<input type="date" name="personal_birthday" placeholder="----" required style="margin-bottom: 23px;" value="">
	                                    	</div>
	                                    	<div>
	                                    		<label>Place Of Birth</label><span class="additional-span">( REQUIRED )</span>
	                                    		<input name="personal_bday_place" placeholder="----" required style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                                    		<div>
                                    			<div style="margin-bottom: 12px">
                                    				<label>Designation</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_designation"  style="height: 38px; margin-bottom: 25px;" required>
								                 <option style="display: none;" value="">-SELECT Designation-</option>
								                 <?php

						                              $sql2="SELECT * FROM `dtm_designation` GROUP BY `designation`";
						                              $result2=mysqli_query($con,$sql2);

						                              while($row2=mysqli_fetch_array($result2)){
						                                  echo '<option value="'.$row2[1].'">'.$row2[1].'</option>';
						                              }

							                     ?>
										        </select>
	                                    	</div>
	                                    	<div>
	                                    		<div style="margin-bottom: 12px">
                                    				<label>Department</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_department"  style="height: 38px; margin-bottom: 25px;" required>
								                 <option style="display: none;" value="">-SELECT Department-</option>
								                 <?php

						                              $sql2="SELECT * FROM `dtm_department` GROUP BY `department`";
						                              $result2=mysqli_query($con,$sql2);

						                              while($row2=mysqli_fetch_array($result2)){
						                                  echo '<option value="'.$row2[1].'">'.$row2[1].'</option>';
						                              }

							                     ?>
										        </select>
	                                    	</div>
                                    	</div>


                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                                    		<div>
                                    			<div style="margin-bottom: 12px">
                                    				<label>ACADEMIC RANK</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_academic_rank"  style="height: 38px; margin-bottom: 25px;" required>
								                 <option style="display: none;" value="">-SELECT RANK-</option>
								                 <?php

						                              $sql2="SELECT * FROM `dtm_academic_rank` GROUP BY `academic_rank`";
						                              $result2=mysqli_query($con,$sql2);

						                              while($row2=mysqli_fetch_array($result2)){
						                                  echo '<option value="'.$row2[1].'">'.$row2[1].'</option>';
						                              }

							                     ?>
										        </select>
	                                    	</div>
	                                    	<div>
	                                    		<div style="margin-bottom: 12px">
                                    				<label>ADMINISTRATIVE RANK</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_administrative_rank"  style="height: 38px; margin-bottom: 25px;" required>
								                 <option style="display: none;" value="">-SELECT RANK-</option>
								                 <?php

						                              $sql2="SELECT * FROM `dtm_administrative_rank` GROUP BY `administrative_rank`";
						                              $result2=mysqli_query($con,$sql2);

						                              while($row2=mysqli_fetch_array($result2)){
						                                  echo '<option value="'.$row2[1].'">'.$row2[1].'</option>';
						                              }

							                     ?>
										        </select>
	                                    	</div>
                                    	</div>


                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                                    		<div>
                                    			<div style="margin-bottom: 12px">
                                    				<label>EMPLOYEE STATUS</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_emp_status"  style="height: 38px; margin-bottom: 25px;" required>
									                 <option style="display: none;" value="">-SELECT STATUS-</option>
									                 <option style="display: none;" value="CASUAL">CASUAL</option>
									                 <option style="display: none;" value="JOB ORDER">JOB ORDER</option>
									                 <option style="display: none;" value="PERMANENT">PERMANENT</option>
									                 <option style="display: none;" value="PART TIME">PART TIME</option>
									                 <option style="display: none;" value="TEMPORARY">TEMPORARY</option>
										        </select>
	                                    	</div>
	                                    	<div>
	                                    		<div style="margin-bottom: 12px">
                                    				<label>CAMPUS</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_campus"  style="height: 38px; margin-bottom: 25px;" required>
								                 <option style="display: none;" value="">-SELECT CAMPUS-</option>
								                 <?php

						                              $sql2="SELECT * FROM `dtm_campus` GROUP BY `campus_name`";
						                              $result2=mysqli_query($con,$sql2);

						                              while($row2=mysqli_fetch_array($result2)){
						                                  echo '<option value="'.$row2[2].'">'.$row2[2].'</option>';
						                              }

							                     ?>
										        </select>
	                                    	</div>
                                    	</div>


                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                                    		<div>
                                    			<div style="margin-bottom: 12px">
                                    				<label>Sex</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_sex"  style="height: 38px; margin-bottom: 25px;" required>
									                 <option style="display: none;" value="">-SELECT SEX-</option>
									                 <option style="display: none;" value="MALE">MALE</option>
									                 <option style="display: none;" value="FEMALE">FEMALE</option>
										        </select>
	                                    	</div>
	                                    	<div>
	                                    		<div style="margin-bottom: 12px">
                                    				<label>Civil Status</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_civil_status"  style="height: 38px; margin-bottom: 25px;" required>
								                 	 <option style="display: none;" value="">-SELECT STATUS-</option>
									                 <option style="display: none;" value="SINGLE">SINGLE</option>
									                 <option style="display: none;" value="MARRIED">MARRIED</option>
									                 <option style="display: none;" value="WIDOWED">WIDOWED</option>
									                 <option style="display: none;" value="SEPARATED">SEPARATED</option>
									                 <option style="display: none;" value="OTHER">OTHER'S</option>
										        </select>
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                                    		<div>
	                                    		<label>HEIGHT (m)</label>
	                                    		<input type="text" name="personal_height" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
	                                    	<div>
	                                    		<label>WEIGHT (kg)</label>
	                                    		<input name="personal_weight" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr;  margin-bottom: 25px;">
                                    		<div>
                                    			<div style="margin-bottom: 12px">
                                    				<label>BLOOD TYPE</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_blood"  style="height: 38px; margin-bottom: 25px;" required>
									                 <option style="display: none;" value="">-SELECT BLOOD TYPE-</option>
									                 <option style="display: none;" value="A+">A+</option>
									                 <option style="display: none;" value="O+">O+</option>
									                 <option style="display: none;" value="B+">B+</option>
									                 <option style="display: none;" value="AB+">AB+</option>
									                 <option style="display: none;" value="A-">A-</option>
									                 <option style="display: none;" value="O-">O-</option>
									                 <option style="display: none;" value="B-">B-</option>
									                 <option style="display: none;" value="AB-">AB-</option>
									                 <option style="display: none;" value="UNKNOWN">UNKNOWN</option>
										        </select>
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                                    		<div>
	                                    		<label>GSIS ID NO.</label>
	                                    		<input type="text" name="personal_gsis" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
	                                    	<div>
	                                    		<label>PAG-IBIG ID NO.</label>
	                                    		<input name="personal_pagibig" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                                    		<div>
	                                    		<label>PHILHEALTH NO.</label>
	                                    		<input type="text" name="personal_philhealth" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
	                                    	<div>
	                                    		<label>SSS NO.</label>
	                                    		<input name="personal_sss" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                                    		<div>
	                                    		<label>TIN NO.</label>
	                                    		<input type="text" name="personal_tin" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
	                                    	<div>
	                                    		<label>EMPLOYEE ID NO.</label>
	                                    		<input name="personal_id_no" placeholder="----"  style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                                    		<div>
	                                    		<div style="margin-bottom: 12px">
                                    				<label>CITIZENSHIP</label><span class="additional-span">( REQUIRED )</span>
                                    			</div>
	                                    		<select name="personal_citizenship"  style="height: 38px; margin-bottom: 25px;" required>
									                 <option style="display: none;" value="">-SELECT CITIZENSHIP-</option>
									                 <option style="display: none;" value="FILIPINO">FILIPINO</option>
									                 <option style="display: none;" value="DUAL CITIZENSHIP">DUAL CITIZENSHIP</option>
										        </select>
	                                    	</div>
	                                    	<div>
	                                    		<div style="margin-bottom: 12px">
                                    				<label style="opacity: 0;">1</label>
                                    			</div>
	                                    		<select name="personal_by_birth"  style="height: 38px; margin-bottom: 25px;" required>
									                 <option style="display: none;" value="">-SELECT-</option>
									                 <option style="display: none;" value="BY BIRTH">BY BIRTH</option>
									                 <option style="display: none;" value="BY NATURALIZATION">BY NATURALIZATION</option>
										        </select>
	                                    	</div>
	                                    	<div>
                                    			<label style="opacity: 0;">1</label>
	                                    		<input name="personal_dual_indication" placeholder="If holder of dual citizenship, please indicate the details"  style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>


                                    	<!-- RESIDENTIAL ADDRESS -->
                                    	<div style="margin-bottom: 25px; margin-top: 38px;">
                                       		<label style="font-size: 16.6px; text-decoration: underline;">RESIDENTIAL ADDRESS</label>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
											<div>
												<label for="personal_residential_lot_no_id">HOUSE/BLOCK/LOT NO.</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_residential_lot_no" id="personal_residential_lot_no_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
											<div>
												<label for="personal_residential_street_id">STREET</label><span class="additional-span">( REQUIRED )</span>
												<input name="personal_residential_street" id="personal_residential_street_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
											<div>
												<label for="personal_residential_subdivision_id">SUBDIVISION</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_residential_subdivision" id="personal_residential_subdivision_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
											<div>
												<label for="personal_residential_barangay_id">BARANGAY</label><span class="additional-span">( REQUIRED )</span>
												<input name="personal_residential_barangay" id="personal_residential_barangay_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
											<div>
												<label for="personal_residential_city_id">CITY/MUNICIPALITY</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_residential_city" id="personal_residential_city_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
											<div>
												<label for="personal_residential_province_id">PROVINCE</label><span class="additional-span">( REQUIRED )</span>
												<input name="personal_residential_province" id="personal_residential_province_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr">
											<div>
												<label for="personal_residential_zipcode_id">ZIP CODE</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_residential_zipcode" id="personal_residential_zipcode_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>


                                    	<!-- PERMANENT ADDRESS -->
                                    	<div style="margin-bottom: 5px; margin-top: 10px; display: flex; align-items: center;">
                                    		<div>
                                    			<label style="font-size: 16.6px; text-decoration: underline;">PERMANENT ADDRESS</label>
                                    		</div>
											<div style="margin-top: 12px; margin-left: 15px; display: flex; align-items: center;">
												<div>
													<input type="checkbox" id="same-address-checkbox" style="width: 12px!important; cursor: pointer;">
												</div>
												<div style="margin-top: -15px">
													<span class="additional-span" style="text-transform: uppercase; color: #AEAEAE">(Same as Residetial Address)</span>
												</div>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
											<div>
												<label>HOUSE/BLOCK/LOT NO.</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_permanent_lot_no" id="personal_permanent_lot_no_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
											<div>
												<label>STREET</label><span class="additional-span">( REQUIRED )</span>
												<input name="personal_permanent_street" id="personal_permanent_street_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
											<div>
												<label>SUBDIVISION</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_permanent_subdivision" id="personal_permanent_subdivision_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
											<div>
												<label>BARANGAY</label><span class="additional-span">( REQUIRED )</span>
												<input name="personal_permanent_barangay" id="personal_permanent_barangay_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
											<div>
													<label>CITY/MUNICIPALITY</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_permanent_city" id="personal_permanent_city_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
											<div>
													<label>PROVINCE</label><span class="additional-span">( REQUIRED )</span>
												<input name="personal_permanent_province" id="personal_permanent_province_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr">
											<div>
												<label>ZIP CODE</label><span class="additional-span">( REQUIRED )</span>
												<input type="text" name="personal_permanent_zipcode" id="personal_permanent_zipcode_id" placeholder="----"  style="margin-bottom: 23px;" value="" required>
											</div>
										</div>

										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                                    		<div>
	                                    		<label>TELEPHONE NO.</label><span class="additional-span">( REQUIRED )</span>
	                                    		<input name="personal_tel_no" placeholder="----" required style="margin-bottom: 23px;" value="">
	                                    	</div>
	                                    	<div>
	                                    		<label>MOBILE NO.</label><span class="additional-span">( REQUIRED )</span>
	                                    		<input name="personal_mobile_no" placeholder="----" required style="margin-bottom: 23px;" value="">
	                                    	</div>
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr">
											<div>
												<label>E-MAIL ADDRESS (if any)</label><span class="additional-span">( REQUIRED )</span>
												<input type="email" name="personal_email" placeholder="----"  style="margin-bottom: 23px; text-transform: none;" value="" required>
											</div>
										</div>


                                    </div>


								</div>

							</div>




							<!-- II. FAMILY BACKGROUND -->
							<div class="main-table-container-div" style="margin-top: 20px;">

								<div id="" class="project-details-div" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 50px 55px 20px 55px; margin-bottom: 30px;">

									<div style="margin-bottom: 25px;">
                                        <label style="font-size: 16.6px; text-decoration: underline;">II. FAMILY BACKGROUND</label>
                                    </div>

                                     <div style="margin-bottom: 10px; border-top: 1px solid #939393; padding-top: 22px">

                                     	<div style="margin-bottom: 15px">
                                     		<label style="font-size: 13px; text-decoration: underline;">(SPOUSE'S)</label>
                                     	</div>


                                     	<!-- SPOUSE -->
                                    	<div>
										    <label>SPOUSE'S SURNAME</label>
										</div>
										<div>
										    <input name="family_spouse_surname" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>
										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
										    <div>
										        <label>First Name</label>
										        <input name="family_spouse_firstname" placeholder="----" style="margin-bottom: 23px;" value="">
										    </div>
										    <div>
										        <label>Name Extension (JR, SR)</label>
										        <input name="family_spouse_name_extension" placeholder="----" style="margin-bottom: 23px;" value="">
										    </div>
										</div>
										<div>
										    <label>Middle Name</label>
										</div>
										<div>
										    <input name="family_spouse_middlename" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>
										<div>
										    <label>Occupation</label>
										</div>
										<div>
										    <input name="family_spouse_occupation" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>
										<div>
										    <label>Employer/Business Name</label>
										</div>
										<div>
										    <input name="family_spouse_business_name" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>
										<div>
										    <label>Business Address</label>
										</div>
										<div>
										    <input name="family_spouse_business_address" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>
										<div>
										    <label>Telephone No.</label>
										</div>
										<div>
										    <input name="family_spouse_tel_no" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>
										<!-- FATHER -->
										<div style="margin-bottom: 15px">
										    <label style="font-size: 13px; text-decoration: underline;">(FATHER'S)</label>
										</div>
										<div>
										    <label>FATHER'S SURNAME</label>
										</div>
										<div>
										    <input name="family_father_surname" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>
										<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
										    <div>
										        <label>First Name</label>
										        <input name="family_father_firstname" placeholder="----" style="margin-bottom: 23px;" value="">
										    </div>
										    <div>
										        <label>Name Extension (JR, SR)</label>
										        <input name="family_father_name_extension" placeholder="----" style="margin-bottom: 23px;" value="">
										    </div>
										</div>
										<div>
										    <label>Middle Name</label>
										</div>
										<div>
										    <input name="family_father_middlename" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>



										<!-- MOTHER -->
										<div style="margin-bottom: 15px">
                                     		<label style="font-size: 13px; text-decoration: underline;">(MOTHER'S)</label>
                                     	</div>

                                     	<div>
                                    		<label>MOTHER'S MAIDEN NAME</label>
                                    	</div>
                                    	<div>
                                    		<input name="family_mother_maiden_name" placeholder="----" style="margin-bottom: 23px;" value="">
                                    	</div>

                                    	<div>
                                    		<label>MOTHER'S SURNAME</label>
                                    	</div>
                                    	<div>
                                    		<input name="family_mother_surname" placeholder="----" style="margin-bottom: 23px;" value="">
                                    	</div>

                                    	<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
										    <div>
										        <label>First Name</label>
										        <input name="family_mother_firstname" placeholder="----" style="margin-bottom: 23px;" value="">
										    </div>
										    <div>
										        <label>Name Extension (JR, SR)</label>
										        <input name="family_mother_name_extension" placeholder="----" style="margin-bottom: 23px;" value="">
										    </div>
										</div>
										<div>
										    <label>Middle Name</label>
										</div>
										<div>
										    <input name="family_mother_middlename" placeholder="----" style="margin-bottom: 23px;" value="">
										</div>


										<!-- ADD CHILDREN FAMILY BACKGROUND -->
										<table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px;" id="family_children_table_id">
											<thead>
												<th class="name-border" style="text-align: left;">NAME OF CHILDREN (Write full name and list all)</th>
												<th class="name-border" style="text-align: left;">SEX</th>
												<th class="name-border" style="text-align: left;">DATE OF BIRTH</th>
												<th class="name-border" style="text-align: left;">DISABILITY</th>
											</thead>

											<tbody>
												<tr>
													<td>
														<input type="text" name="family_children_name[]" placeholder="----" autocomplete="off" class="children_name_class" style="width: 500px">
													</td>
													<td>
			                                    		<select name="family_children_sex[]"  style="height: 38px; margin-bottom: 25px;" class="children_sex_class">
											                 <option style="display: none;" value="">-SELECT SEX-</option>
											                 <option style="display: none;" value="MALE">MALE</option>
											                 <option style="display: none;" value="FEMALE">FEMALE</option>
												        </select>
													</td>
													<td>
														<input type="date" name="family_children_bday[]" placeholder="----" autocomplete="off" class="children_bday_class">
													</td>
													<td>
			                                    		<select name="family_children_disability[]"  style="height: 38px; margin-bottom: 25px;" class="children_disability_class">
											                 <option style="display: none;" value="NONE">NONE</option>
											                 <option style="display: none;" value="COGNITIVE">COGNITIVE</option>
											                 <option style="display: none;" value="HEARING">HEARING</option>
											                 <option style="display: none;" value="MOTOR">MOTOR</option>
											                 <option style="display: none;" value="VISUAL">VISUAL</option>
											                 <option style="display: none;" value="OTHER'S">OTHER'S</option>
												        </select>
													</td>
												</tr>
											</tbody>

											<tr>
												<td id="add-children" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
											</tr>

										</table>
										<!-- ADD CHILDREN FAMILY BACKGROUND -->




                                    </div>

                                </div>

							</div>



							<!-- III EDUCATIONAL BACKGROUND -->
							<div class="main-table-container-div" style="margin-top: 20px;">
								<div id="" class="project-details-div" style="">

									<table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px;" id="educational_table_id">

										<thead>
											<th class="name-border" style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px;">III. EDUCATIONAL BACKGROUND</th>
										</thead>

										<thead>
											<th class="name-border" style="text-align: left;">LEVEL</th>
											<th class="name-border" style="text-align: left;">NAME OF SCHOOL(Write in full)</th>
											<th class="name-border" style="text-align: left;">BASIC EDUCATION/DEGREE/COURSE(Write in full)</th>
											<th class="name-border" style="text-align: left;">PERIOD OF ATTENDANCE(FROM - TO)</th>
											<th class="name-border" style="text-align: left;">HIGHEST LEVEL/UNITS EARNED(if not graduated)</th>
											<th class="name-border" style="text-align: left;">YEAR GRADUATED</th>
											<th class="name-border" style="text-align: left;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED</th>
										</thead>

										<tbody>
											<tr>

												<td>
		                                    		<select name="educational_level[]"  style="height: 38px; margin-bottom: 25px;" class="educational_level_class">
										                 <option value="">-SELECT LEVEL-</option>
										                 <option value="ELEMENTARY">ELEMENTARY</option>
										                 <option value="SECONDARY">SECONDARY</option>
										                 <option value="VOCATIONAL">VOCATIONAL</option>
										                 <option value="BACHELORS DEGREE">BACHELORS DEGREE</option>
										                 <option value="MASTERS DEGRE">MASTERS DEGREE</option>
										                 <option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option>
											        </select>
												</td>

												<td>
													<input type="text" name="educational_school_name[]" placeholder="----" autocomplete="off" class="educational_school_name_class" style="width: 400px">
												</td>

												<td>
													<input type="text" name="educational_course[]" placeholder="----" autocomplete="off" class="educational_course_class" style="width: 400px">
												</td>

												<td>
													<input type="text" name="educational_attendance_from[]" placeholder="----" autocomplete="off" class="educational_attendance_from_class" style="width: 150px; margin-right: 10px;">
													<input type="text" name="educational_attendance_to[]" placeholder="----" autocomplete="off" class="educational_attendance_to_class" style="width: 150px">
												</td>

												<td>
													<input type="text" name="educational_units_earned[]" placeholder="----" autocomplete="off" class="educational_units_earned_class" style="width: 400px">
												</td>

												<td>
													<input type="text" name="educational_year_graduated[]" placeholder="----" autocomplete="off" class="educational_year_graduated_class">
												</td>

												<td>
													<input type="text" name="educational_scholarship[]" placeholder="----" autocomplete="off" class="educational_scholarship_class">
												</td>

											</tr>
										</tbody>

										<tr>
											<td id="add-educational" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
										</tr>

									</table>

                                 </div>
							</div>



							<!-- IV CIVIL SERVICE ELIGIBILITY -->
							<div class="main-table-container-div" style="margin-top: 20px;">

								<div id="" class="project-details-div" style="">

                                    <table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px;" id="service_table_id">

                                    	<thead>
											<th class="name-border" style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px;">IV. CIVIL SERVICE ELIGIBILITY</th>
										</thead>

										<thead>
											<th class="name-border" style="text-align: left;">
												CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER
												<br>
												SPECIAL LAWS/ CES/ CSEE
												<br>
												BARANGAY ELIGIBILITY / DRIVER'S LICENSE
											</th>
											<th class="name-border" style="text-align: left;">RATING(If Applicable)</th>
											<th class="name-border" style="text-align: left;">DATE OF EXAMINATION / CONFERMENT</th>
											<th class="name-border" style="text-align: left;">PLACE OF EXAMINATION/ CONFERMENT</th>
											<th class="name-border" style="text-align: left;">LICENSE (if applicable)(NUMBER - DATE OF VALIDITY)</th>
										</thead>

										<tbody>
											<tr>
												<td>
													<input type="text" name="service_career[]" placeholder="----" autocomplete="off" style="width: 350px">
												</td>
												<td>
													<input type="text" name="service_rating[]" placeholder="----" autocomplete="off" >
												</td>
												<td>
													<input type="date" name="service_date_of_exam[]" placeholder="----" autocomplete="off">
												</td>
												<td>
													<input type="text" name="service_place_of_exam[]" placeholder="----" autocomplete="off">
												</td>
												<td>
													<input type="text" name="service_license[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
													<input type="date" name="service_license_date[]" placeholder="----" autocomplete="off" style="width: 180px">
												</td>
											</tr>
										</tbody>

										<tr>
											<td id="add-service" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
										</tr>

									</table>

                                </div>

							</div>



							<!-- V WORK EXPERIENCE -->
							<div class="main-table-container-div" style="margin-top: 20px;">

								<div id="" class="project-details-div">

                                    <table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px;" id="work_table_id">

                                    	<thead>
											<th class="name-border" style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px;">V. WORK EXPERIENCE</th>
										</thead>

										<thead>
											<th class="name-border" style="text-align: left;">INCLUSIVE DATES (mm/dd/yyyy)(FROM - TO)</th>
											<th class="name-border" style="text-align: left;">POSITION TITLE(Write in full/Do not abbreviate)</th>
											<th class="name-border" style="text-align: left;">
												DEPARTMENT / AGENCY / OFFICE / COMPANY
												<br>
												(Write in full/Do not abbreviate)
											</th>
											<th class="name-border" style="text-align: left;">MONTHLY SALARY</th>
											<th class="name-border" style="text-align: left;">
												SALARY/ JOB/ PAY GRADE(if applicable)
												<br>
												& STEP(Format "00-0")/ INCREMENT
											</th>
											<th class="name-border" style="text-align: left;">STATUS OF APPOINTMENTY</th>
											<th class="name-border" style="text-align: left;">GOV'T SERVICE(Y/ N)</th>
										</thead>

										<tbody>
											<tr>
												<td>
													<input type="date" name="work_inclusive_date_from[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
													<input type="date" name="work_inclusive_date_to[]" placeholder="----" autocomplete="off" style="width: 180px">
												</td>
												<td>
													<input type="text" name="work_position[]" placeholder="----" autocomplete="off" style="width: 350px">
												</td>
												<td>
													<input type="text" name="work_agency[]" placeholder="----" autocomplete="off" >
												</td>
												<td>
													<input type="text" name="work_salary[]" placeholder="----" autocomplete="off">
												</td>
												<td>
													<input type="text" name="work_pay_grade[]" placeholder="----" autocomplete="off">
												</td>
												<td>
													<input type="text" name="work_appoinment[]" placeholder="----" autocomplete="off">
												</td>
												<td>
													<input type="text" name="work_gov_service[]" placeholder="----" autocomplete="off">
												</td>
											</tr>
										</tbody>

										<tr>
											<td id="add-work" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
										</tr>

									</table>

                                </div>

							</div>



							<!-- VI VOLUNTARY WORK -->
							<div class="main-table-container-div" style="margin-top: 20px;">

								<div id="" class="project-details-div">

                                    <table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px; position: relative;" id="voluntary_work_table_id">

                                    	<thead style="position: absolute;">
											<th class="name-border" style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px; letter-spacing: 0px;">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</th>
										</thead>

										<thead>
											<th style="border: 0!important; padding-bottom: 30px!important;"></th>
										</thead>

										<thead>
											<th class="name-border" style="text-align: left;">NAME(Write in full)</th>
											<th class="name-border" style="text-align: left;">ADDRESS OF ORGANIZATION</th>
											<th class="name-border" style="text-align: left;">INCLUSIVE DATES (mm/dd/yyyy)(FROM - TO)</th>
											<th class="name-border" style="text-align: left;">NUMBER OF HOURS</th>
											<th class="name-border" style="text-align: left;">POSITION / NATURE OF WORK</th>
										</thead>

										<tbody>
											<tr>

												<td>
													<input type="text" name="voluntary_name[]" placeholder="----" autocomplete="off" style="width: 400px">
												</td>
												<td>
													<input type="text" name="voluntary_address[]" placeholder="----" autocomplete="off" >
												</td>
												<td>
													<input type="date" name="voluntary_date_from[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
													<input type="date" name="voluntary_date_to[]" placeholder="----" autocomplete="off" style="width: 180px">
												</td>
												<td>
													<input type="text" name="voluntary_no_of_hrs[]" placeholder="----" autocomplete="off">
												</td>
												<td>
													<input type="text" name="voluntary_position[]" placeholder="----" autocomplete="off">
												</td>

											</tr>
										</tbody>

										<tr>
											<td id="add-voluntary-work" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
										</tr>

									</table>

                                </div>

							</div>



							<!-- VII LEARNING AND DEVELOPMENT -->
							<div class="main-table-container-div" style="margin-top: 20px;">

								<div id="" class="project-details-div">

                                    <table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px; position: relative;" id="learning_table_id">

                                    	<thead style="position: absolute;">
											<th class="name-border" style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px; letter-spacing: 0px;">VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED</th>
										</thead>

										<thead>
											<th style="border: 0!important; padding-bottom: 30px!important;"></th>
										</thead>

										<thead>
											<th class="name-border" style="text-align: left;">
												TITLE OF LEARNING AND DEVELOPMENT
												<br>
												INTERVENTIONS/TRAINING PROGRAMS
												<br>
										 	</th>
											<th class="name-border" style="text-align: left;">INCLUSIVE DATES (mm/dd/yyyy)(FROM - TO)</th>
											<th class="name-border" style="text-align: left;">NUMBER OF HOURS</th>
											<th class="name-border" style="text-align: left;">TYPE OF LD</th>
											<th class="name-border" style="text-align: left;">CONDUCTED/ SPONSORED BY(Write in full)</th>
										</thead>

										<tbody>
											<tr>

												<td>
													<input type="text" name="learning_training[]" placeholder="----" autocomplete="off" style="width: 400px">
												</td>
												<td>
													<input type="date" name="learning_date_from[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
													<input type="date" name="learning_date_to[]" placeholder="----" autocomplete="off" style="width: 180px">
												</td>
												<td>
													<input type="text" name="learning_no_hrs[]" placeholder="----" autocomplete="off">
												</td>
												<td>
													<select name="learning_ld_type[]"  style="height: 38px; margin-bottom: 25px;" class="educational_level_class">
										                 <option value="">-SELECT-</option>
										                 <option value="EXECUTIVE/MANAGERIAL">EXECUTIVE/MANAGERIAL</option>
										                 <option value="QUALITY">QUALITY</option>
										                 <option value="SOFT SKILLS">SOFT SKILLS</option>
										                 <option value="SUPERVISORY">SUPERVISORY</option>
										                 <option value="TECHNICAL OR SKILLS">TECHNICAL OR SKILLS</option>
											        </select>
												</td>
												<td>
													<input type="text" name="learning_sponsored[]" placeholder="----" autocomplete="off">
												</td>

											</tr>
										</tbody>

										<tr>
											<td id="add-learning" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
										</tr>

									</table>

                                </div>

							</div>



							<!-- VIII. OTHER INFORMATION -->
							<div class="main-table-container-div" style="margin-top: 20px;">

								<div id="" class="project-details-div" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 50px 55px 50px 55px; margin-bottom: 30px;">

									<div style="margin-bottom:10px;">
                                        <label style="font-size: 16.6px; text-decoration: underline;">VIII. OTHER INFORMATION</label>
                                    </div>


                                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-gap: 15px; padding-bottom: 30px; border-bottom: 1px solid #939393;">


                                    	<!-- SKILLS AND HOBBIES -->
                                		<div id="hobbies-container">
                                			<div style="border-bottom: 1px solid #BFC9CA; padding-bottom: 5px;">
                                				<label style="font-weight: 600;"><br>SPECIAL SKILLS and HOBBIES</label>
                                			</div>
                                    		<div style="margin-top: 5px; margin-bottom:-9px">
                                    			<input name="others_special_skills[]" placeholder="----" style="margin-bottom: 23px; color: #333C46!important;" value="">
                                    		</div>
                                    		<div id="add-hobbies" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;">
                                    			<span style="font-family: 'sora'; font-weight: 400; font-size: 11px" class="hobbies-span">&nbsp;&nbsp;ADD MORE</span></i>
                                    		</div>
                                    	</div>


                                    	<!-- NON-ACADEMIC DISTINCTIONS -->
                                    	<div id="non-academic-container">
                                			<div style="border-bottom: 1px solid #BFC9CA; padding-bottom: 5px;">
                                				<label style="font-weight: 600;">NON-ACADEMIC DISTINCTIONS / RECOGNITION <br>(Write in full)</label>
                                			</div>
                                    		<div style="margin-top: 5px; margin-bottom:-9px">
                                    			<input name="others_non_academic[]" placeholder="----" style="margin-bottom: 23px; color: #333C46!important;" value="">
                                    		</div>
                                    		<div id="add-non-academic" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;">
                                    			<span style="font-family: 'sora'; font-weight: 400; font-size: 11px" class="hobbies-span">&nbsp;&nbsp;ADD MORE</span></i>
                                    		</div>
                                    	</div>


                                    	<!-- MEMBERSHIP IN ASSOCIATION/ORGANIZATION -->
                                    	<div id="membership-container">
                                			<div style="border-bottom: 1px solid #BFC9CA; padding-bottom: 5px;">
                                				<label style="font-weight: 600;">MEMBERSHIP IN ASSOCIATION/ORGANIZATION <br>(Write in full)</label>
                                			</div>
                                    		<div style="margin-top: 5px; margin-bottom:-9px">
                                    			<input name="others_membership[]" placeholder="----" style="margin-bottom: 23px; color: #333C46!important;" value="">
                                    		</div>
                                    		<div id="add-membership" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;">
                                    			<span style="font-family: 'sora'; font-weight: 400; font-size: 11px" class="hobbies-span">&nbsp;&nbsp;ADD MORE</span></i>
                                    		</div>
                                    	</div>

                                	</div>


                                	<!-- QUESTIONS -->
                                	<div style="margin-bottom: 15px; margin-top: 25px;">
                                     	<label style="font-size: 13px; text-decoration: underline;">(QUESTIONS)</label>
                                    </div>


                                    <!-- QUESTION 34 -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 20px 30px; width: 650px">
                                    		<label style="font-size: 12px; text-decoration: none;">34. a. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed, within the third degree?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; display: flex; padding: 20px 30px 20px 30px; border-left: 0px;">
                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
                                    			<input type="radio" name="q_34_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
										  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
                                    		</div>
                                    		<div style="display: flex; align-items: center;">
                                    			<input type="radio" name="q_34_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
										  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
                                    		</div>
                                    		<input type="text" name="q_34" id="q_34_id" hidden>
                                    	</div>
                                    </div>


                                    <!-- QUESTION 34_B -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">34. b. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed, within the fourth degree (for Local Government Unit - Career Employees)?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_34_b_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_34_b_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:</label>
	                                    		<input type="text" name="q_34_b" id="q_34_b_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>


                                    <!-- QUESTION 35 A -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">35. a. Have you ever been found guilty of any administrative offense?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_35_a_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_35_a_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:</label>
	                                    		<input type="text" name="q_35_a" id="q_35_a_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>


                                    <!-- QUESTION 35 B -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">35. b. Have you been criminally charged before any court?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_35_b_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_35_b_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:</label>
	                                    		<input type="text" name="q_35_b" id="q_35_b_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>


                                    <!-- QUESTION 36 -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_36_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_36_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:</label>
	                                    		<input type="text" name="q_36" id="q_36_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>



                                    <!-- QUESTION 37 -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_37_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_37_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:</label>
	                                    		<input type="text" name="q_37" id="q_37_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>



                                    <!-- QUESTION 38 A -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_38_a_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_38_a_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:</label>
	                                    		<input type="text" name="q_38_a" id="q_38_a_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>



                                    <!-- QUESTION 38 B -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">38. b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_38_b_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_38_b_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:</label>
	                                    		<input type="text" name="q_38_b" id="q_38_b_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>



                                    <!-- QUESTION 39 -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">39. Have you acquired the status of an immigrant or permanent resident of another country?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_39_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_39_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, give details:(Country):</label>
	                                    		<input type="text" name="q_39" id="q_39_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>



                                    <!-- QUESTION 40 A -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">40. a. Are you a member of any indigenous group?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_40_a_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_40_a_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, Please specify:</label>
	                                    		<input type="text" name="q_40_a" id="q_40_a_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>



                                    <!-- QUESTION 40 B -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">40. b. Are you a person with disability?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_40_b_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_40_b_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<div style="margin-bottom: 12px">
                                    				<label style="font-size: 13px; text-decoration: underline;">If YES, Please specify:</label>
                                    			</div>
                                    			<div style="margin-bottom: 25px">
                                    				<select name="q_40_b" id="q_40_b_id" style="height: 38px; margin-bottom: 25px;">
										                 <option style="display: none;" value="NONE">NONE</option>
										                 <option style="display: none;" value="COGNITIVE">COGNITIVE</option>
										                 <option style="display: none;" value="HEARING">HEARING</option>
										                 <option style="display: none;" value="MOTOR">MOTOR</option>
										                 <option style="display: none;" value="VISUAL">VISUAL</option>
										                 <option style="display: none;" value="OTHER'S">OTHER'S</option>
										        	</select>
                                    			</div>
	                                    	</div>
                                    	</div>
                                    </div>



                                    <!-- QUESTION 40 C -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr">
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-top: 0; width: 650px;">
                                    		<label style="font-size: 12px; text-decoration: none;">40. c. Are you a solo parent?</label>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0px; border-top: 0;">
                                    		<div style="display: flex;">
	                                    		<div style="display: flex; align-items: center; margin-right: 20px;">
	                                    			<input type="radio" name="q_40_c_radio" value="yes" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">YES</label>
	                                    		</div>
	                                    		<div style="display: flex; align-items: center;">
	                                    			<input type="radio" name="q_40_c_radio" value="no" style="width: 14px; margin: 0; cursor: pointer;">
											  		<label style="font-size: 14px; text-decoration: underline; margin-left: 5px; text-decoration: none;">NO</label>
	                                    		</div>
                                    		</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">If YES, Please specify:</label>
	                                    		<input type="text" name="q_40_c" id="q_40_c_id" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>




                                    <!-- REFERENCE -->
                                	<div style="margin-bottom: 15px; margin-top: 25px;">
                                     	<label style="font-size: 13px; text-decoration: underline;">(REFERENCE)</label>
                                    </div>

                                    <!-- REFERENCE INPUTS -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr 1FR">

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px;">
                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">NAME</label>
	                                    		<input type="text" name="reference_name" placeholder="----">
	                                    	</div>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0;">
                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">ADDRESS</label>
	                                    		<input type="text" name="reference_address" placeholder="----">
	                                    	</div>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0">
                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">TELEPHONE NO</label>
	                                    		<input type="text" name="reference_tel_no" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>





                                    <!-- GOVERNMENT ISSUED -->
                                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; margin-top: 20px">


                                    	<!-- GOVERNMENT ISSUE INPUTS -->
                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; width: 500px">

                                    		<div style="margin-bottom:20px; border-bottom: 1px solid #939393; padding-bottom: 20px">
                                        		<label style="font-size: 14px; text-decoration: underline;">
													Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)
													PLEASE INDICATE ID Number and Date of Issuance
												</label>
											</div>

                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">Government Issued ID:</label>
	                                    		<input type="text" name="government_issued_id" placeholder="----">
	                                    	</div>
	                                    	<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">ID/License/Passport No.:</label>
	                                    		<input type="text" name="government_issued_passport" placeholder="----">
	                                    	</div>
	                                    	<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">Date of Issuance:</label>
	                                    		<input type="date" name="government_issued_date_issuance" placeholder="----">
	                                    	</div>
	                                    	<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">Place of Issuance:</label>
	                                    		<input type="text" name="government_issued_place_issuance" placeholder="----">
	                                    	</div>
                                    	</div>


                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0;">
                                    		<div style="border: 1px solid #939393; margin-top: 20px">
                                    			<img src="img/noimg.jpg" id="image" style="width: 300px; height: 300px">
                                    		</div>
                                    		<div style="margin-top: 15px;">
                                    			<label style="font-size: 13px; text-decoration: underline;">Select Image</label>
	                                    		<input type="file" name="file" id="imageUpload" placeholder="----">
	                                    		<input type="text" name="gov_id_img" id="gov_id" placeholder="----" hidden>
	                                    	</div>
                                    	</div>

                                    	<div style="border: 1px solid #939393; padding: 20px 30px 0px 30px; border-left: 0">
                                    		<div>
                                    			<label style="font-size: 13px; text-decoration: underline;">Date of Original Appointment</label>
	                                    		<input type="date" name="government_issued_date_appointment" placeholder="----">
	                                    	</div>
                                    	</div>
                                    </div>



                                </div>

							</div>








						</div>

							<div class="insert-btn-cont" id="submit-cont-id" style="margin-top: 5px; margin-bottom: 25px;">
								<h1 style="margin-right: auto;"></h1>
								<button class="btn-del" name="sub-insert" style="padding-left: 20px; padding-right: 20px; font-size: 10px; background-color: #3D9EFF; border: 1px solid #3D9EFF;">Submit</button>
							</div>

						</div>

						</div>

					</form>

				</div>

			</main>

		</section>

		<script type="text/javascript" src="JS/script.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

		<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




		<script type="text/javascript">
			$(document).ready(function() {
			  $('#imageUpload').change(function() {
			    var filename = $(this).val().split('\\').pop();
			    $('#gov_id').val(filename);
			  });
			});
		</script>

		<script>
		$(document).ready(function() {
		  $('#imageUpload').change(function() {
		    var input = this;
		    var url = window.URL || window.webkitURL;
		    var image = new Image();
		    image.onload = function() {
		      $('#image').attr('src', url.createObjectURL(input.files[0]));
		    };
		    image.src = url.createObjectURL(input.files[0]);
		  });
		});
		</script>




		<!-- QUESTIONS CHECKBOX -->
		<script type="text/javascript">
			$(document).ready(function() {
			  $('input[type=radio][name=q_34_radio]').change(function() {
			    if (this.value == 'yes') {
			      $('#q_34_id').val('Yes');
			    }
			    else if (this.value == 'no') {
			      $('#q_34_id').val('No');
			    }
			  });
			});
		</script>













		<!-- ADD MEMBERSHIP -->
		<script>

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

		</script>


		<!-- ADD NON ACADEMIC -->
		<script type="text/javascript">

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

		</script>



		<!-- ADD HOBBIES -->
		<script>

			$("#add-hobbies").click(function() {
			  const html = `
			    <div style="margin-top: 5px; margin-bottom:-30px; display: flex; align-items: center;">
			      <input type="text" name="others_special_skills[]" placeholder="----" required style="margin-bottom: 23px; color: #333C46!important;" value="">
			      <span class="remove-hobbies" style="cursor: pointer; margin-bottom: 10px; margin-left: 7px">
			        <i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>
			      </span>
			    </div>`;
			  $('#hobbies-container').append(html);
			});

			$(document).on('click', '.remove-hobbies', function() {
			  $(this).parent().remove();
			});

		</script>




		<!-- ADD LEARNING -->
		<script type="text/javascript">

			// handle click event for adding a new row
			$("#add-learning").click(function() {
			  const html = `<tr>
			    <td>
			      <input type="text" name="learning_training[]" placeholder="----" autocomplete="off" style="width: 400px">
			    </td>
			    <td>
			      <input type="date" name="learning_date_from[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
			      <input type="date" name="learning_date_to[]" placeholder="----" autocomplete="off" style="width: 180px">
			    </td>
			    <td>
			      <input type="text" name="learning_no_hrs[]" placeholder="----" autocomplete="off">
			    </td>
			    <td>
			      <select name="learning_ld_type[]" style="height: 38px; margin-bottom: 25px;" class="educational_level_class">
			        <option value="">-SELECT-</option>
			        <option value="EXECUTIVE/MANAGERIAL">EXECUTIVE/MANAGERIAL</option>
			        <option value="QUALITY">QUALITY</option>
			        <option value="SOFT SKILLS">SOFT SKILLS</option>
			        <option value="SUPERVISORY">SUPERVISORY</option>
			        <option value="TECHNICAL OR SKILLS">TECHNICAL OR SKILLS</option>
			      </select>
			    </td>
			    <td>
			      <input type="text" name="learning_sponsored[]" placeholder="----" autocomplete="off">
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

		</script>




		<!-- ADD VOLUNTARY WORK -->
		<script type="text/javascript">

			$("#add-voluntary-work").click(function() {
			    const html = `<tr>
			        <td>
			            <input type="text" name="voluntary_name[]" placeholder="----" autocomplete="off" style="width: 400px">
			        </td>
			        <td>
			            <input type="text" name="voluntary_address[]" placeholder="----" autocomplete="off">
			        </td>
			        <td>
			            <input type="date" name="voluntary_date_from[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
			            <input type="date" name="voluntary_date_to[]" placeholder="----" autocomplete="off" style="width: 180px">
			        </td>
			        <td>
			            <input type="text" name="voluntary_no_of_hrs[]" placeholder="----" autocomplete="off">
			        </td>
			        <td>
			            <input type="text" name="voluntary_position[]" placeholder="----" autocomplete="off">
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

		</script>




		<!-- ADD WORK -->
		<script type="text/javascript">

			  // Add new row
			  $("#add-work").click(function() {
			    var html = '<tr>' +
			      '<td>' +
			      '<input type="date" name="work_inclusive_date_from[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">' +
			      '<input type="date" name="work_inclusive_date_to[]" placeholder="----" autocomplete="off" style="width: 180px">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_position[]" placeholder="----" autocomplete="off" style="width: 350px">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_agency[]" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_salary[]" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_pay_grade[]" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_appoinment[]" placeholder="----" autocomplete="off">' +
			      '</td>' +
			      '<td>' +
			      '<input type="text" name="work_gov_service[]" placeholder="----" autocomplete="off">' +
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

		</script>



		<!-- ADD SERVICE -->
		<script type="text/javascript">

			$("#add-service").click(function() {
    			var html = '<tr>' +
                    '<td>' +
                        '<input type="text" name="service_career[]" placeholder="----" autocomplete="off" style="width: 350px">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="service_rating[]" placeholder="----" autocomplete="off">' +
                    '</td>' +
                    '<td>' +
                        '<input type="date" name="service_date_of_exam[]" placeholder="----" autocomplete="off">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="service_place_of_exam[]" placeholder="----" autocomplete="off">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="service_license[]" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">' +
                        '<input type="date" name="service_license_date[]" placeholder="----" autocomplete="off" style="width: 184px">' +
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

		</script>


		<!-- APPEND EDUCATIONAL -->
		<script type="text/javascript">

			$("#add-educational").click(function() {
			var newRow = $("<tr>");
			newRow.append('<td><select name="educational_level[]" style="height: 38px; margin-bottom: 25px;" class="educational_level_class"><option value="">-SELECT LEVEL-</option><option value="ELEMENTARY">ELEMENTARY</option><option value="SECONDARY">SECONDARY</option><option value="VOCATIONAL">VOCATIONAL</option><option value="BACHELORS DEGREE">BACHELORS DEGREE</option><option value="MASTERS DEGREE">MASTERS DEGREE</option><option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option></select></td><td><input type="text" name="educational_school_name[]" placeholder="----" autocomplete="off" class="educational_school_name_class" style="width: 400px"></td><td><input type="text" name="educational_course[]" placeholder="----" autocomplete="off" class="educational_course_class" style="width: 400px"></td><td><input type="text" name="educational_attendance_from[]" placeholder="----" autocomplete="off" class="educational_attendance_from_class" style="width: 150px; margin-right: 10px;"><input type="text" name="educational_attendance_to[]" placeholder="----" autocomplete="off" class="educational_attendance_to_class" style="width: 153px"></td><td><input type="text" name="educational_units_earned[]" placeholder="----" autocomplete="off" class="educational_units_earned_class" style="width: 400px"></td><td><input type="text" name="educational_year_graduated[]" placeholder="----" autocomplete="off" class="educational_year_graduated_class"></td><td><input type="text" name="educational_scholarship[]" placeholder="----" autocomplete="off" class="educational_scholarship_class"></td>');
				var removeButton = $('<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>');
				newRow.append($('<td class="remove_educational" style="min-width: 30px!important; cursor: pointer;">').append(removeButton));
				$('#educational_table_id').append(newRow);
				removeButton.click(function() {
				    $(this).closest('tr').remove();
				});
			});


		</script>





		<!-- APPEND ADD CHILDREN -->
		<script type="text/javascript">

			$(document).ready(function() {
			    // Add a new row to the table when the "Add Row" button is clicked
			    $("#add-children").click(function() {
			        var newRow = $("<tr>");
			        var cols = "";

			        cols += '<td><input type="text" name="family_children_name[]" placeholder="----" autocomplete="off" class="children_name_class" style="width: 500px"></td>';
			        cols += '<td><select name="family_children_sex[]" style="height: 38px; margin-bottom: 25px;" class="children_sex_class"><option value="">-SELECT SEX-</option><option value="MALE">MALE</option><option value="FEMALE">FEMALE</option></select></td>';
			        cols += '<td><input type="date" name="family_children_bday[]" placeholder="----" autocomplete="off" class="children_bday_class"></td>';
			        cols += '<td><select name="family_children_disability[]" style="height: 38px; margin-bottom: 25px;" class="children_disability_class"><option value="NONE">NONE</option><option value="COGNITIVE">COGNITIVE</option><option value="HEARING">HEARING</option><option value="MOTOR">MOTOR</option><option value="VISUAL">VISUAL</option><option value="OTHERS">OTHERS</option></select></td>';
			        cols += '<td class="remove_children" style="min-width: 30px!important; cursor: pointer	;"><i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i></td>';

			        newRow.append(cols);
			        $("#family_children_table_id").append(newRow);
			        return false;
			    });

			     $(document).on('click', '.remove_children', function() {
			        $(this).closest('tr').remove();
			        return false;
			    });

			});

		</script>






		<!-- RESIDENT TO PERMANEND ADDRESS CHECKBOX -->
		<script type="text/javascript">
			$(document).ready(function() {
			  $('#same-address-checkbox').click(function() {
			    if ($(this).is(':checked')) {
			      // Copy values from residential address to permanent address
			      $('#personal_permanent_lot_no_id').val($('#personal_residential_lot_no_id').val());
			      $('#personal_permanent_street_id').val($('#personal_residential_street_id').val());
			      $('#personal_permanent_subdivision_id').val($('#personal_residential_subdivision_id').val());
			      $('#personal_permanent_barangay_id').val($('#personal_residential_barangay_id').val());
			      $('#personal_permanent_city_id').val($('#personal_residential_city_id').val());
			      $('#personal_permanent_province_id').val($('#personal_residential_province_id').val());
			      $('#personal_permanent_zipcode_id').val($('#personal_residential_zipcode_id').val());
			    } else {
			      // Clear permanent address fields
			      $('#personal_permanent_lot_no_id').val('');
			      $('#personal_permanent_street_id').val('');
			      $('#personal_permanent_subdivision_id').val('');
			      $('#personal_permanent_barangay_id').val('');
			      $('#personal_permanent_city_id').val('');
			      $('#personal_permanent_province_id').val('');
			      $('#personal_permanent_zipcode_id').val('');
			    }
			  });
			});
		</script>

		<script type="text/javascript">

        $(".table2-container input").keyup(function(){

            var $this = $(this);

            if($this != ""){
                $this.css("background-color", "#F2F3F4");
                $this.css("border", "1px solid #E5E7E9!important");
            }else{
                $this.css("background-color", "#FFFFFF");
            }

        });

       </script>


       <script type="text/javascript">

        $(".table2-container").click(function(){

            $('#sidebar').hide();

        });

       </script>




		<script type="text/javascript">
			$('select').select2();
		</script>














		<!-- NOTIFICATION REQUEST START -->


		<script type="text/javascript">

			function loadDoc() {


				setInterval(function(){

					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("noti_number").innerHTML = this.responseText;
						}
					};
					xhttp.open("GET", "Notification_Cont/notification_bell_count.php", true);
					xhttp.send();

				},1000);


			}
			loadDoc();

		</script>


		<script type="text/javascript">

			function loadDoc2() {


				setInterval(function(){

					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("notif-id").innerHTML = this.responseText;
						}
					};
					xhttp.open("GET", "Notification_Cont/notification_dropdown.php", true);
					xhttp.send();

				},1000);


			}
			loadDoc2();

		</script>


		<script>

			$(document).ready(function() {
				$("#bell-btn").on("click", function() {
					$.ajax({
						url: "Notification_Cont/notification_status_update.php",
						success: function(res) {
							console.log(res);
						}
					});
				});
			});

		</script>





		<!-- ALERT FADE -->

		<script type="text/javascript">
			setTimeout('$("#status-alert-id").fadeOut(300)',5000);
		</script>

	</body>
	</html>
