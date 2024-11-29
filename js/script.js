const next = document.querySelector('.next')
const prev = document.querySelector('.prev')
const comment = document.querySelector('#list-comment')
const commentItem = document.querySelectorAll('#list-comment .item')
var translateY = 0
var count = commentItem.length

next.addEventListener('click', function (event) {
  event.preventDefault()
  if (count == 1) {
    // Xem hết bình luận
    return false
  }
  translateY += -400
  comment.style.transform = `translateY(${translateY}px)`
  count--
})

prev.addEventListener('click', function (event) {
  event.preventDefault()
  if (count == 3) {
    // Xem hết bình luận
    return false
  }
  translateY += 400
  comment.style.transform = `translateY(${translateY}px)`
  count++
})

$(document).on('submit', '.add-to-cart-form', function (e) {
    e.preventDefault(); // Ngăn chặn form reload trang

    var product_id = $(this).find("input[name='product_id']").val(); // Lấy product_id từ form

    $.ajax({
        url: 'add_to_cart.php', // Tệp xử lý thêm vào giỏ
        type: 'POST',
        data: {product_id: product_id},
        success: function (response) {
            var data = JSON.parse(response); // Giải mã JSON trả về
            var total_items = data.total_items; // Số lượng sản phẩm trong giỏ hàng

            // Cập nhật số lượng giỏ hàng trên giao diện
            if (total_items > 0) {
                $(".cart-count").text(total_items).show(); // Hiển thị số lượng
            } else {
                $(".cart-count").hide(); // Ẩn số lượng khi giỏ hàng trống
            }
        }
    });
});
