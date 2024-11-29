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
    <link rel="stylesheet" href="css/actions.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <a href="" class="logo"><img src="images/logo.png" alt=""></a>
            <div id="menu">
                <div class="item"><a href="index.php">Trang chủ</a></div>
                <div class="item"><a href="about.php">Giới thiệu</a></div>
                <div class="item"><a href="product.php">Sản phẩm</a></div>
                <div class="item"><a href="actions.php">Liên hệ</a></div>
            </div>
            <div id="actions">
                <div class="item"><a href="login1.php"><img src="images/user.png" alt=""></a></div>
                <div class="item"><a href="cart.php"><img src="images/grocery-store.png" alt=""></a></div>
            </div>
        </div>
    <div id="contact-form">
        <h2>Liên hệ</h2>
        <p>Nếu bạn có thắc mắc gì, vui lòng điền vào biểu mẫu dưới đây. Chúng tôi sẽ trả lời bạn bằng tiếng Anh hoặc tiếng Việt. Nếu yêu cầu của bạn cần gấp, hãy liên hệ trực tiếp với nhà hàng. Số điện thoại của nhà hàng đã được gửi đến email của bạn cùng với xác nhận đơn hàng.</p>
        <form action="#" method="post">
            <label for="email">E-Mail*:</label>
            <input type="email" id="email" name="email" required>

            <label for="name">Tên*:</label>
            <input type="text" id="name" name="name" required>

            <label for="subject">Số điện thoại</label>
            <input type="text" id="subject" name="subject" required>

            <label for="details">Đánh giá của khách hàng</label>
            <textarea id="details" name="details" required></textarea>

            <button type="submit">Gửi</button>
        </form>
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
                        <a href="about.php">Giới thiệu</a>
                    </div>
                    <div class="item">
                        <a href="actions.php">Liên hệ</a>
                    </div>
                </ul>
            </div>
            <div class="box">
                <h3>LIÊN HỆ</h3>
                <a>Địa chỉ: Số 18 Phố Viên - Phường Đức Thắng - Q. Bắc Từ Liêm - Hà Nội Điện thoại: (+84-24) 3838 9633 | Email: hanhchinhtonghop@humg.edu.vn</a>
                <br>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
