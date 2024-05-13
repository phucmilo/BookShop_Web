<?php

include("dbheper.php");
session_start(); // Bắt đầu phiên làm việc

$sqlsachnoibat = "Select * from sach where trangthai=1 limit 0,4";
$kqsachnoibat = executeResult($sqlsachnoibat);


$sqlsachquantam = "Select * from sach where trangthai=2 limit 0,10";
$kqsachquantam = executeResult($sqlsachquantam);

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
                            <?php if (isset($_SESSION['hoten'])) { ?>
                                <li class="navbar-item">
                                    <a href="DangNhap.php?xuat" class="nav-link"><?= $_SESSION['hoten'] ?></a>
                                </li>

                            <?php } else { ?>
                                <li class="navbar-item">
                                    <a href="DangNhap.php" class="nav-link">Đăng nhập</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="cart my-2 my-lg-0">
                            <a href="giohang.php">
                                <span>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                <span class="quntity"><?= $total_items_in_cart ?></span>
                            </a>
                        </div>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                            <span class="fa fa-search"></span>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section class="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 anhQuangCao1">

                </div>
                <div class="col-sm-10">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="slide">
                                <img src="images/slide1.jpg" alt="slide1">
                                <div class="content">
                                    <div class="title">
                                        <h3>Chào mừng bạn đến với cửa hàng sách Phúc </h3>
                                        <h5>Nơi thỏa mãn đam mê đọc sách của mọi người</h5>
                                        <a href="DanhMucSanPham.php" class="btn">Sách Hay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide">
                                <img src="images/slide2.jpg" alt="slide1">
                                <div class="content">
                                    <div class="title">
                                        <h3>Chào mừng bạn đến với cửa hàng sách Phúc </h3>
                                        <h5>Nơi thỏa mãn đam mê đọc sách của mọi người</h5>
                                        <a href="DanhMucSanPham.php" class="btn">Sách Hay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide">
                                <img src="images/slide3.jpg" alt="slide1">
                                <div class="content">
                                    <div class="title">
                                        <h3>Chào mừng bạn đến với cửa hàng sách Phúc </h3>
                                        <h5>Nơi thỏa mãn đam mê đọc sách của mọi người</h5>
                                        <a href="DanhMucSanPham.php" class="btn">Sách Hay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide">
                                <img src="images/slide4.jpg" alt="slide1">
                                <div class="content">
                                    <div class="title">
                                        <h3>Chào mừng bạn đến với cửa hàng sách Phúc </h3>
                                        <h5>Nơi thỏa mãn đam mê đọc sách của mọi người</h5>
                                        <a href="DanhMucSanPham.php" class="btn">Sách Hay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 anhQuangCao2">

                </div>
            </div>
        </div>
    </section>
    <hr />
    <section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>sách nổi bật</h2>
                <hr>
            </div>
            <div class="row">

                <?php foreach ($kqsachnoibat as $rowsachnoibat) { ?>
                    <div class="col-lg-3 col-md-12">
                        <div class="item">
                            <img src="<?= $rowsachnoibat['anh1'] ?>" alt="img">
                            <h3><?= $rowsachnoibat['tensach'] ?></h3>
                            <h6><span class="price"><?= $rowsachnoibat['giaban'] ?></span> / <a href="ChiTietSP.php?id=<?= $rowsachnoibat['masach'] ?>">Mua</a></h6>
                            <div class="hover">
                                <a href="ChiTietSP.php?id=<?= $rowsachnoibat['masach'] ?>">
                                    <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
            <div class="btn-sec butXemNB">
                <a href="DanhMucSanPham.php" class="btn butDanhMucSach">Xem Thêm</a>
            </div>
        </div>
    </section>
    <section>
        <div class="container anhGTTrangChu">
            <div class="row">
                <div class="col-sm-5">
                    <img src="images/slide4.jpg" style="width:100%" id="anhgioiThieuHome" />
                </div>
                <div class="col-sm-7">
                    <div class="gioiThieuBookStore">
                        <h2>Giới thiệu</h2>
                        <p>
                            Nhà sách Phúc là nhà sách Trực tuyến, đối tác chính thức của hơn 20 công ty, nhà phát hành sách hàng đầu Việt Nam: NXB Trẻ, NXB Kim Đồng, Nhã Nam, Alphabooks, First News,... với số lượng đầu sách đồ sộ được cập nhật liên tục hàng ngày. Ngoài mua
                            sách online tại ShopPhuc.com, bạn còn có rất nhiều lựa chọn quà tặng, văn phòng phẩm, đồ chơi, vật dụng gia đình, CD/DVD, công nghệ, thời trang với giá niêm yết luôn bằng hoặc thấp hơn giá thị trường giúp bạn tiết kiệm
                            rất nhiều thời gian mua sắm
                        </p>
                        <div class="btn-sec">
                            <a href="DanhMucSanPham.php" class="btn yellow">Sách hay</a>
                            <a href="TrangChu.php" class="btn black">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <br />
        </div>
    </section>
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>Có thể bạn quan tâm</h2>
                <hr>
            </div>
            <div class="row">

                <?php foreach ($kqsachquantam as $rowsachquantam) { ?>
                    <div class="col-lg-2 col-md-10">
                        <div class="item">
                            <img src="<?= $rowsachquantam['anh1'] ?>" alt="img">
                            <h3><a href="ChiTietSP.php?id=<?= $rowsachquantam['masach'] ?>"><?= $rowsachquantam['tensach'] ?></a></h3>
                            <h6><span class="price"><?= $rowsachquantam['giaban'] ?></span> / <a href="ChiTietSP.php?id=<?= $rowsachquantam['masach'] ?>">Mua</a></h6>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="btn-sec">
                <a href="DanhMucSanPham.php" class="btn butDanhMucSach">Xem Thêm</a>
            </div>
        </div>
    </section>

    <section class="testimonial-sec">
        <div class="container">
            <div id="testimonal" class="owl-carousel owl-theme">
                <div class="item">
                    <h3>Nếu bạn chỉ đọc những cuốn sách mà tất cả mọi người đều đọc, bạn chỉ có thể nghĩ tới điều tất cả mọi người đều nghĩ tới.</h3>
                    <div class="box-user">
                        <h4 class="author">SHaruki Murakami</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn.</h3>
                    <div class="box-user">
                        <h4 class="author">Barack Obama</h4>
                        <span class="country">USA</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Dù tôi không thể nhớ những cuốn sách tôi từng đọc cũng như những bữa tôi từng ăn, nhưng chúng đều làm nên con người tôi.</h3>
                    <div class="box-user">
                        <h4 class="author">Ralph Waldo Emesson</h4>
                        <span class="country">Germany</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Những quyển sách là những tấm gương: bạn chỉ nhìn thấy trong gương những gì bạn có bên trong bạn.</h3>
                    <div class="box-user">
                        <h4 class="author">Mahatma Gandhi</h4>
                        <span class="country">UK</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-quote">
            <img src="images/left-quote.png" alt="quote">
        </div>
        <div class="right-quote">
            <img src="images/right-quote.png" alt="quote">
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
                        <h6>Thị Trấn Nghèn, huyện Can Lộc, tỉnh Hà Tĩnh</h6>
                        <h6>Số điện thoại : 0866 959 757</h6>
                        <h6>Email : buitranbaophuc@gmail.com</h6>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="timing">
                        <br />
                        <br />
                        <h4>Giờ làm việc</h4>
                        <h6>Thứ hai - thứ sáu : 8:00 sáng đến 6:00 chiều</h6>
                        <h6>Thứ bảy : 9:00 sáng đến 12:00 trưa</h6>
                        <h6>Chủ nhật : Nghỉ</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="querry">
                        <br />
                        <br />
                        <h4>Hỏi đáp</h4>
                        <h6>Nếu có bất kỳ câu hỏi nào, xin hãy liên hệ với chúng tôi qua zalo bằng số điện thoại trên hoặc qua facebook <a href="https://www.facebook.com/Phuk.97">Bùi Trần Bảo Phúc</a>
 </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>© 2023. Bản quyền thuộc về Nhà sách Phúc </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>