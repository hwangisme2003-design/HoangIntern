<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlyrapchieuphim";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM phim2";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách phim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        margin: 0;
        padding: 20px;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f8f9fa;
        position: relative;
        z-index: 0;
    }

    /* Lớp phủ background với ảnh và hiệu ứng mờ */
    body::before {
        content: "";
        background-image: url('cgvbgrnd2.jpg'); /* thay bằng đường dẫn ảnh của bạn */
        background-size: cover;
        background-position: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        filter: blur(5px);
        opacity: 0.6;
        z-index: -1;
    }

    h2 {
        text-align: center;
        color: #fff;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
    }

    .film-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
        z-index: 1;
        position: relative;
    }

    .film-card {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transition: transform 0.2s;
    }

    .film-card:hover {
        transform: translateY(-5px);
    }

    .film-card img {
        width: 100%;
        height: 380px;
        object-fit: cover;
    }

    .film-info {
        padding: 15px;
    }

    .film-info h3 {
        margin: 0 0 10px;
        font-size: 28px;
        color: #007BFF;
    }

    .film-info p {
        margin: 4px 0;
        color: #333;
        font-size: 14px;
    }
</style>

</head>
<body>

<h2>🎬 Danh sách Phim</h2>
<div class="film-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='film-card'>
                <img src='{$row['hinhanh']}' alt='Hình ảnh phim'>
                <div class='film-info'>
                    <h3>{$row['tenphim']}</h3>
                    <p><strong>Thể loại:</strong> " . ($row['theloai'] ?: 'N/A') . "</p>
                    <p><strong>Thời lượng:</strong> " . ($row['thoiluong'] ?: 'N/A') . " phút</p>
                    <p><strong>Khởi chiếu:</strong> " . ($row['khoichieu'] ?: 'N/A') . "</p>
                </div>
            </div>";
        }
    } else {
        echo "<p>Không có phim nào được tìm thấy.</p>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
