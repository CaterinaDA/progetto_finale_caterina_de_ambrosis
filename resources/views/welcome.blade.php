<x-layout>
    {{-- Hero --}}
    <section class="py-5">
        <div class="container">
            <div class="p-5 bg-light border rounded-3 shadow-sm text-center">

                <h1 class="display-5 fw-bold mb-3">NovaShop</h1>

                <p class="lead text-muted mb-4">
                    Spedizione veloce • Reso facile entro 30 giorni • Assistenza clienti
                </p>

                <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg">
                    Vai al catalogo
                </a>

            </div>
        </div>
    </section>
    {{-- Hero end --}}

    {{-- Categorie --}}
    <section class="py-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0 mt-4">Categorie</h2>
            </div>

            <div class="row g-4">
                @foreach ($categories as $category)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                            class="text-decoration-none">
                            <div class="card h-100 shadow-sm">

                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                        class="card-img-top category-image">
                                @else
                                    <img src="{{ asset('images/categories/default.jpg') }}" alt="{{ $category->name }}"
                                        class="card-img-top category-image">
                                @endif

                                <div class="card-body">
                                    <h3 class="h6 mb-0 text-dark">{{ $category->name }}</h3>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    {{-- Categorie end --}}

    {{-- Prodotti in evidenza --}}
    <section class="py-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0">Prodotti in evidenza</h2>
            </div>

            <div class="row g-4">
                @foreach ($featuredProducts as $product)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Pordotti in evidenza end --}}


</x-layout>
