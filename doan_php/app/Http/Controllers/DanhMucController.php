<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    public function themMoi()
    {
        // tra ve view resources/views/them-moi.blade.php
        return view('danh-muc.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $DanhMuc = new DanhMuc();
        $DanhMuc->ten = $request->ten;
        $DanhMuc->save();
        // return "Thêm mới lớp học thành công";
        return redirect()->route('danh-muc.danh-sach')->with(['thong_bao' =>"Thêm mới thành công"]);
    }


    public function danhSach()
    {
        $dsDanhMuc = DanhMuc::all();
        return view("danh-muc.danh-sach", compact('dsDanhMuc'));
    }

    public function capNhat($id)
    {
        $DanhMuc = DanhMuc::find($id);
        if (empty($DanhMuc)) {
            return redirect()->route('danh-muc.danh-sach')->with(['thong_bao' =>"Lớp không tồn tại"]);
        }

        return view('danh-muc.cap-nhat', compact('DanhMuc'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $DanhMuc = DanhMuc::find($id);
        if (empty($DanhMuc)) {
            return redirect()->route('danh-muc.danh-sach')->with(['thong_bao' =>"Lớp không tồn tại"]);
        }

        $DanhMuc->ten = $request->ten;
        $DanhMuc->save();

        return redirect()->route('danh-muc.danh-sach')->with(['thong_bao' =>"Cập nhật Thành Công thành công"]);
    }


    public function xoa($id)
    {
        $DanhMuc = DanhMuc::find($id);
        if (empty($DanhMuc)) {
            return redirect()->route('danh-muc.danh-sach')->with(['thong_bao' =>"Lớp không tồn tại"]);
        }

        $DanhMuc->delete();

        return redirect()->route('danh-muc.danh-sach')->with(['thong_bao' =>"Xoá Thành Công thành công"]);
    }
}
