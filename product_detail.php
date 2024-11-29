<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'food_db');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy ID sản phẩm từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; // Lấy ID, mặc định là 0 nếu không có

// Kiểm tra nếu ID hợp lệ
if ($id <= 0) {
    echo "Sản phẩm không hợp lệ!";
    exit;
}

// Truy vấn thông tin sản phẩm theo ID
$stmt = $conn->prepare("SELECT * FROM products_detail WHERE id = ?");
$stmt->bind_param("i", $id); // Gắn tham số ID
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Nếu không tìm thấy sản phẩm
if (!$product) {
    echo "Sản phẩm không tồn tại.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm - <?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="product_detail.css">
</head>
<body>
    <div id="product-detail">
        <h1><?php echo htmlspecialchars($product['name']); ?></h1>
        <div class="image">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        <div class="details">
            <p><strong>Giá:</strong> <?php echo number_format($product['price']); ?> VNĐ</p>
            <p><strong>Mô tả:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
            <p><strong>Khối lượng:</strong> <?php echo htmlspecialchars($product['weight']); ?></p>
            <p><strong>Thành phần:</strong> <?php echo htmlspecialchars($product['ingredients']); ?></p>
        </div>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
            <button type="submit">Thêm vào giỏ hàng</button>
        </form>
    </div>
</body>
</html>
