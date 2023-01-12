<?php
	// Connect to database
	include("../model/connection.php");

	//  function to create an item
	function createItem($txt) {
		global $conn ;
		$data = json_decode($txt) ;
		
		//unload json
		$name = $data->name;
		$desc = $data->desc;
		$price = $data->price;

		//sql query
		$sql = "INSERT INTO `block2ITEMS`(`name`, `image`, `description`, `price`)
		 VALUES ('$name','default.jpg','$desc','$price')" ;
		$r = mysqli_query($conn, $sql);
		mysqli_close($conn);

		return $r ;
	}
	
	//  function to delete a single item
	function deleteItemById($id)
	{
		global $conn ;
		$sql = "DELETE FROM block2ITEMS WHERE item_id='$id'" ;
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		return $result ;
	}
	

	//  function to get all the items
	function getAllItems()
	{
		global $conn ;
		$sql = "select * FROM block2ITEMS";
		$result = mysqli_query($conn, $sql);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		mysqli_close($conn);
		return json_encode($rows);
	}
	
	
	//  function to get a single item
	function getItemById($id)
	{
		global $conn ;
		$sql = "SELECT * FROM block2ITEMS WHERE item_id='$id'" ;
		$result = mysqli_query($conn, $sql);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		mysqli_close($conn);
		return json_encode($rows);
	}
	
	
	//  function to update an item
	function updateItem($txt) {
		global $conn ;
		$data = json_decode($txt) ;
		
		//unload json
		$id = $data->item_id;
		$name = $data->name;
		$desc = $data->desc;
		$price = $data->price;

		//sql
		$sql = "UPDATE `block2ITEMS` SET `name`='$name',
		`image`='default.jpg',`description`='$desc',`price`='$price' WHERE `item_id`='$id'";
		$stmt = mysqli_stmt_init($conn);
		$r1 = mysqli_stmt_prepare($stmt, $sql);
		$r2 = mysqli_stmt_bind_param($stmt, "ssss", $name, $image, $desc, $price);
		$result = mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return $result ; 
	}
	
	
?>