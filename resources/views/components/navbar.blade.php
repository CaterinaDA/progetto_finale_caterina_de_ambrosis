<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold" href="{{ route('homepage') }}">
            NovaShop
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Links --}}
        <div class="collapse navbar-collapse" id="mainNavbar">

            @php
                $cart = session('cart', []);
                $cartCount = 0;

                foreach ($cart as $item) {
                    $cartCount += $item['quantity'];
                }
            @endphp

            {{-- Lato sinistro --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('homepage') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">
                        Prodotti
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link position-relative {{ request()->is('cart') ? 'active' : '' }}"
                        href="{{ route('cart.index') }}">
                        🛒 Carrello

                        @if ($cartCount > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                </li>

            </ul>

            {{-- Lato destro --}}
            <ul class="navbar-nav ms-auto align-items-center">

                {{-- Guest --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Registrati
                        </a>
                    </li>
                @endguest

                {{-- Auth --}}
                @auth
                    {{-- I miei ordini --}}
                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}" class="nav-link">
                            I miei ordini
                        </a>
                    </li>

                    {{-- Link solo per Admin --}}
                    @if (Auth::user()->is_admin)
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link">
                                Admin prodotti
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                Admin categorie
                            </a>
                        </li>
                    @endif

                    {{-- Nome utente --}}
                    <li class="nav-item">
                        <span class="nav-link">
                            {{ Auth::user()->name }}
                        </span>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light ms-2">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>
