<?php
include 'db.php';
session_start();
$phone = $_SESSION['phone'];
$entered_otp = $_POST['otp_entered'];

$query = "SELECT otp FROM otp_verification WHERE phone = '$phone' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row && $row['otp'] == $entered_otp) {
    echo "✅ OTP Verified. Login Successful!";
    // You can redirect to dashboard here
} else {
    echo "❌ Invalid OTP. Try again.";
}
?>
