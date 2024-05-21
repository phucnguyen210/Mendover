<?php
include("../../../config/config.php");
session_start();
if (isset($_POST["login"])) {
  $user_name = $_POST["txt_username"];
  $password = $_POST["txt_password"];
  $sql = "SELECT * FROM `tbl_admin` where username = '" . $user_name . "'  and password = '" . $password . "'";
  $result = mysqli_query($connect, $sql);
  if (mysqli_num_rows($result) > 0) {
    // echo "xin chào ", $user_name;
    $_SESSION["user"] = $user_name;
    header("location:index_ex.php");
  } else {
    echo "Sai tên đăng nhập hoặc mật khẩu";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mendover</title>
  <link rel="stylesheet" href="Mendover-Admin/template/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="Mendover-Admin/template/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="Mendover-Admin/template/assets/css/style.css">
  <link rel="shortcut icon" href="Mendover-Admin/template/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">MENDOVER</h3>
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="login.php" method="post">
                <div class="form-group">
                  <label>Username or email *</label>
                  <input type="text" class="form-control p_input" name="txt_username" id="">
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" class="form-control p_input" name="txt_password" id="">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Remember me </label>
                  </div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <div class="d-flex">
                  <button class="btn btn-facebook mr-2 col">
                    <i class="mdi mdi-facebook"></i> Facebook </button>
                  <button class="btn btn-google col">
                    <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div>
                <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
</body>

</html>