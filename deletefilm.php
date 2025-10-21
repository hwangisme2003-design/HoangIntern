<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlyrapchieuphim";

// Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nếu có dữ liệu POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Sử dụng prepared statement để an toàn hơn
    $stmt = $conn->prepare("DELETE FROM phim WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" là kiểu integer

    if ($stmt->execute()) {
        header("Location: http://localhost/code-php/deletefilm.html?status=success");
    } else {
        header("Location: http://localhost/code-php/deletefilm.html?status=error&message=" . urlencode($stmt->error));
    }

    $stmt->close();
}

$conn->close();
?>
