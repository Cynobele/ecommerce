<!DOCTYPE html> 
<?php
	session_start();
	include('navbar.php');
	include('../model/get-items.php');

	if(!isset($_SESSION['id']))
	{
		header("Location: login.php");
	}

	//initialize cart if not already set
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
	if($_SESSION['admin'] != 0)
	{
		$admin = true;
	}
	else{$admin=false;}
?>

<html>
    <head>  
        <meta charset="utf-8">
	    <title>CMP306 - Dynamic Web Development 2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
	   	<!-- The site uses Bootstrap v5 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	
		<!-- add a local stylesheet -->
		<link rel="stylesheet" href="nationalpark.css" />
		
    </head>
    <body>

		<div class="container">
			<div class="row"> <!-- show block title and cart/admin buttons -->
				<h1 style="text-align:center;">Block 2</h1><br>
				<a href="view_cart.php" type="button" class="btn btn-primary">Cart<span class="badge"><?php echo count($_SESSION['cart']); ?></span></a>

				<?php
				if($admin){
					echo '<a href="admin.php" class="btn btn-primary">Admin Page</a>';
				} ?>
			</div>
				<hr style="color:#0784B5; background-color: #0784B5;">

			<?php		//info message popup -> is set on other pages.. see add_cart.php
			if(isset($_SESSION['message'])){
				?>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-6">
						<div class="alert alert-info text-center">
							<?php echo $_SESSION['message']; ?> <!-- alerts the user something has happened -->
						</div>
					</div>
				</div>
				<?php
				unset($_SESSION['message']);//clear message to use again
			}?>

		</div>
		<div class="row">
			<?php
				//display page content here
                $itemtxt = getAllItems();
                $items = json_decode($itemtxt);

                for ($i=0 ; $i<sizeof($items) ; $i++) {
                    echo '<div class="col-sm-4">' ;
						echo '<div class="card" >' ;
							echo '<div class="card-header">' ; //top section of bootstrap card
								echo '<h4>'.$items[$i] -> name.'</h4>' ;//displays name of item
							echo '</div>' ;
							echo '<div class="card-body">' ;//center of card
								echo '<img src="../image/'.$items[$i]->image.'" style="width:50%;"/>' ;
                    			echo '<p>'.$items[$i] -> description.'</p>' ;
							echo '</div>' ;
							echo '<div class="card-footer">';//bottom section of card, button should add an item to users basket
								echo '<p>£ '.$items[$i] ->price.'</p>';
								echo '<a href="add_cart.php?item_id='.$items[$i] -> item_id.'" class="btn btn-block btn-outline-primary">Buy</a>';
							echo '</div>';
						echo '</div>' ;
					echo '</div>' ;
					echo '<br/><br/>' ;
                }
			?>
		</div>
    </body>
</html>