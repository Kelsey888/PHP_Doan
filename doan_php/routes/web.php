<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhapHangController;
use App\Models\NhapHang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'XuLyLogin'])->name('xl-login');
Route::get('/dang-xuat', [loginController::class, 'dangXuat'])->name('dangXuat');
// san phẩm


Route::middleware('auth')->group(function(){
    Route::prefix('san-pham')->group(function(){
        Route::name('san-pham.')->group(function(){
            Route::get('/them-moi', [SanPhamController::class, 'themMoi'])->name('them-moi');
            Route::post('/them-moi', [SanPhamController::class, 'xuLyThemMoi'])->name('xl-them-moi');

            Route::get('/', [SanPhamController::class, 'danhSach'])->name('danh-sach')->middleware('auth');

            Route::get('/cap-nhat/{id}', [SanPhamController::class, 'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat/{id}', [SanPhamController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');

            Route::get('/xoa/{id}', [SanPhamController::class, 'xoa'])->name('xoa');
        });

    });
});


//danh mục
Route::middleware('auth')->group(function(){
    Route::prefix('danh-muc')->group(function(){
        Route::name('danh-muc.')->group(function(){
            Route::get('/them-moi', [DanhMucController::class, 'themMoi'])->name('them-moi');
            Route::post('/them-moi', [DanhMucController::class, 'xuLyThemMoi'])->name('xl-them-moi');

            Route::get('/', [DanhMucController::class, 'danhSach'])->name('danh-sach');

            Route::get('/cap-nhat/{id}', [DanhMucController::class, 'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat/{id}', [DanhMucController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');

            Route::get('/xoa/{id}', [DanhMucController::class, 'xoa'])->name('xoa');
        });
    });
});



//Nhà cung cấp
Route::middleware('auth')->group(function(){
    Route::prefix('nha-cung-cap')->group(function(){
        Route::name('nha-cung-cap.')->group(function(){
            Route::get('/them-moi', [NhaCungCapController::class, 'themMoi'])->name('them-moi');
            Route::post('/them-moi', [NhaCungCapController::class, 'xuLyThemMoi'])->name('xl-them-moi');

            Route::get('/', [NhaCungCapController::class, 'danhSach'])->name('danh-sach');

            Route::get('/cap-nhat/{id}', [NhaCungCapController::class, 'capNhat'])->name('cap-nhat');
            Route::post('/cap-nhat/{id}', [NhaCungCapController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');

            Route::get('/xoa/{id}', [NhaCungCapController::class, 'xoa'])->name('xoa');
        });
    });
});




//Nhập Hàng
// Route::get('nhap-hang/them-moi', [NhapHangController::class, 'themMoi'])->name('nhap-hang.them-moi');
// Route::post('nhap-hang/them-moi', [NhapHangController::class, 'xuLyThemMoi'])->name('nhap-hang.xl-them-moi');

// Route::get('nhap-hang', [NhapHangController::class, 'danhSach'])->name('nhap-hang.danh-sach');

