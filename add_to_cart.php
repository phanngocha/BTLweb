
<?php
session_start();

// Kiểm tra nếu có giỏ hàng trong session chưa
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Lấy id sản phẩm từ form POST
$product_id = $_POST['product_id'];

// Nếu sản phẩm đã có trong giỏ, tăng số lượng
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += 1;
} else {
    // Nếu sản phẩm chưa có trong giỏ, thêm vào giỏ với số lượng 1
    $_SESSION['cart'][$product_id] = 1;
}


header("Location: index.php"); 
exit();
?>