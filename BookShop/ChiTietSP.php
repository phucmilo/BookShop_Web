<?php

include("dbheper.php");


// Bắt đầu session (nếu chưa có)
session_start();
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sqlsachchitiet = "Select * from sach where masach='$id'";
    $kqsachchitiet = executeResult($sqlsachchitiet);
}





// Kiểm tra nếu biểu mẫu thêm vào giỏ hàng đã được gửi
if (isset($_POST['add_to_cart'])) {
    $masach = $_POST['masach'];
    $tensach = $_POST['tensach'];
    $anh1 = $_POST['anh1'];
    $giaban = $_POST['giaban'];

    // Tạo giỏ hàng nếu chưa tồn tại
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    if (array_key_exists($masach, $_SESSION['cart'])) {
        // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên
        $_SESSION['cart'][$masach]['soluong'] += 1;
    } else {
        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào
        $_SESSION['cart'][$masach] = [
            'tensach' => $tensach,
            'anh1' => $anh1,
            'giaban' => $giaban,
            'soluong' => 1
            // Các thông tin sản phẩm khác có thể lưu vào session
        ];
    }

    // Chuyển hướng trở lại trang chủ sau khi thêm vào giỏ hàng
    header('Location: TrangChu.php');
    exit();
}


// Đếm tổng số lượng các sản phẩm trong giỏ hàng
$total_items_in_cart = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $product_info) {
        $total_items_in_cart += $product_info['soluong'];
    }
}




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="ChiTietSP.php03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/YourStyle.css" />
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5"><a href="TrangChu.php" class="web-url">www.ShopPhuc.com</a></div>
                    <div class="col-md-4 tenShop">
                        <h5>Nhà sách Phúc </h5>
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
                    <a class="navbar-brand" href="TrangChu.php"><img src="images/logo.png" alt="logo"></a>
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
                                <a href="ReviewSach.php" class="nav-link">Review sách</a>
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
    <section>
        <div class="contentChiTiet">
            <div class="container">
                <div class="row">
                    <div class="col-sm-1">

                    </div>
                    <div class="col-sm-10">
                        <div class="breadcrumb">
                            <div class="container">
                                <a class="breadcrumb-item" href="TrangChu.php">Shop Phúc </a>
                                <a class="breadcrumb-item" href="DanhMucSanPham.php">Sách tiếng việt</a>
                                <a class="breadcrumb-item" href="DanhSachSanPhamTheoDanhMuc.php">Sách lịch sử</a>
                                <span class="breadcrumb-item active">Thủ tướng Phạm Văn Đồng những chặng đường lịch sử</span>
                            </div>
                        </div>
                        <section class="product-sec">
                            <div class="container khungSPDon">
                                <h1><?= $kqsachchitiet[0]['tensach'] ?></h1>
                                <div class="row">
                                    <div class="col-md-7" style="text-align:justify">
                                        <div class="row singleProduct">
                                            <img src="<?= $kqsachchitiet[0]['anh1'] ?>" style="width:40%; height: 100%" class="anhMax" />
                                        </div>
                                        <div class="row">
                                            <img src="<?= $kqsachchitiet[0]['anh1'] ?>" style="width:15%" class="anhKemSP" />
                                            <img src="<?= $kqsachchitiet[0]['anh2'] ?>" style="width:15%" class="anhKemSP" />
                                            <img src="<?= $kqsachchitiet[0]['anh3'] ?>" style="width:15%" class="anhKemSP" />
                                            <img src="<?= $kqsachchitiet[0]['anh4'] ?>" style="width:15%" class="anhKemSP" />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3 slider-content ThongTinSP">
                                        <ul>
                                            <li>
                                                <span class="name">Giá thị trường</span><span class="clm">:</span>
                                                <span class="price"><?= $kqsachchitiet[0]['giathitruong'] ?> đồng</span>
                                            </li>
                                            <li>
                                                <span class="name">Giá bán</span><span class="clm">:</span>
                                                <span class="price final"><?= $kqsachchitiet[0]['giaban'] ?> đồng</span>
                                            </li>
                                            <li><span class="save-cost">Tiết kiệm <?= number_format($kqsachchitiet[0]['giathitruong'] - $kqsachchitiet[0]['giaban']) ?> đồng (69%)</span></li>
                                            <li>
                                                <span class="name">Số lượng:</span>
                                                <input class="form-control text-center" value="1" type="number" style="width: 80px">
                                            </li>
                                        </ul>
                                        <div class="btn-sec">
                                            <form method="post" action="">
                                                <input type="hidden" name="masach" value="<?= $kqsachchitiet[0]['masach'] ?>">
                                                <input type="hidden" name="tensach" value="<?= $kqsachchitiet[0]['tensach'] ?>">
                                                <input type="hidden" name="anh1" value="<?= $kqsachchitiet[0]['anh1'] ?>">
                                                <input type="hidden" name="giaban" value="<?= $kqsachchitiet[0]['giaban'] ?>">


                                                <input class="btn butThemVaoGioHang" type="submit" name="add_to_cart" value="Thêm vào giỏ hàng">
                                            </form>




                                            <div id="snackbar">Bạn đã thêm vào giỏ hàng thành công</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="related-books">
                            <div class="container">
                                <div class="titleChiTietSP">
                                    <h2>Có Thể Bạn Thích</h2>
                                </div>
                                <div class="recomended-sec a">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/AnhSanPham12676691594b8f18a789858.495x717.w.b.jpg" />
                                                <h3>Sách ABCDE</h3>
                                                <h6><span class="price">49.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/AnhSanPham1115010237281.jpg" />
                                                <h3>Sách ABCDE</h3>
                                                <h6><span class="price">19.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <span class="sale">Giảm giá!</span>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/AnhSanPham1115010237267.jpg" />
                                                <h3>Sách ABCDE</h3>
                                                <h6><span class="price">49.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/AnhSanPham1109060251335.jpg" />
                                                <h3>Sách ABCDE</h3>
                                                <h6><span class="price">39.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/AnhSanPham1105010122052.jpg" />
                                                <h3>Sách ABCDE</h3>
                                                <h6><span class="price">29.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/anh1_3.jpg" alt="img">
                                                <h3>Sach ABCDE</h3>
                                                <h6><span class="price">38.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <span class="sale">Giảm giá</span>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/anh1_2.jpg" alt="img">
                                                <h3>Sách ABCDE</h3>
                                                <h6><span class="price">49.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="item">
                                                <img src="images/anh1.jpg" alt="img">
                                                <h3>Sách ABCDE</h3>
                                                <h6><span class="price">49.000</span> / <a href="ChiTietSP.php">Mua ngay</a></h6>
                                                <div class="hover">
                                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttonXemThem">
                                        <a href="DanhMucSanPham.php"><button class="btn btn-info-orange">Xem Thêm</button></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-sm-1">

                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <div class="col-md-4">
                    <div class="timing">
                        <br />
                        <br />
                        <h4>Thời gian mở cửa</h4>
                        <pre>Thứ 2 - Thứ 6: 7h - 10h</pre>
                        <pre>​​Thứ 7:         8h - 10h</pre>
                        <pre>​Chủ nhật:      8h - 11h</pre>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="navigation1">
                        <br />
                        <br />
                        <h4>Shop Phúc </h4>
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
    <script type="text/javascript">
        $(".anhKemSP").hover(function() {
            var srcAnhNho = $(this).attr('src')
            $(".anhMax").attr('src', srcAnhNho)
        })

        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>
</body>

</html>