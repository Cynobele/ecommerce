<?php
    session_start();

    
    // student id is vendor code
    $data -> vendor = "1700523" ;

    $dt = new DateTime();
    $dtr = $date->format('ymd'); //returns date as YYMMDD (211006 = 06/10/2021)
    $transnum = "CH".$dtr;//creates transaction id using initials + todays date (CH210303)

    $data -> transaction = $transnum;
    $data -> amount = $price ;//get price from session
    $data -> card = $_POST['cardnum'] ;//get cardnum from form post

    $request = json_encode($data) ; //encode data to JSON format

    //send request to aberpay api and recieve response
    $url = "https://driesh.abertay.ac.uk/~g510572/aberpay/" ;
    $ch = curl_init() ;curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)) );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    echo $response ;

?>