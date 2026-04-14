<div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Catalogo</h1>
        <span class="text-muted small">
            {{ $products->total() }} prodotti
        </span>
    </div>

    <div class="row g-2 mb-4">

        <div class="col-12 col-md-5">
            <input type="text" class="form-control" placeholder="Cerca prodotti..."
                wire:model.live.debounce.300ms="search">
        </div>

        {{-- Filtro categorie --}}
        <div class="col-12 col-md-3">
            <select class="form-select" wire:model.live="category">
                <option value="">Tutte le categorie</option>

                @foreach ($categories as $cat)
                    <option value="{{ $cat->slug }}">
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Filtro prezzo --}}
        <div class="col-12 col-md-2">
            <select class="form-select" wire:model.live="sort">
                <option value="newest">Più recenti</option>
                <option value="price_asc">Prezzo crescente</option>
                <option value="price_desc">Prezzo decrescente</option>
            </select>
        </div>

        <div class="col-12 col-md-2 d-grid">
            <button class="btn btn-outline-secondary"
                wire:click="$set('search', ''); $set('category', ''); $set('sort', 'newest')">
                Reset
            </button>
        </div>

    </div>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-12 col-sm-6 col-lg-4">
                <x-product-card :product="$product" />
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Nessun prodotto trovato.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-5">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

</div>
