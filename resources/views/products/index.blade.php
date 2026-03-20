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
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>
        {{-- paginazione con Bootstrap --}}
        <div class="mt-5">
            {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>

    </div>
</x-layout>
