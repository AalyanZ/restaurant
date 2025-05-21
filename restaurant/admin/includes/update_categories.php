<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php
        // All categories
        if (isset($_GET['edit'])) {

            $edit_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = {$edit_id}";
            $edit_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($edit_query)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" class="form-control" name="cat_title">

        <?php
            }
        }

        ?>
        <?php
        if (isset($_POST['update_category'])) {
            $edit_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$edit_title}' WHERE cat_id = {$cat_id}";
            $edit_query = mysqli_query($connection, $query);
            if (!$edit_query) {
                die("Query FAIL" . mysqli_error($connection));
            }
            header("Location: categories.php");
        }

        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update category">
    </div>
</form>