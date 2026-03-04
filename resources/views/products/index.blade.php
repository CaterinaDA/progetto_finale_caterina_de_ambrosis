<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Catalogo</h1>
            <span class="text-muted small">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
            </span>
        </div>
        {{-- form --}}
        <form id="filtersForm" method="GET" action="{{ route('products.index') }}" class="row g-2 mb-4">

            <div class="col-12 col-md-5">
                <input id="searchInput" type="text" name="search" value="{{ request('search') }}"
                    class="form-control" placeholder="Cerca prodotti...">
            </div>

            <div class="col-12 col-md-3">
                <select name="category" class="form-select">
                    <option value="">Tutte le categorie</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}"
                            {{ request('category') === $category->slug ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-2">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="newest" {{ request('sort', 'newest') === 'newest' ? 'selected' : '' }}>
                        Più recenti
                    </option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                        Prezzo crescente
                    </option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>
                        Prezzo decrescente
                    </option>
                </select>
            </div>

            <div class="col-12 col-md-2 d-grid">
                <button class="btn btn-dark" type="submit">Filtra</button>
            </div>

            @if (request('search') || request('category') || request('sort'))
                <div class="col-12">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                        Reset filtri
                    </a>
                </div>
            @endif

        </form>
        {{-- form end --}}
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">

                        <div class="product-placeholder d-flex align-items-center justify-content-center">
                            <span class="text-muted">Immagine</span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h2 class="h6">{{ $product->name }}</h2>

                            <p class="text-muted small mb-2">
                                Categoria: {{ $product->category->name }}
                            </p>

                            @if ($product->description)
                                <p class="text-muted small mb-3">
                                    {{ \Illuminate\Support\Str::limit($product->description, 60) }}
                                </p>
                            @else
                                <p class="text-muted small mb-3">
                                    Nessuna descrizione disponibile.
                                </p>
                            @endif

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€ {{ number_format($product->price, 2, ',', '.') }}</span>
                                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-dark btn-sm">
                                    Dettagli
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        {{-- paginazione con Bootstrap --}}
        <div class="mt-5">
            {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>

    </div>
</x-layout>
