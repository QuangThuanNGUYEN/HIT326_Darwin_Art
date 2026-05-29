<!DOCTYPE html>
<html>
<head>
    <title>New Order Received</title>
</head>
<body>

<h1>New Order Received</h1>

<p>A new order has been placed. Here are the details:</p>

<h3>Order #{{ $purchase->PurchaseNo }}</h3>

<h3>Customer Details</h3>
<p>Name: {{ $purchase->customer->CustFName }} {{ $purchase->customer->CustLName }}</p>
<p>Email: {{ $purchase->customer->CustEmail }}</p>
<p>Phone: {{ $purchase->customer->Phone }}</p>

<h3>Delivery Address</h3>
<p>{{ $purchase->customer->Address }}</p>
<p>{{ $purchase->customer->City }}, {{ $purchase->customer->State }}</p>
<p>{{ $purchase->customer->Country }} {{ $purchase->customer->PostCode }}</p>

<h3>Order Items</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
    </tr>
    @php $total = 0; @endphp
    @foreach($purchase->purchaseItems as $item)
    @php $total += $item->product->price * $item->Quantity; @endphp
    <tr>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->Quantity }}</td>
        <td>${{ number_format($item->product->price, 2) }}</td>
        <td>${{ number_format($item->product->price * $item->Quantity, 2) }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong>${{ number_format($total, 2) }}</strong></td>
    </tr>
</table>

</body>
</html>