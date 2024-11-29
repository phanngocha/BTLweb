<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/login.css">
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
    <div class="all">
    <a href="" class="logo" ><img src="images/logo.png" style="background-color:dimgray; border-radius: 5px; width: 250px; height:250px; border-radius: 200px;"></a>
        <div class="login1">
            <div class="login1a">
                <h3> Đăng nhập</h3>
                <form method="post" action="process_login.php">
                <input type="email" name="email" placeholder="Email/Số điện thoại/Tên đăng nhập" required >
                <br>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <br>
                <button type="submit" style="width:260px; height:30px; background-color:sienna; border-radius: 5px; font-size:20px">Đăng nhập</button>
                <p>Bạn chưa có tài khoản? | <a href="login2.php" style="text-decoration: none; font-size: 16px; color: red; " > Đăng ký </a></p>
                </form>
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
                <form action="">
                    <input type="text" placeholder="Địa chỉ email">
                    <button>Nhận tin</button>
                </form>
            </div>
        </div>
</body>
</html>