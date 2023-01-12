<?php

	// Note there is a severe lack of security here
	$request -> name = $_POST['name'] ;
	$request -> desc = $_POST['desc'] ;
	$request -> price = $_POST['price'] ;
	$txt = json_encode($request) ;
	
	include("../model/api-employee.php");

	$response = createItem($txt);

	//redirect
	echo '<script type="text/javascript">window.open("../view/displayall.php", name="_self")</script>';
	
?>