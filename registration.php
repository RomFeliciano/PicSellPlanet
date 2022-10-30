<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css/style_registration.css">
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>
    <form method="POST" action="registration/register_usertype.php" enctype="multipart/form-data">
      <div class="type-details">
        <input type="radio" name="user_type" id="dot-1" value="Customer" onclick="userTypeCheck();">
        <input type="radio" name="user_type" id="dot-2" value="Lensman" onclick="userTypeCheck();" checked></br>
        <span class="type-title">Type of Account</span>
        <div class="category">
          <label for="dot-1">
            <span class="dot one"></span>
            <span class="type">Customer</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="type">Lensman</span>
          </label>
        </div>
      </div>
      <div class="user-details">
        <div class="input-box">
          <span class="details">Full Name</span>
          <input type="text" name="fullname" placeholder="Enter your Full Name" required>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="text" name="email" placeholder="Enter your Email" required>
        </div>
        <div class="input-box">
          <span class="details">Sex</span>
          <input type="radio" name="user_sex" value="Male" id="dot-11">
          <input type="radio" name="user_sex" value="Female" id="dot-12">
          <div class="category">
            <label for="dot-11">
              <span class="dot eleven"></span>
              <span class="type">Male</span>
            </label>
            <label for="dot-12">
              <span class="dot twelve"></span>
              <span class="type">Female</span>
            </label>
          </div>
        </div>
        <div class="input-box">
          <span class="details">Address</span>
          <input type="text" name="address" placeholder="Enter your Address" required>
        </div>
        <div class="input-box">
          <span class="details">Birthday</span>
          <input type="date" name="birthday" placeholder="Enter your Birthday" required>
        </div>
        <div class="input-box">
          <span class="details">Contact Number</span>
          <input type="number" name="contact_num" placeholder="Enter your Contact Number" required>
        </div>
        <div class="input-box" id="ifLensman">
          <span class="details">Type of ID</span>
          <select name="id_type" id="id_type" required>
            <option value="Student ID" selected>Student ID</option>
            <option value="National ID">National ID</option>
            <option value="Drivers License">Driver's License</option>
            <option value="Passport">Passport</option>
          </select>
        </div>


        <div class="input-box" id="ifLensman2">
          <label>Image of ID</label><br>
          <input type="file" name="id_upload" id="id_upload" style="color: grey;" required>
        </div>
        <div class="input-box" id="ifLensman3">
          <label>Image of Business license</label><br>
          <input type="file" name="bLicense_upload" id="bLicense_upload" style="color: grey;" required>
        </div>


        <div class="input-box">
          <span class="details">Profile Picture</span>
          <input type="file" name="pfp_upload" id="" style="color: grey;" accept="image/png, image/gif, image/jpeg" required>
        </div>

        <div class="input-box">
          <span class="details">Password</span>
          <input type="password" name="password" placeholder="Enter your Password" required>
        </div>
        <div class="input-box">
          <span class="details">Confirm Password</span>
          <input type="password" name="cPassword" placeholder="Confirm Password" required>
        </div>
      </div>
      <div class="button">
        <input type="submit" name="register" value="Register">
      </div>
    </form>
    <div class="errors" id="alerts_rg" style="display: none;">
      <?php 
        $mwe = $_SESSION['alert_text_rg'];
        
        if(isset($mwe) && $mwe==true)
        {
          require 'php/alert_register_login.php';
          echo '
            <h2>'. $mwe .'</h2>
          ';
          alertPopup_rg();
          unset($_SESSION['alert_text_rg']);
        }
      ?>
    </div>
    
    <span>
      <a href="login.php" style="margin-left: 390px;">Already have an Account? Go to Login</a>
    </span>
  </div>
</body>
<script type="text/javascript" src="js/rButton_register.js"></script>

</html>