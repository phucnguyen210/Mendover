<?php
include("../config/config.php");
if (isset($_POST['insert_category'])) {
    $category_title = $_POST['cate_title'];

    //lấy dữ liệu từ database
    $select_query = "SELECT * FROM `tbl_categories` WHERE category_title='$category_title'";
    $result_select = mysqli_query($connect, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('danh mục này đã có trong dữ liệu')</script>";
    } else {
        $insert_query = "INSERT INTO `tbl_categories` (category_title) VALUE ('$category_title')";
        $result = mysqli_query($connect, $insert_query);
        if ($result) {
            echo "<script>alert('Đã thêm danh mục thành công')</script>";
        }
    }
    header('Location:insert_category_products.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>


    <h2 class="text-center">Insert Categories</h2>
    <form action="" method="post" class="mb-2">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cate_title" placeholder="Insert categories"
                aria-label="Categories" aria-describedby="basic-addon1" autofocus>
        </div>
        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_category" value="Insert Categories">
        </div>
    </form>


    <h2>hiển thị danh mục</h2>
    <div class="view_category">
        <div class="row">
            <div class="col-12">
                <table class="table table-stripped">
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                        <th></th>
                        <th>lựa chọn</th>
                    </tr>
                    <tr>
                        <form action="category.php" method="post">
                            <input type="submit" value="xoa theo chon" name="delete_check" class="btn btn-info">
                            <br>
                            <input type="submit" value="xoa tat ca" name="delete_all" class="btn btn-danger  ">
                            <?php
                            $sql = "";
                            if (isset($_POST['btn_search'])) {
                                $search_txt = $_POST['search_txt'];
                                $sql = "SELECT * FROM tbl_category WHERE cate_name like '%" . $search_txt . "%'";
                            } else {
                                $sql = "SELECT * FROM tbl_category order by cate_id DESC";
                            }
                            $result_category = mysqli_query($connect, $sql);
                            if (mysqli_num_rows($result_category) > 0) {
                                while ($row = mysqli_fetch_assoc($result_category)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["cate_id"] . "</td>";
                                    echo "<td>" . $row["cate_name"] . "</td>";
                                    if ($row['status'] == 1) {
                                        echo "<td>" . 'Ẩn' . "</td>";
                                    } else {
                                        echo "<td>" . 'HIện' . "</td>";
                                    }
                                    echo "<td>" . "<a href='update.php?task=update&cate_id=" . $row['cate_id'] . "' class='btn btn-success'>Sửa</a>" . "</td>";
                                    echo "<td>" . "<a href='category.php?task=delete&cate_id=" . $row['cate_id']
                                        . "' class='btn btn-primary'>xoá</a>" . "</td>";
                                    echo "<td>" . " <input type='checkbox' name='remove[]' value='" . $row['cate_id'] . " '" . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "lỗi rồi bà";
                            } ?>

                        </form>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>