<?php
session_start();
if (!isset($_SESSION['phone'])) {
    echo "⚠️ Phone number not found in session. Please login again.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP - Turf Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .otp-box {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            width: 80%;
            font-size: 16px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .info {
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="otp-box">
    <h2>OTP Verification</h2>
    <p class="info">OTP sent to: <strong><?php echo $_SESSION['phone']; ?></strong></p>

    <form action="verify_otp_process.php" method="POST">
        <label>Enter OTP:</label><br>
        <input type="text" name="otp_entered" required>
        <button type="submit">Verify OTP</button>
</form>

</div>

</body>
</html>
