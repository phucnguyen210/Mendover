<?php
include("../config/config.php");
if (isset($_POST['insert_news_product'])) {
    $news_product_title = $_POST['news_product_title'];
    $news_product_description = $_POST['news_product_description'];
    $news_product_new = $_POST['news_product_new'];
    $news_date = $_POST['date_time'];;
    $news_product_status = "txt_status";
    $news_product_image = $_FILES['news_product_image']['name'];
    $news_product_people = $_POST['news_product_people'];

    $temp_image = $_FILES['news_product_image']['tmp_name'];

    if (
        $news_product_title == '' or
        $news_product_description == ''  or

        $news_product_new == '' or
        $news_product_image == ''

    ) {
        echo "<script>alert('vui lòng điền hết chỗ trống')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image, './product_images/' . $news_product_image);



        //insert query
        $insert_news_product = "INSERT INTO `tbl_news_products` (
            news_product_title,
            news_product_description, 
            news_id,          
            news_product_image,
            news_product_people,
            date,
            status
            ) VALUE(
            '$news_product_title',
            '$news_product_description',   
            '$news_product_new',
            '$news_product_image',
            '$news_product_people',
            NOW(),
            '$news_date'
            '$news_product_status'

        )";
        $result_query = mysqli_query($connect, $insert_news_product);
        if ($result_query) {
            echo "<script>alert('thêm sản phẩm thành công')</script>";
        }
    }
    header('Location:insert_news_product.php');
}


//Xóa
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $id = $_GET["news_id"];
    $sql_delete = "DELETE from tbl_news_products where news_id=" . $id;
    if (mysqli_query($connect, $sql_delete)) {
        echo "Xóa thành công";
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($connect);
    }
}
//delete check
if (isset($_POST["delete_check"])) {
    if (isset($_POST["news"])) {
        $news = $_POST["news"];
        foreach ($news as $c) {
            echo $c;
            $sql_delete = "DELETE from tbl_news_products where news_id=" . $c;
            if (mysqli_query($connect, $sql_delete)) {
                echo "Xóa thành công";
            } else {
                echo "Error:" . $sql . "<br>" . mysqli_error($connect);
            }
        }
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_news_product</title>
    <link rel="stylesheet" href="../04_Nguyễn Huy Hoàng Phúc/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/04_Nguyễn Huy Hoàng Phúc/css/style.css"> -->

</head>

<body>
    <div class="news-product">
        <div class="container-product">
            <h1 style="text-align: center;">Tin mới cập nhật</h1>
            <div class="row">

                <div class="col-12">
                    <form action="insert_news_product.php" method="post" enctype="multipart/form-data">
                        Nhập vào tên news_product_title:
                        <input class="form-control" type="text" name="news_product_title" id="">
                        <br>
                        Nhập vào news_product_description:
                        <input class="form-control" type="text" name="news_product_description" id="">
                        <br>
                        <div>
                            Chọn danh mục:
                            <select name="news_product_new" id="" class="form-select">
                                <?php
                                $select_query = "SELECT * FROM `tbl_news`";
                                echo $select_query;
                                $result_query = mysqli_query($connect, $select_query);
                                var_dump($result_query);
                                while ($row = mysqli_fetch_assoc($result_query)) {
                                    $news_title = $row['news_title'];
                                    $news_id = $row['news_id'];
                                    echo "<option value ='$news_id'>$news_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        Nhập vào tên người đăng:
                        <input class="form-control" type="text" name="news_product_people" id="">
                        <br>
                        Chọn ngày đăng
                        <input class="form-control" type="date" name="date_time">
                        <br>

                        Nhập vào trạng thái danh mục tin tức:
                        <input class="form-control" type="text" name="txt_status" id="">
                        <br>
                        <!-- img -->

                        <label for="news_product_image" class="form-label">chọn news_product_image</label>
                        <input type="file" name="news_product_image" id="news_product_image" class="form-control" required="required">
                        <br>
                        <!--  -->
                        <input type="submit" name="insert_news_product" id="" class="btn btn-info mb-3 px-3" value="Insert news_product">



                    </form>

                </div>
            </div>
            <div class="row">

                <div class="col_12">
                    <table class="table table-stripped">
                        <tr>
                            <!-- <th>Mã tin tức</th> -->
                            <th>Mã danh mục</th>
                            <th>Title</th>
                            <th>description</th>


                            <th>Ảnh</th>
                            <th>Người đăng</th>
                            <th>Ngày đăng</th>

                            <th>Trạng thái dm tin tức</th>
                            <th>Thao tác</th>
                            <th></th>
                        </tr>

                        <tr>
                            <?php
                            $sql_query = "SELECT * from tbl_news_products";
                            $result_query = mysqli_query($connect, $sql_query);
                            if (mysqli_num_rows($result_query) > 0) {
                                while ($row = mysqli_fetch_assoc($result_query)) {

                                    echo "<tr>";
                                    echo "<td>" . $row["news_id"] . "</td>";
                                    echo "<td>" . $row["news_product_title"] . "</td>";
                                    echo "<td>" . $row["news_product_description"] . "</td>";


                                    echo "<td><img style='width:100px;' src='product_images/" . $row['news_product_image'] . "'></td>";
                                    echo "<td>" . $row["news_product_people"] . "</td>";
                                    echo "<td>" . $row["date"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td>" . "<a href='insert_news_product.php?task=delete&news_id=" . $row['news_id']
                                        . "' class='btn btn-warning'>xoá</a>" . "</td>";
                                    // echo "<td>" . "<a class='btn btn-info'>sửa</a>" . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "lỗi rồi bà";
                            }

                            ?>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>