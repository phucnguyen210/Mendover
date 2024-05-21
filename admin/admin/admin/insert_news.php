<?php
include("../config/config.php");
if (isset($_POST['insert_news'])) {
    $news_title = $_POST['news_title'];

    //lấy dữ liệu từ database
    $select_query = "SELECT * FROM `tbl_news` WHERE news_title='$news_title'";
    $result_select = mysqli_query($connect, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('danh mục này đã có trong dữ liệu')</script>";
    } else {
        $insert_query = "INSERT INTO `tbl_news` (news_title) VALUE ('$news_title')";
        $result = mysqli_query($connect, $insert_query);
        if ($result) {
            echo "<script>alert('Đã thêm danh mục thành công')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert News</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="news_title" placeholder="Insert News" aria-label="News" aria-describedby="basic-addon1" autofocus>
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_news" value="Insert News">
    </div>
</form>