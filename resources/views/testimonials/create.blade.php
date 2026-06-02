@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Write a Testimonial</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/testimonials">
        @csrf

        <textarea
            name="content"
            rows="5"
            placeholder="Share your experience with Darwin Art Company..."
            required>{{ old('content') }}</textarea>

        <br>

        <button type="submit">Submit Testimonial</button>
        <a href="/testimonials">Cancel</a>

    </form>

</div>

@endsection