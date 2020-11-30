<?php 

class Dashboard extends DashboardUi{
    public static function students(){
		$query = Db::fetch("users", "", "status = 2 ", "2", "", "",  "");
		return Db::count($query);
	}
}