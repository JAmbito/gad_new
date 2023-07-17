<?php

include 'connect.php';

session_start();


$sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($result1);
$user_name=$row1['name'];
$campus_name=$row1['campus_name'];




// FOR MALE PIE CHART
$sql = "SELECT `personal_civil_status`, COUNT(*) AS 'count' FROM `main_i_personal_info` WHERE `personal_sex` = 'MALE' AND `approval` = 'APPROVED' GROUP BY `personal_civil_status`";
$result=mysqli_query($con,$sql);

$data_male = array();
$labels_male = array();
while ($row = mysqli_fetch_assoc($result)) {
    $labels_male[] = $row['personal_civil_status'];
    $data_male[] = $row['count'] * 100 / 100;
}

if (mysqli_num_rows($result) === 0) {
    $labels_male = array("No results found");
    $data_male = array(0);
}



// FOR FEMALE PIE CHART
$sql = "SELECT `personal_civil_status`, COUNT(*) AS 'count' FROM `main_i_personal_info` WHERE `personal_sex` = 'FEMALE' AND `approval` = 'APPROVED' GROUP BY `personal_civil_status`";
$result=mysqli_query($con,$sql);

$data_female = array();
$labels_female = array();
while ($row = mysqli_fetch_assoc($result)) {
    $labels_female[] = $row['personal_civil_status'];
    $data_female[] = $row['count'] * 100 / 100;
}

