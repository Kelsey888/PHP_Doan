@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI DANH MỤC</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('nha-cung-cap.xl-them-moi') }}">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten_nha_cung_cap" class="form-label">Tên Nhà Cung Cáp</label>
                <input type="text" name="ten_nha_cung_cap" class="form-control" id="ten_nha_cung_cap">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="dia_chi" class="form-label">Địa Chỉ</label>
                <input type="text" name="dia_chi" class="form-control" id="dia_chi">
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
