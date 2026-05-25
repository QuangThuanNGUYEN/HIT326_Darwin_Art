@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 

    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<h1>Your Cart</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('cart') && count(session('cart')) > 0)

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>

        @foreach(session('cart') as $id => $details)
        <tr>
            <td>{{ $details['name'] }}</td>
            <td>${{ number_format($details['price'], 2) }}</td>
            <td>
                <form action="/cart/update" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $id }}">
                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="0" style="width: 60px;">
                    <button type="submit">Update</button>
                </form>
            </td>
            <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
            <td>
                <form action="/cart/remove" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $id }}">
                    <button type="submit">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach

        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td colspan="2"><strong>${{ number_format($total, 2) }}</strong></td>
        </tr>
    </table>

    <br>

    <form action="/cart/clear" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Clear Cart</button>
    </form>

    <a href="/checkout">Proceed to Checkout</a>

@else
    <p>Your cart is empty. <a href="/">Continue shopping</a></p>
@endif

@endsection