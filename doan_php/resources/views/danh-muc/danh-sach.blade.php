@extends('master')

@section('page-js')
    @if(session('thong_bao'))
         <script>
            Swal.fire("{{session('thong_bao')}}");

        </script>
    @endif

@endsection


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH DANH MỤC</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('danh-muc.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</td>
                <th>TÊN DANH MỤC</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($dsDanhMuc as $danhMuc)
        <tr>
            <td>{{ $danhMuc->id }}</td>
            <td>{{ $danhMuc->ten }}</td>
            <td>

                 <button type="submit" class="btn btn-info " > <a href="{{ route('danh-muc.cap-nhat', ['id' => $danhMuc->id]) }}"  class="text-white">Sửa</a></button>
                <button type="submit" class="btn btn-danger"> <a href="{{ route('danh-muc.xoa', ['id' => $danhMuc->id]) }}" class="text-white">Xoá</a></button>
            </td>
        <tr>
        @empty
        <tr>
            <td colspan=3>Không có dữ liệu</td>
        </tr>
        @endforelse
        <tbody>
    </table>
</div>
@endsection
