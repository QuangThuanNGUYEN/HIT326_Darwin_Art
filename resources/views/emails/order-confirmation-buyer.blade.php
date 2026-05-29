<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>

<h1>Thank you for your order!</h1>

<p>Hi {{ $purchase->customer->CustFName }},</p>

<p>Your order has been received and is being processed. Here is a summary of your purchase:</p>

<h3>Order #{{ $purchase->PurchaseNo }}</h3>

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

<h3>Delivery Address</h3>
<p>{{ $purchase->customer->CustFName }} {{ $purchase->customer->CustLName }}</p>
<p>{{ $purchase->customer->Address }}</p>
<p>{{ $purchase->customer->City }}, {{ $purchase->customer->State }}</p>
<p>{{ $purchase->customer->Country }} {{ $purchase->customer->PostCode }}</p>

<br>
<p>Thank you for shopping with Darwin Art Company!</p>

</body>
</html>