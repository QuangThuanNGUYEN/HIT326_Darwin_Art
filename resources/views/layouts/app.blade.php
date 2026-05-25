<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Darwin Art</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

</head>

<body>

<nav class="navbar">

    <h2>Darwin Art</h2>

    <div class="nav-links">

        <a href="/">Home</a>
        <a href="/cart">Cart</a>

    </div>

</nav>

<div class="container">

    @yield('content')

</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>