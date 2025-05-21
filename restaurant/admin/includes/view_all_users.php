<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th>change role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        show_all_users();
        ?>
    </tbody>
</table>

<?php
user_changes();
?>