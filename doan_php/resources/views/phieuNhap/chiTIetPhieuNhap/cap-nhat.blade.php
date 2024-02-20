@extends('home')

@section('content')
<div>
    <h1 class="h2">CHỈNH SỬA SẢN PHẨM NHẬP: {{$sanPhamNhap->san_pham->ten}}</h1>
</div>
<form method="POST" action="{{ route('phieuNhap.chiTietPhieuNhap.xl-cap-nhat', ['id' => $sanPhamNhap->id]) }}">
    @csrf
    <div class="col-12">
     @csrf
     <div class="row">
         <div class="col-md-6">
             <label for="ten" class="form-label"> Sản phẩm</label>
             <input type="text" name="ten" class="form-control" id="ten" value="{{ $sanPhamNhap->san_pham->ten }}" readonly>
         </div>
     </div>
     <div class="row">
         <div class="col-md-6">
             <label for="gia_nhap" class="form-label">Giá nhập</label>
             <input type="text" name="gia_nhap" class="form-control" id="gia_nhap" value="{{ $sanPhamNhap->gia_nhap }}">
         </div>
     </div>
     <div class="row">
        <div class="col-md-6">
            <label for="so_luong" class="form-label">Số lượng</label>
            <input type="text" name="so_luong" class="form-control" id="so_luong" value="{{ $sanPhamNhap->so_luong }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="thanh_tien" class="form-label">Thành tiền</label>
            <input type="text" name="thanh_tien" class="form-control" id="thanh_tien" value="{{ $sanPhamNhap->thanh_tien }}" readonly>
        </div>
    </div>   
     <div class="row pt-3">
         <div class="col-md-12">
             <button type="submit" class="btn btn-primary">Lưu</button>
         </div>
     </div>
 </div>
 </form>

@endsection