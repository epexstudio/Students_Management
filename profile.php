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
				<div class='content-header'> 
                    <img src='assets/profile.svg' class='img-responsive' style='max-height: 120px;' /> 
					<?php echo "$userFirstName $userSecondName" ; ?> <small><?php echo $userRole; ?></small>
				</div>
				<div class='content-body'> 
					
					<?php $token = $_GET['token']; User::profile($token);  ?>
				</div>
				</div> 
				
			</div>
	</div> 
</body>
</html>
