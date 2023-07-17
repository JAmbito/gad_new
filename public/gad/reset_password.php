<?php

include 'Super_Admin/connect.php';

session_start();

$error = array();


	// MODE

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}




	// CASE STATEMENT


	if(count($_POST) > 0 ){

		switch ($mode) {



			case 'enter_email':
				// code...

				$email = $_POST['email'];

				// VALIDATE EMAIL

				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$error[] = "Please Enter A Valid Email";
				}else if(!valid_email($email)){
					$error[] = "Email Not Found";
				}
				else{
					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: reset_password.php?mode=enter_code");
					die;
				}

				break;



			case 'enter_code':
				// code...

				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "The Verification Code Is Correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: reset_password.php?mode=enter_password");
					die;

				}else{
					$error[] = $result;
				}
				
				break;



			case 'enter_password':
				// code...

				$password = $_POST['password'];
				$password2 = $_POST['retype_password'];

				if($password !== $password2){
					$error[] = "Passwords Do Not Match";
				}else if(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: reset_password.php");
					die;
				}
				else{
					save_password($password);

					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					$_SESSION['status1'] = "Success!! Password Has Been Reset";
					header("Location: index.php");
					die;
				}
				
				break;
			
			default:
				// code...
				break;
		}
	}



	// FUNCTIONS FOR CASE


	function send_email($email){

		global $con;
		
		$expire = time() + (60 * 2);
		$code = rand(10000, 99999);
		$email = addslashes($email);

		$query = "INSERT INTO `dtm_user_verificationtbl`(`Email`, `Code`, `Expire`) VALUES ('$email', '$code', '$expire')";
		mysqli_query($con, $query);


		// SEND EMAIL

		mail($email, 'eBuilders Management: Reset Password' , 'Your Verification Code Is' . $code);
	}


	function save_password($password){

		global $con;

		$password = md5($password);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "UPDATE `dtm_usertbl` SET `Password`='$password' WHERE `Email` = '$email' LIMIT 1";
		mysqli_query($con, $query);


	}


	function valid_email($email){

		global $con;

		$email = addslashes($email);

		$query = "SELECT * FROM `dtm_usertbl` WHERE `Email` = '$email'";
		$result = mysqli_query($con, $query);

		if($result){

			if(mysqli_num_rows($result) > 0){

				return true;
			}

		}

		return false;

	}


	function is_code_correct($code){

		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "SELECT * FROM `dtm_user_verificationtbl` WHERE `Email` = '$email' && `Code` = '$code' ORDER BY `Verification_ID` DESC LIMIT 1";
		$result = mysqli_query($con, $query);

		if($result){

			if(mysqli_num_rows($result) > 0){

				$row = mysqli_fetch_assoc($result);
				if($row['Expire'] > $expire){
					return "The Verification Code Is Correct";
				}else{
					return "The Verification Code Is Expired";
				}

			}else{
				return "The Verification Code Is Incorrect";
			}

		}

		return "The Verification Code Is Incorrect";
	}


?>


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
	<link rel="stylesheet" type="text/css" href="CSS/reset_pass.css">
	<title>eBuilders Management - Reset Password</title>
</head>
<body>


	<section id="content">

		<div class="main-cont">	
			<div class="middle-cont">
					
				<div class="middle-header">
					<div class="text-header-div">
						<div>
							<span>Reset Password</span>
						</div>
						<div class="home-ic-div">
							<a href="index.php"><i class="fi fi-br-menu-burger"></i></a>
						</div>
					</div>
				</div>	


				<?php

					switch ($mode) {

						case 'enter_email':
							// code...
						?>

						<div class="middle-form-cont">
							<form action="reset_password.php?mode=enter_email" method="POST">
								<div class="below-label">
									
									<?php 

										foreach ($error as  $err) {
											echo '<span style="padding: 12px 15px; background-color: #FB5757; color: #FFEEEE; font-size: 14px; font-weight: 300; letter-spacing: 1px; border-radius: 5px; text-transform: uppercase;">'.$err.'</span>';
										}

									?>
								
									<label>Enter Your Email Below :</label>

								</div>
								<div class="input-cont">
									<i class="fa-solid fa-envelope"></i>
									<input type="text" name="email" placeholder="Email" required autocomplete="off">
								</div>
								<div class="input-cont">
									<button class="login-btn" type="submit">SUBMIT</button>
								</div>
							</form>
						</div>

						<?php
						break;

						case 'enter_code':
							// code...
						?>

						<div class="middle-form-cont">
							<form action="reset_password.php?mode=enter_code" method="POST">
								<div class="below-label">
									
									<?php 

										foreach ($error as  $err) {
											echo '<span style="padding: 12px 15px; background-color: #FB5757; color: #FFEEEE; font-size: 14px; font-weight: 300; letter-spacing: 1px; border-radius: 5px; text-transform: uppercase;">'.$err.'</span>';
										}

									?>

									<label>Enter The Verification Code :</label>

								</div>
								<div class="input-cont">
									<i class="fa-solid fa-fingerprint"></i>
									<input type="text" name="code" placeholder="Verification Code" required autocomplete="off">
								</div>
								<div class="input-cont">
									<button class="login-btn" type="submit">SUBMIT</button>
								</div>
							</form>
						</div>

						<?php
						break;

						case 'enter_password':
							// code...
						?>

						<div class="middle-form-cont">
							<form action="reset_password.php?mode=enter_password" method="POST">
								<div class="below-label">
									
									<?php 

										foreach ($error as  $err) {
											echo '<span style="padding: 12px 15px; background-color: #FB5757; color: #FFEEEE; font-size: 14px; font-weight: 300; letter-spacing: 1px; border-radius: 5px; text-transform: uppercase;">'.$err.'</span>';
										}

									?>

									<label>Enter Your New Password :</label>

								</div>

								<!-- NEW PASS -->

								<div class="input-cont">
									<i class="fa-solid fa-lock"></i>
									<i class="fa-regular fa-eye" id="show-pass-id"></i>
									<i class="fa-regular fa-eye-slash" id="hide-pass-id"></i>
									<input type="password" name="password" placeholder="Password" required autocomplete="off" id="password-id">
								</div>

								<!-- RE TYPE -->

								<div class="input-cont">
									<i class="fa-solid fa-lock"></i>
									<i class="fa-regular fa-eye" id="show-pass-id1"></i>
									<i class="fa-regular fa-eye-slash" id="hide-pass-id1"></i>
									<input type="password" name="retype_password" placeholder="Retype Password" required autocomplete="off" id="password-id1">
								</div>

								<div class="input-cont">
									<button class="login-btn" type="submit">RESET</button>
								</div>
							</form>
						</div>

						<?php
						
						default:
							// code...
						break;
					}

				?>


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



	<script type="text/javascript">

			$("#show-pass-id1").click(function(){
			  	$("#password-id1").prop("type", "text");
			  	$("#hide-pass-id1").show();
			  	$("#show-pass-id1").hide();
			});
		
	</script>

	<script type="text/javascript">
		
			$("#hide-pass-id1").click(function(){
			  	$("#password-id1").prop("type", "password");
			  	$("#show-pass-id1").show();
			  	$("#hide-pass-id1").hide();
			});

	</script>

</body>
</html>