<?php
include 'includes/header.php';
include 'includes/navbar.php';

if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = '';
}
switch ($source) {
    case 'delivery_successful';
        $_SESSION['delivery_successful'] = 1;
        $rider = $_SESSION['rider_id'];
        echo $rider;
        $query = "UPDATE riders set rider_free = 1 where rider_id = $rider";
        echo $query;
        $set_rider_free = mysqli_query($connection, $query);
        header('Location: index.php');
        break;
}

include 'footer.php';
