<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSP;
use App\Models\NhaCungCap;
use App\Models\SanPham;
use App\Models\NhanVien;
use App\Models\PhieuNhap;
use App\Models\ChiTietPhieuNhap;

class NhapHangControllers extends Controller
{
    public function danhSach(){
        $dsPhieuNhap = PhieuNhap::all();
        return view('phieuNhap.danh-sach',compact('dsPhieuNhap'));
    }
    public function nhapHang(){
        $dsSanPham = SanPham::all();
        $dsNhaCungCap = NhaCungCap::all();

        return view('phieuNhap.nhap-hang',compact('dsSanPham','dsLoaiSP','dsNhaCungCap','dsNhanVien'));
    }

    public function luuPhieuNhap(Request $request)  {

        $dsSanPhamThem = $request->input('jsonSanPhamThem');
        $dsSanPhamThem = json_decode($dsSanPhamThem, true);

        $id = $request->nhaCungCapSelect;

        $nguoiNhap = $request->nguoiNhapSelect;
        $ngayNhap = $request->ngay_nhap;
        $tongTien = $request->tongTienInput;

        $nhaCungCap = NhaCungCap::find($id);

        $dsSanPham = $nhaCungCap->san_pham;

        $phieuNhap = new PhieuNhap;
        $phieuNhap->nha_cung_cap_id = $nhaCungCap->id;
        $phieuNhap->nhan_vien_id = $nguoiNhap;
        $phieuNhap->ngay_nhap = $ngayNhap;
        $phieuNhap->tong_tien = $tongTien;

        $phieuNhap->ghi_chu = "";
        $phieuNhap->save();

        foreach ($dsSanPhamThem as $sanPhamThem) {

            $chiTietPhieuNhap  = new ChiTietPhieuNhap;
            $chiTietPhieuNhap ->phieu_nhap_id = $phieuNhap->id;
            $chiTietPhieuNhap ->san_pham_id = $sanPhamThem['san_pham_id'];
            $chiTietPhieuNhap ->gia_nhap = $sanPhamThem['gia_nhap'];
            $chiTietPhieuNhap ->gia_ban = $sanPhamThem['gia_ban'];
            $chiTietPhieuNhap ->so_luong = $sanPhamThem['so_luong'];
            $chiTietPhieuNhap ->thanh_tien = $sanPhamThem['thanh_tien'];
            $chiTietPhieuNhap ->save();

            foreach ($dsSanPham as $sanPham){
                if($sanPham->id == $sanPhamThem['san_pham_id']){
                    $sanPham->gia_nhap = $sanPhamThem['gia_nhap'];
                    $sanPham->gia_ban = $sanPhamThem['gia_ban'];
                    $sanPham->so_luong += $sanPhamThem['so_luong'];
                    $sanPham->save();
                }
            };
        };

        return redirect()->action([NhapHangControllers::class, 'danhSach']);
    }

    public function xoa($id){
        $phieuNhap = PhieuNhap::find($id);
        $phieuNhap->delete();
    }

    public function getSanPhamByNhaCungCap(Request $request)
    {
        $nhaCungCap = $request->input('nhaCungCap');
        $getNhaCungCap = NhaCungCap :: find($nhaCungCap);
        // Lấy danh sách sản phẩm dựa trên $nhaCungCap
        $sanPhamList = $getNhaCungCap->san_pham;

        return response()->json($sanPhamList);
    }

    public function getChiTietSanPham($id){
        $chiTietSP = SanPham::find($id);
        return response()->json($chiTietSP);
    }


}
