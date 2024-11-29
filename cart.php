  <?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$product_ids = array_keys($_SESSION['cart']);
$product_ids = implode(',', array_map('intval', $product_ids));

if (empty($product_ids)) {
    $product_ids = '0';
}
$query = "SELECT * FROM products WHERE id IN ($product_ids)";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="css/cart.css">
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
<div id = "giohang">
        <h1>Giỏ hàng của bạn</h1>
        <table>
             <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
             </tr>
    <?php
    $total = 0;
    while ($row = $result->fetch_assoc()):
        $product_id = $row['id'];
        $quantity = $_SESSION['cart'][$product_id];
        $subtotal = $row['price'] * $quantity;
        $total += $subtotal;
    ?>
             <tr>
                    <td><img src="<?php echo $row['image']; ?>" alt="" width="50"> <?php echo $row['name']; ?></td>
                    <td><?php echo number_format($row['price']); ?> VNĐ</td>
                    <td>
                        <form method="post" action="update_cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1">
                            <button type="submit">Cập nhật</button>
                        </form>
                    </td>
                    <td><?php echo number_format($subtotal); ?> VNĐ</td>
                    <td>
                        <form method="post" action="remove_from_cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
             </tr>
    <?php endwhile; ?>
                <tr>
                    <td colspan="3"><strong>Tổng cộng:</strong></td>
                    <td><strong><?php echo number_format($total); ?> VNĐ</strong></td>
                    <td></td>
                </tr>
        </table>
        <div id="dathang">
            <a href="checkout.php">Đặt hàng</a>
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
                        <a href="about.php">Giơi thiệu</a>
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
</body>
</html>