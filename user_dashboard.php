<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV User - Trang Chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        /* Style cho Dropdown Menu của người dùng */
        .user-menu-dropdown {
            top: 100%; /* Đặt dưới nút */
            right: 0;
            z-index: 60; /* Cao hơn header (z-50) */
        }
    </style>
</head>
<body>

    <header class="bg-[#C80000] sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <a href="#" class="text-3xl font-extrabold tracking-wider text-white">CGV</a>
                </div>

                <nav class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="http://localhost/code-php/TTDN/cgvgonah.php" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150">Trang Chủ</a>
                        <a href="http://localhost/code-php/addfilm_user.html" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150">Đặt Vé</a>
                        <a href="#" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150">Liên Hệ</a>
                    </div>
                </nav>
                <div>
                      <!-- Tìm kiếm và Đăng nhập/Đăng ký -->
                <div class="flex items-center space-x-4">             
    <form method="GET" action="http://localhost/code-php/user_searchfilm.php" class="relative hidden sm:block flex items-center bg-white rounded-full p-0">
        <button type="submit" class="absolute right-0 top-0 h-full w-20 text-black-500 hover:text-[#C80000] transition duration-150 flex items-center">Tìm Kiếm</button>
        
        <button type="submit" class="absolute right-0 top-0 h-full w-10 text-gray-500 hover:text-[#C80000] transition duration-150 flex items-center justify-center">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>

    <button class="md:hidden text-white hover:text-gray-200 p-2 rounded-md transition duration-150">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
    </button>

     <div class="relative" id="user-menu-container">
    <button id="user-menu-button" class="flex items-center space-x-2 bg-black hover:bg-red-800 text-white font-medium py-2 px-4 rounded-full transition duration-150 shadow-md">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        <span class="hidden lg:inline">Tài Khoản User</span>
    </button> 
    <div id="user-menu-dropdown" class="user-menu-dropdown absolute hidden right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 z-50">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
            <a href="#profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                Quản lý tài khoản
            </a>
            <a href="#settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                Cài đặt
            </a>
        </div>
        <div class="py-1">
            <a href="http://localhost/code-php/TTDN/cgvgonah.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100" role="menuitem">
                Đăng xuất
            </a>
        </div>
    </div>
