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
                <div class="item"><a href="actionsactions.php">Liên hệ</a></div>
            </div>
          <div id="actions">
 
                  <div class="item"><a href="login1.php"><img src="images/user.png" alt=""></a></div>
                  <div class="item"><a href="cart.php"><img src="images/grocery-store.png" alt=""></a></div>
            </div>
        </div>
        <div id="banner">
            <div class="box-left">
                <h2><span>THỨC ĂN</span><br><span>THƯỢNG HẠNG</span></h2>
                <p>Chuyên cung cấp các món ăn đảm bảo dinh dưỡng, hợp vệ sinh đến người dùng, phục vụ người dùng một cách hoàn hảo nhất</p>
                <button>Về GoodFood</button>
            </div>
        </div>
        <div id="wp-products">
            <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2> 
            <ul id="list-products"> 
                <?php while ($row = $result->fetch_assoc()): 
                    ?> 
                    <div class="item"> <img src="<?php echo $row['image']; ?>" alt=""> <div class="name"><?php echo $row['name']; ?></div> <div class="price"><?php echo number_format($row['price']); ?> VNĐ</div> <form method="post" action="add_to_cart.php"> <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>"> <input type="submit" value="Thêm vào giỏ" class="add-to-cart"> </form> </div> <?php endwhile; ?> </ul> </div>
            <div class="list-page">
                <div class="item"><a href="">1</a></div>
                <div class="item"><a href="">2</a></div>
                <div class="item"><a href="">3</a></div>
                <div class="item"><a href="">4</a></div>
            </div>
        </div>
        <div id="comment">
            <h2>NHẬN XÉT CỦA KHÁCH HÀNG</h2>
            <div id="comment-body">
                <div class="prev"><a href="#"><img src="images/left.png" alt=""></a></div>
                <ul id="list-comment">
                    <li class="item">
                        <div class="avatar"><img src="images/woman.png" alt=""></div>
                        <div class="name">Mai Thu Hiền</div>
                        <div class="text"><p>Một nơi được thiết kế độc đáo để thưởng thức những món ăn ngon bên người mình yêu. Ánh mắt của các bạn nhân viên thật lấp lánh khi họ giới thiệu thành phần của món ăn. Thật tuyệt vời 🥰 Chúng tôi cảm thấy được yêu thương và quan tâm rất nhiều, muốn trở lại đây lần sau và lần sau nữa. Đây là nhà hàng thực vật tốt nhất ở Việt Nam, GoodFood.</p></div>
                    </li>
                    <li class="item">
                        <div class="avatar"><img src="images/man.png" alt=""></div>
                        <div class="name">Nguyễn Đình Độ</div>
                        <div class="text"><p>Món ăn và dịch vụ xuất sắc!<br>
                        Cả món dùng và dịch vụ tại đây đều vượt trội! Nhân viên phục vụ đã dành thời gian để giới thiệu về thực đơn và giúp chúng tôi chọn ra những món ăn thật sự thú vị, những món mà chúng tôi sẽ không biết để chọn nếu không được tư vấn – điều này làm cho toàn bộ trải nghiệm thêm phần lý thú! Chắc chắn sẽ ghé thăm lại khi đến Việt Nam.</p></div>
                    </li>
                    <li class="item">
                        <div class="avatar"><img src="images/cool-girl.png" alt=""></div>
                        <div class="name">Phan Ngọc Hà</div>
                        <div class="text"><p>Nhà hàng ẩm vật tốt nhất trên thế giới 🌍.<br>
                        Bữa dùng tuyệt vời nhất mà tôi được trải nghiệm trong suốt một tháng ở Đông Nam Á. Thật là một niềm hạnh phúc - sau bữa tối hôm qua, tôi đã quay trở lại để dùng bữa trưa. Tôi rất khuyến khích mọi người nên trải nghiệm ẩm thực thực vật tại đây - nó là một điểm nhấn đặc biệt đối với tôi. Tôi sẽ quay lại trong chuyến đi tới.</p></div>
                    </li>
                </ul>
                <div class="next"><a href="#"><img src="images/right.png" alt=""></a></div>
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
                        <a href="">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="">Sản phẩm</a>
                    </div>
                    <div class="item">
                        <a href="">Blog</a>
                    </div>
                    <div class="item">
                        <a href="">Liên hệ</a>
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