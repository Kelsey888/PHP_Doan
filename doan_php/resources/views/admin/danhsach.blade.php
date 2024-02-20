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
    <h1 class="h2">DANH SÁCH TÀI KHOẢN ADMIN</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('ds-admin.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</td>
                <th>TÊN TÀI KHOẢN</th>
                <th>MẬT KHẨU</th>
                <th>NGÀY LẬP</th>
            </tr>
        </thead>
        <tbody>
        @forelse($DSADmin as $dsAdmin)
        <tr>
            <td>{{ $dsAdmin->id }}</td>
            <td>{{ $dsAdmin->tai_khoan }}</td>
            <td>{{ $dsAdmin->mat_khau }}</td>
            <td>{{ $dsAdmin->created_at }}</td>
            <td>

                 <button type="submit" class="btn btn-info " > <a href="{{ route('ds-admin.cap-nhat', ['id' => $dsAdmin->id]) }}"  class="text-white">Sửa</a></button>
                <button type="submit" class="btn btn-danger"> <a href="{{ route('ds-admin.xoa', ['id' => $dsAdmin->id]) }}" class="text-white">Xoá</a></button>
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
