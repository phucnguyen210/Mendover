<?php
include("../config/config.php");
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_category = $_POST['product_category'];
    $product_price_new = $_POST['product_price_new'];
    $product_price_old = $_POST['product_price_old'];
    $product_status = "true";

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    if (
        $product_title == '' or
        $description == ''  or
        $product_category == '' or
        $product_price_new == '' or
        $product_price_old == '' or
        $product_image1 == '' or
        $product_image2 == ''
    ) {
        echo "<script>alert('vui lòng điền hết chỗ trống')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, './product_images/' . $product_image1);
        move_uploaded_file($temp_image2, './product_images/' . $product_image2);

        //insert query
        $insert_product = "INSERT INTO `tbl_products` (
            product_title,
            product_description,
            product_price_new,
            product_price_old,
            category_id,
            product_image1,
            product_image2,
            date,
            status
            ) VALUE(
            '$product_title',
            '$description',
            '$product_price_new',
            '$product_price_old',
            '$product_category',
            '$product_image1',
            '$product_image2',
            NOW(),
            '$product_status'

        )";
        $result_query = mysqli_query($connect, $insert_product);
        if ($result_query) {
            echo "<script>alert('thêm sản phẩm thành công')</script>";
        }
    }
    header('Location:insert_products.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="bg-light">
        <div class="container mt-3">
            <h1 class="text-center">Insert Products</h1>
            <!-- form -->
            <!-- enctype="multipart/form-data" dùng để chèn ảnh vào kh có k thể chèn -->
            <form action="insert_products.php" method="post" enctype="multipart/form-data">
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
                </div>
                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">Product description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
                </div>


                <!-- cateogries -->
                <div class="form-outline mb-4 w-50 m-auto">
                    Chọn danh mục
                    <select name="product_category" id="" class="form-select">
                        <!-- <option value="">Chọn danh mục
                            <col> -->
                        </option>
                        <?php
                        $select_query = "SELECT * FROM `tbl_categories`";
                        $result_query = mysqli_query($connect, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>

                    </select>
                </div>

                <!-- image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>
                <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                </div>

                <!-- Price new -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price_new" class="form-label">Product price new</label>
                    <input type="text" name="product_price_new" id="product_price_new" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
                </div>
                <!-- Price old-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price_old" class="form-label">Product price old</label>
                    <input type="text" name="product_price_old" id="product_price_old" class="form-control" placeholder="Enter product price">
                </div>
                <!-- insert product -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" id="" class="btn btn-info mb-3 px-3" value="Insert Product">
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>