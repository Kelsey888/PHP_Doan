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
    <h1 class="h2">DANH SÁCH NHÀ CUNG CẤP</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('nha-cung-cap.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</td>
                <th>TÊN NHÀ CUNG CẤP</th>
                <th>ĐỊA CHỈ</td>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($dsNhaCungCap as $Nhacc)
        <tr>
            <td>{{ $Nhacc->id }}</td>
            <td>{{ $Nhacc->ten_nha_cung_cap }}</td>
            <td>{{ $Nhacc->dia_chi}}</td>
            <td>

                 <button type="submit" class="btn btn-info " > <a href="{{ route('nha-cung-cap.cap-nhat',
                    ['id' => $Nhacc->id]) }}"  class="text-white">Sửa</a></button>
                <button type="submit" class="btn btn-danger"> <a href="{{ route('nha-cung-cap.xoa',
                    ['id' => $Nhacc->id]) }}" class="text-white">Xoá</a></button>
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
