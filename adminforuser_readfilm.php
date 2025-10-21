<?php
// PHP SCRIPT START
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlyrapchieuphim";

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra lỗi kết nối
if ($conn->connect_error) {
    // Hiển thị lỗi kết nối và thoát
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn danh sách vé đã đặt
$sql = "SELECT tenphim, soluongve, tongtien, ngaydat FROM datve_user2 ORDER BY ngaydat DESC";
$result = $conn->query($sql);

// Kiểm tra lỗi truy vấn
if ($result === false) {
    // Hiển thị lỗi truy vấn và thoát
    die("Lỗi truy vấn: " . $conn->error);
}

// Hàm định dạng tiền tệ Việt Nam (90000 -> 90.000 VNĐ)
function formatCurrency($amount) {
    if (!is_numeric($amount)) {
        return 'N/A';
    }
    return number_format($amount, 0, ',', '.') . ' VNĐ';
}

// PHP SCRIPT END
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Vé Đã Đặt - CGV Gonah</title>
    <style>
        /* Thiết lập nền tối và font chữ hiện đại */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('cgvbgrnd.jpg') no-repeat center center/cover; /* Ảnh nền */
            background-attachment: fixed; /* Giữ nền cố định khi cuộn */
            color: #e0e0e0; /* Màu chữ sáng */
            padding: 40px 20px;
            min-height: 100vh;
        }

        /* Lớp phủ mờ và tối để làm nổi bật nội dung */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Lớp phủ đen 70% */
            backdrop-filter: blur(4px); /* Làm mờ ảnh nền */
            z-index: -1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(30, 30, 30, 0.95); /* Nền container tối hơn */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        h2 {
            text-align: center;
            color: #e44d26; /* Màu đỏ cam nổi bật */
            margin-bottom: 30px;
            font-size: 2.2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Styling cho bảng */
        table {
            width: 100%;
            border-collapse: separate; /* Thay đổi từ collapse sang separate */
            border-spacing: 0;
            margin-top: 20px;
            overflow: hidden; /* Dùng để bo góc */
            border-radius: 8px;
        }

        th, td {
            padding: 15px 15px;
            text-align: center;
            border: none;
        }

        th {
            background-color: #2a2a2a; /* Header tối */
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            border-bottom: 2px solid #e44d26;
        }

        tr:nth-child(even) {
            background-color: #383838; /* Màu xen kẽ cho hàng chẵn */
        }

        tr:nth-child(odd) {
            background-color: #444444; /* Màu xen kẽ cho hàng lẻ */
        }

        tr:hover {
            background-color: #555555; /* Hiệu ứng hover */
            transition: background-color 0.3s;
        }

        /* Định dạng đặc biệt cho cột Tổng Tiền */
        .total-amount {
            font-weight: bold;
            color: #3bff6a; /* Màu xanh lá nổi bật cho tiền */
        }
        
        /* Hiển thị khi không có dữ liệu */
        .no-data {
            text-align: center;
            padding: 30px;
            font-size: 1.1rem;
            color: #aaaaaa;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Danh Sách Vé Người Dùng Đã Đặt</h2>
    <table>
        <thead>
            <tr>
                <th>Tên Phim</th>
                <th>Số Lượng Vé</th>
                <th>Tổng Tiền</th>
                <th>Ngày Đặt</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Định dạng cột Tổng Tiền bằng hàm formatCurrency()
                $formatted_tongtien = formatCurrency($row['tongtien']);
                
                echo "<tr>
                        <td>" . htmlspecialchars($row['tenphim']) . "</td>
                        <td>" . htmlspecialchars($row['soluongve']) . "</td>
                        <td class='total-amount'>" . $formatted_tongtien . "</td>
                        <td>" . htmlspecialchars($row['ngaydat']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='no-data'>Chưa có vé nào được đặt.</td></tr>";
        }
        ?>
        </tbody>
    </table> 
    
    <?php
    // Đóng kết nối MySQL
    $conn->close();
    ?>
</div>

</body>
</html>