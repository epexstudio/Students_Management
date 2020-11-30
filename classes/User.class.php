<?php
    class User{
        public static function loggedIn(){
            if(isset($_COOKIE['sms-user']) && $_COOKIE['sms-user'] != ""){
                return true; 
            }
            return false; 
        }

    	public static function login($email, $password, $status){
            $query = Db::fetch("users", "token", "email = ? AND password = ? AND status = ?  ", array($email, $password, $status), "", "", "" ); 
            if(Db::count($query)){
                Messages::success("Login Succeeded");
                $tokenArray = Db::num($query); 
                $token = $tokenArray[0]; 
    
                // this cookie will be saved on the database for security purposes
                setcookie("sms-user", $token ,time()+(60*60*24*7*30),"/", "","",TRUE);
    
                Config::redir("index.php"); 
                return; 
            }
            
            if($status == 1){
                $user = "a Faculty";
            } else {
                $user = "an Admin"; 
            }
    
            Messages::error("Either your email or password is incorrect. <strong>WAIT</strong>, did you mean to login as $user? Please click <strong><a href='login.php'>HERE</a></strong> to log in as $user "); 
        }

        public static function get($token, $field){
            $query = Db::fetch("users", "$field", "token = ? ", $token, "", "", "" );
            $data = Db::num($query); 
            return $data[0]; 
        }
        
        public static function getToken(){
            if(self::loggedIn()){
                return $_COOKIE['emr-user']; 
            }
            return ""; 
        }

        public static function profile($token){
            $userFirstName = User::get($token, "firstName");
            $userSecondName = User::get($token, "secondName");
            $userEmail = User::get($token, "email");
            $userPassword = User::get($token, "password");
            $userToken = User::get($token, "token");
            $userStatus = User::get($token, "status");
            $userPhone = User::get($token, "phone");
            $userProfile = User::get($token, "profile");
            $userGender = User::get($token, "gender");
            $userRole = User::get($token, "role");
            
            if($userStatus == 1){
                $userRole = "Admin";
            } else {
                $userRole = $userRole;
            } 
            echo "<div class='form-holder2'>";
            
            $form = new Form(3, "post");
            $form->init();
            $form->textBox("Email", "user-em", "text",  $userEmail, array("readonly='readonly'", "  style='font-size: 17px;' ") );
            $form->textBox("Role", "user-role", "text",  $userRole, array("readonly='readonly'", "  style='font-size: 17px;' ") );
            $form->textBox("Gender", "user-gender", "text",  $userGender, array("readonly='readonly'", "  style='font-size: 17px;' ") );
            $form->textBox("Phone", "user-phone", "text",  $userPhone, array("readonly='readonly'", "  style='font-size: 17px;' ") );
            $form->close("");
            
            echo "</div>";
        }
        
    }
?>