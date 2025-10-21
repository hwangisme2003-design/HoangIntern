<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filmID = $_POST["filmID"];
    $tenphim = $_POST["tenphim"];
    $theloai = $_POST["theloai"];
    $thoiluong = $_POST["thoiluong"];
    $khoichieu = $_POST["khoichieu"];
    $hinhanh = $_POST["hinhanh"];

    require 'connect5.php'; // Kết nối CSDL

    $sql = "UPDATE phim2 
            SET tenphim='$tenphim', theloai='$theloai', thoiluong='$thoiluong', khoichieu='$khoichieu', hinhanh='$hinhanh' 
            WHERE id=$filmID";

    if ($conn->query($sql) === TRUE) {
        $message = "Cập nhật phim thành công!";
    } else {
        $message = "Lỗi: " . $conn->error;
    }

    // Redirect về trang HTML kèm theo thông báo
    header("Location: setfilm.html?message=" . urlencode($message));
    exit();
}
?>
