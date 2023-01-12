<?php
    session_start();
    include("../model/connection.php");

    $userid=$_SESSION['id'];
    $itemid=$_SESSION['item_id'];
    $transaction = "CH123456";

    //prep an array to be converted
    $data ->vendor = "1700523"; //vendor is student id
    $data ->transaction = $transaction;
    $data ->amount = $_SESSION['price']; //the price of the item, <100
    $data ->card = $_POST['cardnum']; //card number entered on previous form

    $request = json_encode($data) ; //encode data to JSON format

    //send request to aberpay api and recieve response
    $url = "https://driesh.abertay.ac.uk/~g510572/aberpay/" ;
    $ch = curl_init() ;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)) );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    $encode = json_encode($response, JSON_INVALID_UTF8_IGNORE);
    $decode = json_decode($encode, true);

    if(strstr($decode, '"status":1,'))
    { //on purchase success
        $sql = "INSERT INTO `block2TRANSACTIONS`(`status`, `user_id`, `item_id`, `transaction`)
            VALUES ('Success','$userid','$itemid','$transaction')";
        $r = mysqli_query($conn, $sql); //execute sql

        if($r)
        {//on sql success
            $_SESSION['message'] = 'Purchase successful!';
            header("Location: index.php");
        }
        else{//on sql failure
            $_SESSION['message'] = 'Something went wrong please try again';
            header("Location: index.php");
        }
    }
    else{//on purchase failure

        //only 1 of the following ifs should run
        if(strstr($decode, '"error":900')){
            $error = "900";
            $errortxt = "Card Payment Rejected";

            $sql = "INSERT INTO `block2TRANSACTIONS`(`status`, `user_id`, `item_id`, `error`, `error_text`, `transaction`) 
            VALUES ('Failed','$userid','$itemid','900','Card Payment Rejected','$transaction')";
        }
        elseif(strstr($decode, '"error":901')){
            $error = "901";
            $errortxt = "Invalid Vendor";

            $sql = "INSERT INTO `block2TRANSACTIONS`(`status`, `user_id`, `item_id`, `error`, `error_text`, `transaction`) 
            VALUES ('Failed','$userid','$itemid','901','Invalid Vendor','$transaction')";
        }
        elseif(strstr($decode, '"error":904')){
            $error = "904";
            $errortxt = "Invalid Amount";

            $sql = "INSERT INTO `block2TRANSACTIONS`(`status`, `user_id`, `item_id`, `error`, `error_text`, `transaction`) 
            VALUES ('Failed','$userid','$itemid','904','Invalid Amount','$transaction')";
        }
        elseif(strstr($decode, '"error":90'))
        { //attemp to collect all error codes
            $_SESSION['message'] = 'New error code: '.$decode;
            header("Location: index.php");
        }

        $r = mysqli_query($conn, $sql); //execute sql after getting correct statement above

        if($r)
        {//on sql success
            $_SESSION['message'] = 'Error: '.$error.' - '.$errortxt.' | JSON: '.$decode;
            header("Location: index.php");
        }
        else{//on sql failure
            $_SESSION['message'] = 'Something went wrong please try again';
            header("Location: index.php");
        }
    }
?>
