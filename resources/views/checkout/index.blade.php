@extends('layouts.app')

@section('content')

<h1>Checkout</h1>

<form method="POST" action="/order/submit">

    @csrf

    <input type="text"
           name="name"
           placeholder="Full Name"
           required>

    <input type="email"
           name="email"
           placeholder="Email"
           required>

    <textarea name="address"
              placeholder="Address"
              required></textarea>

    <button type="submit">
        Confirm Order
    </button>

</form>

@endsection