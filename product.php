<?php 
$conn = new mysqli('localhost', 'root', '', 'food_db'); 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
$result = $conn->query("SELECT * FROM products_detail"); 
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
    <link rel="stylesheet" href="css/style.css">
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
        <div id="wp-products">
            <h2>ĐỒ ĂN THƯỢNG HẠNG</h2> 
            <ul id="list-products"> 
                <?php while ($row = $result->fetch_assoc()): ?> 
                    <div class="item">
                        <!-- Gắn liên kết vào hình ảnh -->
                         <a href="product_detail.php?id=<?php echo $row['id']; ?>">
                            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                </a>
                <div class="name">
                    <a href="product_detail.php?id=<?php echo $row['id']; ?>">
                        <?php echo $row['name']; ?>
                    </a>
                </div>
                <div class="price"><?php echo number_format($row['price']); ?> VNĐ</div> 
                <form method="post" action="add_to_cart.php"> 
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>"> 
                    <input type="submit" value="Thêm vào giỏ" class="add-to-cart"> 
                </form> 
            </div> 
            <?php endwhile; ?> 
        </ul> 
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
               <p>Địa chỉ: 123 Đường Khúc Thừa Dụ, Quận Thủ Đức, TP. Hồ Chí Minh</p>
                <p>Email: starfruit_weloveyou@sf6shop.com | Hotline: 1900-888-386</p>
                <p>© 2024 GOODFOOD. Được phát triển bởi đội ngũ SF6-Starfruit.</p> 
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>