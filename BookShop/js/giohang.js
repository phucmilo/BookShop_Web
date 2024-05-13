document.addEventListener("DOMContentLoaded", function() {
    var addToCartButtons = document.querySelectorAll(".add-to-cart-button");
    addToCartButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            var book = {
                id: button.dataset.bookId, // Thay "bookId" bằng thuộc tính dữ liệu chứa ID sách
                title: button.dataset.bookTitle, // Thay "bookTitle" bằng thuộc tính dữ liệu chứa tên sách
                price: button.dataset.bookPrice // Thay "bookPrice" bằng thuộc tính dữ liệu chứa giá sách
            };
            addToCart(book);
            updateCartUI();
        });
    });

    function addToCart(book) {
        // Thêm sách vào giỏ hàng (có thể lưu vào local storage hoặc session storage)
    }

    function updateCartUI() {
        // Cập nhật giao diện người dùng sau khi thêm sách vào giỏ hàng
    }
});
