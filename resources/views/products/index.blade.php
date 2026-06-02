@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Art Collection</h1>
    @if($latestNews)
    <div class="news-banner">
        <h3>Latest News</h3>
        <p>{{ $latestNews->Content }}</p>
        <small>Posted: {{ $latestNews->created_at->format('d M Y') }}</small>
    </div>
    @endif
    <div class="product-grid">

        @foreach($products as $product)

        <div class="product-card">

            <img src="{{ asset('storage/' . $product->image) }}" alt="">

            <h3>{{ $product->name }}</h3>

            <p>${{ $product->price }}</p>

            <a href="/products/{{ $product->id }}" class="btn">
                View Details
            </a>

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

        @endforeach

    </div>
</div>

@endsection