<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlyrapchieuphim";

$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sử dụng Prepared Statement để chống SQL Injection
    $stmt = $conn->prepare("SELECT * FROM nguoidung2 WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password); // dùng md5 nếu cần mã hóa
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu.";
    }

    $stmt->close();
}
$conn->close();
?>
