<nav class="navbar">
    <div class="navbar-left">
        <a href="/" class="logo">Darwin Art</a>
    </div>

    <div class="navbar-right">
        <a href="/">Home</a>
        <a href="/cart">Cart</a>
        <a href="/testimonials">Testimonials</a>

        @auth
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>