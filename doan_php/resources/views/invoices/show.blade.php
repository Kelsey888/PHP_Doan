
<h2>Thông tin hoá đơn</h2>
<p>Mã đơn hàng: {{ $invoice->id }}</p>
<p>Ngày tạo đơn: {{ $invoice->created_at }}</p>
<p>Người tạo: {{ $invoice->user->name }}</p>
<p>Khách hàng: {{ $invoice->customer->name }}</p>
<p>Tổng tiền: {{ $invoice->total_amount }}</p>
<p>Trạng thái: {{ $invoice->status }}</p>
