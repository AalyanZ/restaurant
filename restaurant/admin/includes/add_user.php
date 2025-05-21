<?php
if (isset($_POST['create_user'])) {
    add_user();
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" required>
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" required>
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" accept="image/*" name="image" required>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="user_address" required>
    </div>

    <div class="form-group">
        <label for="Phone Number">Phone Number format [+92-1234567890] </label>
        <input type="text" pattern="[\+]\d{2}\d{10}" class="form-control" name="user_phonenumber" required>
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password" required>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>