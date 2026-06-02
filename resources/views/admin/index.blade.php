@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Admin Panel</h1>
    <form method="POST" action="/admin/logout" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <hr>

    <h2>Products</h2>
    <a href="/admin/products/create">Add New Product</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px; width: 100%;">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Available</th>
            <th>Actions</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->category ?? 'N/A' }}</td>
            <td>{{ $product->available ? 'Yes' : 'No' }}</td>
            <td>
                <a href="/admin/products/{{ $product->id }}/edit">Edit</a>

                <form method="POST" action="/admin/products/{{ $product->id }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" style="color:red;">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <hr>

    <h2>Post News Item</h2>
    @if($latestNews)
        <p><strong>Current news:</strong> {{ $latestNews->Content }}</p>
        <p><small>Posted: {{ $latestNews->created_at->format('d M Y') }}</small></p>
    @else
        <p>No news post yet.</p>
    @endif

    <form method="POST" action="/admin/news">
        @csrf
        <textarea name="content" rows="4" placeholder="Write a news update..." required style="width:100%;">{{ old('content') }}</textarea>
        <br>
        <button type="submit">Publish News</button>
    </form>

    <hr>

    <h2>Testimonials</h2>
    <a href="/admin/testimonials">
        View Pending Testimonials
        @if($pendingTestimonials > 0)
            ({{ $pendingTestimonials }} pending)
        @endif
    </a>

</div>

@endsection