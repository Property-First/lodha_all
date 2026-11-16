<?php

//get data from form

$project = $_POST['project'];

$name = $_POST['name'];

$email= $_POST['email'];

$telephone= $_POST['telephone'];

$ip=getUserIP();

$to = "crm@propertyfirst.co.in,lmt@property-first.com";

$subject = "New CRM Lead";

$txt ="


IP Address: ". $ip . " |\r\n


Project: ". $project . " |\r\n



Name: ". $name . " |\r\n



Email: " . $email . " |\r\n



Telephone: " . $telephone . " |\r\n";



$headers = "From: propertyfirstads@gmail.com";





if($email!=NULL){







    mail($to,$subject,$txt,$headers);















}



//redirect







header("Location:thankyou.html");


function getUserIP()

{

    // Get real visitor IP behind CloudFlare network

    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {

              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

    }

    $client  = @$_SERVER['HTTP_CLIENT_IP'];

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

    $remote  = $_SERVER['REMOTE_ADDR'];



    if(filter_var($client, FILTER_VALIDATE_IP))

    {

        $ip = $client;

    }

    elseif(filter_var($forward, FILTER_VALIDATE_IP))

    {

        $ip = $forward;

    }

    else

    {

        $ip = $remote;

    }



    return $ip;

}



?>

