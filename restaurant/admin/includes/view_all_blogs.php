<?php
include("delete_modal.php");
bulk_options();
?>


<form action="" method='post'>
    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>

        <div class="col-xs-4" style="padding: 10px;">
            <input type="submit" name="submit" class="btn btn-primary" value="Apply">
            <a class="btn btn-primary" style="margin: 10px;" href="blogs.php?source=add_post">Add New Post</a>
        </div>

        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>Users</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Price</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View Post</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            show_blogs();
            ?>
        </tbody>
    </table>

</form>




<?php
if (isset($_POST['delete'])) {
    $the_post_id = $_POST['post_id'];
    $query = "DELETE FROM food_blogs WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: blogs.php");
}
?>


<script>
    $(document).ready(function() {
        $(".delete_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "blogs.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#myModal").modal('show');
        });
    });
    <?php if (isset($_SESSION['message'])) {
        unset($_SESSION['message']);
    }
    ?>
</script>