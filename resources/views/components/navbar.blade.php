<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold" href="{{ route('homepage') }}">
            NovaShop
        </a>

        {{-- Toggler Mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Links --}}
        <div class="collapse navbar-collapse" id="mainNavbar">

            {{-- Left side --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('homepage') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="#">
                        Prodotti
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="#">
                        Carrello
                    </a>
                </li>

            </ul>

            {{-- Right side --}}
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Accedi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm ms-lg-2" href="#">
                        Registrati
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
