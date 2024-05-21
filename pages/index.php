<?php
include("../function/common_function.php");
include("../config/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta info="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mendover</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="./04_Nguyễn Huy Hoàng Phúc/css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<style>
    .product-price p {
        margin-right: 10px;
    }

    .hover-btn .nut_2 a:first-child {
        cursor: pointer;
        margin-left: 7px;
    }

    .hover-btn .nut_2 a:last-child {
        margin-left: 170px;
        padding: 13px 35px;
    }
</style>

<body>
    <div id="main">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>


        <div id="slider container">
            <div class="w3-content">
                <img class="mySlides" src="../images/slider/slider1.jpg" style="width:100%">
                <img class="mySlides" src="../images/slider/slider2.jpg" style="width:100%">
                <img class="mySlides" src="../images/slider/slider3.jpg" style="width:100%">
            </div>

            <div class="w3-center">

                <button class="diamond-btn demo" onclick="currentDiv(1)">
                    <p>1</p>
                </button>
                <button class="diamond-btn demo" onclick="currentDiv(2)">
                    <p>2</p>
                </button>
                <button class="diamond-btn demo" onclick="currentDiv(3)">
                    <p>3</p>
                </button>
            </div>

        </div>

        <div id="content">
            <div class="section">
                <div class="section-1">
                    <div class="row container">
                        <div class="col col-third "><a href="">
                                <img src="../images/section/product-img-below-slide-1.png" alt="" class="product-img">
                            </a></div>
                        <div class="col col-third "><a href="">
                                <img src="../images/section/product-img-below-slide-3.png" alt="" class="product-img">
                            </a></div>
                        <div class="col col-third "><a href="">
                                <img src="../images/section/product-img-below-slide-3.png" alt="" class="product-img">
                            </a></div>
                    </div>
                </div>

                <!----------------------- sản phẩm bán chạy ---------------------->
                <div class="section-2">
                    <div class="section-title">
                        <h2>Sản phẩm bán chạy</h2>
                    </div>
                    <div class="row container">
                        <?php
                        // lấy ra tất cả sản phẩm
                        hot_product_index();
                        search_products();
                        ?>
                    </div>

                    <div class="item-more">
                        <a href="products.php" class="view-more">
                            <p>Xem thêm</p>
                        </a>
                    </div>
                </div>

                <div class="section-3">
                    <div class="container">
                        <div class="row about">
                            <div class="col col-third about-item">
                                <div class="diamond-btn">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="about-text">
                                    <div class="about-help">
                                        <p>MIỄN PHÍ VẬN CHUYỂN</p>
                                    </div>
                                    <div class="about-content">
                                        <p>Chúng tôi vận chuyển miễn phí với đơn hàng trên 1000.000 đ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-third about-item">
                                <div class="diamond-btn">
                                    <i class="fa-solid fa-gift"></i>
                                </div>
                                <div class="about-text">
                                    <div class="about-help">
                                        <p>KHUYẾN MẠI CUỐI TUẦN</p>
                                    </div>
                                    <div class="about-content">
                                        <p>Giảm giá tới 30% vào các ngày thứ 7 và chủ nhật hàng tuần</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-third about-item">
                                <div class="diamond-btn">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>
                                <div class="about-text">
                                    <div class="about-help">
                                        <p>HỖ TRỢ ĐỔI TRẢ</p>
                                    </div>
                                    <div class="about-content">
                                        <p>Hỗ trợ miễn phí đổi trả sản phẩm trong 30 ngày đầu tiên từ khi mua hàng</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------- sản phẩm nổi bật ---------------------->
                <div class="section-4">
                    <div class="section-title">
                        <h2>SẢN PHẨM NỔI BẬT</h2>
                    </div>
                    <div class="row container">
                        <div class="col col-one-third card-product-OneThird">
                            <ul class="list-item">
                                <li>
                                    <img style="background-color: #000;" src="../images/selling_product/icon-tower-1.png" alt="">
                                    Căn hộ cao cấp
                                </li>
                                <li>
                                    <i class="fa-regular fa-building"></i>
                                    Căn hộ chung cư
                                </li>
                                <li>
                                    <i class="fa-regular fa-building"></i>
                                    Căn hộ dự án nền
                                </li>
                                <li>
                                    <i class="fa-regular fa-building"></i>
                                    Văn phòng cao ốc
                                </li>
                                <li>
                                    <i class="fa-regular fa-building"></i>
                                    Nhà ở khu cao tầng
                                </li>
                                <li>
                                    <i class="fa-regular fa-building"></i>
                                    Nhà ở khu đô thị
                                </li>
                                <li>
                                    <i class="fa-regular fa-building"></i>
                                    Căn hộ khu nghỉ dưỡng
                                </li>
                            </ul>
                        </div>
                        <div class="col col-two-third card-product-TwoThird">
                            <div class="row">
                                <?php
                                get_product();
                                ?>
                            </div>

                        </div>

                        <!-------------------------- comment----------------------- -->
                    </div>
                </div>
                <!-- ------------------slide bình luận -------------------- -->
                <div class="section-5">
                    <div class="bg-ngoai">
                        <div class="slider-cmt-phu">
                            <div class="slider-list-cmt-phu">
                                <div class="slider-item-cmt-phu">
                                    <div class="phuSlides" style="width:1300px; align-items: center; justify-content: center;">
                                        <a href="">
                                            <img src="../images/avt/avt1.png" class="img-cmt-phu" alt="" style="border-radius: 50%;width: 150px;height: 150px;">
                                        </a>
                                        <p class="noidung-cmt-phu">Tôi rất hài lòng với dịch vụ chuyên nghiệp và chất
                                            lượng sản phẩm
                                            cũng như thái độ phục vụ của Mendover. <br>
                                            Chắc chắn rằng tôi sẽ quay lại đây nhiều lần nữa để mua hàng.</p>
                                        <p class="name-cmt-phu">Nguyễn Văn Phú</p>
                                        <p class="job-cmt-phu">Web designer</p>
                                    </div>
                                </div>
                                <div class="slider-item-cmt-phu">
                                    <div class="phuSlides" style="width:1300px;display: block; align-items: center; justify-content: center;">
                                        <a href="">
                                            <img src="../images/avt/avt_phuc.png " class=" img-cmt-phu" alt="" style="border-radius: 50%;width: 150px;height: 150px;">
                                        </a>
                                        <p class="noidung-cmt-phu">Tôi rất hài lòng với dịch vụ chuyên nghiệp và chất
                                            lượng sản phẩm
                                            cũng như thái độ phục vụ của Mendover. <br>
                                            Chắc chắn rằng tôi sẽ quay lại đây nhiều lần nữa để mua hàng.</p>
                                        <p class="name-cmt-phu">Nguyễn Huy Hoàng Phúc</p>
                                        <p class="job-cmt-phu">Full stack</p>
                                    </div>
                                </div>
                                <div class="slider-item-cmt-phu">
                                    <div class="phuSlides" style="width:1300px;display: block; align-items: center; justify-content: center;">
                                        <a href="">
                                            <img src="../images/avt/avt_hieu.png" class="img-cmt-phu" alt="" style="border-radius: 50%;width: 150px;height: 150px;">
                                        </a>
                                        <p class="noidung-cmt-phu">Tôi rất hài lòng với dịch vụ chuyên nghiệp và chất
                                            lượng sản phẩm
                                            cũng như thái độ phục vụ của Mendover. <br>
                                            Chắc chắn rằng tôi sẽ quay lại đây nhiều lần nữa để mua hàng.</p>
                                        <p class="name-cmt-phu">Nguyễn Minh hiếu</p>
                                        <p class="job-cmt-phu">Web designer</p>
                                    </div>
                                </div>
                                <div class="slider-item-cmt-phu">
                                    <div class="phuSlides" style="width:1300px;display: block; align-items: center; justify-content: center;">
                                        <a href="">
                                            <img src="../images/slider/slider1.png" class="img-cmt-phu" alt="" style="border-radius: 50%;width: 150px;height: 150px;">
                                        </a>
                                        <p class="noidung-cmt-phu">Tôi rất hài lòng với dịch vụ chuyên nghiệp và chất
                                            lượng sản phẩm
                                            cũng như thái độ phục vụ của Mendover. <br>
                                            Chắc chắn rằng tôi sẽ quay lại đây nhiều lần nữa để mua hàng.</p>
                                        <p class="name-cmt-phu">Lê Mai Chi</p>
                                        <p class="job-cmt-phu">Web designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-buttons-cmt-phu">
                                <div id="prev"></div>
                                <div id="next"></div>

                            </div>
                            <ul class="slider-dots-cmt-phu">
                                <li class="active-phu"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--------------------- sản phẩm khuyến mãi ---------------------------->
                <div class="section-6">
                    <div class="section-title">
                        <h2>Sản phẩm khuyến mãi</h2>
                    </div>
                    <div class="arrow-btn">
                        <div class="arrow-btn-left">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>
                        <div class="arrow-btn-right">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="row container flex-wrap">
                        <?php
                        promotion_product();
                        ?>
                    </div>
                </div>
            </div>
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
                            <img style="width: 70px; height: 50px;" src="../images/selling_product/product3.png" alt="">
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
        <!-- Modal HTML embedded directly into document -->
        <div id="ex1" class="modal">

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
                                <img style="width: 70px; height: 50px;" src="../images/selling_product/product3.png" alt="">
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
        </div>

        <!-- -------------------footer ----------- -->
        <div class="footer">
            <?php
            include("../config/footer.php");
            ?>
        </div>
    </div>

    <script src="../js/main.js">

    </script>
    <script>
        document.getElementById("js-buy-now").addEventListener("click", function() {
            // Hiển thị modal ở đây
            showModal();

            // Gửi yêu cầu AJAX
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Xử lý kết quả từ máy chủ
                    var response = this.responseText;
                    // Hiển thị kết quả trong modal hoặc nơi bạn muốn
                    displayResponseInModal(response);
                }
            };
            // Thực hiện yêu cầu AJAX đến file PHP hoặc URL bạn muốn
            xhttp.open("GET", "index.php", true);
            xhttp.send();
        });

        function showModal() {
            // Code để hiển thị modal ở đây
        }

        function displayResponseInModal(response) {
            // Hiển thị kết quả từ máy chủ trong modal ở đây
        }
    </script>

</body>

</html>