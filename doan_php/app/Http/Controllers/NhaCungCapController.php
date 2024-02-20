<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;

class NhaCungCapController extends Controller
{
    public function themMoi()
    {
        // tra ve view resources/views/them-moi.blade.php
        return view('nha-cung-cap.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $Nhacc = new NhaCungCap();
        $Nhacc->ten_nha_cung_cap    = $request->ten_nha_cung_cap;
        $Nhacc->dia_chi             = $request->dia_chi;
        $Nhacc->save();
        // return "Thêm mới lớp học thành công";
        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao' =>"Thêm mới thành công"]);
    }
    public function danhSach()
    {
        $dsNhaCungCap = NhaCungCap::all();
        return view("nha-cung-cap.danh-sach", compact('dsNhaCungCap'));
    }

    public function capNhat($id)
    {
        $Nhacc = NhaCungCap::find($id);
        if (empty($Nhacc)) {
            return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao' =>"Lớp không tồn tại"]);
        }

        return view('nha-cung-cap.cap-nhat', compact('Nhacc'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $Nhacc = NhaCungCap::find($id);
        if (empty($Nhacc)) {
            return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao' =>"Lớp không tồn tại"]);
        }

        $Nhacc->ten_nha_cung_cap = $request->ten_nha_cung_cap;
        $Nhacc->dia_chi = $request->dia_chi;
        $Nhacc->save();

        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao' =>"Cập nhật Thành Công thành công"]);
    }


    public function xoa($id)
    {
        $Nhacc = NhaCungCap::find($id);
        if (empty($Nhacc)) {
            return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao' =>"Lớp không tồn tại"]);
        }

        $Nhacc->delete();

        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao' =>"Xoá Thành Công thành công"]);
    }
}
