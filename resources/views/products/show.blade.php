<x-layout>
    <div class="container py-5">

        <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-sm mb-4">
            ← Torna al catalogo
        </a>

        <div class="row g-4">

            <div class="mb-4">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="img-fluid product-show-image rounded">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 300px;">
                        <span class="text-muted">Nessuna immagine disponibile</span>
                    </div>
                @endif
            </div>

            <div class="col-12 col-lg-6">
                <h1 class="mb-3">{{ $product->name }}</h1>

                <p class="text-muted">
                    {{ $product->description ?? 'Nessuna descrizione disponibile.' }}
                </p>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <span class="fs-4 fw-bold">
                        € {{ number_format($product->price, 2, ',', '.') }}
                    </span>

                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark">
                            Aggiungi al carrello
                        </button>
                    </form>
                </div>

                <p class="text-muted small mt-3 mb-0">
                    Disponibilità: {{ $product->quantity }} pezzi
                </p>
            </div>

        </div>

    </div>
</x-layout>
