<?php 

// start classes and other important data
require_once "importance.php";

// destroy all sessions
@session_destroy(); 

// reset the cookie
setcookie("sms-user", $token ,time()-(60*60*24*7*30),"/", "","",TRUE);

// logout the user
Config::redir("login.php");
