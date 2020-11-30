<?php 

class DashboardUi{
	public static function draw($title, $count, $url){
        echo "
            <div class='card'>
                $title
                <br>
                <a>$count</a>
                <a class='view-lab' href='$url'>View &#8594;</a>
            </div>
        ";
    }
}
?>