@extends('home')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">NHẬP HÀNG</h1>
</div>



<form action="{{ route('nhapHang.luuPhieuNhap') }}" method="POST">
    @csrf
    <div class="col-12">     
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-md-12">
                        <label for="nha_cung_cap" class="form-label">Nhà cung cấp</label>
                        <select name="nhaCungCapSelect" class="form-select" aria-label="Default select example" id="nhaCungCapSelect">
                            <option >Nhà cung cấp nào đây</option>
                            @foreach($dsNhaCungCap as $nhaCungCap)
                                <option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="nguoi-nhap" class="form-label">Người nhập hàng</label>
                        <select name="nguoiNhapSelect" class="form-select" aria-label="Default select example" id="nguoiNhapSelect">
                            <option >Ai nhập hàng đây</option>
                            @foreach($dsNhanVien as $nhanVien)
                                <option value="{{ $nhanVien->id }}">{{ $nhanVien->ten }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="ngay-nhap" class="form-label">Ngày nhập hàng</label>
                        <input type="text" name="ngay_nhap" class="form-control" id="ngay-nhap">
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-md-10">
                        <label for="loaiSP" class="form-label">Sản phẩm ID: </label><span id="id"></span>
                        <select name="sanPhamSelect" class="form-select" aria-label="Default select example" id="sanPhamSelect">
                            <option >Sản phẩm nào đây</option>
                            @foreach($dsSanPham as $sanPham)
                                <option value="{{ $sanPham->id }}">{{ $sanPham->ten }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="ten-gia" class="form-label">Giá nhập</label>
                        <input type="number" name="gia_nhap" class="form-control" id="gia-nhap" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="ten-gia" class="form-label">Giá bán</label>
                        <input type="number" name="gia_ban" class="form-control" id="gia-ban" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="loaiSP" class="form-label">Loại sản phẩm</label>
                        <select name="loai_id" class="form-select" aria-label="Default select example" id="loai_id">
                            <option selected>Chọn loại sản phẩm</option>
                            @foreach($dsLoaiSP as $loaiSP)
                            <option value="{{ $loaiSP->id }}">{{ $loaiSP->ten }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="so_luong" class="form-label">Số lượng nhập </label>
                        <input type="number" name="so_luong" class="form-control" id="so_luong" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="thanh_tien" class="form-label">Thành tiền</label>
                        <input type="text" name="thanh_tien" class="form-control" id="thanh_tien" readonly>
                    </div>
                </div>
                    
                <div class="row pt-3">
                    <div class="col-md-10 d-flex justify-content-end" >
                        <button type="button"  class="btn btn-primary" id="btn-themSP">Thêm</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH HÀNG NHẬP</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="table-them">
            <thead>
                <tr class="align-middle">
                    <th class="text-center">STT</td>   
                    <th class="text-center">ID</td>             
                    <th class="text-center">TÊN SẢN PHẨM</th>
                    <th class="text-center">GIÁ NHẬP</th>
                    <th class="text-center">GIÁ BÁN</th>
                    <th class="text-center">LOAI</th>
                    <th class="text-center">SỐ LƯỢNG NHẬP</th>
                    <th class="text-center">THÀNH TIỀN</th>                
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody class="text-center">
                
            </tbody>
            <tr class="align-middle">
                <td colspan="7" style="text-align: right; font-weight: bold; font-size: larger;">TỔNG TIỀN:</td>
                <td colspan="1" id="tong_tien" class="text-center" style="font-weight: bold; font-size: larger;"></td>
                <input type="hidden" id="tong_tien_input" name="tongTienInput" value="">
                <td colspan="1" ></td>
            </tr>
        </table>
    </div>
    <input type="hidden" name="jsonSanPhamThem" id="jsonSanPhamThem" value="">
    <button type="submit" class="btn btn-primary" id="btn-luu">Lưu</button>
</form>

@endsection
<script src="{{ asset('js/nhapHang.js') }}"></script>