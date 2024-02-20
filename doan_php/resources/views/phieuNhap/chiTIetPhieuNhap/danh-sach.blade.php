@extends('home')

@section('content')
<div>
    <h1 class="h2">PHIẾU NHẬP NGÀY: {{$phieuNhap->ngay_nhap}} TỪ: {{$phieuNhap->nha_cung_cap->ten}} </h1>
    <h1 class="h2"> NGƯỜI NHẬP PHIẾU :{{$phieuNhap->nhan_vien->ten}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('phieuNhap.chiTietPhieuNhap.them-moi', ['id'=>$phieuNhap->id]) }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th class="text-center">STT</td>
                <th class="text-center">ID</td>
                <th class="text-center">TÊN SẢN PHẨM</th>         
                <th class="text-center">GIÁ NHẬP</th>
                <th class="text-center">SỐ LƯỢNG</th>
                <th class="text-center">THÀNH TIỀN</th>     
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
        @php
            $stt = 1; // Khởi tạo biến đếm STT
        @endphp
        @forelse($dsSanPhamNhap as $sanPham)       
        <tr>
            <td class="text-center" style="font-size: 21px;">{{$stt}}</td>
            <td class="text-center" style="font-size: 21px;">{{ $sanPham->san_pham_id }}</td>
            <td class="text-center" style="font-size: 21px;">{{ $sanPham->san_pham->ten }}</td>
            <td class="text-center" style="font-size: 21px;">{{ $sanPham->gia_nhap }}</td>
            <td class="text-center" style="font-size: 21px;">{{ $sanPham->so_luong }}</td> 
            <td class="text-center" style="font-size: 21px;">{{ $sanPham->thanh_tien }}</td>                   
            <td class="text-center">
                <button type="button" class="btn btn-primary"><a href="{{ route('phieuNhap.chiTietPhieuNhap.cap-nhat',['id'=>$sanPham->id]) }}" class="nav-link active">Sửa</a></button> 
                <button type="button" class="btn btn-danger"><a href="{{ route('phieuNhap.chiTietPhieuNhap.xoa',['id'=>$sanPham->id]) }}" class="nav-link active">Xóa</a></button> 
            </td>
        <tr>
        @php
            $stt++; // Tăng giá trị STT sau mỗi lần lặp
        @endphp
        @empty
        <tr>
            <td colspan=7>Không có dữ liệu</td>
        </tr>
        @endforelse
        <tbody>
    </table>
</div>
@endsection