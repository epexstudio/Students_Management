<?php 

class Faculty{
	public static function add($token, $firstName, $secondName, $email, $phone, $gender, $role){
		if($token == ""){
			$token = md5(time().uniqid().unixtojd().$role.$email.$phone);
			$password = "1234"; 
			
			Db::insert(
				"users", 
				array("firstName", "secondName", "email", "password", "token", "status", "phone", "gender", "role"), 
				array($firstName, $secondName, $email, $password, $token, 2, $phone, $gender, $role)
			);
			
			Messages::success("Doctor has been added successfully");
		} else {
			self::edit($token, $firstName, $secondName, $email, $phone, $role);
		}
    }
}