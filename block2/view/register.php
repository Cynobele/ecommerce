<?php

  # connect to db
  require ('../model/connection.php'); 

# Set page title
$page_title = 'Register' ;
include('navbar.php'); ?>

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
</html>

<?php
#details from registration form are posted to db on submission
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # The array() function is used to create an array: in this case an error array();
  $errors = array();

  /* if statement checks if a first name has been entered in to the user input box.
     if it is empty an error message will prompt the user to enter first name
	 if input is correct, connect to database post to table users.*/
	 
	 #get firstname
  if ( empty( $_POST[ 'firstname' ] ))
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $conn, trim( $_POST[ 'firstname' ] ) ) ;}

  #get surname
  if (empty( $_POST[ 'surname' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $conn, trim( $_POST[ 'surname' ] ) ) ; }

  #get email
  if (empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email.' ; }
  else
  { $e = mysqli_real_escape_string( $conn, trim( $_POST[ 'email' ] ) ) ; }

#get password
  if ( !empty($_POST[ 'pass1' ] ) )
  {
	  #check that -> password == confirmpassword
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }

    else
    { //if the passwords match, salt and hash the password
      $x = mysqli_real_escape_string( $conn, trim( $_POST[ 'pass1' ] ) ) ;
      $p = password_hash($x, PASSWORD_DEFAULT); //salts password and uses SHA256 encryption
    }
  }
  else { $errors[] = 'Enter your password.' ; }
  

  # On success register new user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
	  #insert data into new user record
    $q = "INSERT INTO block2USERS (name, sname, password, email, admin) VALUES ('$fn', '$ln', '$p', '$e', 0);";
  	$r = @mysqli_query ( $conn, $q ) ;
    if ($r)
    { 
      header("Location: login.php");
    }
  
    # Close database connection.
    mysqli_close($conn); 
    exit();
  }
  
  # Or report errors.
  else 
  {
    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p>';
    # Close database connection.
    mysqli_close( $conn );
  }  
}
?>






<!--form container begins here-->
<div class="container">

	<!-- title & underline -->
	<h1>Register</h1>
	<hr>
	
	<!-- form is split into sections -->
  <form class="form-horizontal" action="register.php" method="post" style="margin: 0px;">
	
	<!-- account holder details -->
		<div class="form-group">
		<h4 style="margin: 25px;">Account Details</h4>
			<div class="col-sm-20" style="width: 100%; margin: 0 auto;">
				<input type="text" class="form-control" name="firstname" size="20" placeholder="First Name (Philip)" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" required>
			</div>
		</div><br>
				
		<div class="form-group">
			<div class="col-sm-20" style="width: 100%; margin: 0 auto;">
				<input type="text" name="surname" class="form-control" size="20" placeholder="Last Name (Stevenson)" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>" required>
			</div>
		</div><br>
		
    <div class="form-group">
			<div class="col-sm-20" style="width: 100%; margin: 0 auto;">
				<input type="text" name="email" class="form-control" size="80" placeholder="Email (example@gmail.com)" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
			</div>
		</div><br>
		<hr><!--end of details section-->
			
		<!--password-->
		<h4 style="margin: 25px;">Account Password</h4>
		<div class="form-group">
			<div class="col-sm-20" style="width: 100%; margin: 0 auto;">
				<input type="password" name="pass1" class="form-control" size="20" placeholder="Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>
			</div>
		</div><br>
			
		<div class="form-group">
			<div class="col-sm-20" style="width: 100%; margin: 0 auto;">
				<input type="password" name="pass2"class="form-control" placeholder="Confirm Password" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>
			</div>
		</div><br>
		<!-- end of password section-->
		
			<!--submit button-->
		<div class="form-group" style="margin: 0 auto;">
			<div class="button" style="margin: 0 auto;">
				<input type="submit" class="btn btn-block btn-danger mb-2;" value="Register" >
			</div>
		</div>
		
		<hr><!-- underline below submit button-->
		
	</form>


</div><!-- end of container-->

<br>

<div class="container">
	<div class="row">
		<div class="col">
			<p>Already have an account? </p>
			<a href="login.php"><p style="text-decoration: underline;">Login here</p></a>
		</div>
	</div>
</div>
<br><br>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
