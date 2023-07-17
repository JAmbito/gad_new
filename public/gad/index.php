<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<script src="sweetalert2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<title>GAD - Login</title>
</head>
<body>

	<style type="text/css">
		  input:-webkit-autofill,
		  input:-webkit-autofill:focus {
		    transition: background-color 600000s 0s, color 600000s 0s!important;
		  }
	</style>


	<section id="content">

		<div class="main-cont">
			<div class="middle-cont">

				<div class="middle-header">
					<div class="text-header-div">
						<span>GAD - BPSU</span>
					</div>
					<div class="img-header-div">
						<img src="img/log123.png">
					</div>
				</div>

				<div class="middle-form-cont">
					<form action="login_validation.php" method="POST">

						<div class="status-cont" style="text-align: left; display: flex;">

						<?php

				    	if(isset($_SESSION['status']))
				    	{
				        ?>
						<span style="padding: 12px 15px; background-color: #FB5757; color: #FFEEEE; font-size: 14px; font-weight: 300; letter-spacing: 1px; border-radius: 5px; text-transform: uppercase; width: 100%; margin-bottom: 25px;"><?= $_SESSION['status']; ?></span>
						<?php
					    unset($_SESSION['status']);
					  	}

						?>


						<?php

				    	if(isset($_SESSION['status1']))
				    	{
				        ?>
						<span style="padding: 12px 15px; background-color: #58D68D; color: #FFEEEE; font-size: 14px; font-weight: 300; letter-spacing: 1px; border-radius: 5px; text-transform: uppercase; width: 100%; margin-bottom: 25px;"><?= $_SESSION['status1']; ?></span>
						<?php
					    unset($_SESSION['status1']);
					  	}

						?>


						</div>

						<div class="input-cont">
							<select required name="campus">
								<option value="">-SELECT CAMPUS-</option>
								<?php

	                                $sql="SELECT * FROM `dtm_campus`";
	                                $result=mysqli_query($con,$sql);

	                                while($row=mysqli_fetch_array($result)){
	                                    echo '<option value="'.$row["campus_name"].'">'.$row["campus_name"].'</option>';
	                                }

	                            ?>
							</select>
						</div>

						<div class="input-cont">
							<i class="fa-solid fa-user"></i>
							<input type="text" name="email" placeholder="Username" required>
						</div>
						<div class="input-cont">
							<i class="fa-solid fa-lock"></i>
							<i class="fa-regular fa-eye" id="show-pass-id"></i>
							<i class="fa-regular fa-eye-slash" id="hide-pass-id"></i>
							<input type="password" name="password" placeholder="Password" required autocomplete="off" id="password-id">
						</div>
						<!-- <div class="input-cont">
							<a href="reset_password.php">Reset Password?</a>
						</div> -->
						<div class="input-cont">
							<button class="login-btn" type="submit">LOGIN</button>
						</div>
					</form>
				</div>

			</div>

		</div>

	</section>


	<script type="text/javascript">

			$("#show-pass-id").click(function(){
			  	$("#password-id").prop("type", "text");
			  	$("#hide-pass-id").show();
			  	$("#show-pass-id").hide();
			});

	</script>

	<script type="text/javascript">

			$("#hide-pass-id").click(function(){
			  	$("#password-id").prop("type", "password");
			  	$("#show-pass-id").show();
			  	$("#hide-pass-id").hide();
			});

	</script>

</body>
</html>
