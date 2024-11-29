<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'food_db');

// Kiểm tra xem order_id có tồn tại trong session không
if (isset($_SESSION['order_id'])) {
    $order_id = $_SESSION['order_id'];

    // Lấy thông tin đơn hàng từ bảng orders
    $result = $conn->query("SELECT * FROM orders WHERE id = $order_id");

    if ($result) {
        $order = $result->fetch_assoc();

        if ($order) {
            // Lấy chi tiết sản phẩm từ bảng order_items
            $order_items_result = $conn->query("SELECT oi.quantity, oi.price, p.name AS product_name
                                                FROM order_items oi
                                                JOIN products p ON oi.product_id = p.id
                                                WHERE oi.order_id = $order_id");

            $order_items = [];
            while ($item = $order_items_result->fetch_assoc()) {
                $order_items[] = $item;
            }
        } else {
            // Nếu không tìm thấy đơn hàng, chuyển hướng về trang chủ
            header("Location: index.php");
            exit();
        }
    } else {
        // Nếu có lỗi trong truy vấn SQL
        echo "Lỗi truy vấn: " . $conn->error;
        exit();
    }
} else {
    // Nếu không có order_id trong session, chuyển hướng về trang chủ
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link rel="stylesheet" href="css/order_success.css">
</head>
<body>
<h1>Đặt hàng thành công!</h1>
<p>Cảm ơn bạn đã đặt hàng! Dưới đây là thông tin đơn hàng của bạn:</p>

<h3>Thông tin đơn hàng:</h3>
<ul>
    <li><strong>Họ tên:</strong> <?php echo htmlspecialchars($order['name']); ?></li>
    <li><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order['address']); ?></li>
    <li><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($order['phone']); ?></li>
    <li><strong>Ngày đặt hàng:</strong> <?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></li>
</ul>

<h3>Chi tiết sản phẩm:</h3>
<ul>
    <?php foreach ($order_items as $item): ?>
        <li>
            <?php echo htmlspecialchars($item['product_name']); ?> - <?php echo $item['quantity']; ?> x <?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ
        </li>
    <?php endforeach; ?>
</ul>

<p><strong>Tổng tiền:</strong> <?php
    $total = 0;
    foreach ($order_items as $item) {
        $total += $item['quantity'] * $item['price'];
    }
    echo number_format($total, 0, ',', '.') . ' VNĐ';
?></p>

<p><a href="index.php">Quay lại trang chủ</a></p>

</body>
</html>

<?php
// Sau khi hiển thị trang thành công, có thể xóa order_id khỏi session (tuỳ chọn)
unset($_SESSION['order_id']);
?>
