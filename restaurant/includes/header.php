<?php
include 'db.php';
include 'admin/functions.php';
ob_start();
session_start();
$_SESSION['delivery_successful'] = NULL;
$_SESSION['order_placed'] = NULL;
?>
<!doctype html>
<html lang="en">

<head>
    <title>Sub urban restaurant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/blog.css">
</head>