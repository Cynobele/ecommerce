<!DOCTYPE html> 
<?php
	session_start();
	include('navbar.php');
    include('../model/get-items.php');

    if(!isset($_SESSION['id']))
    {//redirect if not logged in
      header("Location: index.php");
    }

    if(!empty($_SESSION['cart']))
    {
        $item_id = $_SESSION['cart'][0];
        $itemtxt = getSingleItem($item_id);
        $items = json_decode($itemtxt); //receive and decode json containing item in cart

        for($i=0; $i<sizeof($items); $i++)//cart should only be 1 item long
        { //set variables using new json
            $name = $items[$i]->name;
            $desc = $items[$i]->description;
            $img = $items[$i]->image;
            $price = $items[$i]->price;

            //set session vars for aberpay
            $_SESSION['price'] = $price;
            $_SESSION['item_id'] = $item_id;
        }
    }
?>

<html>
    <head>  
        <meta charset="utf-8">
	    <title>CMP306 - Dynamic Web Development 2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
	   	<!-- The site uses Bootstrap v5 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		
    </head>
    <body>


    <!--bootstrap table-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Item</th> <!-- table headings -->
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
    </tr>
  </thead>

  <tbody>
    <tr> <!-- display cart contents in bootstrap table -->
    <th scope="row"><?php echo $name; ?></th>
    <td><?php echo $desc; ?></td>
    <td><img src="../image/<?php echo $img; ?>" style="width:100px;height:100px;"></img></td>
    <td>£ <?php echo $price; ?></td>
    </tr>
  </tbody>

</table>

<!-- form gets the card number for the aberpay api -->
<div class="container">	
    <form class="form-horizontal" action="purchase.php" method="post"margin: 0px;">

		<!-- input fields -->
		<div class="form-group">
			<div class="col-sm-20" style="width: 100%; margin: auto;">
				<input type="text" class ="form-control" name="cardnum" minlength="16" maxlength="16" placeholder="Card Number (16 digits)" required>
			</div>
		</div>

        <!--submit button-->
		<div class="form-group" style="margin: 0 auto;">
			<div class="button" style="margin: 0 auto;">
				<input type="submit" class="btn btn-block btn-danger mb-2;" value="Confirm Purchase">
			</div>
		</div>
	</form>

    </body>
</html>