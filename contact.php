<?php

$project = $_POST['project'] ?? '';
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone_number = $_POST['telephone'] ?? '';
$ip = getUserIP();

// Email recipients
$to = "crm@propertyfirst.co.in,lmt@property-first.com, che@azurechennai.officialswebsite.info";
$subject = "Total Environment - New CRM Lead";

// Fixed project name
$project = "Total Environment - Ads";

$txt = "IP Address: " . $ip . "\r\n"
     . "Project: " . $project . "\r\n"
     . "Name: " . $name . "\r\n"
     . "Email: " . $email . "\r\n"
     . "Telephone: " . $phone_number . "\r\n";

$headers = "From: propertyfirstads@gmail.com\r\n";

// Send email
if (!empty($email)) {
    mail($to, $subject, $txt, $headers);
}

// Zoho Flow webhook URL
// https://flow.zoho.in/60079714926/flow/webhook/incoming?zapikey=1001.dd5be17d8d7a2180bb47ca012193f6ac.9c2c7b78751551d306d7e1ddb0846168&isdebug=false
$zohoWebhookUrl = "https://flow.zoho.in/60079714926/flow/webhook/incoming?zapikey=1001.dd5be17d8d7a2180bb47ca012193f6ac.9c2c7b78751551d306d7e1ddb0846168&isdebug=falsehttps://flow.zoho.in/60079714926/flow/webhook/incoming?zapikey=1001.dd5be17d8d7a2180bb47ca012193f6ac.9c2c7b78751551d306d7e1ddb0846168&isdebug=false";

if ($zohoWebhookUrl) {
    $zohoData = [
    "Project"    => $project,
    "Name"       => $name,
    "Email"      => $email,
    "Phone"      => $phone_number,
    "IP"         => $ip,
    "LeadSource" => "Website"
];

    $ch = curl_init($zohoWebhookUrl);

    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($zohoData),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT => 10
    ]);

    $zohoResponse = curl_exec($ch);
    $zohoStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($zohoResponse === false || $zohoStatus < 200 || $zohoStatus >= 300) {
        error_log("Zoho Flow submission failed. HTTP: " . $zohoStatus);
    }

    curl_close($ch);
}


header("Location: thankyou.html");
exit;

function getUserIP()
{
    // Trust proxy headers only when set by a trusted proxy.
    if (!empty($_SERVER["HTTP_CF_CONNECTING_IP"]) &&
        filter_var($_SERVER["HTTP_CF_CONNECTING_IP"], FILTER_VALIDATE_IP)) {
        return $_SERVER["HTTP_CF_CONNECTING_IP"];
    }

    return $_SERVER["REMOTE_ADDR"] ?? '';
}
?>