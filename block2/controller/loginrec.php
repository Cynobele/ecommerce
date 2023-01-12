<?php
    require("../model/connection.php");

    $e = $_POST["email"]; //gets email and password from form submitted by user
    $p = $_POST["password"];

    $json = findUser($e, $p);
    if($json!=false)
    {//get the user details from the json
        session_start();
        $decode = json_decode($json);

        for($i=0; $i<sizeof($decode); $i++)
        {
            //send details to session vars
            $_SESSION['id'] = $decode[$i]->user_id;
            $_SESSION['email'] = $decode[$i]->email;
            $_SESSION['fname'] = $decode[$i]->name;
            $_SESSION['sname'] = $decode[$i]->sname;
            $_SESSION['admin'] = $decode[$i]->admin;
        }

        //set message
        $_SESSION['message'] = "Successfully logged in. Welcome ".$_SESSION['fname'];

        //redirect to index, now logged in
        header("Location: ../view/index.php");
    }
    else
    { //json was not returned, user wasn't found in database
        echo '<p>Email or password is incorrect</p>';
    }

    if(!isset($_SESSION['id']))
    { //error occurred when decoding json
        echo '<p>Session ID is not set</p>';
    }



    function findUser($e, $p)
    {
        global $conn;

        $sql = "SELECT * FROM block2USERS WHERE email='$e'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1)
        { //only 1 record should be found
            $encode = array();
            $pass = ''; //stores the hashed password in db for comparison
            while($row = mysqli_fetch_assoc($result))
            {
                $encode[] = $row;
                $pass = $row['password'];
            }
            $ver = password_verify($p, $pass);
            if($ver)
            {
                return json_encode($encode, JSON_INVALID_UTF8_IGNORE);//encode array into json
            }
            else{return false;}
        }
        else
        { //is no records are found then email or pass is wrong

            return false;
        }
    }

?>