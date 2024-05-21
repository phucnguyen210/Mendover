<?php
include("../function/common_function.php");
include("../config/config.php");
?>

<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Giỏ hàng</title>
</head>

<body>
    <div style="display: flow-root;" class="head_body">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>

        <div style="display: block;" class="cart-body">
            <div class="banner-page-list">
                <div id="content">
                    <div class="banner">
                        <h1>Giỏ hàng</h1>
                    </div>
                </div>
                <div class="bread">
                    <div class="container container_bread">
                        <ul>
                            <li>
                                <a href="index.php">Trang chủ</a>
                            </li>
                            <li>
                                <strong>Giỏ hàng</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="cart-main">
                <div class="cart-main__hidden">
                    <div style="margin: 0 70px;" class="cart-main_product container">
                        <div class="cart-main_head">
                            <div style="width: 17% ;">Hình ảnh</div>
                            <div style="width: 33% ;">
                                <span>Thông tin sản phẩm</span>
                            </div>
                            <div style="width: 15% ;" class="a-center">
                                <span>Đơn giá</span>
                            </div>
                            <div style="width: 14% ;" class="a-center">Số lượng</div>
                            <div style="width: 15% ;" class="a-center">Thành tiền</div>
                            <div style="width: 6% ;" class="a-center">Xoá</div>
                        </div>
                        <div class="cart-main_body">
                            <!-- từ đây -->
                            <?php
                            $get_ip_add = getIPAddress();
                            $total_price = 0;
                            $cart_query = "SELECT * FROM `tbl_cart_details` where ip_address='$get_ip_add'";
                            $result = mysqli_query($connect, $cart_query);
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_product = "SELECT * FROM `tbl_products` where product_id='$product_id'";
                                $result_products = mysqli_query($connect, $select_product);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price_new']);
                                    $price_table = $row_product_price['product_price_new'];
                                    $product_price_new = number_format($row_product_price['product_price_new'], 0, ',', '.');

                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;
                                    $total_price_in = number_format($total_price, 0, ',', '.');
                            ?>
                            <form action='cart.php' method='post'>
                                <div class='cart-item'>
                                    <div style='width: 17% ;' class='image'>
                                        <a href='' class='product-img'>
                                            <img width='75px' height='auto' alt=''
                                                src='../admin/product_images/<?php echo $product_image1 ?>' alt=''>
                                        </a>
                                    </div>
                                    <div style='width: 33% ;'>
                                        <h2 class='product-name'>
                                            <a href='#'><?php echo $product_title ?></a>
                                        </h2>
                                        <span class='variant-title' style='display: none;'>Default Title</span>
                                    </div>
                                    <div style='width: 15% ;' class='a-center'>
                                        <span class='item-price'>
                                            <span class='price'><?php echo $product_price_new ?></span>
                                        </span>
                                    </div>

                                    <div style='width: 14% ;' class='a-center'>
                                        <div class='input-number-pr'>

                                            <input type='text' placeholder="Nhập số lượng"
                                                value="<?php echo $row['quantity']; ?>" class='num-pro' name="quantity">
                                            <button style="cursor: pointer;" class='cart-btn-plus'
                                                name="update_quantity">
                                                <a href="">
                                                    <i class='fa-solid fa-caret-right'></i>
                                                </a>
                                            </button>

                                        </div>
                                    </div>

                                    <!-- cập nhật số lượng -->
                                    <?php
                                            $get_ip_add = getIPAddress();
                                            if (isset($_POST['update_quantity'])) {
                                                $quantities = $_POST['quantity'];
                                                $update_quantity = "UPDATE tbl_cart_details set quantity=$quantities where ip_address='$get_ip_add' ";
                                                $result_quantity = mysqli_query($connect, $update_quantity);
                                            }
                                            ?>
                                    <!-- xử lý cột sốt lượng -->
                                    <?php
                                            $get_ip_add = getIPAddress();
                                            if (isset($_POST['update'])) {
                                                $quantities = $_POST['quantity'];
                                                $update_cart = "UPDATE `tbl_cart_details` set quantity = $quantities where ip_address='$get_ip_add'";
                                                $result_products_quantity = mysqli_query($connect, $update_cart);
                                                $total_price = $total_price * $quantities;
                                                $total_price_in = number_format($total_price, 0, ',', '.');
                                            }
                                            ?>
                                    <!-- thành tiền  -->
                                    <div style='width: 15% ;' class='a-center'>
                                        <span class='item-price'>
                                            <span class='price price-change'><?php echo $product_price_new ?></span>
                                        </span>
                                    </div>
                                    <div style='width: 6% ;' class='a-center'>
                                        <?php
                                                echo "<a href='cart.php?product_id=$product_id'
                                        class='cart-remove-pr'>
                                        <i class='fa-solid fa-trash-can'></i>
                                        </a>";
                                                if (isset($_GET['product_id'])) {
                                                    $product_id = $_GET['product_id'];
                                                    $sql_delete = "DELETE from `tbl_cart_details` WHERE product_id=$product_id";
                                                    if (mysqli_query($connect, $sql_delete)) {
                                                        echo "<script>window.open('cart.php','_self')</script>";
                                                        // header("location:pages/cart.php");
                                                    }
                                                }
                                                ?>
                                    </div>
                                </div>
                            </form>
                            <?php
                                }
                            }
                            ?>
                            <!-- đến đây -->
                        </div>
                        <div class="cart-main_pay">
                            <div class="cart-total">
                                <div class="cart-inner">
                                    <div class="pay-price">
                                        <h1 class="pay-a">Tổng tiền thanh toán</h1>
                                        <h1 class="pay-num"><?php
                                                            if ($total_price == 0) {
                                                                echo "0đ";
                                                            } else {

                                                                echo $total_price_in;
                                                            }
                                                            ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="pay-checkout">
                                <div class="pay-btn">
                                    <button>
                                        <a style="text-decoration: none; color:#fff; padding: 15px;"
                                            href="../user_area/payment.php?checkout">Thanh toán</a>
                                    </button>
                                    <!-- <form action="cart.php" method="post">

                                        <input type="submit" name="payment" value="Thanh toán" id="">
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php
        include("../config/footer.php");

        ?>

    </footer>
</body>

</html>