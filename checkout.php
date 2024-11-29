<?php

session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $user_id = $_SESSION['user_id']; // Lưu user_id trong session khi đăng nhập

    // Tính tổng giá trị đơn hàng
    $total = 0;
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $result = $conn->query("SELECT price FROM products WHERE id = $product_id");
        $product = $result->fetch_assoc();
        $price = $product['price'];
        
        // Cộng thêm tổng tiền của sản phẩm (giá * số lượng)
        $total += $price * $quantity;
    }

    // Chèn thông tin đơn hàng vào bảng orders
    $conn->query("INSERT INTO orders (user_id, name, address, phone, total) VALUES ('$user_id', '$name', '$address', '$phone', '$total')");
    $order_id = $conn->insert_id;

    // Chèn các sản phẩm trong giỏ hàng vào bảng order_items
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $result = $conn->query("SELECT price FROM products WHERE id = $product_id");
        $product = $result->fetch_assoc();
        $price = $product['price'];

        // Chèn sản phẩm vào bảng order_items
        $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')");
    }

    // Xóa giỏ hàng sau khi đặt hàng
   unset($_SESSION['cart']);

    // Chuyển hướng đến trang thành công
    header("Location: order_success.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
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
<class id="dathang1">
    <div id="thongtindathang">
    <h1>Đặt hàng</h1>
    <form method="post" action="">
        <label>Họ tên:</label>
        <input type="text" name="name" required>
        <br>
        <label>Địa chỉ:</label>
        <input type="text" name="address" required>
        <br>
        <label>Số điện thoại:</label>
        <input type="text" name="phone" required>
        <br>
        <button type="submit">Đặt hàng</button>
    </form>
    </div>
</class>
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
      
</body>
</html>