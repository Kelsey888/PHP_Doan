@extends('home')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH PHIẾU NHẬP</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('phieuNhap.nhap-hang') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th class="text-center">STT</td>
                <th class="text-center">ID</td>
                <th class="text-center">NGÀY NHẬP</th>         
                <th class="text-center">NHÀ CUNG CẤP</th>
                <th class="text-center">NHÂN VIÊN NHẬP</th>
                <th class="text-center">TỔNG TIỀN</th>     
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
        @php
            $stt = 1; // Khởi tạo biến đếm STT
        @endphp
        @forelse($dsPhieuNhap as $phieuNhap)       
        <tr>
            <td class="text-center" style="font-size: 21px;">{{$stt}}</td>
            <td class="text-center" style="font-size: 21px;">{{ $phieuNhap->id }}</td>
            <td class="text-center" style="font-size: 21px;">{{ $phieuNhap->ngay_nhap }}</td>
            <td class="text-center" style="font-size: 21px;">{{ $phieuNhap->nha_cung_cap->ten }}</td> 
            <td class="text-center" style="font-size: 21px;">{{ $phieuNhap->nhan_vien->ten }}</td>   
            <td class="text-center" style="font-size: 21px;">{{ $phieuNhap->tong_tien }}</td>        
            <td class="text-center">
                <button type="button" class="btn btn-primary"><a href="{{ route('phieuNhap.chiTietPhieuNhap.danh-sach', ['id' => $phieuNhap->id]) }}" class="nav-link active">Chi tiết phiếu nhập</a></button> 
                <button type="button" class="btn btn-danger"><a href="{{ route('phieuNhap.chiTietPhieuNhap.danh-sach', ['id' => $phieuNhap->id]) }}" class="nav-link active">Xóa</a></button> 
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