<!DOCTYPE html> 
<!-- Admin for Employees-->
<!-- version 1 2021-08-14 -->
<html>
    <head>  
        <meta charset="utf-8">
	    <title>Employees</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
	   	<!-- The site uses Bootstrap v5 Framework-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </head>

    <body>

	   <!-- overall container for page -->
       <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="admin.php"><button class="btn btn-primary" type="submit">Return to Admin</button></a>
                        </div><!-- card body -->
                    </div><!-- card -->
                </div> <!-- column -->
            </div><!-- row -->

            <!-- Insert Data for Employee -->
            <div class="col-sm-4">
            	<div class="card">
            		<div class="card-header">Create An Item</div>
            		<div class="card-body">
						<form role="form" method="POST" action="../controller/createrec.php">
							<div class="form-group">
    							<label>Item Name :</label>
    							<input type="text" class="form-control" name="name" required>
  							</div>
  							<div class="form-group">
    							<label>Description :</label>
    							<input type="text" class="form-control" name="desc" required>
  							</div>
  							<div class="form-group">
    							<label>Price :</label>
    							<input type="text" class="form-control" name="price" required>
  							</div>
  							<button class="btn btn-primary" type="submit">Submit</button>
  						</form>
					</div><!-- card body -->
            	</div><!-- card -->
            </div> <!-- column -->
			         
        </div><!-- container -->
    </body>
</html>
   