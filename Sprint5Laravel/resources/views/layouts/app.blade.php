<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <header>
        <nav>
            <ul>
                <a href="{{ route('home.index') }}"><img class="logo-nav"  src="{{ asset('images/logo.png') }}"></a>
                <li><a  href="{{ route('home.index') }}"><i class="fa-solid fa-house fa-2x"></i> Home</a></li>
                <li><a  href="{{ route('listGames.index') }}" ><i class="fa-solid fa-gamepad fa-2x"></i> Games</a></li>
                @if (!auth()->user())
                    <li><a  href="{{ route('login.index') }}"><i class="fa-solid fa-user fa-2x"></i> Login</a></li>
                    <li><a  href="{{ route('register.index') }}"><i class="fa-solid fa-user fa-2x"></i> Register</a></li>
                @else
                <li><a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping fa-2x"></i> Cart</a></li>
                <li class="fa-solid fa-2x fa-arrow-right-from-bracket"><a href="{{ route('logout.index') }}" > Logout </a></li>
                @endif
            @if (auth()->check() && auth()->user()->role === 'admin')
                <li><a href="{{ route('createGame.index') }}"><i class="fa-regular fa-square-plus"></i> Create Game</a></li>
                <li ><a href="{{ route('createCategory.index') }}"><i class="fa-regular fa-square-plus"></i>Create Category </a></li>
            @endif
                @auth
                    <div>
                        <li> 
                            <img src="{{ asset(auth()->user()->avatar) }}" class="avatar"> 
                        </li>
                    </div>
                @endauth
            </ul>
        </nav>
</header>

    <main>
        @yield('content')
    </main>
<!--
    <footer>
        <p>&copy; 2026 GamersZone</p>
    </footer>

-->
</body>
</html>
