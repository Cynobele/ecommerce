<?php
	// code to display the data for an employee
	// there seems no reason to include this file but
	// security issues can be included
	// check the parameter is impaortant.
	
	$item_id  = $_GET['item_id'] ;
	
	// complete by displaying all the national parks
	echo '<script type="text/javascript">window.open("../view/display.php?item_id='.$item_id.'", name="_self")</script>';
?>