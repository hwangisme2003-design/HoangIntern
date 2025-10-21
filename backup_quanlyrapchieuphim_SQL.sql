CREATE TABLE nguoidung2 (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
);
INSERT INTO nguoidung2 (username, password, role) VALUES 
    ('admin1', '123', 'admin'),
    ('user1', '456', 'user')
    ON DUPLICATE KEY UPDATE username=username;
CREATE TABLE IF NOT EXISTS phim2 (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tenphim VARCHAR(255) NOT NULL,
    theloai VARCHAR(100),
    thoiluong INT(5),
    khoichieu DATE,
    hinhanh VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS datve_user2 (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                       
    tenphim VARCHAR(255) NOT NULL,
    soluongve INT(5) NOT NULL,
    tongtien DECIMAL(10, 2) NOT NULL,                    
    ngaydat DATE NOT NULL,
);