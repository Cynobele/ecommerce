<?php
	session_start();

	//check if product is already in the cart
	if(sizeof($_SESSION['cart']) < 1)
    {
		array_push($_SESSION['cart'], $_GET['item_id']);//add item to cart
		$_SESSION['message'] = 'Product added to cart';
	}
	else{
		$_SESSION['message'] = 'Replaced previous cart item';

        $_SESSION['cart'] = $_GET['item_id']; //replace old cart with item chosen
	}

    if($_GET['item_id'] == NULL)
    {
        $_SESSION['message'] = 'Error: Item ID is NULL in add_cart.php';
    }

	header('location: index.php');
?>