<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $tenphim = $_POST["tenphim"];
    $theloai = $_POST["theloai"];
    $thoiluong = $_POST["thoiluong"];
    $khoichieu = $_POST["khoichieu"];
    $hinhanh = $_POST["hinhanh"];

    // Kết nối database (giả sử dùng MySQLi)
    $conn = new mysqli("localhost", "root", "", "quanlyrapchieuphim");

    if ($conn->connect_error) {
        die("Lỗi kết nối: " . $conn->connect_error);
    }

    $sql = "INSERT INTO phim2 (id, tenphim, theloai, thoiluong, khoichieu, hinhanh) 
            VALUES ('$id', '$tenphim', '$theloai', '$thoiluong', '$khoichieu', '$hinhanh')";

    if ($conn->query($sql) === TRUE) {
        echo "🎬 Thêm phim thành công!";
    } else {
        echo "❌ Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>
