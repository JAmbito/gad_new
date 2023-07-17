<?php

include 'connect.php';

session_start();

if(!isset($_SESSION['email'])){
header('location:../index.php');
}
		$sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
	    $result1=mysqli_query($con,$sql1);
	    $row1=mysqli_fetch_assoc($result1);
	    $user_name=$row1['name'];
	    $campus_name=$row1['campus_name'];

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
	<link rel="stylesheet" type="text/css" href="CSS/DTM.css">	
	<link rel="stylesheet" type="text/css" href="CSS/z_purchase_order_drop_none.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/project_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/bom_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/project_bom_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS_SUBMENU/ntp_no_drop_sub.css">
	<link rel="stylesheet" type="text/css" href="CSS/z_warehouse_no_drop.css">


	<title>GAD - Department</title>
</head>
<body>

	<style type="text/css">
		
		.select2-dropdown{
			z-index: 999999999!important;
			font-size: 14px!important;
		}
		.select2-container{
			width: 100%!important;
			margin-bottom: 23px!important;			
		}
		.select2-selection {
			height: 45px!important;
			padding: 8px!important;
			border: 1px solid #E3E3E3!important;
			font-size: 14px!important;
			color: #34495F!important;
			text-transform: uppercase!important;
		}
		.select2-container--default .select2-search--dropdown .select2-search__field{
			padding: 12px;
		}

		.hover_main:hover{
			box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
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

			<li  class="active">
				<a href="#" class="dash-drop side-btn">
					<i class="fi fi-rr-chart-pie-alt"></i>
					<span class="text dash-chev" style="letter-spacing: .3px">&nbsp; Data Management </span>
					<i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-right: 12px;" id="chev-rotate"></i>
					<input type="text" class="data_management_class" hidden>
				</a>
			</li>
				<ul id="dash-dropdown" style="margin-top: 10px">
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
						<a href="DTM_Department.php" class="act-hover">
							<h4 style="color: #D5D5D5; margin-right: 8px">—</h4>
							<span class="text active">&nbsp;Department</span>
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

			<!-- MODAL START -->

			<!-- MODAL IMPORT -->

			<div id="emp_import_modal" class="import-cont" style="display: none;">
				<div class="import-modal">
					<div class="header-fixed">
						<div class="insert-header" style="position: relative;">
						<h4>IMPORT DATA</h4>
						<div><i class='bx bx-x' id="x-im-close-id"></i></div>
						</div>
					</div>
					<form action="EXCEL_CSV_Imports/IMP_Materials.php" method="POST" name="uploadCsv" enctype="multipart/form-data">
						<div class="import-middle">
			             	 <div>
			             	 	<label>Select File</label><span class="additional-span">( REQUIRED )</span>
			             	 </div>
			             	 <div>
								<input type="file" name="import_file" style="margin-bottom: 23px;">
							 </div>
						</div>
						<div class="import-btn-cont">
							<h1 style="margin-right: auto;"></h1>
							<button type="submit" name="save_excel_data" class="btn-del">Import</button>
						</div>
					</form>
				</div>

			</div>


			<!-- MODAL VIEW -->

			<div id="emp_view_modal" class="view-cont" style="display: none; ">
				<div class="view-modal">
					<div class="header-fixed">
						<img src="img/Virtual-Data-Room-for-Construction-Industry.jpg">
						<i class="fa-solid fa-xmark" id="xmark-id" style="color:#738497"></i>
					</div>
					<form action="viewing_cont/MAIN_View_Notification.php" method="POST">
          			<div class="view-middle" id="view-middle-id">

					</div>
					</form>
				</div>
			</div>

			<!-- MODAL INSERT -->

			<div id="emp_insert_modal" class="insert-cont" style="display: none;">
				<div class="insert-modal">
					<div class="header-fixed">
						<div class="insert-header" style="position: relative;">
						<h4>Create NEW Department</h4>
						<div><i class='bx bx-x' id="x-close-id"></i></div>
						</div>
					</div>
					<form action="DTM_Controls/DTM_department.php" method="POST" enctype="multipart/form-data">

			            <div class="insert-middle">		
			             	 <div>
			             	 	<label>Department</label><span class="additional-span">( REQUIRED )</span>
			             	 </div>
			             	 <div>
								<input type="text" name="department" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
							 </div>
						</div>

						<div class="insert-btn-cont">
							<h1 style="margin-right: auto;"></h1>
							<input type="reset" value="Reset" class="reset-inp">
							<button class="btn-del" name="sub-insert">Submit</button>
						</div>
						</form>
					</div>
				</div>



				<!-- MODAL UPDATE -->

				<div id="emp_update_modal" class="update-cont" style="display: none;">
					<div class="update-modal">
						<div class="header-fixed">
							<div class="update-header" style="position: relative;">
							<h4>UPDATE Department</h4>
							<div><i class='bx bx-x' id="x-up-close-id"></i></div>
							</div>
						</div>
						<form action="DTM_Controls/DTM_department.php" method="POST" enctype="multipart/form-data">
	          			<div class="update-middle" id="update-middle-id">

						</div>
						<div class="update-btn-cont">
							<h1 style="margin-right: auto;"></h1>
							<button class="btn-del" name="sub-update">Update</button>
						</div>
						</form>
					</div>
				</div>



				<!-- MODAL DELETE -->

				<div id="emp_delete_modal" class="delete-cont">
					<div class="delete-modal">
						<div class="delete-header">
							<i class="las la-exclamation-triangle"></i>
							<h4>Delete Confirmation</h4>
						</div>
						<div class="delete-middle">
							<h4>Are you sure you want to delete this data?</h4>
						</div>
						<form action="DTM_Controls/DTM_department.php" method="POST">
		             <div class="delete-body" id="emp_delete_details">

		             </div>
						<div class="delete-btn-cont">
							<h1 style="margin-right: auto;"></h1>
							<span class="btn-cancel" id="cancel-btn">NO</span>
							<button class="btn-del" name="sub_delete">YES</button>
						</div>
						</form>
					</div>
				</div>



			<!-- MODAL END -->




			<div class="head-title" style="margin-bottom: 35px;">
				<div class="left">
					<h1 class="paragraph" style="letter-spacing: -.1px">Department</h1>
					<div class="loc-date">
						<ul class="header-main">
							<li style="margin-top: 6px;">
								<i class="fi fi-rr-chart-pie-alt" style="color:#C30000; margin-left: 15px;"></i>
							</li>
							<li>
								<i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i>
							</li>
							<li style="margin-top: 2px">
								<a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Manage</a>
							</li>
							<li>
								<i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i>
							</li>
							<li style="margin-top: 2px">
								<a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Data Management</a>
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


				<!-- ALERTS -->


				<div class="add-user-container">


					<!-- IMPORT ALERT -->


					<div class="status-alert" id="status-alert-id">

						<?php 
					    
					    	if(isset($_SESSION['status_imported']))
					    	{
					        ?>
							  <script type="text/javascript">
							    $(document).ready(function() {
							        swal({
							            title: "Import Success!",
							            text: "Data Imported Successfully!!",
							            icon: "success",
							            button: "Ok",
							            // timer: 2000
							        });
							    });
							</script>
							<?php 
						    unset($_SESSION['status_imported']);
						  	}

						?>
						
					</div>


					<!-- IMPORT DUPLICATE ALERT -->


					<div class="status-alert" id="status-alert-id">

						<?php 
					    
					    	if(isset($_SESSION['status_imported_warning']))
					    	{
					        ?>
							  <script type="text/javascript">
							    $(document).ready(function() {
							        swal({
							            title: "Import Warning!",
							            text: "Data Already Exists!!",
							            icon: "warning",
							            button: "Ok",
							            // timer: 2000
							        });
							    });
							</script>
							<?php 
						    unset($_SESSION['status_imported_warning']);
						  	}

						?>
						
					</div>



					<!-- INSERT ALERT -->


					<div class="status-alert" id="status-alert-id">

						<?php 
					    
					    	if(isset($_SESSION['status_insert']))
					    	{
					        ?>
							  <script type="text/javascript">
							    $(document).ready(function() {
							        swal({
							            title: "Data Created!",
							            text: "Data Inserted Successfully!!",
							            icon: "success",
							            button: "Ok",
							            // timer: 2000
							        });
							    });
							</script>
							<?php 
						    unset($_SESSION['status_insert']);
						  	}

						?>
						
					</div>


					<!-- UPDATE ALERT -->


					<div class="status-alert" id="status-alert-id">

						<?php 
					    
					    	if(isset($_SESSION['status_update']))
					    	{
					        ?>
							  <script type="text/javascript">
							    $(document).ready(function() {
							        swal({
							            title: "Data Updated!",
							            text: "Data Updated Successfully!!",
							            icon: "success",
							            button: "Ok",
							            // timer: 2000
							        });
							    });
							</script>
							<?php 
						    unset($_SESSION['status_update']);
						  	}

						?>
						
					</div>


					<!-- DELETE ALERT -->


					<div class="status-alert" id="status-alert-id">

						<?php 
					    
					    	if(isset($_SESSION['status_delete']))
					    	{
					        ?>
							  <script type="text/javascript">
							    $(document).ready(function() {
							        swal({
							            title: "Data Deleted!",
							            text: "Data Deleted Successfully!!",
							            icon: "success",
							            button: "Ok",
							            // timer: 2000
							        });
							    });
							</script>
							<?php 
						    unset($_SESSION['status_delete']);
						  	}

						?>
						
					</div>


					<!-- DUPLICATE ALERT -->


					<div class="status-alert" id="status-alert-id">

						<?php 
					    
					    	if(isset($_SESSION['status_duplicate']))
					    	{
					        ?>
							  <script type="text/javascript">
							    $(document).ready(function() {
							        swal({
							            title: "Warning!",
							            text: "Data Already Exists!!",
							            icon: "warning",
							            button: "Ok",
							            // timer: 2000
							        });
							    });
							</script>
							<?php 
						    unset($_SESSION['status_duplicate']);
						  	}

						?>
						
					</div>




					<!-- BUTTONS -->



	
					<div class="add-btns btn-insert" style="margin-left: 10px">
						<i class='bx bx-plus' ></i>
						<button>ADD DEPARTMENT</button>
					</div>
					
				</div>


			<!-- SELECTION -->


			<div style="margin-left: 30px;" class="selection-cont">
					<div class="table-pad">
						<div class="table-header" id="header">

							<span class="id-count-class">
								<span style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px;">
								<?php  

									$sql = "SELECT `ID` FROM `dtm_department` ORDER BY `ID`";
									$result=mysqli_query($con,$sql);

									$row = mysqli_num_rows($result);

									echo $row;
								?>
								</span>
							</span>

							<span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;" class="proj-data">All Departments</span>

						</div>
					</div>
			 </div>


			<!-- TABLE -->


			<div class="table2-container" id="teach-full-time-cont">
				<div class="table-data2">

					<div class="table-pad">

					 <table id="example" class="table table-striped" style="width:100%">

					 	<i class='bx bx-search' ></i>
					 	
				        <thead>
				            <tr>
				            	<th style="text-align: left;">#</th>
				                <th class="name-border">Departments</th>
				                <th class="action-border">Action</th>
				            </tr>
				        </thead>
				        <tbody>

											<?php 
												
											$sql="SELECT * FROM `dtm_department`";
											$result=mysqli_query($con,$sql);
											if($result){
													$no = 1;
													while($row=mysqli_fetch_assoc($result)){
														$user_id=$row['ID'];
														$department=$row['department'];
													
												echo

												 '<tr>
														<td style="text-align: left; font-size: 13px; width: 100px;">'.str_pad($no, "0", STR_PAD_LEFT).'</td>
														<td class="name-border td-flex" style="text-align: left; white-space: nowrap; text-transform: uppercase;">'.$department.'</td>

														<td class="td-border-right" style="white-space: nowrap; border-right: none;">

															<div style="position: relative;">
																<button data-id="1" class="btn-action"><i class="fi fi-rr-menu-dots"></i></button>

																<div style="" class="action-cont" id="action-cont-id">
																	<div style="text-align: left;">
																		<button data-id="1" class="btn-update" id="'.$user_id.'">Edit</button>
																	</div>
																	<div style="text-align: left;">
																		<button data-id="2" class="btn-delete" id="'.$user_id.'">Delete</button>
																	</div>
																</div>
															</div>

														</td>
														
													</tr>' ;								
												$no++;}
														}

												?>																	

				        </tbody>
				    </table>
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


	<script type="text/javascript">
		
		$(document).ready(function() {
		  // Get file input element
		  var fileInput = $('input[type="file"]');

		  // Listen for change event on file input
		  fileInput.on('change', function() {
		    // Get file object
		    var file = this.files[0];

		    // Check file size
		    if (file.size > 5 * 1024 * 1024) {
		      alert('Error: File size is too large.');
		      fileInput.val('');
		      return;
		    }

		    // Check file type
		    var fileType = file.type.split('/')[1];
		    if (fileType != 'jpg' && fileType != 'jpeg' && fileType != 'png') {
		      alert('Error: Only JPG and PNG files are allowed.');
		      fileInput.val('');
		      return;
		    }
		  });
		});

	</script>



	<!-- PROVINCE TO CITY -->
	<script type="text/javascript">
		$(document).ready(function(){

		  $('.province_class').change(function(){

		  	var $this = $(this);
		  	var region_id = $(this).find('option:selected').data('value1');
		  	var province_id = $(this).find('option:selected').data('value2');

	        $.ajax({  
			    type: "POST",  
			    url: "PROJECT_LOCATIONS/PROJECT_province_to_city.php",  
			    data: {region_id:region_id,
					   province_id:province_id},
			    dataType:"text",
			    success: function(data) 
			    {
			        $('.city_class').html(data); 
	     
			    }
			});  
		  });
		});
	</script>



	<!-- CITY TO BARANGAY -->
	<script type="text/javascript">
		$(document).ready(function(){

		  $('.city_class').change(function(){

		  	var $this = $(this);
		  	var region_id = $(this).find('option:selected').data('value1');
		  	var province_id = $(this).find('option:selected').data('value2');
		  	var city_id = $(this).find('option:selected').data('value3');

	        $.ajax({  
			    type: "POST",  
			    url: "PROJECT_LOCATIONS/PROJECT_city_to_barangay.php",  
			    data: {region_id:region_id,
					   province_id:province_id,
					   city_id:city_id},
			    dataType:"text",
			    success: function(data) 
			    {
			        $('.barangay_class').html(data); 
	     
			    }
			});  
		  });
		});
	</script>





	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script type="text/javascript">

		$(document).ready( function () {
			$(function () {
			  $("select").select2();
			});
		});

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
	          url: "readNotifications.php",
	          success: function(res) {
	            console.log(res);
	          }
	        });
	      });
	    });
	    
	</script>


	<!-- NOTIFICATION REQUEST END -->


	<script type="text/javascript">

		$(document).on('click','.btn-action', function() {
		    $(this).parent().find('.action-cont').toggle(300);
		})
		            	
	</script>



	<!-- TABLE -->


	<script type="text/javascript">
	$(document).ready( function () {
    	$('#example').DataTable({
    		 language: { 
    		 search: "",
    		 searchPlaceholder: "Search..."
    		 },
    		 dom: 'lBfrtip',
	        buttons: [
	        {
	        	
	        },
	        {
	        	
	        }
	        ]
    	});

    $('.dataTables_filter').addClass('pull-left');

	} );
	</script>




	<!-- MODAL AJAX -->


	<!-- IMPORT MODAL -->

	<script>
	  $(document).ready(function(){
	  $("#emp_import_modal").hide();

	  $("#x-im-close-id").click(function(){
	  	$("#emp_import_modal").fadeOut("fast");
	  });

	  $("#insert-close").click(function(){
	  	$("#emp_import_modal").fadeOut("fast");
	  });

	  $('.btn-import').click(function(){
        $("#emp_import_modal").fadeIn("fast");
      });  

	  });
	</script>


	<script>
	  $(document).ready(function(){
	  $("#emp_view_modal").hide();

	  $("#xmark-id").click(function(){
	  	$("#emp_view_modal").fadeOut("fast");
	  });


	  $(document).on("click", '.review-btn', function(){
          var user_view_id1 = $(this).attr("id");
          $.ajax({
               url:"viewing_cont/MAIN_View_Notification.php",
               method:"post",
               data:{user_view_id1:user_view_id1},
               success:function(data){
               	$('#view-middle-id').html(data);
                  $("#emp_view_modal").fadeIn("fast");
                  $("#emp_view_all_modal").fadeOut("fast");
               }
          });    
	  });
	});
	</script>

	<!-- INSERT MODAL -->

	<script>
	  $(document).ready(function(){
	  $("#emp_insert_modal").hide();

	  $("#x-close-id").click(function(){
	  	$("#emp_insert_modal").fadeOut("fast");
	  });

	  $("#insert-close").click(function(){
	  	$("#emp_insert_modal").fadeOut("fast");
	  });

	  $('.btn-insert').click(function(){
          var user_insert_id = $(this).attr("id");
          $.ajax({
               url:"DTM_Controls/DTM_department.php",
               method:"post",
               data:{user_insert_id:user_insert_id},
               success:function(data){
                  $("#emp_insert_modal").fadeIn("fast");
               }
          });    
	  });
	});
	</script>

	<!-- UPDATE MODAL -->

	<script>
	  $(document).ready(function(){
	  $("#emp_update_modal").hide();

	  $("#x-up-close-id").click(function(){
	  	$("#emp_update_modal").fadeOut("fast");
	  });

	  $("#update-close").click(function(){
	  	$("#emp_update_modal").fadeOut("fast");
	  });

	  $(document).on("click", '.btn-update', function(){
          var user_update_id = $(this).attr("id");
          $.ajax({
               url:"DTM_Controls/DTM_department.php",
               method:"post",
               data:{user_update_id:user_update_id},
               success:function(data){
               	$('#update-middle-id').html(data);
                  $("#emp_update_modal").fadeIn("fast");
               }
          });    
	  });
	});
	</script>

	<!-- DELETE MODAL -->

	<script>
	$(document).ready(function(){
	  $("#emp_delete_modal").hide();

	  $("#close-btn").click(function(){
	  	$("#emp_delete_modal").fadeOut("fast");
	  });

	  $("#cancel-btn").click(function(){
	  	$("#emp_delete_modal").fadeOut("fast");
	  });

	 $(document).on("click", '.btn-delete', function(){
          var user_del_id = $(this).attr("id");
          $.ajax({
               url:"DTM_Controls/DTM_department.php",
               method:"post",
               data:{user_del_id:user_del_id},
               success:function(data){
                  $('#emp_delete_details').html(data);
                  $("#emp_delete_modal").fadeIn("fast");
               }
          });    
	  });
	});
	</script>




	<!-- CHART -->

	<script >
		 var options = {
          series: [{
          name: 'BOM',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 72, 78]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        yaxis: {
          title: {
            text: '₱ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "₱ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();    
      
	</script>


	 <!-- ALERT FADE -->

	<script type="text/javascript">
		setTimeout('$("#status-alert-id").fadeOut(300)',5000);
	</script>

</body>
</html>