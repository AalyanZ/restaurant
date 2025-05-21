<?php
include "includes/header.php";
include "includes/navbar.php";
if ($_SESSION['delivery_successful'] == 0 and $_SESSION['order_placed'] == 1)
    header("Location: placed_orders.php");

if (isset($_POST["place_order"])) {
    $query = "SELECT * FROM riders WHERE rider_free = 1";
    $select_all_riders_available = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($select_all_riders_available);
    if ($row) {
        $rider_id = $row['rider_id'];
        $query = "UPDATE riders SET rider_free = 0 WHERE rider_id = $rider_id";
        $allocate_rider = mysqli_query($connection, $query);
        $query = " riders SET rider_free = 0 WHERE rider_id = $rider_id";
        $query = "INSERT INTO orders(subscriber_id, rider_id, blog_id,order_date) ";
        $query .= "VALUES({$_SESSION['user_id']},'{$rider_id}',{$_POST["blog_id"]},now())";
        $create_order_query = mysqli_query($connection, $query);
        confrim_query($create_order_query);
        $_SESSION['delivery_successful'] = 0;
        $_SESSION['order_placed'] = 1;
        $_SESSION['rider_id'] = $rider_id;
?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> Order added succssfully : <a href='placed_orders.php'>View details</a>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Sorry!</strong> No Riders available right now Please try again later
        </div>
<?php
    }
}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="blog_id">Select Your order</label>
        <select name="blog_id" id="blog_id">
            <?php
            $query = "SELECT * FROM food_blogs";
            $select_all_blogs = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_blogs)) {
                $blog = $row['post_title'];
                $post_id = $row['post_id'];
                $price = $row['post_price'];
                echo "<option value = '{$post_id}'>{$blog}  Price : {$price}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" value="<?php echo $_SESSION['firstname']; ?>" readonly required class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" value="<?php echo $_SESSION['lastname']; ?>" readonly required class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <img width="300" readonly required src="images/<?php echo $_SESSION['user_image'];  ?>" alt="">
    </div>

    <div class="form-group">
        <label for="Phone Number">Phone Number</label>
        <input type="text" readonly required pattern="[\+]\d{2}\d{10}" value="<?php echo $_SESSION['user_phonenumber']; ?>" class="form-control" name="user_phonenumber" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" readonly required value="<?php echo $_SESSION['user_address']; ?>" class="form-control" name="user_address" required>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" readonly required type="submit" name="place_order" value="Place order">
    </div>

</form>

<?php
include "includes/footer.php";
