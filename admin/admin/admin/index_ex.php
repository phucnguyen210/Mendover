<?php
include("../../../config/config.php");
session_start();
if (!$_SESSION["user"]) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../../04_Nguyễn Huy Hoàng Phúc/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../04_Nguyễn Huy Hoàng Phúc/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2">Admin</h3>

        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
                <div class="p-3">
                    <a href="#"><img src="../images/product1.png" class="admin-image" alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="index.php?insert_products" class="nav-link text-light bg-info my-1">Insert
                            product</a></button>
                    <button><a href="index.php?insert_news_product" class="nav-link text-light bg-info my-1">Insert
                            news product</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View product</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert
                            categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View categories</a></button>
                    <button><a href="index.php?insert_news" class="nav-link text-light bg-info my-1">Insert News
                        </a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List User</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_categories'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_news'])) {
                include('insert_news.php');
            }
            if (isset($_GET['insert_products'])) {
                include('insert_products.php');
            }
            if (isset($_GET['insert_news_product'])) {
                include('insert_news_product.php');
            }
            ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>