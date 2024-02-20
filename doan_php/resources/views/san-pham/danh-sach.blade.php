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
    <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('san-pham.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</td>
                <th>MSSP</th>
                <th>TÊN SẢN PHẨM</th>
                <th>MÃ DANH MUC</th>
                <th>GIÁ</th>
                <th>Ảnh Sản Phẩm</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($dsSanPham as $SanPham)
        <tr>
            <td>{{ $SanPham->id }}</td>
            <td>{{ $SanPham->mssp }}</td>
            <td>{{ $SanPham->ten_sp }}</td>
            <td>{{ $SanPham->Danh_Muc_id }}</td>
            <td>{{ $SanPham->gia}}</td>
            <td class="img_sp"><img src="{{ asset($SanPham->anh) }}" alt="Ảnh sản phẩm"></td>

            <td>


            </td>
            <td>
                <button type="submit" class="btn btn-info " > <a href="{{ route('san-pham.cap-nhat', ['id' => $SanPham->id]) }}" class="text-white">Sửa</a></button>
                <button type="submit" class="btn btn-danger"><a href="{{ route('san-pham.xoa', ['id' => $SanPham->id]) }}" class="text-white">Xoá</a></button>
            </td>
        <tr>
        @empty
        <tr>
            <td colspan=7>Không có dữ liệu</td>
        </tr>
        @endforelse
        <tbody>
    </table>
</div>
@endsection
