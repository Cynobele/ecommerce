<?php
	// Connect to database
	include("../model/connection.php");
	
	//  function to get all the items
	function getAllItems() //get JSON of records from db
	{
		global $conn;
		$sql = "SELECT * FROM block2ITEMS";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows,JSON_INVALID_UTF8_IGNORE);
	}

	function getSingleItem($item_id)
	{
		global $conn;
		$sql = 'SELECT * FROM block2ITEMS WHERE item_id='.$item_id;
		$result = mysqli_query($conn, $sql);

		//convert to JSON
		$rows=array();
		while($r = mysqli_fetch_assoc($result))
		{
			$rows[] = $r;
		}
		return json_encode($rows, JSON_INVALID_UTF8_IGNORE);
	}
?>