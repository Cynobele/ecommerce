<!--nav bar -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css"><!--mystylesheet-->	 
	 <title>CMP306 Dynamic Web Development</title>
  </head>
  <body>

<?php
    require ( '../model/connection.php' ) ;
    include ( 'navbar.php' ) ;
?>

<div class="container">
	<!--header text for this page-->
	<h1>Login</h1>	
	<hr><!--underline-->
	
    <form class="form-horizontal" action="../controller/loginrec.php" method="post"margin: 0px;">

			<!-- input fields -->
		<div class="form-group">
			<div class="col-sm-20" style="width: 100%; margin: auto;">
				<input type="email" class ="form-control" name="email" placeholder="Email Address" required>
			</div>
		</div>
				
		<div class="form-group">
			<div class="col-sm-20" style="width: 100%; margin : auto;">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
			</div>
		</div>
			
		<!--submit button-->
		<div class="form-group" style="margin: 0 auto;">
			<div class="button" style="margin: 0 auto;">
				<input type="submit" class="btn btn-block btn-danger mb-2;" value="Login" >
			</div>
		</div>
		<hr>
	</form>
	
<!--breaks to create space-->
<br><br>

<!--redirect to register page for users with no account-->
<div class="container">
	<div class="row">
		<div class="col">
			<p>Don't have an account? </p>
			<a href="register.php"><p style="text-decoration: underline;">Create one here</p></a>
		</div>
	</div>
<div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
