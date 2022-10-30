	<?php
	session_start();

	$session_logged_in_lm = isset($_SESSION['logged_in_lm']);
	$session_user_lm = isset($_SESSION['user_id_lm']);
	if ($session_user_lm && $session_logged_in_lm == true) {
		header("location: user_functions/lensman/lensman_dashboard.php?page=home");
	}

	$session_logged_in_cm = isset($_SESSION['logged_in_cm']);
	$session_user_cm = isset($_SESSION['user_id_cm']);
	if ($session_user_cm && $session_logged_in_cm == true) {
		header("location: user_functions/customer/customer_dashboard.php?page=home");
	}
	?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login Form</title>
		<link rel="stylesheet" href="css/style_login.css">
	</head>

	<body>


	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
	<?php
		if(isset($_SESSION['alert_text_lg']) && $_SESSION['alert_session']==true):
	?>
			
	swal.fire({
		position: 'top',
		icon: 'error',
		title: '<?php echo $_SESSION['alert_text_lg'] ?>',
		toast: true,
		showConfirmButton: false, 
		timer: 1500
	})
			
			
	<?php 
		unset($_SESSION['alert_text_lg']);
		endif; 
	?>
	</script>
	<div class="container">
		<div class="title">Login</div>
		<form method="POST" action="authentication/login_function.php" enctype="multipart/form-data">
		
			<div class="user-details">
			<div class="input-box">
				<span class="details">Email</span>
				<input type="text" name="email" placeholder="Enter your Email" required>
			</div>
			
			<div class="input-box">
				<span class="details">Password</span>
				<input type="password" name="password" placeholder="Enter your Password" required>
			</div>
			</div>
			<div class="button">
			<input type="submit" name="login" value="Login">
			</div>
		</form>
		<span>
			<a href="registration.php">Dont have an Account? Go to Register</a>
		</span>
	</div>
		
	</body>


	</html>
