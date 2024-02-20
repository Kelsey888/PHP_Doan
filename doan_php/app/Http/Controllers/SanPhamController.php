<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DanhMuc;


class SanPhamController extends Controller
{
    public function themMoi()
    {
        # Lấy danh sách danh mục
        $dsDanhMuc = DanhMuc::all();

        return view('san-pham.them-moi', compact('dsDanhMuc'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $sanPham = new SanPham();
        $sanPham->mssp = $request->mssp;
        $sanPham->ten_sp = $request->ten_sp;
        $sanPham->Danh_Muc_id = $request->Danh_Muc_id;
        $sanPham->gia = $request->gia;

        if ($request->hasFile('anh') && $request->file('anh')->isValid()) {
            $file = $request->file('anh');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $fileName);
            $sanPham->anh = 'images/' . $fileName;
        } else {
            $sanPham->anh = 'Lỗi'; // Hoặc giá trị mặc định khác tùy thuộc vào yêu cầu của bạn
        }

        $sanPham->save();

        return redirect()->route('san-pham.danh-sach')->with(['thong_bao' => "Thêm thành công"]);
    }


     public function danhSach()
    {
        $adminlogin =session()->get('admin_login');
        if(empty($adminlogin)){
            return redirect()->route('login');
        }
        $dsSanPham = SanPham::all();
        return view("san-pham.danh-sach",compact('dsSanPham') );
    }
    public function capNhat($id)
    {
        $SanPham = SanPham::find($id);
        if (empty($SanPham)) {
            return "Sản Phẩm khong ton tai";
        }
        return view('san-pham.cap-nhat', compact('SanPham'));
        }
    public function xuLyCapNhat(Request $request, $id)
    {
        $sanPham = SanPham::find($id);
        if (empty($sanPham)) {
            return redirect()->route('san-pham.danh-sach')->with(['thong_bao' =>"Sản phẩm không tồn tại"]);
        }
        $sanPham->mssp         = $request->mssp;
        $sanPham->ten_sp       = $request->ten_sp;
        $sanPham->Danh_Muc_id  = $request->Danh_Muc_id;
        $sanPham->gia          = $request->gia;
        if ($request->hasFile('anh') && $request->file('anh')->isValid()) {
            $file = $request->file('anh');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $fileName);
            $sanPham->anh = 'images/' . $fileName;
        } else {
            $sanPham->anh = ''; // Hoặc giá trị mặc định khác tùy thuộc vào yêu cầu của bạn
        }
        $sanPham->save();
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao' =>"Cập nhật thành công"]);
    }

    public function xoa($id)
    {
        $SanPham = SanPham::find($id);
        if (empty($SanPham)) {
            return redirect()->route('san-pham.danh-sach')->with(['thong_bao' =>"Sản phẩm không tồn tại "]);
        }
        $SanPham->delete();

        return redirect()->route('san-pham.danh-sach')->with(['thong_bao' =>"Xoá Thành Công "]);
    }
}
