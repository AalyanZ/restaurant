<?php
include "../db.php";
include "../../admin/functions.php";
ob_start();
session_start();

//==============================================================================================================
if (isset($_POST['signup'])) {
	$user_firstname    = $_POST['firstname'];
	$user_lastname     = $_POST['lastname'];
	$user_role         = "subscriber";
	$username          = $_POST['username'];
	$user_email        = $_POST['email'];
	$user_password     = $_POST['password'];
	$user_image        = $_FILES['image']['name'];
	$user_image_temp   = $_FILES['image']['tmp_name'];
	$user_address = $_POST['address'];
	$user_phonenumber = $_POST['phonenumber'];
	move_uploaded_file($user_image_temp, "../../images/$user_image");
	$user_already_exists = "SELECT username FROM users WHERE username = '{$username}'";
	$check_query =  mysqli_query($connection, $user_already_exists);
	$row = mysqli_fetch_array($check_query);
	if ($row) {
?>
		<div class="alert danger-alert">
			<h3>User already exists please try again!</h3>
			<a class="close" href=>&times;</a>
		</div>
	<?php
	} elseif (strlen(mysqli_real_escape_string($connection, $user_password)) < 8) {
	?>
		<div class="alert danger-alert">
			<h3>Enter an strong password!</h3>
			<a class="close" href=>&times;</a>
		</div>
	<?php
	} else {
		$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
		$query = "INSERT INTO users(user_firstname, user_lastname, user_role,username,user_email,user_password,user_image,user_address,user_phonenumber) ";
		$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}','{$user_image}','{$user_address}','{$user_phonenumber}') ";
		$create_user_query = mysqli_query($connection, $query);
		confrim_query($create_user_query);
	?>
		<div class="alert success-alert">
			<h3>Registration successful!</h3>
			<a class="close">&times;</a>
		</div>
	<?php

	}
}
//=============================================================================================================================
if (isset($_POST['login'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	$query = "SELECT * FROM users WHERE username = '{$username}' ";

	$select_user_query = mysqli_query($connection, $query);
	if (!$select_user_query) {
		die("QUERY FAILED" . mysqli_error($connection));
	}

	while ($row = mysqli_fetch_array($select_user_query)) {
		$db_user_id = $row['user_id'];
		$db_username = $row['username'];
		$db_user_password = $row['user_password'];
		$db_user_firstname = $row['user_firstname'];
		$db_user_lastname = $row['user_lastname'];
		$db_user_role = $row['user_role'];
		$db_user_image = $row['user_image'];
		$db_user_email = $row['user_email'];
		$db_user_address = $row['user_address'];
		$db_user_phonenumber = $row['user_phonenumber'];


		if (password_verify($password, $db_user_password) && $db_username == $username) {
			$_SESSION['username'] = $db_username;
			$_SESSION['firstname'] = $db_user_firstname;
			$_SESSION['lastname'] = $db_user_lastname;
			$_SESSION['user_role'] = $db_user_role;
			$_SESSION['user_image'] = $db_user_image;
			$_SESSION['user_id'] = $db_user_id;
			$_SESSION['user_email'] = $db_user_email;
			$_SESSION['user_address'] = $db_user_address;
			$_SESSION['user_phonenumber'] = $db_user_phonenumber;
			header("Location: ../../admin/adminpanel.php");
		}
	}

	?>

	<div class="alert success-alert">
		<h3>Wrong Credentials Try Again!</h3>
		<a class="close">&times;</a>
	</div>
<?php
}
?>

<!-- ======================================================================================================================== -->




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Suburban Restaurant</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
	<link rel="stylesheet" href="style.css">

</head>

<body>
	<!-- partial:index.partial.html -->
	<a href="login_signup.php" target="_blank">
		<div style="text-align: center;">
			<img class="img-responsive" src="logo.png">
		</div>
	</a>
	<!-- ============================================================================================ -->

	<div class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-16 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<!-- ============================================================================================ -->
								<form method="post">
									<div class="card-front" height="500px">
										<div class="center-wrap">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Log In</h4>

												<div class="form-group">
													<input type="text" name="username" class="form-style" style="background-color: #1f2029" placeholder="Your Username" id="logemail" autocomplete="off" required>
													<i class="input-icon uil uil-user"></i>
												</div>

												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style" style="background-color: #1f2029" placeholder="Your Password" id="logpass" autocomplete="off" required>
													<i class="input-icon uil uil-lock-alt"></i>
												</div>

												<button class="btn mt-4" name="login" type="submit">Submit</button>

												<p class="mb-0 mt-4 text-center">
													<a href="forgotpass.php" class="link">Forgot your password?</a>
												</p>

											</div>
										</div>
								</form>

							</div>
							<!-- ============================================================================================ -->

							<div class="card-back" height="500px">
								<div class="center-wrap">
									<div class="section text-center">
										<h4 class="mb-4 pb-3">Sign Up</h4>
										<form method="post" enctype="multipart/form-data">
											<div class="form-group">
												<input type="text" name="firstname" class="form-style" placeholder="Your First Name" id="logname" autocomplete="off" required>
												<i class="input-icon uil uil-user"></i>
											</div>

											<div class="form-group mt-2">
												<input type="text" name="lastname" class="form-style" placeholder="Your Last Name" id="logname" autocomplete="off" required>
												<i class="input-icon uil uil-user"></i>
											</div>

											<div class="form-group mt-2">
												<input type="text" name="username" class="form-style" placeholder="Your Username Name" id="logname" autocomplete="off" required>
												<i class="input-icon uil uil-user"></i>
											</div>

											<div class="form-group mt-2">
												<input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off" required>
												<i class="input-icon uil uil-at"></i>
											</div>

											<div class="form-group mt-2">
												<input type="text" name="address" class="form-style" placeholder="Your Address" id="logemail" autocomplete="off" required>
												<i class="input-icon uil uil-at"></i>
											</div>

											<div class="form-group mt-2">
												<input type="tel" pattern="[\+]\d{2}\d{10}" name="phonenumber" class="form-style" required placeholder="Phone Number" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>

											<div class="form-group mt-2">
												<input type="file" name="image" accept="image/*" class="form-style" placeholder="Your Image" id="logimage" autocomplete="off" required>
												<i class="input-icon uil uil-at"></i>
											</div>


											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off" required>
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button class="btn mt-4" name="signup" type="submit">Submit</button>
										</form>

									</div>
								</div>
							</div>
							<!-- ============================================================================================ -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src="./script.js"></script>

</html>