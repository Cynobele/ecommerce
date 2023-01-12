<?php

	// Note there is a severe lack of security here
	$item_id = $_POST['item_id'];
		
	include("../model/api-employee.php");
	$r = deleteItemById($item_id);



	// you may like to display all to just check
	header("Location: ../view/admin.php")
?>