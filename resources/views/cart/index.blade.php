@extends('layouts.app')

@section('content')

<h1>Your Cart</h1>

@if(session('cart'))

<table>

<tr>
    <th>Product</th>
    <th>Qty</th>
    <th>Price</th>
</tr>

@foreach(session('cart') as $id => $details)

<tr>

    <td>{{ $details['name'] }}</td>

    <td>{{ $details['quantity'] }}</td>

    <td>${{ $details['price'] }}</td>

</tr>

@endforeach

</table>

@endif

<a href="/checkout" class="btn">
    Proceed to Checkout
</a>

@endsection