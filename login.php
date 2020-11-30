<?php
    require_once "importance.php"; 
?>
<html>
	<head>
		<title><?php echo CONFIG::SYSTEM_NAME; ?>-Login </title>
		<?php require_once "inc/head.inc.php";  ?> 
	</head>
	<body>
		<?php require_once "inc/header.inc.php"; ?>
		<div class='login-wrapper' >
			<div class='bg-pic'> 
				<img class="image" src='assets/Graduation.jpg'/> 
				<div class="top-left">
					<h2>
				" Never let the time tell you to stop 
				Explore the limitless world of education " </h2></div>
			</div>
			<?php
			if(isset($_GET['attempt'])){
				$status = $_GET['attempt'];
				if(isset($_POST['login-email'])){
					$email = $_POST['login-email']; 
					$password = $_POST['login-password'];

					if($email == "" || $password == ""){
						Messages::error("You must fill in all the fields");
					} else {
						User::login($email, $password, $status);
					}

				}
			?>
			<div class='row' style='width: 50%;'>
					<div class='col'>
						<div class='form-holder'>
							<?php Db::form(array("Email", "Password"), 3, array("login-email", "login-password"), array("text", "password"), "Login"); ?> 
						</div>
					</div> 
				</div>
			<?php 
		} else { ?>
			<div class='login-container'>
				<a href='login.php?attempt=1'>
				<div id="admin" class='right'>
					<div class="label">
						Admin
					</div>
					<div class="icon">
						<img src="assets/admin.svg">
					</div>
				</div>
				</a>
				<a href='login.php?attempt=2'>
				<div id="faculty" class='right'>
					<div class="label">
						Faculty
					</div>
					<div class="icon">
						<img src="assets/teacher.svg">
					</div>
				</div>
				</a>
				<a href='login-student.php'>
				<div id="student" class='right'>
					<div class="label">
						Student
					</div>
					<div class="icon">
						<img src="assets/student.svg">
					</div>
				</div>
				</a>
			</div>
		<?php } ?>
		</div>
	</body>
</html>