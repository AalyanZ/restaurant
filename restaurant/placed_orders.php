<?php
ob_start();
session_start();
include 'includes/db.php';
include 'admin/functions.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Order Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f9f9fa
        }

        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden;
        }

        .card {
            border-radius: 50px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 0px;
        }

        .m-r-0 {
            margin-right: 0px;
        }

        .m-l-0 {
            margin-left: 0px;
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px;
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
            background: linear-gradient(to right, #fcba03, #fc5e03);
        }

        .bg-c-lite-grey {
            background: #e6e3e1;
        }

        .user-profile {
            padding: 250px 0;
        }

        .card-block {
            padding: 5rem;
        }

        .m-b-25 {
            margin-bottom: 55px;
        }

        .img-radius {
            border-radius: 5px;
        }



        h6 {
            font-size: 16px;
        }

        .card .card-block p {
            line-height: 25px;
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 20px;
            }
        }

        .card-block {
            padding: 1rem;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-5 {
            padding-bottom: 30px !important;
        }

        .card .card-block p {
            line-height: 40px;
        }

        .m-b-10 {
            margin-bottom: 20px;
        }

        .text-muted {
            color: #919aa3 !important;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .f-w-600 {
            font-weight: 800;
        }

        .rider {
            font-weight: 800;
            padding-bottom: 10px;
            padding-top:0;  
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .user-card-full .social-link li {
            display: inline-block;
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
    </style>

</head>

<?php
include 'includes/navbar.php';
$query = "SELECT o.subscriber_id,r.rider_id,r.rider_fullname,r.rider_numberplate,r.rider_phonenumber,r.rider_image,f.post_title,f.post_price from orders o,riders r,food_blogs f ";
$query .= "where o.subscriber_id = {$_SESSION['user_id']} and o.rider_id = r.rider_id and f.post_id = o.blog_id";
$select_join_query = mysqli_query($connection, $query);
$row1 = mysqli_fetch_array($select_join_query);


?>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12 col-xl-12">
                <div class="card user-card-full">
                    <div class="row m-l-4 m-r-4">
                        <div class="col-md-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">

                                    <?php

                                    ?> 
                                    <h3 class="rider" ><?php echo "RIDER"; ?></h3>
                                    
                                    <img width="200px" height="200px" src=<?php echo "images/" . "{$row1['rider_image']}"; ?> class="img logo rounded-circle mb-4" alt="User-Profile-Image">
                                </div>
                                <h3 class="f-w-600"><?php echo $row1['rider_fullname']; ?></h3>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                <div class="d-grid ">
                                    <?php $rider_id = $row1['rider_id']; ?>
                                    <button class="btn btn-primary" style="background: black">
                                        <?php echo "<a href='success.php?source=delivery_successful'>Order Delivered</a>" ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8  bg-c-lite-grey" height="100px">
                            <div class="card-block">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Ordered Food</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row1['post_title'] ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row1['rider_phonenumber'] ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <p></p>
                                </div>
                                <div class="row">
                                    <p></p>
                                </div>
                                <div class="row">
                                    <p></p>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['user_address'] ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Rider Number Plate</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row1['rider_numberplate'] ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Total Bill</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row1['post_price'] ?></h6>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php'
?>