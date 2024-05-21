<?php
include("../function/common_function.php");
include("../config/config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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
                    <h1>Căn hộ 2PN tại Pearl Plaza</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Giới thiệu</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="detailinfo">
            <?php
            get_product_detail();
            ?>
            <div class="sub-detail">
                <div class="next-btn">
                    <button onclick="myFunction()" class="in4">THÔNG TIN SẢN PHẨM</button>
                    <button class="in4">GIỚI THIỆU</button>
                    <button class="in4">TAGS</button>
                </div>
                <hr width="50%" size="4px" color="#bda87f" />
                <div id="myDIV">
                    <p>Căn hộ 2PN Pearl Plaza mang đến một không gian sống hoàn hảo với sự đầu tư vượt trội về tiện ích,
                        sự đột phá trong thiết kế và tiện nghi phục vụ tối đa nhu cầu của cư dân, mang lại một không
                        gian sống thư giãn yên bình và ngập tràn hạnh phúc.</p>
                    <p>✓ Diện tích: 101m²</p>
                    <p>✓ Giá cho thuê: 1600 usd/tháng (bao gồm phí quản lý)</p>
                    <p>✓ Nội thất: đầy đủ, mới - đẹp - sang trọng - hiện đại - được chăm chút từng chi tiết</p>
                    <p>✓ Bố cục căn hộ: 02PN + 02WC + BẾP + PHÒNG KHÁCH</p>
                    <h4>Khu Căn Hộ Pearl Plaza (Apartment) khép kín, an ninh tuyệt đối, camera lắp đặt toàn khu</h4>
                    <p>- Phòng tập Gym & spa.</p>
                    <p>- Siêu thị tại Trung Tâm Thương Mại (Shopping Mall) ngay bên dưới khu căn hộ</p>
                    <p>- Khu coffee cao cấp. Công viên cây xanh và đường chạy bộ</p>
                    <p>- Nhà trẻ, khu vui chơi trẻ em</p>
                    <p>- Trung tâm y tế, dịch vụ chăm sóc sức khỏe.</p>
                    <p>- Hệ thống quản lý hiện đại, kết hợp với đội ngũ bảo an 24/24.</p>
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



    <script>
        let amountElement = document.getElementById('amount');
        let amount = amountElement.value;
        let render = (amount) => {
            amountElement.value = amount
        }
        let handlePlus = () => {
            amount++
            render(amount);
        }
        let handleMinus = () => {
            if (amount > 1)
                amount--;
            render(amount);
        }

        amountElement.addEventListener('input', () => {
            amount = amountElement.value;
            amount = parseInt(amount);
            amount = (isNaN(amount) || amount == 0) ? 1 : amount;
            render(amount);
            console.log(amount);
        });

        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

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
</body>

</html>