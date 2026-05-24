@extends('layouts.app')

@section('content')

<div class="product-detail">

    <img src="{{ asset('storage/' . $product->image) }}">

    <div>

        <h1>{{ $product->name }}</h1>

        <p>{{ $product->description }}</p>

        <h2>${{ $product->price }}</h2>

        <form method="POST" action="/cart/add">
            @csrf

            <input type="hidden"
                   name="product_id"
                   value="{{ $product->id }}">

            <button type="submit">
                Add to Cart
            </button>

        </form>

    </div>

</div>

@endsection