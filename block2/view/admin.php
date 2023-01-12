<?php
    include("navbar.php");
    session_start();

    if(!isset($_SESSION['id']) || $_SESSION['admin'] != 1)
    {// redirect if not logged in, or user is not an admin
        header("Location: login.php");
    }

?>
    <body>

    <!-- overall container for page -->
    <div class="container">
        <div class="row">
        
            <!-- Display All -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Display All Items</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="../view/displayall.php">
                            <button class="btn btn-primary" type="submit">Display All</button>
                        </form>
                    </div><!-- card body -->
                </div><!-- card -->
            </div> <!-- column -->
        
            <!-- Display An Employee -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Display An Item</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="../view/display.php">
                            <div class="form-group">
                                <label>Item Number :</label>
                                <input type="text" class="form-control" name="item_id">
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div><!-- card body -->
                </div><!-- card -->
            </div> <!-- column -->
        
            <!-- Insert Data for Employee -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Create An Item</div>
                    <div class="card-body">
                        <form role="form" method="GET" action="../view/create.php">
                            <button class="btn btn-primary" type="submit">Create Item</button>
                    </form>
                    </div><!-- card body -->
                </div><!-- card -->
            </div> <!-- column -->
        
        
            <!-- Update Data for Employee -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Update An Item</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="../view/update.php">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div><!-- card body -->
                </div><!-- card -->
            </div> <!-- column -->
        
            <!-- Delete An Employee -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Delete An Item</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="../controller/deleterec.php">
                            <div class="form-group">
                                <label>Item Number :</label>
                                <input type="text" class="form-control" name="item_id">
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div><!-- card body -->
                </div><!-- card -->
            </div> <!-- column -->
            
        </div><!-- row -->             
    </div><!-- container -->
</body>
</html>
