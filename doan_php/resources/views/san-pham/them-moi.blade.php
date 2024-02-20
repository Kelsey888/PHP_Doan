@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI SẢN PHẨM</h1>
</div>

<form action="{{ route('san-pham.xl-them-moi') }}" method="POST" enctype="multipart/form-data">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="mssp" class="form-label">MSSP</label>
                <input type="text" name="mssp" class="form-control" id="mssp">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="ten_sp" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten_sp" class="form-control" id="ten_sp">
            </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="Danh_Muc_id" class="form-label">ID Danh Mục</label>
                    <input type="number" name="Danh_Muc_id" class="form-control" id="Danh_Muc_id">
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <label for="gia" class="form-label">Giá</label>
                <input type="gia" name="gia" class="form-control" id="gia">
            </div>
        </div>

        <div class="col-md-6" ">
            <label for="anh">Ảnh</label>
            <input type="file" name="anh" id="anh" class="form-control">
        </div>
        <div class="row pt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</form>
@endsection
