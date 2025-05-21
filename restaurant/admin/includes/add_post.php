<?php
create_post();
?>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Blog Title</label>
        <input type="text" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="post_category">Blog Category ID</label>
        <select name="post_category" id="post_category">
            <?php
            $query = "SELECT * FROM categories";
            $select_all_categories = mysqli_query($connection, $query);
            ($select_all_categories);
            while ($row = mysqli_fetch_assoc($select_all_categories)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value = '{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Blog Author</label>
        <input type="text" class="form-control" name="author" readonly required value=<?php echo $_SESSION['username'] ?>>
    </div>

    <div class="form-group">
        <select name="post_status" id="">
            <option value="Draft">Draft</option>
            <option value="Published">Published</option>
        </select>
    </div>



    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" required>
    </div>



    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>


    <div class="form-group">
        <label for="post_price">Food Price</label>
        <input type="number" class="form-control" name="post_price">
    </div>


    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>