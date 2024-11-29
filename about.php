<?php 
$conn = new mysqli('localhost', 'root', '', 'food_db'); 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
$result = $conn->query("SELECT * FROM products"); 
session_start(); if (!isset($_SESSION['cart'])) { 
    $_SESSION['cart'] = []; 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán thức ăn</title>
    <link rel="stylesheet" href="css/about.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <a href="" class="logo"><img src="images/logo.png" alt=""></a>
            <div id="menu">
                <div class="item"><a href="index.php">Trang chủ</a></div>
                <div class="item"><a href="about.php">Giới thiệu</a></div>
                <div class="item"><a href="product.php">Sản phẩm</a></div>
                <div class="item"><a href="contact.php">Liên hệ</a></div>
            </div>
            <div id="actions">
                <div class="item"><a href="login1.php"><img src="images/user.png" alt=""></a></div>
                <div class="item"><a href="cart.php"><img src="images/grocery-store.png" alt=""></a></div>
            </div>
        </div>
    <div id="about-section">
        <div class="about-content">
            <div class="about-text">
                <h2>SỰ KIỆN RIÊNG TƯ</h2>
                <p>
                    Nâng tầm sự kiện của bạn với dịch vụ ăn uống riêng tư của chúng tôi, lý tưởng cho các cuộc họp doanh nghiệp và các dịp đặc biệt. Đầu bếp chuyên nghiệp của chúng tôi tạo ra các thực đơn tinh tế trong khi nhân viên tận tâm đảm bảo dịch vụ hoàn hảo. Đừng bỏ lỡ cơ hội tổ chức sự kiện khó quên của bạn với chúng tôi.
                </p>
            </div>
            <div class="about-image">
                <img src="https://statics.vincom.com.vn/xu-huong/anh_thumbnail/nha-hang-phap-1.jpg" alt="Bàn ăn">
            </div>
        </div>
    </div>
        <!-- About Section 1: Image Left, Text Right -->
        <div id="about-section-1" class="about-section">
            <div class="about-content">
                <div class="about-image">
                    <img src="https://vn.elgaucho.asia/_next/static/images/slider-catering-1-99b11ffc39d711dbf6c1e97463f9fbae.jpg" alt="Khu nấu ăn">
                </div>
                <div class="about-text">
                    <h2>Đầu bếp 5 Sao</h2>
                    <p>
                        Nâng tầm sự kiện của bạn với dịch vụ ăn uống riêng tư của chúng tôi, lý tưởng cho các cuộc họp doanh nghiệp và các dịp đặc biệt.Chúng tôi có những đầu bếp hàng đầu thế giới chế biến những món ăn cho quý khách.Tạo cho quý khách một trải nghiệm thú vị và thưởng thức những món ăn ngon với hương vị đỉnh cao nhất do chính những đầu bếp giàu kinh nghiệm của chúng tôi chế biến.Nhà hàng muốn cho quý khách một trải nhiệm khó quên
                    </p>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="box">
                <div class="logo"><img src="images/logo.png" alt=""></div>
                <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
            </div>
            <div class="box">
                <h3>NỘI DUNG</h3>
                <ul class="quick-menu">
                    <div class="item">
                        <a href="index.php">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="product.php">Sản phẩm</a>
                    </div>
                    <div class="item">
                        <a href="about.php">Giới thiệu </a>
                    </div>
                    <div class="item">
                        <a href="actions.php">Liên hệ</a>
                    </div>
                </ul>
            </div>
            <div class="box">
                <h3>LIÊN HỆ</h3>
                <p>Địa chỉ: 123 Đường Khúc Thừa Dụ, Quận Thủ Đức, TP. Hồ Chí Minh<br></p>
                <p>Thời gian làm việc: Thứ Hai - Chủ Nhật (8:00 - 22:00)</p>
                <p>Email: starfruit_weloveyou@sf6shop.com | Hotline: 1900-888-386</p>
                <p>© 2024 GOODFOOD. Được phát triển bởi đội ngũ SF6-Starfruit.</p> 
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
