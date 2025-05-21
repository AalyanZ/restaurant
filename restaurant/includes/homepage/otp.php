<?php
include "../db.php";
include "../../admin/functions.php";
ob_start();
session_start();
if (isset($_POST["otp_check"]) && (!empty($_POST["otp"]))) {
    if ($_POST["otp"] == $_SESSION["otp"]) {
        header("Location: change_pass.php");
    } else {
        echo "<script>alert('Sorry no wrong otp');</script>";
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
            <h4>Just provide us the sent otp<br>and we can do the rest</h4>
            <formgroup>
                <input class="formgroup" type="text" name="otp" />
                <label class="formgroup" for="otp"><br>otp</label>
                <span class="formgroup">enter otp</span>
            </formgroup>
            <button id="login-btn" name="otp_check" type="submit">Submit</button>
        </form>
        <p>Did you remember? <a href="login_signup.php">Sign In</a></p>
    </div>
</body>

</html>