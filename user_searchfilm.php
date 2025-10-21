<?php
$filmResult = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET['id']) || isset($_GET['tenphim']))) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlyrapchieuphim";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        $error = "Kết nối thất bại: " . $conn->connect_error;
    } else {
        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM datve_user2 WHERE id = $id";
        } elseif (!empty($_GET['tenphim'])) {
            $tenphim = $conn->real_escape_string($_GET['tenphim']);
            $sql = "SELECT * FROM datve_user2 WHERE tenphim LIKE '%$tenphim%'";
        }

        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $filmResult = $result->fetch_all(MYSQLI_ASSOC); // lấy tất cả
        } else {
            $error = "Không tìm thấy phim.";
        }

        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tìm kiếm phim</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #eef2f7, #e0ecff);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
body::before {
        content: "";
        background-image: url('cgv2.png'); /* thay bằng đường dẫn ảnh của bạn */
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
    .container {
      background: white;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      margin: 8px 0 4px;
      color: #555;
      font-weight: 500;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    button {
      padding: 12px 24px;
      background-color: #4f46e5;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      display: block;
      width: 100%;
    }

    button:hover {
      background-color: #3b34c5;
    }

    .result {
      margin-top: 24px;
      padding: 20px;
      background-color: #f3f4f6;
      border-radius: 12px;
    }

    .result h3 {
      margin-top: 0;
    }

    .error {
      margin-top: 20px;
      color: red;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🔍 Tìm kiếm phim</h2>
    <form method="GET" action="">
      <label for="id">Tìm theo mã phim (ID):</label>
      <input type="text" name="id" placeholder="VD: 101">

      <label for="tenphim">Hoặc tìm theo tên phim:</label>
      <input type="text" name="tenphim" placeholder="VD: Avengers">

      <button type="submit">Tìm kiếm</button>
    </form>

    <?php if ($filmResult): ?>
      <?php foreach ($filmResult as $film): ?>
        <div class="result">
          <h3>🎬 <?= htmlspecialchars($film['tenphim']) ?></h3>
          <p><strong>Số lượng vé:</strong> <?= htmlspecialchars($film['soluongve']) ?></p>
          <p><strong>Tổng tiền:</strong> <?= htmlspecialchars($film['tongtien']) ?> vnđ</p>
          <?php if (!empty($film['ngaykhoichieu'])): ?>
            <p><strong>Ngày đặt:</strong> <?= htmlspecialchars($film['ngaydat']) ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php elseif ($error): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
  </div>
</body>
</html>
