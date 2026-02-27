<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Catalogo</h1>
            <span class="text-muted small">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
            </span>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-4">
            <div class="col-12 col-md-4">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">Tutte le categorie</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}"
                            {{ request('category') === $category->slug ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

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

        <div class="mt-5">
            {{ $products->links() }}
        </div>

    </div>
</x-layout>
