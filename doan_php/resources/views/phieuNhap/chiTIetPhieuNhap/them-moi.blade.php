@extends('home')

@section('content')
<div>
    <h1 class="h2">THÊM SẢN PHẨM NHẬP</h1>
</div>
<form method="POST" action="{{ route('phieuNhap.chiTietPhieuNhap.xl-them-moi', ['id' => $phieuNhap->id ]) }}">
    @csrf
    <div class="col-12">
     @csrf
     <div class="row">
        <div class="row">
            <div class="col-md-10">
                <label for="loaiSP" class="form-label">Sản phẩm ID: </label><span id="id"></span>
                <select name="sanPhamSelect" class="form-select" aria-label="Default select example" id="sanPhamSelect">
                    <option >Sản phẩm nào đây</option>
                    @foreach($dsSanPhamThem as $sanPham)
                        <option value="{{ $sanPham->id }}">{{ $sanPham->ten }}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
     </div>
     <div class="row">
         <div class="col-md-6">
             <label for="gia_nhap" class="form-label">Giá nhập</label>
             <input type="text" name="gia_nhap" class="form-control" id="gia-nhap" >
         </div>
     </div>
     <div class="row">
        <div class="col-md-6">
            <label for="so_luong" class="form-label">Số lượng</label>
            <input type="text" name="so_luong" class="form-control" id="so_luong" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="thanh_tien" class="form-label">Thành tiền</label>
            <input type="text" name="thanh_tien" class="form-control" id="thanh_tien"  readonly>
        </div>
    </div>   
     <div class="row pt-3">
         <div class="col-md-12">
             <button type="submit" class="btn btn-primary">Thêm</button>
         </div>
     </div>
 </div>
 </form>

@endsection

<script src="{{ asset('js/themMoi.js') }}"></script>