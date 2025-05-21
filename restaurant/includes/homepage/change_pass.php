<?php
include "../db.php";
include "../../admin/functions.php";
ob_start();
session_start();
if (isset($_POST["password_check"]) && (!empty($_POST["password"]))) {
    $hashed_password = password_hash($_POST["password"], PASSWORD_BCRYPT, array('cost' => 12));
    $query = "UPDATE users SET ";
    $query .= "user_password   = '{$hashed_password}' ";
    $query .= "WHERE user_id = {$_SESSION['id']} ";
    $edit_user_query = mysqli_query($connection, $query);
    confrim_query($edit_user_query);
    echo "<script>alert('Password updated successfuly');</script>";
    header("Location: login_signup.php");
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
            <h4>Enter your New Password</h4>
            <formgroup>
                <input class="formgroup" type="text" name="password" />
                <label class="formgroup" for="password"><br>password</label>
                <span class="formgroup">enter password</span>
            </formgroup>
            <button id="login-btn" name="password_check" type="submit">Submit</button>
        </form>
        <p>Did you remember? <a href="login_signup.php">Sign In</a></p>
    </div>
</body>

</html>