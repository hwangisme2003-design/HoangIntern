<?php
// BƯỚC 1: BẮT ĐẦU PHIÊN LÀM VIỆC (SESSION)
session_start();

// Thiết lập các biến để kiểm tra trạng thái
$is_logged_in = isset($_SESSION['user_id']);
$booking_link = $is_logged_in ? 'http://localhost/code-php/loginrapchieuphim.html' : 'http://localhost/code-php/loginrapchieuphim.html'; // Link đặt vé thực hoặc link đăng nhập
$login_link = 'http://localhost/code-php/loginrapchieuphim.html'; // Đổi từ .html sang .php để xử lý
$user_name = $is_logged_in ? $_SESSION['username'] : 'Đăng Nhập'; // Hiển thị tên nếu đã đăng nhập
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV Gonah - Trang Chủ</title>
    <!-- Tải Tailwind CSS CDN -->       
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Cấu hình Font Inter và màu sắc cơ bản -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #1a1a1a; /* Nền tối cho cảm giác rạp chiếu phim */
            color: #ffffff;
        }
        /* Đảm bảo hình ảnh banner chuyển động mượt mà */
        #banner-slider a {
            transition: opacity 0.5s ease-in-out;
        }
        /* Styling cơ bản cho Modal/Pop-up */
        .modal {
            display: none; /* Mặc định ẩn */
            position: fixed; /* Giữ nguyên vị trí khi cuộn */
            z-index: 1000; /* Đảm bảo nó nằm trên tất cả các thành phần khác */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Cho phép cuộn nếu nội dung lớn */
            background-color: rgba(0,0,0,0.7); /* Nền mờ */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Canh giữa theo chiều dọc và ngang */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Chiều rộng */
            max-width: 400px; /* Chiều rộng tối đa */
            border-radius: 8px;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            animation-name: modalopen;
            animation-duration: 0.4s
        }

        /* Hiệu ứng trượt vào */
        @keyframes modalopen {
            from {top: -300px; opacity: 0}
            to {top: 0; opacity: 1}
        }

        .modal-content h2 {
            color: #cc0000; /* Màu đỏ nổi bật */
            margin-top: 0;
        }

        .modal-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        /* Styling cho các nút (giả định) */
        .btn-primary, .btn-secondary {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-primary {
            background-color: #cc0000; /* Màu đỏ */
            color: white;
        }

        .btn-secondary {
            background-color: #f1f1f1;
            color: #333;
            border: 1px solid #ccc;
        }
        .modal-content {
            /* Giữ nguyên các thuộc tính bạn đã có */
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 400px; 
            border-radius: 8px;
            text-align: center;
            position: relative; 
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            animation-name: modalopen;
            animation-duration: 0.4s
        }
    </style>
</head>
<body>

    <!-- KHU VỰC HEADER VÀ THANH ĐIỀU HƯỚNG -->
    <header class="bg-[#C80000] sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-3xl font-extrabold tracking-wider text-white">CGV</a>
                </div>

                <!-- Menu Chính (Chỉ hiển thị trên Desktop/Tablet) -->
                <nav class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="http://localhost/code-php/TTDN/cgvgonah.php" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150">Trang Chủ</a>
                        <a href="http://localhost/code-php/loginrapchieuphim.html" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150">Đặt Vé</a>
                        <a href="https://www.cgv.vn/default/contacts/" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150">Liên Hệ</a>
                        <a href="#" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150"></a>
                        <a href="#" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150"></a>
                                                
                    </div>
                </nav>

                <!-- Tìm kiếm và Đăng nhập/Đăng ký -->
                <div class="flex items-center space-x-4">             
    <form method="GET" action="http://localhost/code-php/loginrapchieuphim.html" class="relative hidden sm:block flex items-center bg-white rounded-full p-0">
        <input 
            type="text" 
            name="search_query" 
            placeholder="Tìm kiếm phim..." 
            class="w-32 md:w-48 p-2 pr-10 text-sm text-gray-900 focus:outline-none transition duration-150 rounded-full"
        >
        
        <button type="submit" class="absolute right-0 top-0 h-full w-10 text-gray-500 hover:text-[#C80000] transition duration-150 flex items-center justify-center">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>
    <a href="<?= $login_link ?>" class="bg-white text-[#C80000] font-semibold py-2 px-4 rounded-full text-sm hover:bg-gray-100 transition duration-150 shadow-md">
        <?= $user_name ?>
    </a>

    <button class="md:hidden text-white hover:text-gray-200 p-2 rounded-md transition duration-150">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
    </button>
</div>  
                    <!-- Nút Menu trên Mobile (Hamburger Icon) -->
                    <button class="md:hidden text-white hover:text-gray-200 p-2 rounded-md transition duration-150">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Placeholder (Sẽ dùng JavaScript để hiển thị/ẩn) -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#a60000] px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-[#C80000]">Lịch Chiếu</a>
            <a href="#" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-[#C80000]">Phim</a>
            <!-- ... thêm các mục menu khác ... -->
        </div>
    </header>

    <!-- NỘI DUNG CHÍNH CỦA TRANG -->
    <main>
        <!-- Banner/Slider Phim Nổi Bật (Đã thay thế bằng Carousel) -->
        <section class="w-full bg-black py-10 md:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <!-- Khu vực hiển thị Slide -->
                <div id="banner-slider" class="h-64 sm:h-96 rounded-xl overflow-hidden shadow-2xl relative bg-gray-700">
                    <!-- Nội dung Slide sẽ được chèn bởi JavaScript -->
                </div>
            </div>
        </section>

        <!-- Thanh Tab Chọn Lọc (Phim Đang Chiếu / Phim Sắp Chiếu) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-8">
            <div class="flex space-x-4 border-b-2 border-gray-700">
                <button id="tab-current" class="text-xl sm:text-2xl font-bold pb-2 border-b-4 border-[#C80000] text-[#C80000] transition duration-200">
                    PHIM ĐANG CHIẾU
                </button>
                <button id="tab-upcoming" class="text-xl sm:text-2xl font-semibold pb-2 border-b-4 border-transparent text-gray-400 hover:text-white transition duration-200">
                    PHIM SẮP CHIẾU
                </button>
            </div>
        </section>

        <!-- Khu vực Hiển thị Danh sách Phim -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
            <div id="movie-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                
                <!-- Khối Phim Mẫu 1 -->
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://media.lottecinemavn.com/Media/MovieFile/MovieImg/202510/11932_103_100002.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/tee-yod-3.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">TEE YOD: QUỶ ĂN TẠNG PHẦN 3</h3>
                        <p class="text-xs text-gray-400 mt-1">Kinh Dị | 125 phút</p>
                    </div>
                </div>

                <!-- Khối Phim Mẫu 2 -->
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/v/l/vlcro_011d_g_vie-vn_70x100_up.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/tron-ares.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">TRÒ CHƠI ẢO GIÁC : ARES</h3>
                        <p class="text-xs text-gray-400 mt-1">Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu | 105 phút</p>
                    </div>
                </div>
                
                <!-- Lặp lại các Khối Phim để tạo đủ 10 phim (cần dùng JS để render thực tế) -->
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden sm:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/m/a/main_tctk_social.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/tu-chien-tren-khong.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">TỬ CHIẾN TRÊN KHÔNG</h3>
                        <p class="text-xs text-gray-400 mt-1">Hành Động, Hồi hộp | 100 phút</p>
                    </div>
                </div>

                 <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden md:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/t/a/tay_anh_giu_mo_t_vi_sao_-_payoff_poster_-_kho_i_chie_u_03.10.2025.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/tay-anh-giu-vi-sao.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">TAY ANH GIỮ MỘT VÌ SAO</h3>
                        <p class="text-xs text-gray-400 mt-1">Tình Cảm | 115 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden lg:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/3/5/350x495-jjk.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/jjk-the-movie.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">CHÚ THUẬT HỒI CHIẾN: HOÀI NGỌC / NGỌC CHIẾT – THE MOVIE</h3>
                        <p class="text-xs text-gray-400 mt-1">Hoạt Hình, Phiêu Lưu | 150 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden lg:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/thumbnail/240x388/c88460ec71d04fa96e628a21494d2fd3/p/o/poster_main_v_cmyk.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/enhypen-vr-immersion.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">ENHYPEN VR CONCERT : IMMERSION</h3>
                        <p class="text-xs text-gray-400 mt-1">Hòa Nhạc | 120 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden lg:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/1/2/1200x1800-abbbj.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/abbbj.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">HÀNH TRÌNH RỰC RỠ TA ĐÃ YÊU</h3>
                        <p class="text-xs text-gray-400 mt-1">Phiêu Lưu, Thần thoại, Tình cảm | 102 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden lg:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/4/0/406x600-yourletter.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/your-letter.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">NHỮNG LÁ THƯ CỦA YEON</h3>
                        <p class="text-xs text-gray-400 mt-1">Hoạt Hình | 150 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden lg:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/c/n/cnen-mainposter-1.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/chi-nga-em-nang.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">CHỊ NGÃ EM NÂNG</h3>
                        <p class="text-xs text-gray-400 mt-1">Gia đình, Hài, Tâm Lý | 122 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden lg:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/3/5/350x495-csm.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
                            <a href="https://www.cgv.vn/default/chainsaw-man.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white"></h3>
                        <p class="text-xs text-gray-400 mt-1">Hành Động, Hoạt Hình, Thần thoại | 100 phút</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Khu vực Khuyến Mãi / Thông tin Rạp -->
        <section class="bg-gray-900 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold text-[#C80000] mb-8">Ưu Đãi & Sự Kiện Nổi Bật</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Khối Khuyến Mãi 1 -->
                    <div class="bg-gray-800 rounded-xl p-6 shadow-xl flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                        <div class="w-full md:w-1/3 h-40 bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <img src="https://iguov8nhvyobj.vcdn.cloud/media/wysiwyg/2025/022025/N_O_350x495_3.png" class="w-full h-full object-cover">
                            
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">Khuyến Mãi Thứ 2 Vui Vẻ</h3>
                            <p class="text-gray-300 text-sm">Giảm giá 50% cho Combo Bắp Nước lớn vào các ngày Thứ Hai hàng tuần. Áp dụng cho thành viên V.I.P.</p>
                            <a href="https://www.cgv.vn/default/newsoffer/cgv-culture-day/" class="text-[#C80000] hover:text-red-500 text-sm font-medium mt-3 inline-block">Xem chi tiết &rarr;</a>
                        </div>
                    </div>
                    <!-- Khối Khuyến Mãi 2 -->
                    <div class="bg-gray-800 rounded-xl p-6 shadow-xl flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                        <div class="w-full md:w-1/3 h-40 bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <img src="https://scontent.fsgn2-6.fna.fbcdn.net/v/t39.30808-6/484924557_1044959464332085_1297873987412675028_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=111&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeF3txk-x3eZMHNl8gUxYovm-8-M8BvzPOb7z4zwG_M85jWXJFR9XqL8JWp0JpzA-oES6W4fkC105VeUH_-V9dMH&_nc_ohc=vzAFRuSR3HcQ7kNvwEwqv6_&_nc_oc=AdmuFEVhAu0iVUV-gMMOL-YEhiadaX9ISQrG9iq9NPZyy3AFI01pOvduWMVjilLGHy0&_nc_zt=23&_nc_ht=scontent.fsgn2-6.fna&_nc_gid=tu53QptJxiOqSwrE3LUBDA&oh=00_AfczgjMiXc5qxbrwxvFfGLrt_u8lSJF4pUtsdvU7cRRyZQ&oe=68F10A2A" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">Thông Tin Rạp Mới</h3>
                            <p class="text-gray-300 text-sm">Khai trương CGV Gò Vấp - Cinema chất lượng cao với công nghệ IMAX và 4DX hiện đại nhất.</p>
                            <a href="https://www.facebook.com/vincom.com.vn/posts/-cgv-vincom-mega-mall-grand-park-ch%C3%ADnh-th%E1%BB%A9c-khai-tr%C6%B0%C6%A1ng-h%C3%B4m-nay-ng%C3%A0y-04092024-r%E1%BA%A5/903235318504501/" class="text-[#C80000] hover:text-red-500 text-sm font-medium mt-3 inline-block">Tìm hiểu thêm &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-black border-t border-gray-800 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-sm">
                
                <!-- Cột 1: Giới thiệu -->
                <div>
                    <h4 class="font-bold text-gray-200 mb-4">VỀ CGV VIỆT NAM</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="https://www.cgv.vn/default/about-cgv/" class="hover:text-white transition duration-150">Giới thiệu</a></li>
                        <li><a href="https://www.cgv.vn/default/careers/" class="hover:text-white transition duration-150">Tuyển dụng</a></li>
                        <li><a href="https://www.cgv.vn/default/danh-cho-doi-tac/" class="hover:text-white transition duration-150">Hợp tác kinh doanh</a></li>
                    </ul>
                </div>

                <!-- Cột 2: Điều khoản -->
                <div>
                    <h4 class="font-bold text-gray-200 mb-4">ĐIỀU KHOẢN SỬ DỤNG</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="https://www.cgv.vn/default/terms-conditions/" class="hover:text-white transition duration-150">Điều khoản chung</a></li>
                        <li><a href="https://www.cgv.vn/default/privacy-policy/" class="hover:text-white transition duration-150">Chính sách bảo mật</a></li>
                        <li><a href="https://www.cgv.vn/default/payment-policy/" class="hover:text-white transition duration-150">Phương thức thanh toán</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Hỗ trợ -->
                <div>
                    <h4 class="font-bold text-gray-200 mb-4">CHĂM SÓC KHÁCH HÀNG</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="tel:19006017" class="hover:text-white transition duration-150">Hotline: 1900 6017</a></li>
                        <li><a href="mailto:hoidap@cgv.vn" class="hover:text-white transition duration-150">Email: hoidap@cgv.vn</a></li>
                        <li><a href="#" class="hover:text-white transition duration-150">Góp ý/Khiếu nại</a></li>
                    </ul>
                </div>

                <!-- Cột 4: Mạng xã hội -->
                <div>
                    <h4 class="font-bold text-gray-200 mb-4">KẾT NỐI VỚI CHÚNG TÔI</h4>
                    <div class="flex space-x-3">
                        <a href="https://www.facebook.com/cgvcinemavietnam"><img src="https://placehold.co/32x32/3b5998/ffffff?text=F" alt="Facebook" class="rounded-full"></a>
                        <a href="https://www.youtube.com/cgvvietnam"><img src="https://placehold.co/32x32/ff0000/ffffff?text=Y" alt="Youtube" class="rounded-full"></a>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-800 text-center text-gray-500 text-xs">
                © 2025 CGV Clone. All Rights Reserved.
            </div>
        </div>
    </footer>

    <div id="login-required-modal" class="modal">
    <div class="modal-content">
        <span class="close-button absolute top-3 right-5 text-gray-500 hover:text-gray-900 text-2xl font-bold cursor-pointer">&times;</span>
        
        <h2 class="text-2xl font-bold mb-4">🔐 Yêu Cầu Đăng Nhập</h2>
        <p class="text-gray-700 text-lg mb-6">
            Bạn phải *Đăng Nhập* mới có thể đặt được vé xem phim.
        </p>
        
        <div class="modal-actions">
            <button id="go-home-button" class="btn-secondary transition duration-150 hover:bg-gray-200">
                Quay về Trang Chủ
            </button>
            <button id="login-button" class="btn-primary transition duration-150 hover:bg-red-700">
                Đăng Nhập
            </button>
        </div>
    </div>
</div>

    <script>
        // JavaScript cơ bản để xử lý việc chuyển đổi menu trên thiết bị di động
        const mobileMenuButton = document.querySelector('header button.md\\:hidden');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // --- Bổ sung JavaScript cho Carousel Banner ---
        const slides = [
            {
                url : "https://media.lottecinemavn.com/Media/WebAdmin/175691d6357b4061848a3b5c707d5dca.jpg",
                title: "",
                link: "#movie/new-action-hit"
            },
            {
                url: "https://iguov8nhvyobj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/l/t/ltb79_1.jpg",
                title: "",
                link: "#promotion/big-sale"
            },
            {
                url: "https://iguov8nhvyobj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/w/2/w25_logoposter_980x448.jpg",
                title: "",
                link: "#movie/upcoming-superhero"
            },
            {
                url: "https://media.lottecinemavn.com/Media/WebAdmin/3b5344ef85bf4a6da3e25496b695c570.jpg",
                title: "",
                link: "#movie/upcoming-superhero"
            },
            {
                url: "https://iguov8nhvyobj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/9/8/980x448_18__2.jpg",
                title: "",
                link: "#movie/upcoming-superhero"
            }
        ];

        let currentSlideIndex = 0;
        const sliderElement = document.getElementById('banner-slider');

        function renderSlide() {
            const slide = slides[currentSlideIndex];
            
            // Cập nhật nội dung của slider
            sliderElement.innerHTML = `
                <a href="${slide.link}" class="block w-full h-full relative" aria-label="${slide.title}">
                    <img src="${slide.url}" alt="${slide.title}" class="w-full h-full object-cover transition-opacity duration-500 ease-in-out" onerror="this.onerror=null;this.src='https://placehold.co/1200x400/6b7280/ffffff?text=Banner+Error';" loading="lazy">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-4">
                        <!-- Sử dụng font-bold, text-shadow để nổi bật trên nền ảnh -->
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white opacity-95 text-center" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">${slide.title}</h2>
                    </div>
                </a>
            `;
        }

        function nextSlide() {
            currentSlideIndex = (currentSlideIndex + 1) % slides.length;
            renderSlide();
        }
        

        // Tự động chuyển đổi slide sau mỗi 5 giây
        const autoSlide = setInterval(nextSlide, 5000); 

        // Ngừng tự động chuyển khi người dùng tương tác (ví dụ: rê chuột vào)
        sliderElement.addEventListener('mouseover', () => clearInterval(autoSlide));
        // Khởi động lại khi người dùng bỏ rê chuột ra
        sliderElement.addEventListener('mouseleave', () => setInterval(nextSlide, 5000));
        
        // --- Kết thúc Carousel Banner ---

        // JavaScript cho chức năng chuyển đổi tab (Đang Chiếu / Phim Sắp Chiếu)
        const tabCurrent = document.getElementById('tab-current');
        const tabUpcoming = document.getElementById('tab-upcoming');
        const movieList = document.getElementById('movie-list');

        tabUpcoming.addEventListener('click', () => {
            // Thay đổi giao diện của nút
            tabUpcoming.classList.remove('text-gray-400', 'border-transparent');
            tabUpcoming.classList.add('text-[#C80000]', 'border-[#C80000]');

            tabCurrent.classList.remove('text-[#C80000]', 'border-[#C80000]');
            tabCurrent.classList.add('text-gray-400', 'border-transparent');
            
            // Đây chỉ là ví dụ: Nếu là trang thực, bạn sẽ fetch data khác nhau
            movieList.innerHTML = `
                <!-- Nội dung Phim Sắp Chiếu (Placeholder) -->
                <div class="bg-gray-800 rounded-xl p-4 col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-5 text-center">
                    <p class="text-xl text-gray-300 py-10">Danh sách Phim Sắp Chiếu sẽ được cập nhật sớm. Hãy theo dõi!</p>
                </div>
            `;
        });

        tabCurrent.addEventListener('click', () => {
            // Thay đổi giao diện của nút
            tabCurrent.classList.remove('text-gray-400', 'border-transparent');
            tabCurrent.classList.add('text-[#C80000]', 'border-[#C80000]');
            
            tabUpcoming.classList.remove('text-[#C80000]', 'border-[#C80000]');
            tabUpcoming.classList.add('text-gray-400', 'border-transparent');
            
            // Đặt lại nội dung phim đang chiếu ban đầu (Cần dùng Fetch API trong thực tế)
             movieList.innerHTML = `
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://placehold.co/400x600/10b981/ffffff?text=POSTER" alt="Poster Phim" class="w-full h-full object-cover">
                        <button class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <span class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl">Đặt Vé Ngay</span>
                        </button>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">Tên Phim Chi Tiết Dài</h3>
                        <p class="text-xs text-gray-400 mt-1">Hành Động | 120 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://placehold.co/400x600/eab308/000000?text=POSTER" alt="Poster Phim" class="w-full h-full object-cover">
                        <button class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <span class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl">Đặt Vé Ngay</span>
                        </button>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">Phim Hài Hước</h3>
                        <p class="text-xs text-gray-400 mt-1">Hài | 95 phút</p>
                    </div>
                </div>
                
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden sm:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://placehold.co/400x600/3b82f6/ffffff?text=POSTER" alt="Poster Phim" class="w-full h-full object-cover">
                        <button class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <span class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl">Đặt Vé Ngay</span>
                        </button>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">Phim Kinh Dị Mới</h3>
                        <p class="text-xs text-gray-400 mt-1">Kinh Dị | 100 phút</p>
                    </div>
                </div>

                 <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden md:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://placehold.co/400x600/ec4899/ffffff?text=POSTER" alt="Poster Phim" class="w-full h-full object-cover">
                        <button class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <span class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl">Đặt Vé Ngay</span>
                        </button>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">Phim Tình Cảm</h3>
                        <p class="text-xs text-gray-400 mt-1">Tình Cảm | 115 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group hidden lg:block">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://placehold.co/400x600/f97316/ffffff?text=POSTER" alt="Poster Phim" class="w-full h-full object-cover">
                        <button class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <span class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl">Đặt Vé Ngay</span>
                        </button>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">Phim Phiêu Lưu</h3>
                        <p class="text-xs text-gray-400 mt-1">Phiêu Lưu | 150 phút</p>
                    </div>
                </div>
            `;
        });
        
        // Khởi tạo hiển thị slide ban đầu
        renderSlide();
        // --- Bổ sung JavaScript cho Pop-up Đăng nhập ---

// 1. Lấy các phần tử cần thiết
const loginModal = document.getElementById("login-required-modal");
const openModalButtons = document.querySelectorAll(".open-login-modal"); // Tất cả các nút "Đặt Vé Ngay"
const closeButton = loginModal.querySelector(".close-button");
const goHomeButton = document.getElementById("go-home-button");
const loginButton = document.getElementById("login-button");

// 2. Hàm mở Modal
openModalButtons.forEach(button => {
    button.addEventListener('click', function(e) {
        // e.preventDefault(); // Ngăn chặn hành vi mặc định (nếu là thẻ <a>)
        loginModal.style.display = "block";
    });
});

// 3. Đóng Modal khi bấm nút 'x'
closeButton.addEventListener('click', function() {
    loginModal.style.display = "none";
});

// 4. Đóng Modal khi bấm bên ngoài
window.addEventListener('click', function(event) {
    if (event.target === loginModal) {
        loginModal.style.display = "none";
    }
});

// 5. Xử lý nút QUAY VỀ TRANG CHỦ
goHomeButton.addEventListener('click', function() {
    // Chuyển hướng về trang chủ
    window.location.href = "http://localhost/code-php/TTDN/cgvgonah.php"; 
    loginModal.style.display = "none";
});

// 6. Xử lý nút HIỂN THỊ ĐĂNG NHẬP
loginButton.addEventListener('click', function() {
    // Chuyển hướng đến trang đăng nhập
    window.location.href = "http://localhost/code-php/loginrapchieuphim.html"; 
    loginModal.style.display = "none";
});

// Cần khởi tạo lại event listener sau khi nội dung movie-list thay đổi
const initModalListeners = () => {
    document.querySelectorAll(".open-login-modal").forEach(button => {
        button.onclick = () => loginModal.style.display = "block";
    });
};

// **QUAN TRỌNG:** Cập nhật lại listeners trong hàm tabCurrent.addEventListener('click')
tabCurrent.addEventListener('click', () => {
    // ... code chuyển đổi tab ...
    movieList.innerHTML = `
        <button class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 open-login-modal">
            <span class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl">Đặt Vé Ngay</span>
        </button>
        `;
    // GỌI HÀM NÀY SAU KHI NỘI DUNG ĐƯỢC LOAD
    initModalListeners(); 
});

// Khởi tạo listeners ban đầu
initModalListeners();
    </script>
</body>
</html>
