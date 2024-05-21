<?php
include("../config/config.php");
include("../function/common_function.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="./04_Nguyễn Huy Hoàng Phúc/css/style.css">
    <link rel="stylesheet" href="../04_Nguyễn Huy Hoàng Phúc/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    ul {
        list-style: none;
    }

    .user_info li {
        margin: 8px 0;
    }

    th {
        border: 1px solid #c1cdcd;
        background-color: #bda87f;
        color: #ffff;
        text-align: center;

    }

    td {
        padding: 0 30px;
        border: 1px solid #c1cdcd;
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
                    <h1>Trang Khách Hàng</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Trang khách hàng</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="display: flex;" class="container user_info">
            <?php
            // $select_query = " SELECT * from tbl_user ";
            // $result = mysqli_query($connect, $select_query);
            // while ($row = mysqli_fetch_assoc($result)) {
            //     $user_name = $row['user_name'];
            //     $user_email = $row['user_email'];
            //     $user_password = $row['user_password'];


            //     echo "
            // <ul>
            //     <li>
            //         <h2>Trang Tài Khoản</h2>
            //     </li>
            //     <li>xin chào: $user_name </li>
            //     <li>thông tin tài khoản</li>
            //     <li>địa chỉ</li>
            // </ul>
            // <ul style='margin-left: 50px;'>
            //     <li>
            //         <h2>Thông Tin Tài Khoản</h2>
            //     </li>
            //     <li>Họ Tên: $user_name</li>
            //     <li>Mail: $user_email</li>
            // </ul>
            // ";
            // }
            ?>
            <div class="row">

                <div class="col-3">
                    <ul>
                        <li>
                            <h2>Trang Tài Khoản</h2>
                        </li>
                        <li>xin chào </li>
                        <li><a href="user_profile.php">thông tin tài khoản</a></li>
                        <li><a href="user_order.php">Đơn hàng của bạn</a></li>
                        <li><a href="address.php">Địa chỉ</a></li>

                    </ul>
                </div>

                <div class="col-9">
                    <ul style="margin-left: 50px;">
                        <li>
                            <h2>Thông Tin Tài Khoản</h2>
                        </li>
                        <div class="thongtin_taikhoan">
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Đơn hàng</th>
                                        <th>Ngày</th>
                                        <th>Địa chỉ</th>
                                        <th>Giá trị đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        $username = $_SESSION['username'];

                                        $select_query = "SELECT * FROM tbl_user WHERE user_name='$username'";
                                        $result = mysqli_query($connect, $select_query);
                                        $row = mysqli_fetch_array($result);
                                        $user_address = $row['user_address'];
                                        if ($result) {
                                            $select_user_order = "SELECT * from tbl_user_orders";
                                            $result_user_order = mysqli_query($connect, $select_user_order);
                                            while ($rows = mysqli_fetch_array($result_user_order)) {
                                                $amount_due = $rows['amount_due'];
                                                $invoice_number = $rows['invoice_number'];
                                                $total_products = $rows['total_products'];
                                                $order_date = $rows['order_date'];
                                                echo "
                                                <tr>
                                                    <td>$invoice_number</td>
                                                    <td>$order_date</td>
                                                    <td>$user_address</td>
                                                    <td>$amount_due</td>
                                                </tr>
                                                ";
                                            }
                                        }
                                    }

                                    ?>
                                </tbody>
                                <!-- <tbody>
                                    <tr>
                                        <td>Alfreds Futterkiste</td>
                                        <td>Maria Anders</td>
                                        <td>Germany Germany Germany Germany Germany Germany Germany Germany </td>
                                        <td>Germany</td>
                                    </tr>
                                </tbody> -->
                            </table>
                        </div>

                    </ul>
                </div>

            </div>

        </div>
        <div id=" footer">
            <?php
            include("../config/footer.php");

            ?>
        </div>
    </div>

</body>

</html>