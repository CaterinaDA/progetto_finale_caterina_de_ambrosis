<div class="card h-100 shadow-sm">

    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top product-image">
    @else
        <div class="product-placeholder d-flex align-items-center justify-content-center">
            <span class="text-muted">Immagine</span>
        </div>
    @endif

    <div class="card-body d-flex flex-column">
        <h2 class="h6">{{ $product->name }}</h2>

        @if ($product->category)
            <p class="text-muted small mb-2">
                Categoria: {{ $product->category->name }}
            </p>
        @endif

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
