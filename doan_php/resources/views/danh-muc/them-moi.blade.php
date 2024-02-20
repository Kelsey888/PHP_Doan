@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI DANH MỤC</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('danh-muc.xl-them-moi') }}">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten-lop" class="form-label">Tên danh mục</label>
                <input type="text" name="ten" class="form-control" id="ten-danh-muc">
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
