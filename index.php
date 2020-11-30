<?php
    require_once "importance.php"; 
    if(!User::loggedIn()){
		Config::redir("login.php"); 
	} 
?>
<html>
<head>
	<title><?php echo CONFIG::SYSTEM_NAME; ?> | Home </title>
	<?php require_once "inc/head.inc.php";  ?> 
</head>
<body>
	<?php require_once "inc/header.inc.php"; ?> 
	<div class="dashboard">
			<div class='sidebar-cont'><?php require_once "inc/sidebar.inc.php"; ?></div>
			<div class="dash-cont">
				<div class="cards">
					<?php Dashboard::draw("Facultys", Dashboard::students(),  "#") ?>
					<?php Dashboard::draw("Students", Dashboard::students(),  "#") ?>
					<?php Dashboard::draw("Classes", Dashboard::students(),  "#") ?>
					<?php Dashboard::draw("Events", Dashboard::students(),  "#") ?>
				</div>
				<div class="dashboard-det">
					<ul class="nav nav-tabs">
  						<li class="nav-item">
    						<a class="nav-link" aria-current="page" href="#">Calender</a>
  						</li>
  						<li class="nav-item">
    						<a class="nav-link" href="#">Timetable</a>
  						</li>
  						<li class="nav-item">
    						<a class="nav-link" href="#">Subjects</a>
  						</li>
					</ul>
				</div>
			</div>
	</div>
</body>
</html>