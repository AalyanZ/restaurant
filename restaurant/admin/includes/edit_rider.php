<?php

if (isset($_GET['edit_rider'])) {
    $the_rider_id =  $_GET['edit_rider'];
}

$query = "SELECT * FROM riders WHERE rider_id = $the_rider_id ";
$select_riders_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_riders_query)) {
    $rider_id             = $row['rider_id'];
    $rider_fullname    = $row['rider_fullname'];
    $rider_numberplate   = $row['rider_numberplate'];
    $rider_image        = $row['rider_image'];
    $rider_address      = $row['rider_address'];
    $rider_phonenumber  = $row['rider_phonenumber'];
    $is_free = $row['rider_free'];
    $on_order = $row['order_id'];
}


if (isset($_POST['edit_rider'])) {
    $rider_fullname    = $_POST['rider_fullname'];
    $rider_numberplate   = $_POST['rider_numberplate'];
    $rider_image        = $_FILES['image']['name'];
    $rider_image_temp   = $_FILES['image']['tmp_name'];
    $rider_address      = $_POST['rider_address'];
    $rider_phonenumber  = $_POST['rider_phonenumber'];
    $is_free = $_POST['rider_free'];


    move_uploaded_file($rider_image_temp, "../images/$rider_image");

    if (empty($rider_image)) {
        $query = "SELECT * FROM riders WHERE rider_id = $rider_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $rider_image = $row['rider_image'];
        }
    }

    $rider_already_exists = "SELECT rider_numberplate FROM riders WHERE rider_numberplate = {$rider_numberplate}";
    $check_query =  mysqli_query($connection, $rider_already_exists);
    $row = mysqli_fetch_array($check_query);

    if ($row) {
?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> Rider already exists please try again!
        </div>
    <?php
    } else {
        $query = "UPDATE riders SET ";
        $query .= "rider_fullname  = '{$rider_fullname}', ";
        $query .= "rider_numberplate = '{$rider_numberplate}', ";
        $query .= "rider_image = '{$rider_image}', ";
        $query .= "rider_address = '{$rider_address}', ";
        $query .= "rider_phonenumber   = '{$rider_phonenumber}' ,";
        $query .= "rider_free   = {$is_free} ";
        $query .= "WHERE rider_id = {$the_rider_id} ";
        $edit_rider_query = mysqli_query($connection, $query);
        confrim_query($edit_rider_query);
    ?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> rider Updated succssfully : <a href='riders.php'>View riders</a>
        </div>
<?php
    }
}


?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Rider Fullname</label>
        <input type="text" class="form-control" name="rider_fullname" value="<?php echo $rider_fullname ?>" required>
    </div>


    <div class="form-group">
        <label for="rider_image">Rider Image</label>
        <img width="300" src="../images/<?php echo $rider_image; ?>" alt="">
        <input type="file" accept="image/*" name="image">
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" value="<?php echo $rider_address ?>" name="rider_address" required>
    </div>

    <div class="form-group">
        <label for="Phone Number">Phone Number format [+92-1234567890] </label>
        <input type="text" pattern="[\+]\d{2}\d{10}" value="<?php echo $rider_phonenumber ?>" class="form-control" name="rider_phonenumber" required>
    </div>

    <div class="form-group">
        <label for="rider_numberplate">Rider Number Plate </label>
        <input type="text" pattern="\d{3}[\-]\d{3}" class="form-control" value="<?php echo $rider_numberplate ?>" name="rider_numberplate" required>
    </div>

    <div class="form-group">
        <label for="rider_numberplate">Rider Free </label>
        <select name="rider_free" id="post_category">
            <option value=1>Yes</option>;
            <option value=0>No</option>;
        </select>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_rider" value="Update rider">
    </div>

</form>