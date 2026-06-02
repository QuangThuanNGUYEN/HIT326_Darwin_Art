@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Edit Product</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/admin/products/{{ $product->id }}">
        @csrf
        @method('PUT')

        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required style="width:100%;"><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4" required style="width:100%;">{{ old('description', $product->description) }}</textarea><br><br>

        <label>Price ($)</label><br>
        <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" required><br><br>

        <label>Category</label><br>
        <input type="text" name="category" value="{{ old('category', $product->category) }}"><br><br>

        <label>Colour</label><br>
        <input type="text" name="colour" value="{{ old('colour', $product->colour) }}"><br><br>

        <label>Size</label><br>
        <input type="text" name="size" value="{{ old('size', $product->size) }}"><br><br>

        <label>
            <input type="checkbox" name="available" {{ $product->available ? 'checked' : '' }}>
            Available for sale
        </label><br><br>

        <button type="submit">Update Product</button>
        <a href="/admin">Cancel</a>

    </form>

</div>

@endsection