@extends('layouts.app')

@section('content')

<div class="product-detail">

    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    @else
        <img src="{{ asset('images/no-image.png') }}" alt="No image available">
    @endif

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