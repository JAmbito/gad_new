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

		<title>GAD - Print Personnel</title>
	</head>
	<body>



		<style type="text/css">

		@media print {
		  @page {
		    margin: 25px 25px;
		  }
		  .page-break{
		  	margin-bottom: 0px!important;
		  }
		  .gove_issued_class{
		  	margin-top: -35px!important;
		  }
		  .personel_dp{
		  	width: 160px!important;
		  	height: 160px!important;
		  }
		  .table3-container span{
		  	font-family: arial!important;
		  	font-size: 10px!important;
		  	letter-spacing: -.2px!important;
		  }
		  .table3-container span{
		  	font-family: arial!important;
		  }
		  .div-tbl-cont .table-pdf-view thead th{
		  	font-family: arial!important;
		  	font-size: 10px!important;
		  	letter-spacing: -.2px!important;
		  	font-weight: 500!important;
		  }
		  .div-tbl-cont .table-pdf-view tbody tr td{
		  	font-family: arial!important;
		  	font-size: 10px!important;
		  	letter-spacing: -.2px!important;
		  	font-weight: 500!important;
		  }
		  body {-webkit-print-color-adjust: exact;}
		}

		</style>

		<style>
		.page-break {
		    page-break-after: always;
		}

		.page-break:last-child {
		    page-break-after: avoid;
		}
		.div-tbl-cont{
			overflow-x: auto;
		}

		.div-tbl-cont .table-pdf-view{
			width: 100%;
			border-collapse: collapse;
		}

		.div-tbl-cont .table-pdf-view thead th{
			border-bottom: 1px solid #868686;;
			border-left: 1px solid #868686;;
			font-size: 12px;
			font-weight: 600;
			color: #333;
			letter-spacing: 0px;
			text-transform: uppercase;
			white-space: normal;
			text-align: center;
			background: #D9D9D9;
			padding-top: 5px;
			padding-bottom: 5px;
		}

		.div-tbl-cont .table-pdf-view tbody tr td{
			border-bottom: 1px solid #868686;;
			border-left: 1px solid #868686;;
			font-size: 12px;
			font-weight: 600;
			color: #333;
			letter-spacing: 0px;
			text-transform: uppercase;
			text-align: center;
			background: #fff;
			padding-top: 7px;
			padding-bottom: 7px;
		}

		.tr-btm-border-cont td{
			border-bottom: 1px solid #333!important;
			font-weight: 700!important;
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



				<div class="navbar" style="">

					<?php 

					include 'NAVBAR/navbar.php';

					?>

				</div>

				<div class="add-user-container">
					<div class="add-btns1" style="margin-left: 10px; background-color: #EC7063; border: none;" id="print-btn">
						<i class="fi fi-rr-print" style="color: #fff; position: relative; top: 2px; margin-right: 5px;"></i>
						<button style="background-color: #EC7063;">PRINT</button>
					</div>
				</div>

				<div class="return-class">
		          <a href="DTM_Personnels.php"><i class='bx bx-arrow-back'></i></a>
		        </div>




				<!-- TABLE -->



			        <div class="table3-container" id="table3-house-id" style="overflow: hidden!important;">
						<div class="table-data3" style="overflow: hidden!important;">
							

							<!-- I. PERSONAL INFO START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">

								<div style="border-bottom: 1px solid #868686; padding: 10px 5px 10px 10px;">
									<div style="display: flex; flex-direction: column;">
										<span style="font-style: italic; font-weight: 700">CS FORM NO.</span>
										<span style="font-style: italic; font-weight: 700">REVISED 2023</span>
									</div>

									<div style="display: flex; justify-content: center;">
										<h1 style="font-size: 23px; font-weight: 700; color: #333">PERSONAL DATA SHEET</h1>
									</div>

									<div style="display: flex; flex-direction: column; margin-top: 15px;">
										<span style="font-style: italic; font-weight: 700;">WARNING: Any misinterpretation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.</span>
										<span style="font-style: italic; font-weight: 700;">READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.</span>
									</div>

									<div style="display: flex;">
										<span style="font-weight: 500;">Print legibly. Tick appropriate boxes [ ] and use separate sheet if necessary. Indicate N/A if not applicable.  DO NOT ABBREVIATE.</span>
									</div>
									<div style="display: flex; margin-top: 15px">
										<div>
											<h1></h1>
										</div>
										<div style="margin-left: auto;">
											<span style="font-weight: 500; background: #AEAEAE; border: 2px solid #333; padding: 3px">1. CS ID NO.</span>
											<span style="font-weight: 500; background: #fff; border: 2px solid #333; border-left: 0px; margin-left: -5px; padding-left: 50px!important; padding: 3px;"> (Do not fill up. For CSC use only)</span>
										</div>
									</div>
								</div>


								<?php 

									$datecreated_id=$_GET['datecreated_id'];
				
	                               $sql = "SELECT * FROM `main_i_personal_info` WHERE `Date_Created` = '$datecreated_id'";

	                               $result=mysqli_query($con,$sql);
	                               if($result){
	                                     $no = 1;
	                                     while($row=mysqli_fetch_assoc($result)){

                                     	$personal_surname = $row['personal_surname'];
										$personal_firstname = $row['personal_firstname'];
										$personal_name_extension = $row['personal_name_extension'];
										$personal_middlename = $row['personal_middlename'];
										$personal_birthday = $row['personal_birthday'];
										$personal_bday_place = $row['personal_bday_place'];
										$personal_designation = $row['personal_designation'];
										$personal_department = $row['personal_department'];
										$personal_academic_rank = $row['personal_academic_rank'];
										$personal_administrative_rank = $row['personal_administrative_rank'];
										$personal_emp_status = $row['personal_emp_status'];
										$personal_campus = $row['personal_campus'];
										$personal_sex = $row['personal_sex'];
										$personal_civil_status = $row['personal_civil_status'];
										$personal_height = $row['personal_height'];
										$personal_weight = $row['personal_weight'];
										$personal_blood = $row['personal_blood'];
										$personal_gsis = $row['personal_gsis'];
										$personal_pagibig = $row['personal_pagibig'];
										$personal_philhealth = $row['personal_philhealth'];
										$personal_sss = $row['personal_sss'];
										$personal_tin = $row['personal_tin'];
										$personal_id_no = $row['personal_id_no'];
										$personal_citizenship = $row['personal_citizenship'];
										$personal_by_birth = $row['personal_by_birth'];
										$personal_dual_indication = $row['personal_dual_indication'];
										$personal_residential_lot_no = $row['personal_residential_lot_no'];
										$personal_residential_street = $row['personal_residential_street'];
										$personal_residential_subdivision = $row['personal_residential_subdivision'];
										$personal_residential_barangay = $row['personal_residential_barangay'];
										$personal_residential_city = $row['personal_residential_city'];
										$personal_residential_province = $row['personal_residential_province'];
										$personal_residential_zipcode = $row['personal_residential_zipcode'];
										$personal_permanent_lot_no = $row['personal_permanent_lot_no'];
										$personal_permanent_street = $row['personal_permanent_street'];
										$personal_permanent_subdivision = $row['personal_permanent_subdivision'];
										$personal_permanent_barangay = $row['personal_permanent_barangay'];
										$personal_permanent_city = $row['personal_permanent_city'];
										$personal_permanent_province = $row['personal_permanent_province'];
										$personal_permanent_zipcode = $row['personal_permanent_zipcode'];
										$personal_tel_no = $row['personal_tel_no'];
										$personal_mobile_no = $row['personal_mobile_no'];
										$personal_email = $row['personal_email'];

		                         ?>

								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">I. PERSONAL INFORMATION</span>
								</div>

								<div style="display: grid; grid-template-columns: .750fr 3fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px">
										<span style="color: #333;">2. SURNAME</span>
									</div>
									<div style="padding: 3px 10px; border-bottom: 1px solid #868686; width: 100%;">
										<span style="color: #333;"><?php echo $personal_surname ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: .750fr 3fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 22px">
										<span style="color: #333;">FIRST NAME</span>
									</div>
									<div style="padding: 3px 10px; border-bottom: 1px solid #868686; width: 100%; display: flex; padding-right: 2px!important">
										<div>
											<span style="color: #333;"><?php echo $personal_firstname ?></span>
										</div>
										<div style="background: #D9D9D9; margin-left: auto; border-left: 1px solid #868686; padding-right: 10px; padding-left: 10px;">
											<span style="color: #333; font-size: 11.5px;">NAME EXTENSION (JR., SR) 
												<span style="background: #fff; border: 1px solid #868686; padding: 0px 10px;"><?php echo $personal_name_extension ?></span>
											</span>
										</div>
									</div>
								</div>
								<div style="display: grid; grid-template-columns: .750fr 3fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 22px">
										<span style="color: #333;">MIDDLE NAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"><?php echo $personal_middlename ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-top: 1px solid #868686; border-bottom: 1px solid #868686;">
										<span style="color: #333;">3. DATE OF BIRTH</span>
										<br>
										<span style="color: #333;">(mm/dd/yyyy)</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-top: 1px solid #868686; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_birthday ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-top: 1px solid #868686; border-right: 1px solid #868686; border-left: 1px solid #868686;">
										<span style="color: #333;">16. CITIZENSHIP</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-top: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_citizenship ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">4. PLACE OF BIRTH</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333; white-space: pre-wrap;"><?php echo $personal_bday_place ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center; z-index: 999;">
										<span style="color: #333;">If holder of  dual citizenship, </span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;">Pls. indicate country:</span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">5. SEX</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_sex ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; ">please indicate the details.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_dual_indication ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; ">
										<span style="color: #333;">6. CIVIL STATUS</span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"><?php echo $personal_civil_status ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 9999!important;">
										<span style="color: #333;">17. RESIDENTIAL ADDRESS</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_residential_lot_no ?></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_residential_street ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; ">
										<span style="color: #333;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 9999!important;">
										<span style="color: #333; "></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">House/Block/Lot No.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Street</span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px;">
										<span style="color: #333;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 9999!important;">
										<span style="color: #333; "></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_residential_subdivision ?></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_residential_barangay ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 9999!important;">
										<span style="color: #333; "></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Subdivision/Village</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Barangay</span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px;">
										<span style="color: #333;">7. HEIGHT (m) </span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"><?php echo $personal_height ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 9999!important;">
										<span style="color: #333; "></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_residential_city ?></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_residential_province ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 9999!important;">
										<span style="color: #333; "></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">City/Municipality</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Province</span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">8. WEIGHT (kg)</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_weight ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;">ZIP CODE</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;"><?php echo $personal_residential_zipcode ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px;">
										<span style="color: #333;">9. BLOOD TYPE</span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"><?php echo $personal_blood ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 99999!important;">
										<span style="color: #333; z-index: 99999!important;">18. PERMANENT ADDRESS</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_permanent_lot_no ?></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_permanent_street ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center; z-index: 99999!important; ">
										<span style="color: #333; z-index: 9999!important;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">House/Block/Lot No.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Street</span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px;">
										<span style="color: #333;">10. GSIS ID NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"><?php echo $personal_gsis ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 99999!important;">
										<span style="color: #333; z-index: 9999!important;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_permanent_subdivision ?></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_permanent_barangay ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center; z-index: 99999!important;">
										<span style="color: #333; z-index: 9999!important;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Subdivision/Village</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Barangay</span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px;">
										<span style="color: #333;">11. PAG-IBIG ID NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%;">
										<span style="color: #333;"><?php echo $personal_pagibig ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; z-index: 99999!important; ">
										<span style="color: #333; z-index: 9999!important;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_permanent_city ?></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_permanent_province ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center; z-index: 99999!important;">
										<span style="color: #333; z-index: 9999!important;"></span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">City/Municipality</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686;">
										<span style="color: #333; font-style: italic;">Province</span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">12. PHILHEALTH NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_philhealth ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;">ZIP CODE</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;"><?php echo $personal_permanent_zipcode ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">13. SSS NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_sss ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;">19. TELEPHONE NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;"><?php echo $personal_tel_no ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">14. TIN NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_tin ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;">20. MOBILE NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;"><?php echo $personal_tel_no ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr 2fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">15. AGENCY EMPLOYEE NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $personal_mobile_no ?></span>
									</div>
									<div style="background: #D9D9D9; padding: 3px 5px; width: 100%; border-right: 1px solid #868686; border-left: 1px solid #868686; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;">21. E-MAIL ADDRESS (if any)</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; text-align: center; border-bottom: 1px solid #868686; text-align: center;">
										<span style="color: #333;"><?php echo $personal_email ?></span>
									</div>
								</div>
								<?php

								}
							}

							?>

							</div>
							<!-- I. PERSONAL INFO END -->


							<!-- II. FAMILY BACKGROUND START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">
								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">II.  FAMILY BACKGROUND</span>
								</div>

								<?php 


                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT * FROM `main_ii_family_background` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){

									$family_spouse_surname = $row['family_spouse_surname'];
									$family_spouse_firstname = $row['family_spouse_firstname'];
									$family_spouse_name_extension = $row['family_spouse_name_extension'];
									$family_spouse_middlename = $row['family_spouse_middlename'];
									$family_spouse_occupation = $row['family_spouse_occupation'];
									$family_spouse_business_name = $row['family_spouse_business_name'];
									$family_spouse_business_address = $row['family_spouse_business_address'];
									$family_spouse_tel_no = $row['family_spouse_tel_no'];
									$family_father_surname = $row['family_father_surname'];
									$family_father_firstname = $row['family_father_firstname'];
									$family_father_name_extension = $row['family_father_name_extension'];
									$family_father_middlename = $row['family_father_middlename'];
									$family_mother_maiden_name = $row['family_mother_maiden_name'];
									$family_mother_surname = $row['family_mother_surname'];
									$family_mother_firstname = $row['family_mother_firstname'];
									$family_mother_name_extension = $row['family_mother_name_extension'];
									$family_mother_middlename = $row['family_mother_middlename'];

								?>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">22. SPOUSE'S SURNAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_spouse_surname ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">FIRST NAME</span>
									</div>
									<div style="padding: 3px 10px; border-bottom: 1px solid #868686; width: 100%; display: flex; padding-right: 2px!important">
										<div>
											<span style="color: #333;"><?php echo $family_spouse_firstname ?></span>
										</div>
										<div style="background: #D9D9D9; margin-left: auto; border-left: 1px solid #868686; padding-right: 10px; padding-left: 10px; margin-right: 15px;">
											<span style="color: #333; font-size: 11.5px;">NAME EXTENSION (JR., SR) 
												<span style="background: #fff; border: 1px solid #868686; padding: 0px 10px;"><?php echo $family_spouse_name_extension ?></span>
											</span>
										</div>
									</div>

								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">MIDDLE NAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_spouse_middlename ?></span>
									</div>

								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">OCCUPATION</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_spouse_occupation ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">EMPLOYER/BUSINESS NAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_spouse_business_name ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">BUSINESS ADDRESS</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_spouse_business_address ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">TELEPHONE NO.</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_spouse_tel_no ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">24. FATHER'S SURNAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_father_surname ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">FIRST NAME</span>
									</div>
									<div style="padding: 3px 10px; border-bottom: 1px solid #868686; width: 100%; display: flex; padding-right: 2px!important">
										<div>
											<span style="color: #333;"><?php echo $family_father_firstname ?></span>
										</div>
										<div style="background: #D9D9D9; margin-left: auto; border-left: 1px solid #868686; padding-right: 10px; padding-left: 10px; margin-right: 15px;">
											<span style="color: #333; font-size: 11.5px;">NAME EXTENSION (JR., SR) 
												<span style="background: #fff; border: 1px solid #868686; padding: 0px 10px;"><?php echo $family_father_name_extension ?></span>
											</span>
										</div>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">MIDDLE NAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_father_middlename ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">25. MOTHER'S MAIDEN NAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_mother_maiden_name ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">SURNAME</span>
									</div>
									<div style="padding: 3px 5px; width: 100%; text-align: left; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $family_mother_surname ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">FIRST NAME</span>
									</div>
									<div style="padding: 3px 5px; width: 100%; text-align: left; border-bottom: 1px solid #868686;">
										<span style="color: #333;"><?php echo $family_mother_firstname ?></span>
									</div>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 4fr;">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;">
										<span style="color: #333;">MIDDLE NAME</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;"><?php echo $family_mother_middlename ?></span>
									</div>
								</div>
								<?php

									 } //WHILE END
								} //IF END

								?>

							</div>

							<!-- II. CHILDREN BACKGROUND -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0px" class="div_for_separate">

								<?php 

                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT *,

                                GROUP_CONCAT(ID  SEPARATOR ',') AS child_ID_list,
                                GROUP_CONCAT(family_children_name  SEPARATOR ',') AS family_children_name_list,
                                GROUP_CONCAT(family_children_sex  SEPARATOR ',') AS family_children_sex_list,
                                GROUP_CONCAT(family_children_bday  SEPARATOR ',') AS family_children_bday_list,
                                GROUP_CONCAT(family_children_disability  SEPARATOR ',') AS family_children_disability_list


                                FROM `main_ii_add_children` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){

									$child_ID=$row['child_ID_list'];
									$child_IDexplode = explode(',', $child_ID);

									$family_children_name=$row['family_children_name_list'];
									$family_children_nameexplode = explode(',', $family_children_name);

									$family_children_sex=$row['family_children_sex_list'];
									$family_children_sexexplode = explode(',', $family_children_sex);

									$family_children_bday=$row['family_children_bday_list'];
									$family_children_bdayexplode = explode(',', $family_children_bday);

									$family_children_disability=$row['family_children_disability_list'];
									$family_children_disabilityexplode = explode(',', $family_children_disability);

								?>

								<div class="div-tbl-cont" id="div-tbl-cont-id">
									<table class="table-pdf-view">
										<thead>
											<th style="text-align: left; padding-left: 5px; border-left: 0">23. NAME OF CHILDREN</th>
											<th style="text-align: center;">DATE OF BEARTH<br>(mm/dd/yyyy)</th>
										</thead>
										<tbody class="tbody-material-data-parent">

											<?php

			                                     foreach($family_children_nameexplode as $index => $value){

			                                     echo 

		                                           '<tr class="tr-total-parent">
														<td style="text-align: left; border-left: 0; padding-left: 5px">'.$value.'</td>
														<td style="text-align: center;">'.$family_children_bdayexplode[$index].'</td>
													</tr>';

                                                 }

                                             ?>

										</tbody>
									</table>
								</div>
								<?php

									 } //WHILE END
								} //IF END

								?>
							</div>
							<!-- II. FAMILY BACKGROUND END -->


							<!-- III. EDUCATIONAL BACKGROUND START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">
								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">III. EDUCATIONAL BACKGROUND</span>
								</div>

								<?php 

                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT *,

                                GROUP_CONCAT(ID  SEPARATOR ',') AS educational_ID_list,
                                GROUP_CONCAT(educational_level  SEPARATOR ',') AS educational_level_list,
                                GROUP_CONCAT(educational_school_name  SEPARATOR ',') AS educational_school_name_list,
                                GROUP_CONCAT(educational_course  SEPARATOR ',') AS educational_course_list,
                                GROUP_CONCAT(educational_attendance_from  SEPARATOR ',') AS educational_attendance_from_list,
                                GROUP_CONCAT(educational_attendance_to  SEPARATOR ',') AS educational_attendance_to_list,
                                GROUP_CONCAT(educational_units_earned  SEPARATOR ',') AS educational_units_earned_list,
                                GROUP_CONCAT(educational_year_graduated  SEPARATOR ',') AS educational_year_graduated_list,
                                GROUP_CONCAT(educational_scholarship_class  SEPARATOR ',') AS educational_scholarship_class_list


                                FROM `main_iii_educational_background` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){

									$educational_ID=$row['educational_ID_list'];
									$educational_IDexplode = explode(',', $educational_ID);

									$educational_level=$row['educational_level_list'];
									$educational_levelexplode = explode(',', $educational_level);

									$educational_school_name=$row['educational_school_name_list'];
									$educational_school_nameexplode = explode(',', $educational_school_name);

									$educational_course=$row['educational_course_list'];
									$educational_courseexplode = explode(',', $educational_course);

									$educational_attendance_from=$row['educational_attendance_from_list'];
									$educational_attendance_fromexplode = explode(',', $educational_attendance_from);

									$educational_attendance_to=$row['educational_attendance_to_list'];
									$educational_attendance_toexplode = explode(',', $educational_attendance_to);

									$educational_units_earned=$row['educational_units_earned_list'];
									$educational_units_earnedexplode = explode(',', $educational_units_earned);

									$educational_year_graduated=$row['educational_year_graduated_list'];
									$educational_year_graduatedexplode = explode(',', $educational_year_graduated);

									$educational_scholarship_class=$row['educational_scholarship_class_list'];
									$educational_scholarship_classexplode = explode(',', $educational_scholarship_class);

								?>
								<div class="div-tbl-cont" id="div-tbl-cont-id">
									<table class="table-pdf-view">
										<thead>
											<th style="text-align: left; padding-left: 5px; border-left: 0">26. LEVEL</th>
											<th style="text-align: center;">NAME OF SCHOOL<br>(Write in full)</th>
											<th style="text-align: center;">BASIC EDUCATION/<br>DEGREE/<br>COURSE<br>(Write in full)</th>
											<th style="text-align: center;">(POA)<br>FROM</th>
											<th style="text-align: center;">(POA)<br>TO</th>
											<th style="text-align: center;">HIGHEST LEVEL/<br>UNITS<br>(if not graduated)</th>
											<th style="text-align: center;">YEAR <br>GRADUATED</th>
											<th style="text-align: center;">SCHOLARSHIP/<br>ACADEMIC<br>HONORS<br></th>
										</thead>
										<tbody class="tbody-material-data-parent">

											<?php

		                                     foreach($educational_levelexplode as $index => $value){

		                                     echo 

		                                        '
												<tr class="tr-total-parent">
													<td style="text-align: left; border-left: 0; padding-left: 5px">'.$value.'</td>
													<td style="text-align: center;">'.$educational_school_nameexplode[$index].'</td>
													<td style="text-align: center; word-break: break-word!important;">'.$educational_courseexplode[$index].'</td>
													<td style="text-align: center;">'.$educational_attendance_fromexplode[$index].'</td>
													<td style="text-align: center;">'.$educational_attendance_toexplode[$index].'</td>
													<td style="text-align: center;">'.$educational_units_earnedexplode[$index].'</td>
													<td style="text-align: center;">'.$educational_year_graduatedexplode[$index].'</td>
													<td style="text-align: center;">'.$educational_scholarship_classexplode[$index].'</td>
												</tr>';

                                                 }

                                            ?>

										</tbody>
									</table>
								</div>
								<?php

									 } //WHILE END
								} //IF END

								?>

							</div>
							<!-- III. EDUCATIONAL BACKGROUND END -->


							<!-- IV.  CIVIL SERVICE ELIGIBILITY START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">
								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">IV. CIVIL SERVICE ELIGIBILITY</span>
								</div>

								<?php 

                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT *,

                                GROUP_CONCAT(ID  SEPARATOR ',') AS service_ID_list,
                                GROUP_CONCAT(service_career  SEPARATOR ',') AS service_career_list,
                                GROUP_CONCAT(service_rating  SEPARATOR ',') AS service_rating_list,
                                GROUP_CONCAT(service_date_of_exam  SEPARATOR ',') AS service_date_of_exam_list,
                                GROUP_CONCAT(service_place_of_exam  SEPARATOR ',') AS service_place_of_exam_list,
                                GROUP_CONCAT(service_license  SEPARATOR ',') AS service_license_list,
                                GROUP_CONCAT(service_license_date  SEPARATOR ',') AS service_license_date_list


                                FROM `main_iv_service_eligibility` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){


									$service_ID=$row['service_ID_list'];
									$service_IDexplode = explode(',', $service_ID);

									$service_career=$row['service_career_list'];
									$service_careerexplode = explode(',', $service_career);

									$service_rating=$row['service_rating_list'];
									$service_ratingexplode = explode(',', $service_rating);

									$service_date_of_exam=$row['service_date_of_exam_list'];
									$service_date_of_examexplode = explode(',', $service_date_of_exam);

									$service_place_of_exam=$row['service_place_of_exam_list'];
									$service_place_of_examexplode = explode(',', $service_place_of_exam);

									$service_license=$row['service_license_list'];
									$service_licenseexplode = explode(',', $service_license);

									$service_license_date=$row['service_license_date_list'];
									$service_license_dateexplode = explode(',', $service_license_date);


								?>
								<div class="div-tbl-cont" id="div-tbl-cont-id">
									<table class="table-pdf-view">

										<thead>
											<th style="text-align: center; padding-left: 5px; border-left: 0">27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER<br>SPECIAL LAWS/ CES/ CSEE<br>BARANGAY ELIGIBILITY / DRIVER'S LICENSE</th>
											<th style="text-align: center;">RATING<br>(If Applicable)</th>
											<th style="text-align: center;">DATE OF<br>EXAMINATION /<br>CONFERMENT</th>
											<th style="text-align: center;">PLACE OF EXAMINATION / CONFERMENT</th>
											<th style="text-align: center;">LICENSE NO.</th>
											<th style="text-align: center;">Date of <br>Validity</th>
										</thead>
										<tbody class="tbody-material-data-parent">

											<?php

		                                     foreach($service_careerexplode as $index => $value){

		                                     echo 

		                                        '
												<tr class="tr-total-parent">
													<td style="text-align: left; border-left: 0; padding-left: 5px; font-weight: 700!important">'.$value.'</td>
													<td style="text-align: center;">'.$service_ratingexplode[$index].'</td>
													<td style="text-align: center;">'.$service_date_of_examexplode[$index].'</td>
													<td style="text-align: center;">'.$service_place_of_examexplode[$index].'</td>
													<td style="text-align: center; font-weight: 700!important">'.$service_licenseexplode[$index].'</td>
													<td style="text-align: center; font-weight: 700!important">'.$service_license_dateexplode[$index].'</td>
												</tr>';

                                                 }

                                            ?>

										</tbody>

									</table>
								</div>
								<?php

									 } //WHILE END
								} //IF END

								?>

							</div>
							<!-- IV.  CIVIL SERVICE ELIGIBILITY END -->


							<!-- V.  WORK EXPERIENCE START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">
								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">V.  WORK EXPERIENCE 
										<br>
										<span style="font-size: 12px; font-weight: 600; color: #fff;">
											(Include private employment.  Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.)
										</span>
									</span>
								</div>

								<?php 

                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT *,

                                GROUP_CONCAT(ID  SEPARATOR ',') AS work_ID_list,
                                GROUP_CONCAT(work_inclusive_date_from  SEPARATOR ',') AS work_inclusive_date_from_list,
                                GROUP_CONCAT(work_inclusive_date_to  SEPARATOR ',') AS work_inclusive_date_to_list,
                                GROUP_CONCAT(work_position  SEPARATOR ',') AS work_position_list,
                                GROUP_CONCAT(work_agency  SEPARATOR ',') AS work_agency_list,
                                GROUP_CONCAT(work_salary  SEPARATOR ',') AS work_salary_list,
                                GROUP_CONCAT(work_pay_grade  SEPARATOR ',') AS work_pay_grade_list,
                                GROUP_CONCAT(work_appoinment  SEPARATOR ',') AS work_appoinment_list,
                                GROUP_CONCAT(work_gov_service  SEPARATOR ',') AS work_gov_service_list


                                FROM `main_v_work_experience` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){

									$work_ID=$row['work_ID_list'];
									$work_IDexplode = explode(',', $work_ID);

									$work_inclusive_date_from=$row['work_inclusive_date_from_list'];
									$work_inclusive_date_fromxplode = explode(',', $work_inclusive_date_from);

									$work_inclusive_date_to=$row['work_inclusive_date_to_list'];
									$work_inclusive_date_toexplode = explode(',', $work_inclusive_date_to);

									$work_position=$row['work_position_list'];
									$work_positionexplode = explode(',', $work_position);

									$work_agency=$row['work_agency_list'];
									$work_agencyexplode = explode(',', $work_agency);

									$work_salary=$row['work_salary_list'];
									$work_salaryexplode = explode(',', $work_salary);

									$work_pay_grade=$row['work_pay_grade_list'];
									$work_pay_gradeexplode = explode(',', $work_pay_grade);

									$work_appoinment=$row['work_appoinment_list'];
									$work_appoinmentexplode = explode(',', $work_appoinment);

									$work_gov_service=$row['work_gov_service_list'];
									$work_gov_serviceexplode = explode(',', $work_gov_service);

								?>
								<div class="div-tbl-cont" id="div-tbl-cont-id">
									<table class="table-pdf-view">

										<thead>
											<th style="text-align: center; padding-left: 5px; border-left: 0">28. (INCLUSIVE DATES)<br>FROM</th>
											<th style="text-align: center;">(INCLUSIVE DATES)<br>TO</th>
											<th style="text-align: center;">POSITION TITLE <br>(Write in full/Do not abbreviate)</th>
											<th style="text-align: center;">DEPARTMENT / AGENCY /<br> OFFICE / COMPANY<br>(Write 
											in full/Do not abbreviate)</th>
											<th style="text-align: center;">MONTHLY <br>SALARY</th>
											<th style="text-align: center;">SALARY/ JOB/ PAY/<br>GRADE (if applicable)<br>)& STEP  (Format "00-0")/<br>INCREMENT</th>
											<th style="text-align: center;">STATUS OF <br>APPOINTMENT</th>
											<th style="text-align: center;">GOV'T SERVICE <br>(Y/ N)</th>
										</thead>
										<tbody class="tbody-material-data-parent">

											<?php

		                                     foreach($work_inclusive_date_fromxplode as $index => $value){

		                                     echo 

		                                        '
												<tr class="tr-total-parent">
													<td style="text-align: left; border-left: 0; padding-left: 5px;">'.$value.'</td>
													<td style="text-align: center;">'.$work_inclusive_date_toexplode[$index].'</td>
													<td style="text-align: center; word-break: break-word!important;">'.$work_positionexplode[$index].'</td>
													<td style="text-align: center;">'.$work_agencyexplode[$index].'</td>
													<td style="text-align: center;">'.$work_salaryexplode[$index].'</td>
													<td style="text-align: center;">'.$work_pay_gradeexplode[$index].'</td>
													<td style="text-align: center; font-weight: 700!important">'.$work_appoinmentexplode[$index].'</td>
													<td style="text-align: center; font-weight: 700!important">'.$work_gov_serviceexplode[$index].'</td>
												</tr>';

                                                 }

                                             ?>

										</tbody>
									</table>
								</div>
								<?php

									 } //WHILE END
								} //IF END

								?>

							</div>
							<!-- V.  WORK EXPERIENCE END -->


							<!-- VI. VOLUNTARY WORK START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">
								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</span>
								</div>

								<?php 

                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT *,

                                GROUP_CONCAT(ID  SEPARATOR ',') AS voluntary_ID_list,
                                GROUP_CONCAT(voluntary_name  SEPARATOR ',') AS voluntary_name_list,
                                GROUP_CONCAT(voluntary_address  SEPARATOR ',') AS voluntary_address_list,
                                GROUP_CONCAT(voluntary_date_from  SEPARATOR ',') AS voluntary_date_from_list,
                                GROUP_CONCAT(voluntary_date_to  SEPARATOR ',') AS voluntary_date_to_list,
                                GROUP_CONCAT(voluntary_no_of_hrs  SEPARATOR ',') AS voluntary_no_of_hrs_list,
                                GROUP_CONCAT(voluntary_position  SEPARATOR ',') AS voluntary_position_list


                                FROM `main_vi_voluntary_work` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){

									$voluntary_ID=$row['voluntary_ID_list'];
									$voluntary_IDexplode = explode(',', $voluntary_ID);

									$voluntary_name=$row['voluntary_name_list'];
									$voluntary_nameexplode = explode(',', $voluntary_name);

									$voluntary_address=$row['voluntary_address_list'];
									$voluntary_addressexplode = explode(',', $voluntary_address);

									$voluntary_date_from=$row['voluntary_date_from_list'];
									$voluntary_date_fromexplode = explode(',', $voluntary_date_from);

									$voluntary_date_to=$row['voluntary_date_to_list'];
									$voluntary_date_toexplode = explode(',', $voluntary_date_to);

									$voluntary_no_of_hrs=$row['voluntary_no_of_hrs_list'];
									$voluntary_no_of_hrsexplode = explode(',', $voluntary_no_of_hrs);

									$voluntary_position=$row['voluntary_position_list'];
									$voluntary_positionexplode = explode(',', $voluntary_position);

								?>
								<div class="div-tbl-cont" id="div-tbl-cont-id">
									<table class="table-pdf-view">

										<thead>
											<th style="text-align: center; padding-left: 5px; border-left: 0">29. NAME & ADDRESS OF ORGANIZATION<br>(Write in full)</th>
											<th style="text-align: center;">(INCLUSIVE DATES)<br>FROM</th>
											<th style="text-align: center;">(INCLUSIVE DATES)<br>TO</th>
											<th style="text-align: center;">NUMBER OF HOURS</th>
											<th style="text-align: center;">POSITION / NATURE OF WORK</th>
										</thead>
										<tbody class="tbody-material-data-parent">

											<?php

		                                     foreach($voluntary_nameexplode as $index => $value){

		                                     echo 

			                                        '
													<tr class="tr-total-parent">
														<td style="text-align: left; border-left: 0; padding-left: 5px; font-weight: 700!important">'.$value.'</td>
														<td style="text-align: center;">'.$voluntary_date_fromexplode[$index].'</td>
														<td style="text-align: center;">'.$voluntary_date_toexplode[$index].'</td>
														<td style="text-align: center;">'.$voluntary_no_of_hrsexplode[$index].'</td>
														<td style="text-align: center;">'.$voluntary_positionexplode[$index].'</td>
													</tr>';

                                                 }

                                             ?>

										</tbody>

									</table>
								</div>
								<?php

									 } //WHILE END
								} //IF END

								?>
							</div>
							<!-- VI. VOLUNTARY WORK END -->


							<!-- VII.  LEARNING AND DEVELOPMENT START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">
								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED
										<br>
										<span style="font-size: 12px; font-weight: 600; color: #fff;">
											(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)
										</span>
									</span>
								</div>

								<?php 

                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT *,

                                GROUP_CONCAT(ID  SEPARATOR ',') AS learning_ID_list,
                                GROUP_CONCAT(learning_training  SEPARATOR ',') AS learning_training_list,
                                GROUP_CONCAT(learning_date_from  SEPARATOR ',') AS learning_date_from_list,
                                GROUP_CONCAT(learning_date_to  SEPARATOR ',') AS learning_date_to_list,
                                GROUP_CONCAT(learning_no_hrs  SEPARATOR ',') AS learning_no_hrs_list,
                                GROUP_CONCAT(learning_ld_type  SEPARATOR ',') AS learning_ld_type_list,
                                GROUP_CONCAT(learning_sponsored  SEPARATOR ',') AS learning_sponsored_list


                                FROM `main_vii_learning_and_dev` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){

									$learning_ID=$row['learning_ID_list'];
									$learning_IDexplode = explode(',', $learning_ID);

									$learning_training=$row['learning_training_list'];
									$learning_trainingexplode = explode(',', $learning_training);

									$learning_date_from=$row['learning_date_from_list'];
									$learning_date_fromexplode = explode(',', $learning_date_from);

									$learning_date_to=$row['learning_date_to_list'];
									$learning_date_toexplode = explode(',', $learning_date_to);

									$learning_no_hrs=$row['learning_no_hrs_list'];
									$learning_no_hrsexplode = explode(',', $learning_no_hrs);

									$learning_ld_type=$row['learning_ld_type_list'];
									$learning_ld_typeexplode = explode(',', $learning_ld_type);

									$learning_sponsored=$row['learning_sponsored_list'];
									$learning_sponsoredexplode = explode(',', $learning_sponsored);

								?>
								<div class="div-tbl-cont" id="div-tbl-cont-id">
									<table class="table-pdf-view">

										<thead>
											<th style="text-align: center; padding-left: 5px; border-left: 0">30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS <br>(Write in full)</th>
											<th style="text-align: center;">(INCLUSIVE DATES)<br>FROM</th>
											<th style="text-align: center;">(INCLUSIVE DATES)<br>TO</th>
											<th style="text-align: center;">NUMBER OF <br>HOURS</th>
											<th style="text-align: center;">Type of LD ( Managerial/<br>Supervisory/Technical/etc)</th>
											<th style="text-align: center;">CONDUCTED/ SPONSORED BY<br>(Write in full)</th>
										</thead>
										<tbody class="tbody-material-data-parent">

											<?php

		                                     foreach($learning_trainingexplode as $index => $value){

		                                     echo 

			                                        '
													<tr class="tr-total-parent">
														<td style="text-align: center; border-left: 0; padding-left: 5px;">'.$value.'</td>
														<td style="text-align: center;">'.$learning_date_fromexplode[$index].'</td>
														<td style="text-align: center;">'.$learning_date_toexplode[$index].'</td>
														<td style="text-align: center;">'.$learning_no_hrsexplode[$index].'</td>
														<td style="text-align: center;">'.$learning_ld_typeexplode[$index].'</td>
														<td style="text-align: center;">'.$learning_sponsoredexplode[$index].'</td>
													</tr>';

                                                 }

                                             ?>
										</tbody>
									</table>
								</div>
								<?php

									 } //WHILE END
								} //IF END

								?>

							</div>
							<!-- VII.  LEARNING AND DEVELOPMENT END -->


							<!-- VIII.  OTHER INFORMATION START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px;" class="div_for_separate">
								<div style="background: #AEAEAE; padding: 5px 10px" class="i_info_div">
									<span style="font-weight: 700; color: #fff; font-size: 15px">VIII.  OTHER INFORMATION
									</span>
								</div>

								<div style="display: grid; grid-template-columns: 1fr 1fr 1fr">

									<!-- SKILLS AND HOBBIES -->
                                	<?php 

	                                $datecreated_id=$_GET['datecreated_id'];

	                                $sql="SELECT *,

	                                GROUP_CONCAT(ID  SEPARATOR ',') AS hobbies_ID_list,
	                                GROUP_CONCAT(others_special_skills  SEPARATOR ',') AS others_special_skills_list

	                                FROM `main_viii_others_hobbies` WHERE `date_created` = '$datecreated_id'";
									$result=mysqli_query($con,$sql);

									if($result){

										$no = 1;
										while($row=mysqli_fetch_assoc($result)){

										$hobbies_ID=$row['hobbies_ID_list'];
										$hobbies_IDexplode = explode(',', $hobbies_ID);

										$others_special_skills=$row['others_special_skills_list'];
										$others_special_skillsexplode = explode(',', $others_special_skills);

									?>
									<div class="div-tbl-cont" id="div-tbl-cont-id" style="border-right: 1px solid #868686; border-bottom: 1px solid #868686;">
										<table class="table-pdf-view">

											<thead>
												<th style="text-align: center; padding-left: 5px; border-left: 0">31. SPECIAL SKILLS and HOBBIES</th>
											</thead>
											<tbody class="tbody-material-data-parent">

												<?php

		                                     foreach($others_special_skillsexplode as $index => $value){

		                                     echo 

		                                        '
													<tr class="tr-total-parent">
														<td style="text-align: center; border-left: 0; padding-left: 5px;">'.$value.'</td>
													</tr>';

                                                 }

                                             ?>

											</tbody>
										</table>
									</div>
									<?php

										 } //WHILE END
									} //IF END

									?>


									<?php 

	                                $datecreated_id=$_GET['datecreated_id'];

	                                $sql="SELECT *,

	                                GROUP_CONCAT(ID  SEPARATOR ',') AS non_academic_ID_list,
	                                GROUP_CONCAT(others_non_academic  SEPARATOR ',') AS others_non_academic_list

	                                FROM `main_viii_others_non_academic` WHERE `date_created` = '$datecreated_id'";
									$result=mysqli_query($con,$sql);

									if($result){

										$no = 1;
										while($row=mysqli_fetch_assoc($result)){

										$non_academic_ID=$row['non_academic_ID_list'];
										$non_academic_IDexplode = explode(',', $non_academic_ID);

										$others_non_academic=$row['others_non_academic_list'];
										$others_non_academicsexplode = explode(',', $others_non_academic);

									?>
									<div class="div-tbl-cont" id="div-tbl-cont-id" style="border-right: 1px solid #868686; border-bottom: 1px solid #868686;">
										<table class="table-pdf-view">

											<thead>
												<th style="text-align: center; padding-left: 5px; border-left: 0">32. NON-ACADEMIC DISTINCTIONS / RECOGNITION</th>
											</thead>
											<tbody class="tbody-material-data-parent">

												<?php

			                                     foreach($others_non_academicsexplode as $index => $value){

			                                     echo 

		                                        '

													<tr class="tr-total-parent">
														<td style="text-align: center; border-left: 0; padding-left: 5px;">'.$value.'</td>
													</tr>';

                                                 }

                                             ?>

											</tbody>
										</table>
									</div>
									<?php

										 } //WHILE END
									} //IF END

									?>


									<?php 

	                                $datecreated_id=$_GET['datecreated_id'];

	                                $sql="SELECT *,

	                                GROUP_CONCAT(ID  SEPARATOR ',') AS membership_ID_list,
	                                GROUP_CONCAT(others_membership  SEPARATOR ',') AS others_membership_list

	                                FROM `main_viii_membership` WHERE `date_created` = '$datecreated_id'";
									$result=mysqli_query($con,$sql);

									if($result){

										$no = 1;
										while($row=mysqli_fetch_assoc($result)){

										$membership_ID=$row['membership_ID_list'];
										$membership_IDexplode = explode(',', $membership_ID);

										$others_membership=$row['others_membership_list'];
										$others_membershipsexplode = explode(',', $others_membership);

									?>
									<div class="div-tbl-cont" id="div-tbl-cont-id" style="border-bottom: 1px solid #868686;">
										<table class="table-pdf-view">

											<thead>
												<th style="text-align: center; padding-left: 5px; border-left: 0">33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION</th>
											</thead>
											<tbody class="tbody-material-data-parent">

												<?php

			                                     foreach($others_membershipsexplode as $index => $value){

			                                     echo 

			                                        '
													<tr class="tr-total-parent">
														<td style="text-align: center; border-left: 0; padding-left: 5px;">'.$value.'</td>
													</tr>';

                                                 }

                                             ?>

											</tbody>
										</table>
									</div>
									<?php

										 } //WHILE END
									} //IF END

									?>

								</div>

							</div>
							<!-- VIII.  OTHER INFORMATION END -->


							<!-- VIII. QUESTIONERS START -->
                            <?php 

                            $datecreated_id=$_GET['datecreated_id'];

                            $sql="SELECT * FROM `main_viii_others_questions` WHERE `date_created` = '$datecreated_id'";
							$result=mysqli_query($con,$sql);

							if($result){

								$no = 1;
								while($row=mysqli_fetch_assoc($result)){

								$q_34=$row['q_34'];
								$q_34_b=$row['q_34_b'];
								$q_35_a=$row['q_35_a'];
								$q_35_b=$row['q_35_b'];
								$q_36=$row['q_36'];
								$q_37=$row['q_37'];
								$q_38_a=$row['q_38_a'];
								$q_38_b=$row['q_38_b'];
								$q_39=$row['q_39'];
								$q_40_a=$row['q_40_a'];
								$q_40_b=$row['q_40_b'];
								$q_40_c=$row['q_40_c'];
								


							?>
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0;" class="div_for_separate">

								<div style="display: grid; grid-template-columns: 1fr 1fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;min-width: 350px;">
										<span style="color: #333; white-space: normal;">
											34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
											chief of bureau or office or to the person who has immediate supervision over you in the Office, 
											Bureau or Department where you will be apppointed,
											<br>
											a. within the third degree?
											<br>
											b. within the fourth degree (for Local Government Unit - Career Employees)?
										</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;">
											<br><br>
											 If YES, give details:
										</span>
										<br>
										<span style="margin-top: 5px"><?php echo $q_34_b ?></span>
										<hr>
										<br>
									</div>
								</div>
							</div>

							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0;" class="div_for_separate">

								<div style="display: grid; grid-template-columns: 1fr 1fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;min-width: 350px;">
										<span style="color: #333; white-space: normal;">
											35. a. Have you ever been found guilty of any administrative offense?
											<br>
											b. Have you been criminally charged before any court?
										</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;">
											<br>
											 If YES, give details:
										</span>
										<br>
										<span style="margin-top: 5px"><?php echo $q_35_a ?></span>
										<hr>
										<br>
									</div>
								</div>
							</div>

							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0;" class="div_for_separate">

								<div style="display: grid; grid-template-columns: 1fr 1fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;min-width: 350px;">
										<span style="color: #333; white-space: normal;">
											36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
										</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;">
											<br>
											 If YES, give details:
										</span>
										<br>
										<span style="margin-top: 5px"><?php echo $q_36 ?></span>
										<hr>
										<br>
									</div>
								</div>
							</div>

							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0;" class="div_for_separate">

								<div style="display: grid; grid-template-columns: 1fr 1fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;min-width: 350px;">
										<span style="color: #333; white-space: normal;">
											37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?
										</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;">
											<br>
											 If YES, give details:
										</span>
										<br>
										<span style="margin-top: 5px"><?php echo $q_37 ?></span>
										<hr>
										<br>
									</div>
								</div>
							</div>

							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0;" class="div_for_separate">

								<div style="display: grid; grid-template-columns: 1fr 1fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;min-width: 350px;">
										<span style="color: #333; white-space: normal;">
											38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
											<br><br>
											b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?
										</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<div>
											<span style="color: #333; font-weight: 500;">
												 If YES, give details:
											</span>
											<br>
											<span style="margin-top: 5px"><?php echo $q_38_a ?></span>
											<hr>
											<br>
										</div>
										<div>
											<span style="color: #333; font-weight: 500;">
												 If YES, give details:
											</span>
											<br>
											<span style="margin-top: 5px"><?php echo $q_38_b ?></span>
											<hr>
											<br>
										</div>
									</div>
								</div>
							</div>

							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0;" class="div_for_separate">

								<div style="display: grid; grid-template-columns: 1fr 1fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;min-width: 350px;">
										<span style="color: #333; white-space: normal;">
											39. Have you acquired the status of an immigrant or permanent resident of another country?
										</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<span style="color: #333; font-weight: 500;">
											<br>
											 If YES, give details(country): 
										</span>
										<br>
										<span style="margin-top: 5px"><?php echo $q_39 ?></span>
										<hr>
										<br>
									</div>
								</div>
							</div>


							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0;" class="div_for_separate">

								<div style="display: grid; grid-template-columns: 1fr 1fr">
									<div style="background: #D9D9D9; border-right: 1px solid #868686; padding: 3px 10px; border-bottom: 1px solid #868686;min-width: 350px;">
										<span style="color: #333; white-space: normal;">
											40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
											<br>
											a. Are you a member of any indigenous group?
											<br><br>
											b. Are you a person with disability?
											<br><br>
											c. Are you a solo parent?
										</span>
									</div>
									<div style="padding: 3px 10px; width: 100%; border-bottom: 1px solid #868686; text-align: left;">
										<div>
											<br><br>
											<span style="color: #333; font-weight: 500;">
												 If YES, please specify:
											</span>
											<br>
											<span style="margin-top: 5px"><?php echo $q_40_a ?></span>
											<hr>
											<br>
										</div>
										<div>
											<span style="color: #333; font-weight: 500;">
												 If YES, please specify ID No: 
											</span>
											<br>
											<span style="margin-top: 5px"><?php echo $q_40_b ?></span>
											<hr>
											<br>
										</div>
										<div>
											<span style="color: #333; font-weight: 500;">
												 If YES, please specify ID No: 
											</span>
											<br>
											<span style="margin-top: 5px"><?php echo $q_40_c ?></span>
											<hr>
											<br>
										</div>
									</div>
								</div>
							</div>
							<?php

								 } //WHILE END
							} //IF END

							?>
							<!-- VIII. QUESTIONERS END -->

							<!-- VIII REFERENCES START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden; border-bottom: 0px; border-top: 0; display: grid; grid-template-columns: 4fr 1fr" class="div_for_separate">

								<div>
									<div style="background: #D9D9D9; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686;" class="i_info_div">
										<span style="color: #333;">41. REFERENCES <span style="color: red">(Person not related by consanguinity or affinity to applicant /appointee)</span>
										</span>
									</div>

									<?php 

	                                $datecreated_id=$_GET['datecreated_id'];

	                                $sql="SELECT * FROM `main_viii_others_reference` WHERE `date_created` = '$datecreated_id'";
									$result=mysqli_query($con,$sql);

									if($result){

										$no = 1;
										while($row=mysqli_fetch_assoc($result)){

										$reference_name=$row['reference_name'];
										$reference_address=$row['reference_address'];
										$reference_tel_no=$row['reference_tel_no'];

									?>
									<div class="div-tbl-cont" id="div-tbl-cont-id">
										<table class="table-pdf-view">

											<thead>
												<th style="text-align: center; padding-left: 5px; border-left: 0">NAME</th>
												<th style="text-align: center;">ADDRESS</th>
												<th style="text-align: center; border-right: 1px solid #868686;">TEL. NO.</th>
											</thead>
											<tbody class="tbody-material-data-parent">
												<tr class="tr-total-parent">
													<td style="text-align: center; border-left: 0; padding-left: 5px;"><?php echo $reference_name ?></td>
													<td style="text-align: center;"><?php echo $reference_address ?></td>
													<td style="text-align: center; border-right: 1px solid #868686;"><?php echo $reference_tel_no ?></td>
												</tr>
											</tbody>
										</table>
									</div>
									<?php

										 } //WHILE END
									} //IF END

									?>

									<div style="background: #D9D9D9; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686;" class="i_info_div">
										<span style="color: #333; white-space: normal;">42. RI declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. I agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.</span>
										</span>
									</div>
								</div>


								<?php 

                                $datecreated_id=$_GET['datecreated_id'];

                                $sql="SELECT * FROM `main_viii_government_issued` WHERE `date_created` = '$datecreated_id'";
								$result=mysqli_query($con,$sql);

								if($result){

									$no = 1;
									while($row=mysqli_fetch_assoc($result)){

									$government_issued_id=$row['government_issued_id'];
									$government_issued_passport=$row['government_issued_passport'];
									$government_issued_date_issuance=$row['government_issued_date_issuance'];
									$government_issued_place_issuance=$row['government_issued_place_issuance'];
									$government_issued_img=$row['government_issued_img'];
									$government_issued_date_appointment=$row['government_issued_date_appointment'];

									$location_img = 'uploads/';

								?>
								<div style="padding: 25px; display: flex; justify-content: center">
									<div style="text-align: center;">
										<span style="color:#333; font-size: 9px!important; white-space: pre-line; padding: 5px; line-height: 15px!important; display: block; border: 2px solid #868686; width: 180px;  ">ID picture taken within 										
											the last  6 months											
											3.5 cm. X 4.5 cm
											(passport size)
											With full and handwritten
											name tag and signature over
											printed name
											Computer generated 
											or photocopied picture
											is not acceptable
										</span>
										<span style="font-weight: 400; color: #C1C1C1;">PHOTO</span>
									</div>
								</div>

							</div>
							<!-- VIII REFERENCES END -->

							<!-- VIII. GOV ISSUED ID -->
							<div style=" border: 1px solid #868686; padding: 10px 0px 10px 0px; overflow: hidden; border-bottom: 0px; border-top: 0; display: grid; grid-template-columns: 4fr 1fr;" class="div_for_separate gove_issued_class">

								<div style=" display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
									<div>
										<div style="background: #D9D9D9; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686;  border-top: 1px solid #868686;" class="i_info_div">
											<span style="color: #333; font-size: 11px;">Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)
												<br>
												PLEASE INDICATE ID Number and Date of Issuance
											</span>
										</div>
										<div style="background: #fff; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686; display: grid; grid-template-columns: 1fr 1fr" class="i_info_div">
											<div>
												<span style="color: #333; font-size: 11px;">Government Issued ID: </span>
											</div>
											<div style="text-align: center;">
												<span style="color: #333; font-size: 11px;"><?php echo $government_issued_id ?></span>
											</div>
										</div>
										<div style="background: #fff; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686; display: grid; grid-template-columns: 1fr 1fr" class="i_info_div">
											<div>
												<span style="color: #333; font-size: 11px;">ID/License/Passport No.: </span>
											</div>
											<div style="text-align: center;">
												<span style="color: #333; font-size: 11px;"><?php echo $government_issued_passport ?></span>
											</div>
										</div>
										<div style="background: #fff; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686; display: grid; grid-template-columns: 1fr 1fr" class="i_info_div">
											<div>
												<span style="color: #333; font-size: 11px;">Date/Place of Issuance:</span>
											</div>
											<div style="text-align: center;">
												<span style="color: #333; font-size: 11px;"><?php echo $government_issued_date_issuance ?></span>
											</div>
										</div>
									</div>
									<?php

										 } //WHILE END
									} //IF END

									?>


									<div>
										<div style="background: #fff; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686;  border-top: 1px solid #868686; border-left: 1px solid #868686; height: 70px" class="i_info_div">
											<span style="color: #333;"></span>
										</div>
										<div style="background: #D9D9D9; padding: 0px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center;" class="i_info_div">
											<span style="color: #333;">Signature (Sign inside the box)</span>
										</div>
										<div style="background: #fff; padding: 5px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center; height: 25px;" class="i_info_div">
											<span style="color: #333;"></span>
										</div>
										<div style="background: #D9D9D9; padding: 0px 10px; border-bottom: 1px solid #868686; border-right: 1px solid #868686; border-left: 1px solid #868686; text-align: center;" class="i_info_div">
											<span style="color: #333;">Date Accomplished</span>
										</div>
									</div>
								</div>

								<div style="padding: 25px; display: flex; justify-content: center">
									<div style="text-align: center;">
										<span style="color:#333; font-size: 9px!important; white-space: pre-line; padding: 5px; line-height: 15px!important; display: block; border: 2px solid #868686; width: 180px; height: 100px; ">
										</span>
										<div style="background: #D9D9D9; padding: 0px 10px; border-bottom: 2px solid #868686; border-right: 2px solid #868686; border-left: 2px solid #868686; text-align: center;" class="i_info_div">
											<span style="color: #333;">Right Thumbmark</span>
										</div>
									</div>
								</div>

							</div>

							<!-- VIII LAST PART START -->
							<div style=" border: 1px solid #868686; padding: 0px 0px 0px 0px; overflow: hidden;" class="div_for_separate">

								<div style="background: #fff; padding: 5px 10px; display: flex;" class="i_info_div">
									<div>
										<span style="color: #333;">SUBSCRIBED AND SWORN to before me this</span>
									</div>
									<div style="border-bottom: 1px solid #868686; width: 200px">
										
									</div>
									<div>
										<span>
										, affiant exhibiting his/her validly issued government ID as indicated above.
										</span>
									</div>
								</div>

								<div style="padding: 25px; display: flex; justify-content: center">
									<div style="text-align: center;">
										<span style="color:#333; font-size: 9px!important; white-space: pre-line; padding: 5px; line-height: 15px!important; display: block; border: 2px solid #868686; width: 230px; height: 100px; ">
										</span>
										<div style="background: #D9D9D9; padding: 0px 10px; border-bottom: 2px solid #868686; border-right: 2px solid #868686; border-left: 2px solid #868686; text-align: center;" class="i_info_div">
											<span style="color: #333;">Person Administering Oath</span>
										</div>
									</div>
								</div>


							</div>



						</div>
					</div>


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


		<script type="text/javascript" src="print_js/printThis.js"></script>
		<script type="text/javascript">
		
			$('#print-btn').click(function(){
				$(".table3-container").printThis({

					header: null,               // prefix to html
	    			footer: null               // postfix to html
				});
			});

		</script>



		<!-- QUESTIONS CHECK -->
		<script type="text/javascript">
		 
		  $(document).ready(function() {

		  		var q_34_data = $('#q_34_id').val();

			  	if(q_34_data === "Yes"){
			  		$('#q_34_radio_yes_id').prop('checked', true);
			  	}
			  	else if(q_34_data === "No"){
			  		$('#q_34_radio_no_id').prop('checked', true);
			  	}


			  	var q_34_b_data = $('#q_34_b_id').val();

			  	if(q_34_b_data != ""){
			  		$('#q_34_b_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_34_b_no_id').prop('checked', true);
			  	}


			  	var q_35_a_data = $('#q_35_a_id').val();

			  	if(q_35_a_data != ""){
			  		$('#q_35_a_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_35_a_no_id').prop('checked', true);
			  	}


			  	var q_35_b_data = $('#q_35_b_id').val();

			  	if(q_35_b_data != ""){
			  		$('#q_35_b_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_35_b_no_id').prop('checked', true);
			  	}


			  	var q_36_data = $('#q_36_id').val();

			  	if(q_36_data != ""){
			  		$('#q_36_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_36_no_id').prop('checked', true);
			  	}


			  	var q_37_data = $('#q_37_id').val();

			  	if(q_37_data != ""){
			  		$('#q_37_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_37_no_id').prop('checked', true);
			  	}


			  	var q_38_a_data = $('#q_38_a_id').val();

			  	if(q_38_a_data != ""){
			  		$('#q_38_a_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_38_a_no_id').prop('checked', true);
			  	}


			  	var q_38_b_data = $('#q_38_b_id').val();

			  	if(q_38_b_data != ""){
			  		$('#q_38_b_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_38_b_no_id').prop('checked', true);
			  	}


			  	var q_39_data = $('#q_39_id').val();

			  	if(q_39_data != ""){
			  		$('#q_39_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_39_no_id').prop('checked', true);
			  	}


			  	var q_40_a_data = $('#q_40_a_id').val();

			  	if(q_40_a_data != ""){
			  		$('#q_40_a_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_40_a_no_id').prop('checked', true);
			  	}


			  	var q_40_b_data = $('#q_40_b_id').val();

			  	if(q_40_b_data != ""){
			  		$('#q_40_b_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_40_b_no_id').prop('checked', true);
			  	}


			  	var q_40_c_data = $('#q_40_c_id').val();

			  	if(q_40_c_data != ""){
			  		$('#q_40_c_yes_id').prop('checked', true);
			  	}
			  	else{
			  		$('#q_40_c_no_id').prop('checked', true);
			  	}

		  	});

		</script>





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
			// create the row
			var newRow = $("<tr>");
			newRow.append('<td><select name="educational_level[]" style="height: 38px; margin-bottom: 25px;" class="educational_level_class"><option value="">-SELECT LEVEL-</option><option value="ELEMENTARY">ELEMENTARY</option><option value="SECONDARY">SECONDARY</option><option value="VOCATIONAL">VOCATIONAL</option><option value="BACHELORS DEGREE">BACHELORS DEGREE</option><option value="MASTERS DEGREE">MASTERS DEGREE</option><option value="DOCTORATE DEGREE">DOCTORATE DEGREE</option></select></td><td><input type="text" name="educational_school_name[]" placeholder="----" autocomplete="off" class="educational_school_name_class" style="width: 400px"></td><td><input type="text" name="educational_course[]" placeholder="----" autocomplete="off" class="educational_course_class" style="width: 400px"></td><td><input type="text" name="educational_attendance_from[]" placeholder="----" autocomplete="off" class="educational_attendance_from_class" style="width: 150px; margin-right: 10px;"><input type="text" name="educational_attendance_to[]" placeholder="----" autocomplete="off" class="educational_attendance_to_class" style="width: 153px"></td><td><input type="text" name="educational_units_earned[]" placeholder="----" autocomplete="off" class="educational_units_earned_class" style="width: 400px"></td><td><input type="text" name="educational_year_graduated[]" placeholder="----" autocomplete="off" class="educational_year_graduated_class"></td><td><input type="text" name="educational_scholarship[]" placeholder="----" autocomplete="off" class="educational_scholarship_class"></td>');

			// create the remove button
				var removeButton = $('<i class="fa-solid fa-minus" style="background-color: #FF7979; color: #fff; border-radius: 4px; padding: 13px 13.5px; font-size: 13px;"></i>');

				// add the remove button to the row
				newRow.append($('<td class="remove_educational" style="min-width: 30px!important; cursor: pointer;">').append(removeButton));

				// add the row to the table
				$('#educational_table_id').append(newRow);

				// bind click event to the remove button to remove the row
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

        $(".table3-container").click(function(){
                
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