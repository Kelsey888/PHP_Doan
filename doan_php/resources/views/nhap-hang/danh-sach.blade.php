@extends('master')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">THÊM HÓA ĐƠN NHẬP</h1>
    </div>
    <div class="row">
            <div class="col-md-6">
                <label for="ncc" class="form-label">Nhà cung cấp</label>
                <select name="ncc" class="form-select" aria-label="Default select example" id="ncc">
                    <option selected>Chọn nhà cung cấp</option>
                    @foreach($dsNhaCungCap as $Nhacc)
                    <option value="{{$Nhacc->id}}">{{$Nhacc->ten}}</option>
                    @endforeach
                </select>
            </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
    </div>
    <div class="row">
            <div class="col-md-6">
                <label for="mssp" class="form-label">Chọn sản phẩm</label>
                <select name="mssp" class="form-select" aria-label="Default select example" id="mssp">
                    <option selected>Chọn sản phẩm</option>
                    @foreach($dsSanPham as $SanPham)
                        <option value="{{$SanPham->id}}">{{$SanPham->ten}}</option>
                    @endforeach
                </select>
            </div>
    </div>
    <div class="row">
            <div class="col-md-6">
                <label for="so-luong" class="form-label">Nhập số lượng</label>
                <input type="number" name="so-luong" class="form-control" id="so-luong" value="0">
            </div>
    </div>
    <div class="row">
            <div class="col-md-6">
                <label for="gia-nhap" class="form-label">Giá nhập</label>
                <input type="number" name="gia-nhap" class="form-control" id="gia-nhap" value="0">
            </div>
    </div>
    <div class="row">
            <div class="col-md-6">
                <label for="gia-ban" class="form-label">Giá bán</label>
                <input type="number" name="gia-ban" class="form-control" id="gia-ban" value="0">
            </div>
    </div>
    <br/>
    <button type="button" id="btn-them" class="btn btn-primary">Thêm</button>

    <br/><br/>
    <form method="POST" action="{{ route('nhap-hang.xl-them-moi') }}">
        @csrf
        <div class="table-responsive">
        <table id="tb-ds-san-pham" border="1" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>NHÀ CUNG CẤP</th>
                    <th>SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ NHẬP</th>
                    <th>GIÁ BÁN</th>
                    <th>THÀNH TIỀN</th>
                </tr>

            </thead>
            <tbody>
            </tbody>

        </table>
<br/><br/>
        <input type="hidden" name="ncc" id="ncc-id" value="1"/>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>

@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-them").click(function(){
            var stt = $('#tb-ds-san-pham tbody tr').length + 1;
            //
            var tenNCC = $('#ncc option:selected').text();
            var idNCC = $('#ncc').val();
            var tenSP = $('#sp option:selected').text();
            var idSP = $('#sp').val();
            var soLuong = $('#so-luong').val();
            var giaNhap = $('#gia-nhap').val();
            var giaBan = $('#gia-ban').val();
            var thanhTien = soLuong * giaNhap;


            var row = `
                <tr>
                    <td>${stt}</td>

                    <td>${tenNCC}<input type="hidden" name="nccID[]" value="${idNCC}" /></td>
                    <td>${tenSP}<input type="hidden" name="spID[]" value="${idSP}" /></td>
                    <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}" /></td>
                    <td>${giaNhap}<input type="hidden" name="giaNhap[]" value="${giaNhap}" /></td>
                    <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}" /></td>
                    <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}" /></td>

                </tr>
            `;

            $("#tb-ds-san-pham tbody").append(row);
        });

        $("#ncc").change(function(){
            $("#ncc-id").val($(this).val());
        });
    });
</script>
@endsection
