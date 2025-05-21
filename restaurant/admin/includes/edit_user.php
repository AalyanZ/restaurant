<?php

if (isset($_GET['edit_user'])) {
    $the_user_id =  $_GET['edit_user'];
}

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id        = $row['user_id'];
    $username       = $row['username'];
    $user_password  = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname  = $row['user_lastname'];
    $user_email     = $row['user_email'];
    $user_image     = $row['user_image'];
    $user_role      = $row['user_role'];
    $user_address   = $row['user_address'];
    $user_phonenumber      = $row['user_phonenumber'];
}


if (isset($_POST['edit_user'])) {
    $user_firstname   = $_POST['user_firstname'];
    $user_lastname    = $_POST['user_lastname'];
    $user_role        = $_POST['user_role'];
    $username         = $_POST['username'];
    $user_email       = $_POST['user_email'];
    $user_password    = $_POST['user_password'];
    $user_image       = $_FILES['image']['name'];
    $user_image_temp  = $_FILES['image']['tmp_name'];
    $user_address   = $_POST['user_address'];
    $user_phonenumber      = $_POST['user_phonenumber'];

    move_uploaded_file($user_image_temp, "../images/$user_image");

    if (empty($user_image)) {
        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $user_image = $row['user_image'];
        }
    }
    if (!empty($user_password)) {
        $qu = "SELECT username FROM users WHERE user_id = $the_user_id ";
        $q2 =  mysqli_query($connection, $qu);
        $origuser = mysqli_fetch_array($q2);


        $user_already_exists = "SELECT username FROM users WHERE username = '{$username}'";
        $check_query =  mysqli_query($connection, $user_already_exists);
        $row = mysqli_fetch_array($check_query);

        if ($row && $username != $origuser['username']) {
?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!</strong> User already exists please try again!
            </div>
        <?php
        } elseif (strlen(mysqli_real_escape_string($connection, $user_password)) < 8) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!</strong> Enter a strong password!
            </div>
        <?php
        } else {
            $query_password = "SELECT user_password FROM users WHERE user_id =  $the_user_id";
            $get_user_query = mysqli_query($connection, $query_password);
            confrim_query($get_user_query);
            $row = mysqli_fetch_array($get_user_query);
            $db_user_password = $row['user_password'];

            if ($db_user_password != $user_password) {
                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
            } else {
                $hashed_password =  $user_password;
            }

            $query = "UPDATE users SET ";
            $query .= "user_firstname  = '{$user_firstname}', ";
            $query .= "user_lastname = '{$user_lastname}', ";
            $query .= "user_role   =  '{$user_role}', ";
            $query .= "username = '{$username}', ";
            $query .= "user_email = '{$user_email}', ";
            $query .= "user_image = '{$user_image}', ";
            $query .= "user_password   = '{$hashed_password}' ,";
            $query .= "user_address = '{$user_address}', ";
            $query .= "user_phonenumber   = '{$user_phonenumber}' ";
            $query .= "WHERE user_id = {$the_user_id} ";


            $edit_user_query = mysqli_query($connection, $query);
            confrim_query($edit_user_query);
        ?>
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> User Updated succssfully : <a href='users.php'>View Users</a>
            </div>
        <?php

        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> A problem has been occurred while submitting your data.
        </div>
<?php
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>subscriber</option>";
            } else {
                echo "<option value='admin'>admin</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <img width="300" src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" accept="image/*" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="Phone Number">Phone Number</label>
        <input type="text" pattern="[\+]\d{2}\d{10}" value="<?php echo $user_phonenumber; ?>" class="form-control" name="user_phonenumber" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" value="<?php echo $user_address; ?>" class="form-control" name="user_address" required>
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>

</form>