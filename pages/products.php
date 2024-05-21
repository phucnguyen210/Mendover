<?php
include("../function/common_function.php");
include("../config/config.php");
?>

<head>
    <meta charset="UTF-8">
    <meta info="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .product-price p {

        margin-right: -7px;

    }

    .hover-btn .nut_2 a:first-child {
        cursor: pointer;
        margin-left: 5px;
        padding: 10px 12px;
    }

    .hover-btn .nut_2 a:last-child {
        margin-left: 121px;
        padding: 10px 14px;
    }

    ul.sapxep-muangay li {
        list-style: none;
        padding: 10px;
    }


    .sapxep-muangay li a:hover {
        background-color: #bda87f;
        color: #fff;

    }



    ul.sapxep-muangay li a {

        padding: 10px 15px;
        background: #bda87f;
        color: #fff;
        /* float: left; */
        width: 100%;
        border: 2px solid #bda87f;
        text-transform: uppercase;
        text-decoration: none;

    }
</style>
<script>
    // ajax option
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "products.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<body>
    <div class="main">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>
        <div class="banner-page-list">
            <div id="content">
                <div class="banner">
                    <h1>Sản phẩm</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Sản phẩm</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 20px;" class="menu-product">
            <div class="row container">
                <div style="padding-left: 0;" class="col col-one-four card-product-OneFour">
                    <ul class="list-item-product">
                        <li style="background-color: #363533; color: #fff; display: flex;">
                            <i style=" margin-right: 2px; margin-top: 3px;" class="fa-solid fa-bars"></i>
                            <h3>Danh mục sản phẩm</h3>
                        </li>
                        <?php
                        // in ra danh mục sản phẩm
                        categories();
                        ?>
                    </ul>
                    <h3 style="margin: 25px 0;">Sản phẩm bán chạy</h3>
                    <div style="margin-top: 10px; " class="row">
                        <?php
                        // in ra sản phẩm bán chạy
                        hot_product();
                        ?>
                    </div>
                    <div class="row">
                        <img src="images/section/" alt="">
                    </div>
                </div>
                <div class="col col-third-four">
                    <div style="margin-bottom: 50px;" class="row all-product-area">
                        <ul class="box-tool">
                            <li>
                                <p>Sắp xếp: </p>
                            </li>
                            <li>
                                <select style="" class="form-control" name="sapxep" id="sapxep" onchange="showUser(this.value)">
                                    <a href="index.php">
                                        <option value="mac-dinh">Mặc định</option>
                                    </a>
                                    <a href="index.php">

                                        <option value="">Từ A -> Z</option>
                                    </a>
                                    <option value="">Từ X -> Z</option>
                                    <option value="">Giá tăng dần</option>
                                    <option value="">Giá giảm dần</option>
                                    <option value="">Hàng mới nhất</option>
                                    <option value="">Hàng cũ nhất</option>
                                </select>
                            </li>
                        </ul>
                        <ul class="view-mode">
                            <form action="" method="post">
                                <li>
                                    <button id="grid"><i class="fa-solid fa-bars"></i></button>
                                </li>
                                <li>
                                    <button id="list"><i class="fa-solid fa-grip"></i>
                                        <!-- <input type="submit" name="list" id=""> -->
                                    </button>
                                </li>

                            </form>
                        </ul>
                    </div>
                    <div class="row" id="txtHint">

                        <?php
                        // in ra tất cả sản phẩm có phân trang
                        get_all_product();
                        // gọi hàm nhấn vào danh mục sản phẩm thì ra danh mục đó
                        get_unique_categories();
                        ?>
                    </div>
                </div>

                <div class="row trang">
                    <ul>
                        <?php

                        $sql_page = mysqli_query($connect, "SELECT * from tbl_products");
                        $row_count = mysqli_num_rows($sql_page);
                        $page = ceil($row_count / 9);
                        for ($i = 1; $i <= $page; $i++) {
                            echo "
                            <li style='margin-top:40px;'>
                                <a href='Products.php?page=$i'>$i</a>
                            </li>
                            ";
                        }
                        ?>

                    </ul>
                </div>

            </div>
        </div>
        <div class="footer">
            <?php
            include("../config/footer.php");
            ?>
        </div>
        <!----------------- nút hiện lên thanh toán ------------------->
        <div class="noti-body-cart modal js-modal">
            <div class="modal-container js-modal-container">
                <div class="noti-add-cart">
                    <div class="noti-add-header">
                        <div class="noti-add-header-check">
                            <span>
                                <i class="fa-solid fa-check "></i>
                            </span>
                        </div>
                        <div class="noti-add-header-content">
                            <h4 style="color:white; font-size: 18px; font-weight: 400; padding-right: 252px;font-family: Arial, Helvetica, sans-serif;">
                                Thêm vào giỏ hàng thành công</h4>
                        </div>
                        <div class="noti-add-header-cancel js-modal-close">
                            <a>
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    </div>
                    <div class="noti-add-body">
                        <div class="noti-add-img">
                            <img style="width: 70px; height: 50px;" src="./images/selling_product/product3.png" alt="">
                        </div>
                        <div class="noti-add-body-content">
                            <div style="margin-top: 15px;" class="noti-add-product">
                                <p style="margin-bottom: 10px; font-size: 16px;font-family: Arial, Helvetica, sans-serif;">
                                    Căn hộ 2PN tại Pearl Plaza</p>
                            </div>
                            <div class="noti-add-price">
                                <span style="font-size: 16px; color: red;font-family: Arial, Helvetica, sans-serif;">250.000.000
                                    đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="noti-add-btn">
                        <div class="noti-add-continue ">
                            <a style="cursor: pointer;" class="js-modal-continue">
                                Tiếp tục mua hàng
                            </a>
                        </div>
                        <div class="noti-add-pay">
                            <a href="thanhtoan.php">
                                Tiến hành thanh toán
                                <i style="margin-left: 8px; font-size: 10px;" class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //---------------------- mua ngay -----------------
            const buy_nows = document.querySelectorAll('.js-buy-now')
            const modal = document.querySelector('.js-modal')

            const modalclose = document.querySelector('.js-modal-close')
            const modalContinue = document.querySelector('.js-modal-continue')
            const modalContainer = document.querySelector('.js-modal-container')

            function hide_noti_cart() {
                modal.classList.remove('open')
            }

            function show_noti_cart() {
                modal.classList.add('open')
            }


            for (const buy_now of buy_nows) {
                buy_now.addEventListener('click', show_noti_cart)
            }

            modalclose.addEventListener('click', hide_noti_cart)
            modal.addEventListener('click', hide_noti_cart)
            modalContinue.addEventListener('click', hide_noti_cart)

            modalContainer.addEventListener('click', function(event) {
                event.stopPropagation()
            })
        </script>
    </div>
</body>

</html>