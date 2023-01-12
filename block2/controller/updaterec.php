<?php

	// Note there is a severe lack of security here
	$request -> item_id = $_POST['item_id'];
	$request -> name = $_POST['name'] ;
	$request -> price = $_POST['price'] ;
	$request -> desc = $_POST['desc'] ;

	$txt = json_encode($request) ;
	include("../model/api-employee.php");

	$response = updateItem($txt);

	// echo $result ;
	// you may like to display all to just check
	header("Location: ../view/admin.php");
	
?>