</div>
                    
                    <button class="md:hidden text-white hover:text-gray-200 p-2 rounded-md transition duration-150">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-[#a60000] px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="http://localhost/code-php/TTDN/cgvgonah.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-[#C80000]">Trang Chủ</a>
            <a href="http://localhost/code-php/addfilm_user.html" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-[#C80000]">Đặt Vé</a>
            <a href="#" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-[#C80000]">Liên Hệ</a>
        </div>
    </header>

    <main>
        <section class="w-full bg-black py-10 md:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div id="banner-slider" class="h-64 sm:h-96 rounded-xl overflow-hidden shadow-2xl relative bg-gray-700">
    
    <button onclick="prevSlide()" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full transition duration-300 z-10 hidden sm:block" aria-label="Previous Slide">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>

    <button onclick="nextSlide()" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full transition duration-300 z-10 hidden sm:block" aria-label="Next Slide">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

    <div id="banner-indicators" class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
        </div>

    </div>
</div>
            </div>
        </section>

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

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
            <div id="movie-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://media.lottecinemavn.com/Media/MovieFile/MovieImg/202510/11932_103_100002.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
                            <a href="https://www.cgv.vn/default/tee-yod-3.html" class="bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Thông Tin Phim</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-md font-bold truncate text-white">TEE YOD: QUỶ ĂN TẠNG PHẦN 3</h3>
                        <p class="text-xs text-gray-400 mt-1">Kinh Dị | 125 phút</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
                    <div class="h-60 sm:h-80 bg-gray-700 relative">
                        <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/v/l/vlcro_011d_g_vie-vn_70x100_up.jpg" alt="Poster Phim" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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
                            <a href ="http://localhost/code-php/addfilm_user.html" class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</a>
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

    <script>
        // JavaScript cơ bản để xử lý việc chuyển đổi menu trên thiết bị di động
const mobileMenuButton = document.querySelector('header button.md\\:hidden');
const mobileMenu = document.getElementById('mobile-menu');
// JavaScript cho Menu Thả Xuống của Tài Khoản Người Dùng

const userMenuButton = document.getElementById('user-menu-button');
const userMenuDropdown = document.getElementById('user-menu-dropdown');

// 1. Xử lý sự kiện khi bấm vào nút
userMenuButton.addEventListener('click', () => {
    // Sử dụng classList.toggle('hidden') để chuyển đổi trạng thái ẩn/hiện
    userMenuDropdown.classList.toggle('hidden');
});

// 2. Xử lý sự kiện đóng menu khi bấm ra ngoài
document.addEventListener('click', (event) => {
    const userMenuContainer = document.getElementById('user-menu-container');
    
    // Kiểm tra xem vị trí click có nằm ngoài vùng container của menu không
    // (Tức là không phải nút bấm, không phải dropdown, và không phải con của chúng)
    if (!userMenuContainer.contains(event.target)) {
        // Nếu menu đang hiển thị (chưa có class 'hidden'), thì ẩn nó đi
        if (!userMenuDropdown.classList.contains('hidden')) {
            userMenuDropdown.classList.add('hidden');
        }
    }
});

mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

// --- Bổ sung JavaScript cho Carousel Banner (Đã sửa đổi cho nút) ---
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
const indicatorsContainer = document.getElementById('banner-indicators'); 
let autoSlideInterval; 

// --- Hàm tạo và xử lý các chấm tròn ---

function createIndicators() {
    indicatorsContainer.innerHTML = ''; 
    slides.forEach((slide, index) => {
        const indicator = document.createElement('button');
        indicator.classList.add(
            'w-3', 'h-3', 'rounded-full', 'mx-1', 'transition-colors', 'duration-300',
            'focus:outline-none', 'ring-2', 'ring-white', 'ring-offset-2', 'ring-offset-transparent'
        );
        indicator.setAttribute('aria-label', `Go to slide ${index + 1}`);

        indicator.addEventListener('click', () => {
            stopAutoSlide(); 
            currentSlideIndex = index;
            renderSlide();
            startAutoSlide(); 
        });

        indicatorsContainer.appendChild(indicator);
    });
}

function updateIndicators() {
    const indicators = indicatorsContainer.querySelectorAll('button');
    indicators.forEach((indicator, index) => {
        if (index === currentSlideIndex) {
            indicator.classList.add('bg-white');
            indicator.classList.remove('bg-gray-400');
        } else {
            indicator.classList.add('bg-gray-400');
            indicator.classList.remove('bg-white');
        }
    });
}

// --- Hàm Render và Chuyển Slide Cập nhật ---

function renderSlide() {
    const slide = slides[currentSlideIndex];
    
    // TẠO NỘI DUNG SLIDE MỚI
    const newSlideContent = `
        <a href="${slide.link}" class="slide-content block w-full h-full absolute inset-0 transition-opacity duration-500" aria-label="${slide.title}">
            <img src="${slide.url}" alt="${slide.title}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='https://placehold.co/1200x400/6b7280/ffffff?text=Banner+Error';" loading="lazy">
            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-4">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white opacity-95 text-center" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">${slide.title}</h2>
            </div>
        </a>
    `;

    // Thay thế slide cũ mà không ảnh hưởng đến nút điều hướng và chấm tròn
    const oldSlide = sliderElement.querySelector('.slide-content');
    if (oldSlide) {
        oldSlide.remove();
    }
    // Chèn slide mới vào đầu sliderElement (để nó nằm dưới các nút)
    sliderElement.insertAdjacentHTML('afterbegin', newSlideContent); 

    updateIndicators(); 
}

// Hàm chuyển slide TIẾP THEO
function nextSlide() {
    stopAutoSlide(); 
    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    renderSlide();
    startAutoSlide(); 
}

// Hàm chuyển slide TRƯỚC ĐÓ (Mới)
function prevSlide() {
    stopAutoSlide(); 
    // Logic: (index - 1 + length) % length để đảm bảo index không bao giờ âm
    currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length; 
    renderSlide();
    startAutoSlide(); 
}

// Gán các hàm vào window để có thể gọi từ HTML onclick
window.nextSlide = nextSlide;
window.prevSlide = prevSlide;


// --- Xử lý tự động chuyển slide ---

function startAutoSlide() {
    clearInterval(autoSlideInterval); 
    autoSlideInterval = setInterval(nextSlide, 5000);
}

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

sliderElement.addEventListener('mouseover', stopAutoSlide);
sliderElement.addEventListener('mouseleave', startAutoSlide);

// --- Khởi tạo ---

createIndicators();
renderSlide(); 
startAutoSlide();

// --- Kết thúc Carousel Banner ---

// JavaScript cho chức năng chuyển đổi tab (Đang Chiếu / Phim Sắp Chiếu)
const tabCurrent = document.getElementById('tab-current');
const tabUpcoming = document.getElementById('tab-upcoming');
const movieList = document.getElementById('movie-list');

// const loadCurrentMovies = () => {
//     // Đặt lại nội dung phim đang chiếu (Placeholder)
//     movieList.innerHTML = `
//         <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
//             <div class="h-60 sm:h-80 bg-gray-700 relative">
//                 <img src="https://media.lottecinemavn.com/Media/MovieFile/MovieImg/202510/11932_103_100002.jpg" alt="Poster Phim" class="w-full h-full object-cover">
//                 <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
//                     <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
//                     <a href="#" class="bg-gray-600 text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-gray-700 transition duration-150">Thông Tin Phim</a>
//                 </div>
//             </div>
//             <div class="p-3">
//                 <h3 class="text-md font-bold truncate text-white">TEE YOD: QUỶ ĂN TẠNG PHẦN 3</h3>
//                 <p class="text-xs text-gray-400 mt-1">Kinh Dị | 125 phút</p>
//             </div>
//         </div>
//         <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 group">
//             <div class="h-60 sm:h-80 bg-gray-700 relative">
//                 <img src="https://iguov8nhvyobj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/v/l/vlcro_011d_g_vie-vn_70x100_up.jpg" alt="Poster Phim" class="w-full h-full object-cover">
//                 <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 space-y-3">
//                     <button class="open-login-modal bg-[#C80000] text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-red-700 transition duration-150">Đặt Vé Ngay</button>
//                     <a href="#" class="bg-gray-600 text-white font-bold py-3 px-6 rounded-full text-sm uppercase shadow-xl hover:bg-gray-700 transition duration-150">Thông Tin Phim</a>
//                 </div>
//             </div>
//             <div class="p-3">
//                 <h3 class="text-md font-bold truncate text-white">TRÒ CHƠI ẢO GIÁC : ARES</h3>
//                 <p class="text-xs text-gray-400 mt-1">Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu | 105 phút</p>
//             </div>
//         </div>
//         `;
//     initModalListeners(); 
// };


tabUpcoming.addEventListener('click', () => {
    // Logic chuyển đổi tab UI
    tabUpcoming.classList.remove('text-gray-400', 'border-transparent');
    tabUpcoming.classList.add('text-[#C80000]', 'border-[#C80000]');

    tabCurrent.classList.remove('text-[#C80000]', 'border-[#C80000]');
    tabCurrent.classList.add('text-gray-400', 'border-transparent');
    
    // Nội dung Phim Sắp Chiếu
    movieList.innerHTML = `
        <div class="bg-gray-800 rounded-xl p-4 col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-5 text-center">
            <p class="text-xl text-gray-300 py-10">Danh sách Phim Sắp Chiếu sẽ được cập nhật sớm. Hãy theo dõi!</p>
        </div>
    `;
});

tabCurrent.addEventListener('click', () => {
    // Logic chuyển đổi tab UI
    tabCurrent.classList.remove('text-gray-400', 'border-transparent');
    tabCurrent.classList.add('text-[#C80000]', 'border-[#C80000]');
    
    tabUpcoming.classList.remove('text-[#C80000]', 'border-[#C80000]');
    tabUpcoming.classList.add('text-gray-400', 'border-transparent');
    
    loadCurrentMovies(); // Tải lại danh sách phim đang chiếu
});

// Load phim đang chiếu mặc định khi trang tải
loadCurrentMovies();


// --- Bổ sung JavaScript cho Pop-up Đăng nhập (Giữ nguyên) ---

const loginModal = document.getElementById("login-required-modal");
const closeButton = loginModal.querySelector(".close-button");
const goHomeButton = document.getElementById("go-home-button");
const loginButton = document.getElementById("login-button");

const initModalListeners = () => {
    const openModalButtons = document.querySelectorAll(".open-login-modal");
    openModalButtons.forEach(button => {
        button.onclick = (e) => {
            e.preventDefault(); 
            // Nếu bạn đang làm việc với PHP, bạn cần kiểm tra trạng thái đăng nhập ở đây
            // Giả định $is_logged_in là biến được inject từ PHP:
            // if (!$is_logged_in) {
            //     loginModal.style.display = "block";
            // } else {
            //     window.location.href = "http://localhost/code-php/datvephim.html";
            // }
            // Hiện tại, ta chỉ show modal vì không có logic PHP
            loginModal.style.display = "block";
        };
    });
};

closeButton.addEventListener('click', function() {
    loginModal.style.display = "none";
});

window.addEventListener('click', function(event) {
    if (event.target === loginModal) {
        loginModal.style.display = "none";
    }
});

goHomeButton.addEventListener('click', function() {
    window.location.href = "http://localhost/code-php/TTDN/cgvgonah.php"; 
    loginModal.style.display = "none";
});

loginButton.addEventListener('click', function() {
    window.location.href = "http://localhost/code-php/loginrapchieuphim.html"; 
    loginModal.style.display = "none";
});
    </script>


</body>
</html>