<?php
include("dbheper.php");

session_start(); // Bắt đầu phiên làm việc


if (isset($_POST['username']) and ($_SERVER["REQUEST_METHOD"] == "POST")) {



    $username = $_POST["username"];
    $password = $_POST["password"];


    // Truy vấn thông tin người dùng
    $sql = "SELECT * FROM taikhoan  WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Kiểm tra mật khẩu
        if ($password == $hashedPassword) {
            // Đăng nhập thành công
            $_SESSION["hoten"] = $row['hoten'];
            $_SESSION["MaNguoiDung"] = $row['id'];


            echo "<script>alert('Đăng nhập thành công');</script>";
            echo "<script>window.location.href = 'TrangChu.php';</script>";
            // Chuyển hướng đến trang chủ hoặc trang quản lý

            exit;
        } else {
            // Đăng nhập thất bại
            echo "<script>alert('Mật khẩu không đúng');</script>";
        }
    } else {
        // Đăng nhập thất bại
        echo "<script>alert('Tên đăng nhập không đúng');</script>";
    }
}

if (isset($_GET['xuat'])) {
    session_destroy();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- css files -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/Login.css" rel="stylesheet" type="text/css" media="all" />
    <!-- /css files -->
</head>

<body>
    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <h1>Cửa hàng sách Phúc</h1>
                <div class="main-agileits">
                    <!--form-stars-here-->
                    <div class="form-w3-agile">
                        <h2>Đăng Nhập Tài Khoản</h2>
                        <form action="" method="post">
                            <div class="form-sub-w3">
                                <input type="text" name="username" placeholder="Tên đăng nhập" required="" />
                                <div class="icon-w3">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="form-sub-w3">
                                <input type="password" name="password" placeholder="Mật khẩu" required="" />
                                <div class="icon-w3">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </div>
                            </div>

                            <?php if (!empty($error_message)) : ?>
                                <p class="error"><?php echo $error_message; ?></p>
                            <?php endif; ?>

                            <div class="clear"></div>
                            <div class="submit-w3l">
                                <input type="submit" value="Đăng Nhập">
                            </div>
                        </form>
                        <p class="p-bottom-w3ls1">Bạn chưa có tài khoản?<a class href="DangKy.php"> Đăng ký</a></p>
                        <div class="clear"></div>

                        <div class="social w3layouts">
                            <div class="heading">
                                <h5>Đăng nhập với</h5>
                                <div class="clear"></div>
                            </div>
                            <div class="icons">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="copyright w3-agile">
                    <p>Công ty trách nhiệm hữu hạn Bảo Phúc</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>