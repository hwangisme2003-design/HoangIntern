<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlyrapchieuphim";

// Tên trang đích để chuyển hướng về
$redirect_url = "http://localhost/code-php/adminforuser_deletefilm.html";

// Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    // Trường hợp lỗi kết nối CSDL (Lỗi nghiêm trọng)
    $error_message = urlencode("Lỗi kết nối CSDL: " . $conn->connect_error);
    header("Location: {$redirect_url}?status=error&message={$error_message}");
    exit;
}

// Nếu có dữ liệu POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Đảm bảo id tồn tại và hợp lệ
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0; 
    
    // Sử dụng prepared statement để an toàn hơn
    $stmt = $conn->prepare("DELETE FROM datve_user2 WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" là kiểu integer

    if ($stmt->execute()) {
        // Trường hợp xóa thành công
        $success_message = urlencode("Hủy vé có ID $id thành công!");
        header("Location: {$redirect_url}?status=success&message={$success_message}");
        exit; // Dừng việc thực thi mã PHP
    } else {
        // Trường hợp lỗi khi thực thi câu lệnh SQL
        $error_message = urlencode("Lỗi khi hủy vé (SQL Error): " . $stmt->error);
        header("Location: {$redirect_url}?status=error&message={$error_message}");
        exit; // Dừng việc thực thi mã PHP
    }

    $stmt->close();
} else {
    // Trường hợp không có ID được gửi
    $error_message = urlencode("Thiếu ID vé cần hủy.");
    header("Location: {$redirect_url}?status=error&message={$error_message}");
    exit;
}

$conn->close();
?>