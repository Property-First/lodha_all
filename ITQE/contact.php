<?php

$name=$_POST['name'];

$telephone=$_POST['telephone'];

$email=$_POST['email'];

$ip=getUserIP();

$source = $_POST['source'];

extract($_POST, EXTR_OVERWRITE);

$headers  = "MIME-Version: 1.0\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$headers .= "From: Propertyfirstads@gmail.com\n";

$recipient="lmt@property-first.com";





$message="\Total Environment - In That Quiet Earth - Agency \n";

$subject="Total Environment - In That Quiet Earth -  Agency";

$message = '<table width="500" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFF" style="font-weight: 700;font-size: 12px;color: #666;font-family:Arial, Helvetica, sans-serif; background-color:#FFFFFF;">

  <tr bgcolor="#545080">

    <td width="500" colspan="2" style="font-weight: 700;font-size: 13px;color: #FFF; border: 1px solid #CCC; border-bottom:none; border-right:none; padding:10px;">Total Environment - In That Quiet Earth -Agency CallBack</td>

  </tr>

   <tr>



    <td width="250" style="border: 1px solid #CCC; border-bottom:none; border-right:none; padding:10px;">IP Address</td>

    <td width="250" style="border: 1px solid #CCC; border-bottom:none; padding:10px;">'.$ip.'</td>



  </tr>

  <tr>

    <td width="250" style="border: 1px solid #CCC; border-bottom:none; border-right:none; padding:10px;">Name</td>

    <td width="250" style="border: 1px solid #CCC; border-bottom:none; padding:10px;">'.$name.'</td>

  </tr>

  <tr>

    <td width="250" style="border: 1px solid #CCC; border-bottom:none; border-right:none; padding:10px;">Telephone</td>

    <td width="250" style="border: 1px solid #CCC; border-bottom:none; padding:10px;">'.$telephone.'</td>

  </tr>';

  if($email!='')

  {



  $message.=' <tr>

    <td width="250" style="border: 1px solid #CCC; border-bottom:none; border-right:none; padding:10px;">Email</td>

    <td width="250" style="border: 1px solid #CCC; border-bottom:none; padding:10px;">'.$email.'</td>

  </tr>';

  }

  $message .='</table>';



mail($recipient, $subject, $message, $headers);

echo "<meta http-equiv='REFRESH' content='0;url=thankyou.html'>";

$headers1="";

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

