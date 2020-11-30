<?php

    class Config{
        const DB_HOST = "localhost"; // database host or server
	    const DB_NAME = "college"; // the actual name of the system's database [database name]
	    const DB_USER = "root"; // the actual name of database user
        const DB_PASSWORD = ""; // database password
        
        const SYSTEM_NAME = "Student Management";
        
        public static function redir($page){
            header("Location: $page"); 
        }
    }

?>