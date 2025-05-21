<?php
include "../db.php";
include "../../admin/functions.php";
ob_start();
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if (isset($_POST["reset"]) && (!empty($_POST["email"]))) {
  $query = "SELECT * FROM users WHERE user_email = '{$_POST["email"]}'";
  $check_mail = mysqli_query($connection, $query);
  if ($row = mysqli_fetch_array($check_mail)) {
    $_SESSION['id'] = $row['user_id'];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'codinggeek247@gmail.com';
    $mail->Password = 'wjjmppqqvqxobobn';
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
    $mail->Port = 465;
    $mail->setFrom('codinggeek247@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = 'Reset password otp By Sub Urban Restaurant';
    $otp = rand(100000, 999999);
    $message = strval($otp);
    $_SESSION['otp'] = $message;
    $mail->Body = "Your otp is : " . $message;
    $mail->send();
    header('Location: otp.php');
  } else {
    echo "<script>alert('Sorry no such mail found');</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./forgetpass.css">

</head>

<body>
  <div class="container-center">
    <center>
      <img src="logo.png" width="30%">
    </center>
    <h2>Don't Worry We got ur back!</h2>
    <form action="#" method="POST">
      <h4>Just provide your email<br>and we can do the rest</h4>
      <formgroup>
        <input class="formgroup" type="text" name="email" />
        <label class="formgroup" for="email"><br>Email</label>
        <span class="formgroup">enter your email</span>
      </formgroup>
      <button id="login-btn" name="reset" type="submit">Submit</button>
    </form>
    <p>Did you remember? <a href="login_signup.php">Sign In</a></p>
  </div>
</body>

</html>