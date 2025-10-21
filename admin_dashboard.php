<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4f46e5; /* Màu Tím/Indigo */
            --primary-dark: #4338ca;
            --background-light: #f4f6f9;
            --sidebar-width: 250px;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--background-light);
            display: flex; /* Dùng Flexbox để xếp Sidebar và Content */
        }

        /* --- 1. Sidebar Menu --- */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background-color: #2d3748; /* Màu xám đậm */
            color: white;
            padding-top: 20px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed; /* Giữ Sidebar cố định */
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            text-align: center;
            padding: 10px 0 30px 0;
            font-size: 20px;
            font-weight: 700;
            color: #a3aebb;
            text-transform: uppercase;
        }

        .menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1; /* Cho menu chiếm hết khoảng trống */
        }

        .menu-list a {
            display: block;
            padding: 15px 20px;
            color: #e2e8f0;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
            border-left: 5px solid transparent;
        }

        .menu-list a:hover {
            background-color: #4a5568;
            color: white;
            border-left: 5px solid var(--primary-color);
        }

        .menu-list i {
            margin-right: 10px;
            width: 20px; /* Cố định chiều rộng icon */
            text-align: center;
        }
        
        /* Menu item đang active (tùy chọn) */
        .menu-list a.active {
            background-color: #3b4554;
            color: white;
            border-left: 5px solid var(--primary-color);
        }

        /* --- 2. Main Content Area --- */
        .main-container {
            margin-left: var(--sidebar-width); /* Đẩy nội dung chính sang phải */
            width: calc(100% - var(--sidebar-width));
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- 3. Header/Navbar trên cùng --- */
        .header {
            background-color: white;
            color: #1a202c;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .user-info i {
            margin-right: 8px;
            color: var(--primary-color);
        }

        /* --- 4. Content Area --- */
        .content {
            padding: 30px;
            flex-grow: 1;
        }

        .welcome-card {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .welcome-card h2 {
            color: var(--primary-color);
            margin-top: 0;
            font-size: 32px;
        }

        .welcome-card p {
            color: #718096;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn-logout {
            background-color: #f56565; /* Màu Đỏ */
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-logout:hover {
            background-color: #e53e3e;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            🎬 Rạp Chiếu Phim
        </div>
        <ul class="menu-list">
            <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="http://localhost/code-php/readfilm.php"><i class="fas fa-film"></i> Danh Sách Phim</a></li>
            <li><a href="http://localhost/code-php/addfilm.html"><i class="far fa-calendar-alt"></i> Thêm Phim Mới</a></li>
            <li><a href="http://localhost/code-php/setfilm.html"><i class="fa-regular fa-folder"></i> Sửa Phim Đã Thêm Mới</a></li>
            <li><a href="http://localhost/code-php/adminforuser_readfilm.php"><i class="fas fa-users"></i> Quản Lý Phim Người Dùng Đã Đặt</a></li>
            <li><a href="http://localhost/code-php/adminforuser_deletefilm.html"><i class="fa-solid fa-circle-user"></i> Hủy Vé Người Dùng Đã Đặt</a></li>
            </ul>
        <div style="padding: 20px; text-align: center;">
             <a href="http://localhost/code-php/TTDN/cgvgonah.php" class="btn-logout" style="display: block;">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </a>
        </div>
    </div>

    <div class="main-container">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="user-info">
                <i class="fas fa-user-circle"></i>
                Xin chào, Admin Gonah
            </div>
        </div>

        <div class="content">
            <div class="welcome-card">
                <h2>👋 Chào mừng, Admin Gonah!</h2>
                <p>Bạn có thể quản lý tất cả dữ liệu rạp chiếu phim từ thanh menu bên trái.</p>
                <a href="http://localhost/code-php/CGVCinema.html" class="btn-logout" style="background-color: var(--primary-color);">Bắt đầu Quản lý</a>
            </div>
        </div>

    </div>
</body>
</html>