<?php
include "includes/header.php";
include "includes/navbar.php";
?>

<?php
if (isset($_GET['p_id'])) {
    $blog_id = $_GET['p_id'];
}

show_post($blog_id);
add_comment($blog_id);
show_comments($blog_id);

?>

<!-- Comments Form -->
<h4>Leave a Comment:</h4>
<form action="#" method="post" role="form">
    <div class="form-group">
        <label for="Author">Author</label>
        <input type="text" name="comment_author" <?php echo "value = {$_SESSION['username']}" ?> required readonly class="form-control" name="comment_author">
    </div>

    <div class="form-group">
        <label for="Author">Email</label>
        <input type="email" name="comment_email" <?php echo "value = {$_SESSION['user_email']}" ?> required readonly class="form-control" name="comment_email">
    </div>

    <div class="form-group">
        <label for="comment">Your Comment</label>
        <textarea name="comment_content" required class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
</form>

<hr>
<?php
?>

<?php
include "includes/footer.php";
?>