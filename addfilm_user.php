<?php
// Thiết lập Content-Type để thông báo cho frontend rằng đây là phản hồi dạng text
header('Content-Type: text/plain; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Khắc phục Lỗi 1: Lấy ID phim từ POST
    // Lưu ý: Cột này sẽ lưu ID phim, không phải ID của lần đặt vé (đã được tự động tạo)
    $id = isset($_POST["id"]) ? $_POST["id"] : null; // Dùng 'id' để tránh nhầm lẫn

    $tenphim = $_POST["tenphim"];
    $soluongve = $_POST["soluongve"];
    $tongtien = $_POST["tongtien"];
    $ngaydat = $_POST["ngaydat"];

    // Kết nối database (giả sử dùng MySQLi)
    $conn = new mysqli("localhost", "root", "", "quanlyrapchieuphim");

    if ($conn->connect_error) {
        // Trả về lỗi nếu kết nối thất bại
        echo "❌ Lỗi kết nối CSDL: " . $conn->connect_error;
        exit;
    }

    // 2. Tăng cường bảo mật và khắc phục lỗi: SỬ DỤNG PREPARED STATEMENTS
    // Giả sử bảng của bạn có các cột: (datve_id (PRIMARY KEY, AI), tenphim, id, soluongve, tongtien, ngaydat)
    
    // Câu lệnh SQL mới: Đảm bảo bạn chèn 'id' (ID của phim) chứ không phải ID của lần đặt vé
    $sql = "INSERT INTO datve_user2 (tenphim, id, soluongve, tongtien, ngaydat) 
            VALUES (?, ?, ?, ?, ?)";
            
    $stmt = $conn->prepare($sql);
    
    // Bắt buộc sử dụng bind_param để ngăn SQL Injection
    // Kiểu dữ liệu: s (string), i (integer), d (double)
    // Giả định: tenphim(s), id(i), soluongve(i), tongtien(i), ngaydat(s)
    $stmt->bind_param("siiis", $tenphim, $id, $soluongve, $tongtien, $ngaydat);

    if ($stmt->execute()) {
        echo "🎬 Đặt vé thành công! Mã giao dịch: " . $conn->insert_id;
    } else {
        echo "❌ Lỗi đặt vé: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Lỗi: Phương thức yêu cầu không hợp lệ.";
}
?>