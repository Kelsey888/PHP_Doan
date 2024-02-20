
<h2>Danh sách hoá đơn</h2>
<table>
    <tr>
        <th>Mã đơn hàng</th>
        <th>Ngày tạo đơn</th>
        <th>Người tạo</th>
        <th>Khách hàng</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
    </tr>
    @foreach ($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->created_at }}</td>
            <td>{{ $invoice->user->name }}</td>
            <td>{{ $invoice->customer->name }}</td>
            <td>{{ $invoice->total_amount }}</td>
            <td>{{ $invoice->status }}</td>
        </tr>
    @endforeach
</table>
