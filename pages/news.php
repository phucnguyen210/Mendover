<?php
include("../config/config.php");
include("../function/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta info="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mendover</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../04_Nguyễn Huy Hoàng Phúc/css/bootstrap.min.css">
    <link rel="stylesheet" href="../04_Nguyễn Huy Hoàng Phúc/css/themify-icons/themify-icons.css">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.btn_search_phuc {
    height: 10px;
}
</style>

<body>
    <div id="main">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>
        <div class="banner-page-list">
            <div id="content">
                <div class="banner">
                    <h1>Tin tức</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container-news  container_bread">
                    <ul style="padding: 0;">
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Tin tức</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="margin: 0 180px;" class="container-news ">
            <div class="row " style="padding: 70px 0px;">
                <div class="col-3">

                    <div class="menu_new">
                        <div class="menu_nav">
                            <h2 style="font-size: 14px;">
                                <div class="show_nav">
                                    <i class="icon_new ti-menu"></i>
                                </div>
                                DANH MỤC TIN TỨC
                            </h2>
                        </div>
                        <div class="list-item-new">
                            <ul style="padding: 0;">
                                <?php
                                global $connect;
                                $select_news = "SELECT * FROM `tbl_news`";
                                $result_news = mysqli_query($connect, $select_news);
                                while ($row_data = mysqli_fetch_assoc($result_news)) {
                                    $news_title = $row_data['news_title'];
                                    $news_id = $row_data['news_id'];

                                    echo "
                                        <li class='list-1'>
                                            <a href='news.php?news=$news_id'>$news_title</a>
                                        </li>
                                        ";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div style="margin-top: 187px;" class="menu_list">
                        <div class="new_up">
                            <h3>TIN MỚI CẬP NHẬT</h3>
                        </div>
                        <div class="row">
                            <?php
                            global $connect;
                            $select_news = "SELECT * FROM `tbl_news_products` ";
                            $result_news = mysqli_query($connect, $select_news);
                            while ($row_data = mysqli_fetch_assoc($result_news)) {
                                $news_product_id = $row_data['news_product_id'];
                                $news_product_title = $row_data['news_product_title'];
                                $news_product_description = $row_data['news_product_description'];
                                $news_id = $row_data['news_id'];
                                $news_product_image = $row_data['news_product_image'];
                                $news_date = date("d/m/Y"); // Lấy ngày tháng hiện tại
                                echo "
                                    <div class='col-5'>
                                        <img style='padding: 10px 0px 0px 11px;' src='../admin/product_images/$news_product_image'>
                                    </div>
                                    <div class='col-7'>
                                        <div class='menu_banner_content'>
                                            <h4>
                                                <a href=''>$news_product_title</a>
                                            </h4>
                                            <div class='date' style='color: #bda87f; font-size: 14px; '>$news_date</div>
                                        </div>
                                    </div>
                                    ";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-9">

                    <?php
                    global $connect;
                    if (!isset($_GET['news'])) {
                        $select_news = "SELECT * FROM `tbl_news_products` ";
                        $result_news = mysqli_query($connect, $select_news);
                        while ($row_data = mysqli_fetch_assoc($result_news)) {
                            $news_product_id = $row_data['news_product_id'];
                            $news_product_title = $row_data['news_product_title'];
                            $news_product_description = $row_data['news_product_description'];
                            $news_id = $row_data['news_id'];
                            $news_product_image = $row_data['news_product_image'];
                            $news_product_people = $row_data['news_product_people'];

                            $news_date = date("d/m/Y"); // Lấy ngày tháng hiện tại
                            echo "
                            <div class='silde_new'>
                                <img width='100%' src='../admin/product_images/$news_product_image'>
                                <h2 class='art_name'>
                                    <a href=''> $news_product_title </a>
                                </h2>
                                <span class='log_meta'>
                                    <ul>
                                        <li style='display: flex;'>
                                            <i class='icon ti-user'></i>
                                            <p style='padding: 10px;'>$news_product_people</p>
                                        </li>
                                        <li style='display: flex;'>
                                            <i class='icon ti-time'></i>
                                            <p style='padding: 10px;'>$news_date</p>
                                        </li>
                                    </ul>
                                </span>
                                <div class='action'>
                                    <p>$news_product_description</p>
                                    <div class='read'>
                                        <a href=''>Đọc tiếp</a>
                                    </div>
                                </div>
                            </div>                 
                            ";
                        }
                    }

                    if (isset($_GET['news'])) {
                        $news_id = $_GET['news'];
                        $select_news = "SELECT * FROM `tbl_news_products` WHERE news_id= $news_id";
                        $result_news = mysqli_query($connect, $select_news);
                        $num_of_rows = mysqli_num_rows($result_news);

                        while ($row_data = mysqli_fetch_assoc($result_news)) {
                            $news_product_id = $row_data['news_product_id'];
                            $news_product_title = $row_data['news_product_title'];
                            $news_product_description = $row_data['news_product_description'];

                            $news_product_image = $row_data['news_product_image'];
                            $news_product_people = $row_data['news_product_people'];
                            $news_date = date("d/m/Y"); // Lấy ngày tháng hiện tại
                            $news_id = $row_data['news_id'];
                            echo "
                            
                            <div class='silde_new'>
                                <img width='100%' src='../admin/product_images/$news_product_image'>
                                <h2 class='art_name'>
                                    <a href=''> $news_product_title </a>
                                </h2>
                                <span class='log_meta'>
                                    <ul>
                                        <li style='display: flex;'>
                                            <i class='icon ti-user'></i>
                                            <p style='padding: 10px;'>$news_product_people</p>
                                        </li>
                                        <li style='display: flex;'>
                                            <i class='icon ti-time'></i>
                                            <p style='padding: 10px;'>$news_date</p>
                                        </li>
                                    </ul>
                                </span>
                                <div class='action'>
                                    <p>$news_product_description</p>
                                    <div class='read'>
                                        <a href=''>Đọc tiếp</a>
                                    </div>
                                </div>
                            </div>  

                            

                                            
                            ";
                        }
                    }



                    ?>

                </div>


            </div>

        </div>
        <div class="footer">
            <?php
            include("../config/footer.php");
            ?>
        </div>
    </div>



</body>

</html>