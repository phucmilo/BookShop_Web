<?php
include("dbheper.php");



// Kiểm tra xem biểu mẫu đã được gửi hay chưa
if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ biểu mẫu đăng ký
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hoten = $_POST["hoten"];
    $diachi = $_POST["diachi"];
    $sodienthoai = $_POST["sodienthoai"];



    // Kiểm tra tên đăng nhập đã tồn tại trong cơ sở dữ liệu chưa
    $query = "SELECT * FROM taikhoan WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<script>alert('Tên đăng nhập đã có');</script>";
        echo "<script>window.location.href = 'DangKy.php';</script>";
    } else {


        // Chuẩn bị câu truy vấn để chèn dữ liệu vào bảng taikhoan
        $insert_query = "INSERT INTO taikhoan (username, password, hoten, diachi, sodienthoai) 
                         VALUES ('$username', '$password', '$hoten', '$diachi', '$sodienthoai')";

        // Thực thi câu truy vấn
        if ($conn->query($insert_query) === TRUE) {
            echo "<script>alert('Đăng ký thành công');</script>";
            echo "<script>window.location.href = 'DangNhap.php';</script>";
        } else {
            echo "<script>alert('Lỗi khi đăng ký');</script>";
        }
    }

    // Đóng kết nối
    $conn->close();
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- css files -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/Login.css" rel="stylesheet" type="text/css" media="all" />
    <style>
        .success {
            color: red;
        }
    </style>
    <!-- /css files -->
</head>

<body>
    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <h1>Cửa hàng sách Phúc</h1>
                <div class="main-agileits">
                    <!--form-stars-here-->
                    <div class="form-w3-agile dangky">
                        <h2>Đăng Ký Tài Khoản</h2>


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
                            <div class="form-sub-w3">
                                <input type="text" name="hoten" placeholder="Họ và tên" required="" />
                                <div class="icon-w3">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                            </div>


                            <div class="form-sub-w3">
                                <input type="text" name="diachi" placeholder="Địa chỉ" required="" />
                                <div class="icon-w3">
                                    <i class="fa fa-address" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="form-sub-w3">
                                <input type="text" name="sodienthoai" placeholder="Số điện thoại" required="" />
                                <div class="icon-w3">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                            </div>


                            <p class="p-bottom-w3ls1">Bạn đã có tài khoản?<a class href="DangNhap.php"> Đăng nhập</a></p>
                            <div class="clear"></div>
                            <div class="submit-w3l">
                                <input type="submit" name="submit" value="Đăng Ký">
                            </div>
                        </form>
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