@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Add New Product</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/admin/products" enctype="multipart/form-data">
        @csrf

        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required style="width:100%;"><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4" required style="width:100%;">{{ old('description') }}</textarea><br><br>

        <label>Price ($)</label><br>
        <input type="number" name="price" step="0.01" value="{{ old('price') }}" required><br><br>

        <label>Category</label><br>
        <input type="text" name="category" value="{{ old('category') }}"><br><br>

        <label>Colour</label><br>
        <input type="text" name="colour" value="{{ old('colour') }}"><br><br>

        <label>Size</label><br>
        <input type="text" name="size" value="{{ old('size') }}"><br><br>
        <label>Product Image</label><br>
        <input type="file" name="image" accept="image/*"><br><br>

        <label>
            <input type="checkbox" name="available" checked>
            Available for sale
        </label><br><br>
        <label>
            <input type="checkbox" name="available" checked>
            Available for sale
        </label><br><br>

        <button type="submit">Add Product</button>
        <a href="/admin">Cancel</a>

    </form>

</div>

@endsection