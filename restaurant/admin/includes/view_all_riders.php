<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Full name</th>
            <th>Number Plate</th>
            <th>Image</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Is Free</th>
            <th>Order Id</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        show_all_riders();
        ?>
    </tbody>
</table>

<?php
rider_changes();
?>