<?php
$servername = "localhost"; // Đổi nếu MySQL không chạy trên localhost
$username = "root"; // Tài khoản mặc định của XAMPP
$password = ""; // Mặc định của XAMPP là rỗng
$dbname = "quanlyrapchieuphim";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Cảm ơn!";
?>
