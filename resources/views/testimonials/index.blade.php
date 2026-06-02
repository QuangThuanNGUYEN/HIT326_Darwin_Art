@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Customer Testimonials</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @auth
        <a href="/testimonials/create">Write a Testimonial</a>
    @endauth

    @if($testimonials->count() > 0)
        @foreach($testimonials as $testimonial)
        <div class="testimonial-card">
            <p>"{{ $testimonial->Content }}"</p>
            <p><strong>{{ $testimonial->customer->CustFName }} {{ $testimonial->customer->CustLName }}</strong></p>
            <p>{{ $testimonial->created_at->format('d M Y') }}</p>
        </div>
        @endforeach
    @else
        <p>No testimonials yet. Be the first to share your experience!</p>
    @endif

</div>

@endsection