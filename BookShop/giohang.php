<?php
include("dbheper.php");
session_start(); // Bắt đầu phiên làm việc


// Đếm tổng số lượng các sản phẩm trong giỏ hàng
$total_items_in_cart = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $product_info) {
        $total_items_in_cart += $product_info['soluong'];
    }
}



if (isset($_POST['checkout'])) {
    if (!isset($_SESSION['MaNguoiDung'])) {
        echo "<script>alert('Đăng nhập để thanh toán');</script>";
        echo "<script>window.location.href = 'DangNhap.php';</script>";
        exit();
    }

    $id_taikhoan = $_SESSION['MaNguoiDung']; // Lấy ID tài khoản của người dùng từ session


    $ngaymua = date('Y-m-d H:i:s');
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $masach => $product) {
        $soluong = $product['soluong'];
        $dongia = $product['giaban'];
        $thanh_tien = $soluong * $dongia;
        $tongtien += $thanh_tien;
    }


    $sql_insert_hoadon = "INSERT INTO hoadon (id_taikhoan, ngaymua, tongtien, trangthai) VALUES ($id_taikhoan, '$ngaymua', $tongtien, 'Chưa xử lý')";
    $result_insert_hoadon = mysqli_query($conn, $sql_insert_hoadon);

    if ($result_insert_hoadon) {
        $mahoadon = mysqli_insert_id($conn); // Lấy mã hóa đơn vừa được thêm vào

        // Insert vào bảng chitiethoadon cho từng sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as $masach => $product) {
            $soluong = $product['soluong'];
            $dongia = $product['giaban'];
            $sql_insert_chitiethoadon = "INSERT INTO chitiethoadon (mahoadon, masach, soluong, dongia) VALUES ($mahoadon, '$masach', $soluong, $dongia)";
            mysqli_query($conn, $sql_insert_chitiethoadon);
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['cart']);

        echo "<script>alert('Đặt hàng thành công chờ xác nhận');</script>";
        echo "<script>window.location.href = 'TrangChu.php';</script>";
        exit();
    } else {
        // Xử lý khi không thể thêm hóa đơn vào CSDL
        echo "Đã xảy ra lỗi khi tạo hóa đơn.";
    }
}

?>



<!DOCTYPE php>

<html lang="en" xmlns="http://www.w3.org/1999/xphp">

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/YourStyle.css" />
    <link rel="stylesheet" href="css/myStyle.css" />
    <script src="js/jquery-1.11.1.min.js"></script>
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5"><a href="#" class="web-url">www.ShopPhuc.com</a></div>
                    <div class="col-md-4 tenShop">
                        <h5>Nhà sách Phúc</h5>
                    </div>
                    <div class="col-md-3">
                        <span class="ph-number">SĐT: 0866 959 757</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-item active">
                                <a href="TrangChu.php" class="nav-link">Trang chủ</a>
                            </li>
                            <li class="navbar-item">
                                <a href="DanhMucSanPham.php" class="nav-link">Danh mục sách</a>
                            </li>
                            <li class="navbar-item">
                                <a href="GioiThieu.php" class="nav-link">Thông tin</a>
                            </li>
                            <li class="navbar-item">
                                <a href="DangNhap.php" class="nav-link">Đăng nhập</a>
                            </li>
                        </ul>
                        <a href="giohang.php">
                            <div class="cart my-2 my-lg-0 menuGio">
                                <span>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </span>
                                <span class="quntity"><?= $total_items_in_cart ?></span>
                            </div>
                        </a>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                            <span class="fa fa-search"></span>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="content">
            <div class="section group">
                <h2 class="text-center">Giỏ hàng của bạn</h2>

                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr class="text-center" style="color: orange;">
                            <th style="width: 5%">Chọn</th>
                            <th style="width: 5%"></th>
                            <th style="width: 45%">Sản phẩm</th>
                            <th style="width: 8%">Đơn giá</th>
                            <th style="width: 9%">Số lượng</th>
                            <th style="width:20%"> Thành tiền</th>
                            <th style="width: 8%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        <div class="container">
                            <?php

                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                $tongtien1 = 0;
                                foreach ($_SESSION['cart'] as $key => $product) {

                                    $tongtien1 = $tongtien1 + $product['giaban'] * $product['soluong'];

                            ?>
                                    <tr class="text-center" style="color: black;">
                                        <td>
                                            <div>
                                                <input type="checkbox" checked>
                                            </div>
                                        </td>
                                        <td data-th="Product">
                                            <div class="col-img-prod">
                                                <img src="<?= $product['anh1'] ?>" alt="Ảnh sản phẩm 1" class="img-responsive" width="100">
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: left;">
                                                <a href="#"><?= $product['tensach'] ?></a>

                                            </div>
                                        </td>
                                        <td data-th="Price">
                                            <div> <?= number_format($product['giaban']) ?>đ</div>
                                        </td>
                                        <td data-th="Quantity">
                                            <div>
                                                <input class="form-control text-center" value="<?= $product['soluong'] ?>" type="number" style="width: 80px">
                                            </div>
                                        </td>
                                        <td data-th="Subtotal" style="color: red;"><?= number_format($product['giaban'] * $product['soluong']) ?>đ</td>
                                        <td class="actions" data-th>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>

                                    </tr>

                            <?php }
                             ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>
                                <a href="DanhMucSanPham.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                            </td>
                            <td colspan="2" class="hidden-xs"> </td>
                            <td class="hidden-xs text-center">
                                <strong>Tổng tiền</strong>
                            </td>
                            <td class="hidden-xs text-center">
                                <strong style="color: red;"><?php 
                                                               echo number_format($tongtien1);}
                                                            ?>đ</strong>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <button type="submit" name="checkout" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></button>

                                </form>



                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    </div>


    <footer>
        <div class="container footer-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="address1">
                        <br />
                        <br />
                        <h4>Địa chỉ</h4>
                        <h6>
                            Thị Trấn Nghèn, huyện Can Lộc, tỉnh Hà Tĩnh
                        </h6>
                        <h6>Số điện thoại : 0866 959 757</h6>
                        <h6>Email : buitranbaophuc@gmail.com</h6>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="navigation1">
                    <br />
                    <br />
                    <h4>Shop Phúc</h4>
                    <ul>
                        <li><a href="TrangChu.php">Trang chủ</a></li>
                        <li><a href="GioiThieu.php">Giới thiệu</a></li>
                        <li><a href="GiaoHang.php">Chính sách giao hàng</a></li>
                        <li><a href="DoiTra.php">Chinh sách đổi trả</a></li>
                        <li><a href="https://www.facebook.com/Phuk.97" target="_blank">Shop Phúc trên facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Công ty trách nhiệm hữu hạn Bảo Phúc</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><i class="fa fa-facebook-official"></i></span>
                            <span class="instagram"><i class="fa fa-instagram"></i></span>
                            <span class="twitter"><i class="fa fa-twitter"></i></span>
                            <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                            <span class="google"><i class="fa fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>