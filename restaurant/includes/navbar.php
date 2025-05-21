<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-4" style="background-image: url(<?php echo "images/" . $_SESSION['user_image']; ?>);">

                </a>

                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="index.php">All Blogs</a>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="" aria-expanded="false" class="dropdown-toggle">Categories</a>
                        <ul class=" list-unstyled" id="homeSubmenu">
                            <?php
                            $query = "SELECT * FROM categories";
                            $all_categories = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($all_categories)) {
                                $title = $row['cat_title'];
                                $id = $row['cat_id'];
                                echo "<li>
                                    <a href ='category.php?category={$id}&title={$title}'>{$title}</a>
                                    </li>";
                            }
                            ?>
                        </ul>
                    </li>


                    <li>
                        <a href="order.php">Order Food</a>
                    </li>
                    <li>
                        <a href="placed_orders.php">Orders Placed</a>
                    </li>
                    <li>
                        <a href="includes/logout.php">Log Out</a>
                    </li>
                </ul>

            </div>

        </nav>
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <form class="p-4 p-md-5" action="search.php?tag = searchtag">
                    <div class="search_container">
                        <input type="text" name="searchtag" placeholder="Search..." style="box-sizing: border-box">
                        <div class="search"></div>
                    </div>
                </form>
            </nav>