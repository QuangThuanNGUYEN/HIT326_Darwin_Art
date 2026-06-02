@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Pending Testimonials</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($testimonials->count() > 0)

        @foreach($testimonials as $testimonial)
        <div class="testimonial-card">

            <p>"{{ $testimonial->Content }}"</p>
            <p><strong>{{ $testimonial->customer->CustFName }} {{ $testimonial->customer->CustLName }}</strong></p>
            <p>{{ $testimonial->customer->CustEmail }}</p>
            <p>Submitted: {{ $testimonial->created_at->format('d M Y') }}</p>

            <form method="POST" action="/admin/testimonials/{{ $testimonial->TestimonialID }}/approve" style="display:inline;">
                @csrf
                <button type="submit" style="color: green;">Approve</button>
            </form>

            <form method="POST" action="/admin/testimonials/{{ $testimonial->TestimonialID }}/reject" style="display:inline;">
                @csrf
                <button type="submit" style="color: red;">Reject</button>
            </form>

        </div>
        @endforeach

    @else
        <p>No pending testimonials at the moment.</p>
    @endif

    <br>
    <a href="/">Back to Home</a>

</div>

@endsection