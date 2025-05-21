<?php
if (isset($_GET['p_id'])) {
    $edit_id = $_GET['p_id'];
}
$query = "SELECT * FROM food_blogs WHERE post_id = $edit_id";
$select_blogs_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_blogs_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_status = $row['post_status'];
    $post_tags = $row['post_tags'];
    $post_comments = $row['post_comments'];
    $post_title = $row['post_title'];
    $post_price = $row['post_price'];
    $post_category_id = $row['post_category_id'];
    $post_content = $row['post_content'];
}
if (isset($_POST['update_post'])) {
    $post_title        = $_POST['title'];
    $post_author       = $_POST['author'];
    $post_category_id  = $_POST['post_category'];
    $post_status       = $_POST['post_status'];
    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];
    $post_price = $_POST['post_price'];
    $post_tags         = $_POST['post_tags'];
    $post_content      = $_POST['post_content'];
    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM food_blogs WHERE post_id = $edit_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE food_blogs SET ";
    $query .= "post_title  = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date   =  now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags   = '{$post_tags}', ";
    $query .= "post_content= '{$post_content}', ";
    $query .= "post_image  = '{$post_image}' ,";
    $query .= "post_price  = '{$post_price}' ";
    $query .= "WHERE post_id = {$edit_id} ";
    $update_post = mysqli_query($connection, $query);
    confrim_query($update_post);
?>
    <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> Post updated succssfully
    </div>
<?php
}

?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Blog Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="post_category">Blog Category</label>
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
        <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="author" readonly required value=<?php echo $_SESSION['username'] ?>>
    </div>

    <div class="form-group">
        <label for="post_status">Blog Status</label>
        <select name="post_status" id="post_status">

            <option value='draft'>Draft</option>";
            <option value='published'>Published</option>";


        </select>
    </div>



    <div class="form-group">
        <label for="post_image">Blog Image</label>
        <img width="300" src="../images/<?php echo $post_image; ?>" alt="" required>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_price">Food Price</label>
        <input type="number" value="<?php echo $post_price; ?>" class="form-control" name="post_price">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags" required>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10" required>
        <?php echo $post_content; ?>
    </textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="update post">
    </div>

</form>