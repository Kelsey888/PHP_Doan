<!-- Giao diện hiển thị danh sách nhập hàng -->
@extends('layouts.app')

@section('content')
    <h1>Danh sách nhập hàng</h1>

    @foreach ($dsNhapHang as $nhapHang)
        <div>
            <p>ID: {{ $nhapHang->id }}</p>
            <p>Tổng tiền: {{ $nhapHang->tong_tien }}</p>
            <p>Ngày nhập: {{ $nhapHang->ngay_nhap }}</p>
        </div>
        <hr>
    @endforeach
@endsection
