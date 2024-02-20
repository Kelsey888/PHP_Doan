@extends('layouts.app')

@section('content')
    <h1>Thêm mới nhập hàng</h1>

    <form method="POST" action="{{ route('nhap-hang.xu-ly-them-moi') }}">
        @csrf

        <!-- Các trường thông tin nhập hàng -->
        <div>
            <label for="nha_cung_cap_id">Nhà cung cấp:</label>
            <select name="nha_cung_cap_id" id="nha_cung_cap_id">
                @foreach ($dsNhaCungCap as $nhaCungCap)
                    <option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten_nha_cung_cap }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="ngay_nhap">Ngày nhập:</label>
            <input type="date" name="ngay_nhap" id="ngay_nhap">
        </div>

        <button type="submit">Lưu</button>
    </form>
@endsection
