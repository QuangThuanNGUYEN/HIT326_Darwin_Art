@extends('layouts.app')

@section('content')

<h1>Checkout</h1>

@if(session('cart') && count(session('cart')) > 0)

    <form method="POST" action="/order/submit">
        @csrf

        <h3>Your Details</h3>

        <input type="text"
               name="first_name"
               placeholder="First Name"
               value="{{ old('first_name') }}"
               required>

        <input type="text"
               name="last_name"
               placeholder="Last Name"
               value="{{ old('last_name') }}"
               required>

        <input type="email"
               name="email"
               placeholder="Email Address"
               value="{{ old('email') }}"
               required>

        <input type="text"
               name="phone"
               placeholder="Phone Number"
               value="{{ old('phone') }}"
               required>

        <h3>Delivery Address</h3>

        <input type="text"
               name="address"
               placeholder="Street Address"
               value="{{ old('address') }}"
               required>

        <input type="text"
               name="city"
               placeholder="City"
               value="{{ old('city') }}"
               required>

        <input type="text"
               name="state"
               placeholder="State"
               value="{{ old('state') }}"
               required>

        <input type="text"
               name="country"
               placeholder="Country"
               value="{{ old('country') }}"
               required>

        <input type="text"
               name="postcode"
               placeholder="Postcode"
               value="{{ old('postcode') }}"
               required>

        <h3>Order Summary</h3>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity']; @endphp
            <tr>
                <td>{{ $details['name'] }}</td>
                <td>{{ $details['quantity'] }}</td>
                <td>${{ number_format($details['price'], 2) }}</td>
                <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>${{ number_format($total, 2) }}</strong></td>
            </tr>
        </table>

        <br>

        <button type="submit">Confirm Order</button>

    </form>

@else
    <p>Your cart is empty. <a href="/">Continue shopping</a></p>
@endif

@endsection