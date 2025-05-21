<?php
if (isset($_POST['create_rider'])) {
    add_rider();
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Rider Fullname</label>
        <input type="text" class="form-control" name="rider_fullname" required>
    </div>


    <div class="form-group">
        <label for="rider_image">Rider Image</label>
        <input type="file" accept="image/*" name="image" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="rider_address" required>
    </div>

    <div class="form-group">
        <label for="Phone Number">Phone Number format [+92-1234567890] </label>
        <input type="text" pattern="[\+]\d{2}\d{10}" class="form-control" name="rider_phonenumber" required>
    </div>

    <div class="form-group">
        <label for="rider_numberplate">Rider Number Plate </label>
        <input type="text" pattern="\d{3}[\-]\d{3}" class="form-control" name="rider_numberplate" required>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_rider" value="Add rider">
    </div>

</form>