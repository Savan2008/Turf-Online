<?php
include 'db.php';
session_start();

$phone = $_POST['phone'];
$otp = rand(100000, 999999);
$created_at = date("Y-m-d H:i:s");
$_SESSION['phone'] = $phone;

// Store in DB
mysqli_query($conn, "INSERT INTO otp_verification (phone, otp, created_at) VALUES ('$phone', '$otp', '$created_at')");

// Fast2SMS API setup
$apiKey = "grKPoRqgmBU1HueBAgg5nvLT7xLVJk7MALUxpYgutH1Vi2sz1SUr762dQPVI";
$message = "Your OTP for Turf Booking is $otp";
$numbers = $phone;

$data = array(
    "sender_id" => "FSTSMS",
    "message" => $message,
    "language" => "english",
    "route" => "p",
    "numbers" => $numbers
);

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        "authorization: $apiKey",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
curl_close($curl);

// Redirect to OTP input page
header("Location: verify_otp.php");
?>
