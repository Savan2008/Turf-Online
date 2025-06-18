<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Turf Booking - Login with OTP</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #283e51, #485563);
      font-family: 'Segoe UI', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 100%;
      animation: fadeIn 0.7s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      color: #283e51;
      margin-bottom: 20px;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .checkbox-group {
      display: flex;
      align-items: flex-start;
      margin: 15px 0;
      font-size: 14px;
    }

    .checkbox-group input {
      margin-top: 2px;
      margin-right: 10px;
    }

    .checkbox-group label {
      line-height: 1.4;
    }

    .checkbox-group a {
      color: #007bff;
      text-decoration: none;
    }

    .checkbox-group a:hover {
      text-decoration: underline;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #283e51;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #1e2e3e;
    }

    .footer {
      text-align: center;
      margin-top: 15px;
      font-size: 13px;
      color: #555;
    }

    .logo {
      display: block;
      margin: 0 auto 20px;
      width: 80px;
    }
  </style>
</head>
<body>

  <div class="container">
    <img src="logo (2).png" alt="Turf Logo" class="logo" />
    <h2>Login via OTP</h2>

    <form action="send_otp.php" method="POST" onsubmit="return validateForm()">
      <input type="text" name="phone" id="phone" placeholder="Enter 10-digit Phone Number" required maxlength="10" pattern="\d{10}">
    

      <div class="checkbox-group">
        <input type="checkbox" id="terms" required>
        <label for="terms">
          I agree to the
          <a href="terms.php" target="_blank">Terms & Conditions</a> and
          <a href="privacy.php" target="_blank">Privacy Policy</a>.
        </label>
      </div>

      <button type="submit">Send OTP</button>
    </form>

    <div class="footer">Powered by Turf Booking System</div>
  </div>

  <script>
    function validateForm() {
      const phone = document.getElementById("phone").value;
      const terms = document.getElementById("terms").checked;

      if (!terms) {
        alert("Please accept the Terms and Conditions.");
        return false;
      }

      if (!/^\d{10}$/.test(phone)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
      }

      return true;
    }
  </script>

</body>
</html>