if (mysqli_num_rows($result) === 0) {
    $labels_female = array("No results found");
    $data_female = array(0);
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
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link href="http://fonts.cdnfonts.com/css/circular-std" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_INV_91.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_CLASS_RELEASE_WAREHOUSE_91.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_CLASS_RELEASE_CONTRACTOR_91.css">
	<link rel="stylesheet" type="text/css" href="CSS/dashboard.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ADD_REMOVE_CLASS.css">
	<link rel="stylesheet" type="text/css" href="CSS/z_purchase_order_drop_none.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/project_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/bom_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/project_bom_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ntp_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS/z_warehouse_no_drop.css">
	<title>GAD - Dashboard</title>
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

			<li class="active">
				<a href="index.php" class="side-btn">
					<i class="fi fi-rr-home" style="margin-top: 3px;"></i>
					<span class="text emp-chev">&nbsp; Home </span>
				</a>
			</li>

			<div class="reports" style="margin-top: 10px;">
				<h4 class="report1">MANAGE</h4>
			</div>

			<li class="">
				<a href="#" class="dash-drop side-btn">
					<i class="fi fi-rr-chart-pie-alt"></i>
					<span class="text dash-chev" style="letter-spacing: .3px">&nbsp; Data Management </span>
					<i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-right: 12px;" id="chev-rotate"></i>
					<input type="text" class="data_management_class" hidden>
				</a>
			</li>
				<ul id="dash-dropdown">
					<li class="emp-down-li emp-ac emp-paydas">
						<a href="DTM_Campus.php">
							<h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
							<span class="text">&nbsp;Campus</span>
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
							<span class="text" >&nbsp;Administrative Rank</span>
							<input type="text" name="users" class="users_class" hidden>
						</a>
					</li>
					<li class="emp-down-li emp-ac emp-paydas">
						<a href="DTM_Academic_Rank.php">
							<h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
							<span class="text">&nbsp;Academic Rank</span>
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



			<li>
				<a href="#" class="project-drop side-btn">
					<i class="fi fi-rr-users"></i>
					<span class="text emp-chev">&nbsp; Personnels </span>
					<i class="fa-solid fa-chevron-right" style="font-size: 10px;" id="project-chev-rotate"></i>
				</a>
			</li>
				<ul id="project-dropdown">
						<li class="emp-down-li emp-ac emp-paydas">
							<a href="DTM_Personnels.php">
								<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
								<span class="text">&nbsp;View Personnels</span>
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



			<li>
				<a href="#" class="bom-drop side-btn">
					<i class="fi fi-rr-circle-user" style="font-size: 20px"></i>
					<span class="text emp-chev">&nbsp; Users </span>
					<i class="fa-solid fa-chevron-right" style="font-size: 10px;" id="bom-chev-rotate"></i>
					<input type="text" name="bom" class="bom_class" hidden>
				</a>
			</li>
				<ul id="bom-dropdown">
						<li class="emp-down-li emp-ac emp-paydas">
							<a href="MAIN_View_Users.php">
								<h4 style="color: #D5D5D5; margin-right: 5px">—</h4>
								<span class="text">&nbsp;View Users</span>
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

			<div class="head-title" style="margin-bottom: 35px;">
				<div class="left">
					<h1 class="paragraph">Dashboard</h1>
					<div class="loc-date">
						<ul class="header-main">
							<li style="margin-top: 6px;">
								<i class="fi fi-rr-home" style="color:#C30000; margin-left: 15px;"></i>
							</li>
							<li>
								<i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i>
							</li>
							<li style="margin-top: 2px">
								<a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Statistics</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="navbar">

			<?php 

			include 'NAVBAR/navbar.php';

			?>

			</div>


			<!-- DASHBOARD BOX -->

			<div class="boxes-cont">
				<div class="box-selection" style="position: relative;">
					<div style="display: flex;">
						<h1 class="box-select-active-h1">
							
							<?php  

							$sql = "SELECT `ID` FROM `main_i_personal_info` WHERE `personal_sex` = 'MALE' AND `approval` = 'APPROVED' GROUP BY `personal_sex` ORDER BY `ID`";
							$result=mysqli_query($con,$sql);

							$row = mysqli_num_rows($result);

							echo $row;

						 ?>

						</h1>
						<i class="fi fi-br-male"></i>
					</div>
					<div>	
						<span class="box-select-active-span">Male</span>
					</div>
					<div class="box-dtb-btn">
						<a href="DTM_Personnels.php" class="box-select-active" style="color:#537291"><i class="fi fi-rr-eye"></i> View Datatable</a>
					</div>
				</div>
				<div class="box-selection" style="position: relative;">
					<div style="display: flex;">
						<h1 class="box-select-active-h1">
							
							<?php  

							$sql = "SELECT `ID` FROM `main_i_personal_info` WHERE `personal_sex` = 'FEMALE' AND `approval` = 'APPROVED' GROUP BY `personal_sex` ORDER BY `ID`";
							$result=mysqli_query($con,$sql);

							$row = mysqli_num_rows($result);

							echo $row;

						 ?>

						</h1>
						<i class="fi fi-br-female"></i>
					</div>
					<div>	
						<span class="box-select-active-span">Female</span>
					</div>
					<div class="box-dtb-btn">
						<a href="DTM_Personnels" class="box-select-active" style="color:#537291"><i class="fi fi-rr-eye"></i> View Datatable</a>
					</div>
				</div>
				<div class="box-selection" style="position: relative;">
					<div style="display: flex;">
						<h1 class="box-select-active-h1" style="letter-spacing: .1px">
							
							<?php  

							$sql = "SELECT `ID` FROM `main_i_personal_info` WHERE `approval` = 'PENDING' GROUP BY `personal_sex` ORDER BY `ID`";
							$result=mysqli_query($con,$sql);

							$row = mysqli_num_rows($result);

							echo $row;

						 ?>

						</h1>
						<i class="fi fi-rr-hourglass-end"></i>
					</div>
					<div>	
						<span class="box-select-active-span">Pending</span>
					</div>
					<div class="box-dtb-btn">
						<a href="DTM_Personnels_EDIT.php" class="box-select-active" style="color:#537291"><i class="fi fi-rr-eye"></i> View Datatable</a>
					</div>
				</div>
			</div>

			<!-- DASHBOARD BOX END -->



			<!-- GRAPH FILTERS -->
			<div class="graph-cont">
				<div class="graph-box-cont">

					<div class="grap-header" style="border-bottom: 1px solid #99A6B3; display: flex; align-items: center; padding-bottom: 10px; margin-bottom: 25px;">
							<i class="fi fi-rr-filters" style="color: #E11D1D"></i>
							<h3 style="color: #26252B; font-family:''Montserrat', sans-serif'; font-weight: 600; font-size: 18px; margin-left: 5px; margin-top: -4px">GRAPH FILTERS</h3>
				  </div>

				  <!-- FILTER -->
					<form>


						<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
						<!-- CIVIL STATUS FILTER START-->
							<div>
								<div style="margin-bottom: 10px;">
									<label>Per Civil Status :</label>
								</div>
								<select name="personal_civil_status" id="civil-select" style="height: 38px; margin-bottom: 25px;">
									<option style="display: none;" value="">-SELECT ALL-</option>
									<option style="display: none;" value="SINGLE">SINGLE</option>
									<option style="display: none;" value="MARRIED">MARRIED</option>
									<option style="display: none;" value="WIDOWED">WIDOWED</option>
									<option style="display: none;" value="SEPARATED">SEPARATED</option>
									<option style="display: none;" value="OTHER">OTHER'S</option>
								</select>
							</div>
							<!-- CIVIL STATUS FILTER END -->

							<!-- CAMPUS FILTER START-->
							<div>
								<div style="margin-bottom: 10px;">
									<label>Per Campus :</label>
								</div>
								<select name="personal_campus" id="campus-select" style="height: 38px; margin-bottom: 25px;">
									<option style="display: none;" value="">-SELECT ALL-</option>
									<?php 

									$sql2="SELECT * FROM `dtm_campus` GROUP BY `campus_name`";
									$result2=mysqli_query($con,$sql2);

									while($row2=mysqli_fetch_array($result2)){
										echo '<option value="'.$row2[2].'">'.$row2[2].'</option>';  
									}

									?>
								</select>
							</div>
						<!-- CAMPUS FILTER END -->
						</div>


						<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-top: 25px;">
						<!-- DEPARTMENT FILTER START-->
						<div>
							<div style="margin-bottom: 10px;">
								<label>Per Department :</label>
							</div>
							<select name="personal_department" id="department-select" style="height: 38px; margin-bottom: 25px;">
								<option style="display: none;" value="">-SELECT ALL-</option>
								<?php 

								$sql2="SELECT * FROM `dtm_department` GROUP BY `department`";
								$result2=mysqli_query($con,$sql2);

								while($row2=mysqli_fetch_array($result2)){
									echo '<option value="'.$row2[1].'">'.$row2[1].'</option>';  
								}

								?>
							</select>
						</div>
						<!-- DEPARTMENT FILTER END -->

						<!-- STATUS FILTER START-->
						<div>
							<div style="margin-bottom: 10px;">
								<label>Per Status :</label>
							</div>
							<select name="personal_emp_status" id="status-select" style="height: 38px; margin-bottom: 25px;"> 
								<option style="display: none;" value="">-SELECT ALL-</option>
								<option style="display: none;" value="CASUAL">CASUAL</option>
								<option style="display: none;" value="JOB ORDER">JOB ORDER</option>
								<option style="display: none;" value="PERMANENT">PERMANENT</option>
								<option style="display: none;" value="PART TIME">PART TIME</option>
								<option style="display: none;" value="TEMPORARY">TEMPORARY</option>
							</select>
						</div>
						<!-- STATUS FILTER END -->
					</div>


					<div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-top: 25px;">
						<!-- ACADEMIC RANK FILTER START-->
						<div>
							<div style="margin-bottom: 10px;">
								<label>Per Academic Rank :</label>
							</div>
							<select name="personal_academic_rank" id="academic-select" style="height: 38px; margin-bottom: 25px;" required> 
								<option style="display: none;" value="">-SELECT ALL-</option>
								<?php 

								$sql2="SELECT * FROM `dtm_academic_rank` GROUP BY `academic_rank`";
								$result2=mysqli_query($con,$sql2);

								while($row2=mysqli_fetch_array($result2)){
									echo '<option value="'.$row2[1].'">'.$row2[1].'</option>';  
								}

								?>
							</select>
						</div>
						<!-- ACADEMIC RANK FILTER END -->

						<!-- ADMINISTRATIVE RANK FILTER START-->
						<div>
							<div style="margin-bottom: 10px;">
								<label>Per Administrative Rank :</label>
							</div>
							<select name="personal_administrative_rank" id="administrative-select" style="height: 38px; margin-bottom: 25px;" required>
								<option style="display: none;" value="">-SELECT ALL-</option>
								<?php 

								$sql2="SELECT * FROM `dtm_administrative_rank` GROUP BY `administrative_rank`";
								$result2=mysqli_query($con,$sql2);

								while($row2=mysqli_fetch_array($result2)){
									echo '<option value="'.$row2[1].'">'.$row2[1].'</option>';  
								}

								?>
							</select>
						</div>
						<!-- ADMINISTRATIVE RANK FILTER END -->
					</form>

			  </div>
			</div>





			<!-- STATISTICS GRAPH START -->
			<div class="graph-cont" style="padding-bottom: 25px; margin-left: 0px; margin-top: 0px">

				<div class="graph-box-cont">
					<div class="grap-header">
						<h3>DATA CHART</h3>
						<p class="view-recent"> Displays a visual presentation of a data.</p>
					</div>

					<div>
					<div style="display: flex; justify-content: center; margin-top: 60px; gap: 110px; overflow: hidden;" class="chart_div">
						<div>
							<h3 style="border-bottom: 1px solid #99A6B3; padding-bottom: 15px; margin-bottom: 30px; color: #26252B; font-family: 'sora'; letter-spacing: .5px; font-weight: 600; font-size: 15px">MALE | CHART</h3>
							<div id="chart-male"></div>
						</div>

						<div>
							<h3 style="border-bottom: 1px solid #99A6B3; padding-bottom: 15px; margin-bottom: 30px; color: #26252B; font-family: 'sora'; letter-spacing: .5px; font-weight: 600; font-size: 13px">FEMALE | CHART</h3>
							<div id="chart-female"></div>
						</div>
					</div>
					</div>

				</div>		
			</div>

		</main>

	</section>




	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="JS/script.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>


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


	<!-- NOTIFICATION REQUEST END -->


	<script type="text/javascript">
			$('select').select2();
		</script>


	<!-- MALE PIE CHART -->
	<script type="text/javascript">
		var options = {
			series: <?php echo json_encode($data_male); ?>,
			chart: {
        type: 'pie',
        width: 400,
        toolbar: {
            show: true,
            offsetX: 0,
            offsetY: 0,
            tools: {
                download: true,
                selection: true,
                zoom: true,
                zoomin: true,
                zoomout: true,
                pan: true,
                reset: true | '<img src="/static/icons/reset.png" width="20">',
                customIcons: []
            },
            export: {
                csv: {
                    filename: undefined,
                    columnDelimiter: ',',
                    headerCategory: 'Civil Status',
                    headerValue: 'Male(Count)',
                    dateFormatter(timestamp) {
                        return new Date(timestamp).toDateString()
                    }
                },
                svg: {
                    filename: undefined,
                },
                png: {
                    filename: undefined,
                }
            },
            autoSelected: 'zoom'
        },
   		},
			labels: <?php echo json_encode($labels_male); ?>,
			legend: {
				position: 'bottom'
			},
			dataLabels: {
				style: {
					fontSize: '14px',
					fontFamily: 'Helvetica, Arial, sans-serif'
				}
			},
			responsive: [{
				breakpoint: 480,
				options: {
					chart: {
						width: 200
					},
					legend: {
						position: 'bottom'
					}
				}
			}],
		};

		var chartMale = new ApexCharts(document.querySelector("#chart-male"), options);
		chartMale.render();

		$('#department-select, #campus-select, #civil-select, #status-select, #academic-select, #administrative-select').on('select2:select', function (e) {
 		   var department = $('#department-select').val();
       var campus = $('#campus-select').val();
       var civil = $('#civil-select').val();
       var status = $('#status-select').val();
       var academic = $('#academic-select').val();
       var administrative = $('#administrative-select').val();

        // send the selected department to the PHP script using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "FILTER/male_filter.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var data = JSON.parse(this.responseText);
                chartMale.updateSeries(data.data_male);
                chartMale.updateOptions({ labels: data.labels_male });
            }
        };
        xhr.send("department=" + department + "&campus=" + campus + "&civil=" + civil + "&status=" + status + "&academic=" + academic + "&administrative=" + administrative);
    });

	</script>





	<!-- FEMALE PIE CHART  -->
	<script type="text/javascript">
		var options = {
			series: <?php echo json_encode($data_female); ?>,
			chart: {
        type: 'pie',
        width: 400,
        toolbar: {
            show: true,
            offsetX: 0,
            offsetY: 0,
            tools: {
                download: true,
                selection: true,
                zoom: true,
                zoomin: true,
                zoomout: true,
                pan: true,
                reset: true | '<img src="/static/icons/reset.png" width="20">',
                customIcons: []
            },
            export: {
                csv: {
                    filename: undefined,
                    columnDelimiter: ',',
                    headerCategory: 'Civil Status',
                    headerValue: 'Female(Count)',
                    dateFormatter(timestamp) {
                        return new Date(timestamp).toDateString()
                    }
                },
                svg: {
                    filename: undefined,
                },
                png: {
                    filename: undefined,
                }
            },
            autoSelected: 'zoom'
        },
   		},
			labels: <?php echo json_encode($labels_female); ?>,
			legend: {
				position: 'bottom'
			},
			dataLabels: {
				style: {
					fontSize: '14px',
					fontFamily: 'Helvetica, Arial, sans-serif'
				}
			},
			responsive: [{
				breakpoint: 480,
				options: {
					chart: {
						width: 200
					},
					legend: {
						position: 'bottom'
					}
				}
			}]
		};

		var chartFemale = new ApexCharts(document.querySelector("#chart-female"), options);
		chartFemale.render();

		$('#department-select, #campus-select, #civil-select, #status-select, #academic-select, #administrative-select').on('select2:select', function (e) {
 		   var department = $('#department-select').val();
       var campus = $('#campus-select').val();
       var civil = $('#civil-select').val();
       var status = $('#status-select').val();
       var academic = $('#academic-select').val();
       var administrative = $('#administrative-select').val();

        // send the selected department to the PHP script using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "FILTER/female_filter.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var data = JSON.parse(this.responseText);
                chartFemale.updateSeries(data.data_female);
                chartFemale.updateOptions({ labels: data.labels_female });
            }
        };
        xhr.send("department=" + department + "&campus=" + campus + "&civil=" + civil + "&status=" + status + "&academic=" + academic + "&administrative=" + administrative);
    });

	</script>
	
</body>
</html>