<?php 
require_once "importance.php"; 

if(!User::loggedIn()){
	Config::redir("login.php"); 
}
?> 

<html>
<head>
	<title><?php echo CONFIG::SYSTEM_NAME; ?></title>
	<?php require_once "inc/head.inc.php";  ?> 
</head>
<body>
	<?php require_once "inc/header.inc.php"; ?> 
	<div class='dashboard'>
        <div class='sidebar-cont'><?php require_once "inc/sidebar.inc.php"; ?></div>
        <div class="dash-cont">
            <div class='content-area'> 
			<?php Messages::info("The default password is <strong>1234</strong>"); ?> 
				<?php require_once "inc/alerts.inc.php";  ?> 
				<div class='content-body'> 
				<div class='content-header'> 
					<?php if(isset($_GET['token'])){ echo "Edit Faculty"; } else { ?> Add Faculty <small>Add Facultys into the system</small> <?php } ?> 
				</div>
					<div class='form-holder2'>
						<?php 
							$firstName = ""; 
							$secondName = "";
							$email = ""; 
							$phone = ""; 
							$role = ""; 
							$gender = ""; 
							$token = "";
							if(isset($_GET['token'])){
								$token = $_GET['token'];
								$firstName = User::get($token, "firstName"); 
								$secondName = User::get($token, "secondName");
								$email = User::get($token, "email"); 
								$phone = User::get($token, "phone"); 
								$role = User::get($token, "role"); 
								$gender = User::get($token, "gender"); 
							}
							if(isset($_POST['fn'])){
								$firstName = $_POST['fn']; 
								$secondName = $_POST['sn']; 
								$email = $_POST['em']; 
								$phone = $_POST['phone']; 
								$role = $_POST['role']; 
								if($token == ""){
									$gender = $_POST['gender']; 
								} else {
									$gender = "$gender"; 
								}
								
								if($firstName == "" || $secondName == "" || $email == "" || $phone == "" || $role == "" || $gender == ""){
									Messages::error("You must fill in all the fields"); 
								} else if (strlen($phone) != 10) {
									Messages::error("Phone must be 10 characters");
								} else if (strpos($email, "@") === false && strpos($email, ".")) {
									Messages::error("You entered invalid email. Email must be inform of example@example.com");
								} else {
									Faculty::add($token, $firstName, $secondName, $email, $phone, $gender, $role);
								}
								
								
							}
							
							$form = new Form(3, "post");
							$form->init(); 
							$form->textBox("First Name", "fn", "text", "$firstName", "");
							$form->textBox("Second Name", "sn", "text", "$secondName", "");
							$form->textBox("Email", "em", "text", "$email", "");
							$form->textBox("Phone", "phone", "number", "$phone", "");
							$form->textBox("Role e.g <i>Asst. Professor</i>", "role", "text", "$role", "");
							if(isset($_GET['token'] )){
								$form->textBox("Gender", "", "text", "$gender", array("disabled"));
							} else {
								$form->select("Gender", "gender", "", array("Male", "Female", "Other"));
							}
							if(isset($_GET['token'] )){
								$form->close("Edit Faculty"); 
							} else {
								$form->close("Add Faculty"); 
							}?> 
					</div> 
				</div>
				</div> 
				
            </div>
        </div>
    </div>
</body>
</html>
