@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Admin Login</h1>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/admin/login">
        @csrf

        <label>Username</label><br>
        <input type="text"
               name="username"
               value="{{ old('username') }}"
               required><br><br>

        <label>Password</label><br>
        <input type="password"
               name="password"
               required><br><br>

        <button type="submit">Login</button>

    </form>

</div>

@endsection