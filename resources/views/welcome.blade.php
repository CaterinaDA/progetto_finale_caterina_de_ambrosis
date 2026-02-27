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
                {{-- Categoria 1 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="{{ route('products.index', ['category' => 'elettronica']) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">

                            <div class="category-placeholder d-flex align-items-center justify-content-center">
                                <span class="text-muted">Immagine</span>
                            </div>

                            <div class="card-body">
                                <h3 class="h6 mb-0 text-dark">Elettronica</h3>
                            </div>

                        </div>
                    </a>
                </div>

                {{-- Categoria 2 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="{{ route('products.index', ['category' => 'casa']) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">

                            <div class="category-placeholder d-flex align-items-center justify-content-center">
                                <span class="text-muted">Immagine</span>
                            </div>

                            <div class="card-body">
                                <h3 class="h6 mb-0 text-dark">Casa</h3>
                            </div>

                        </div>
                    </a>
                </div>

                {{-- Categoria 3 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="{{ route('products.index', ['category' => 'sport']) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">

                            <div class="category-placeholder d-flex align-items-center justify-content-center">
                                <span class="text-muted">Immagine</span>
                            </div>

                            <div class="card-body">
                                <h3 class="h6 mb-0 text-dark">Sport</h3>
                            </div>

                        </div>
                    </a>
                </div>

                {{-- Categoria 4 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="{{ route('products.index', ['category' => 'moda']) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">

                            <div class="category-placeholder d-flex align-items-center justify-content-center">
                                <span class="text-muted">Immagine</span>
                            </div>

                            <div class="card-body">
                                <h3 class="h6 mb-0 text-dark">Moda</h3>
                            </div>

                        </div>
                    </a>
                </div>

                {{-- Categoria 5 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="{{ route('products.index', ['category' => 'beauty']) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">

                            <div class="category-placeholder d-flex align-items-center justify-content-center">
                                <span class="text-muted">Immagine</span>
                            </div>

                            <div class="card-body">
                                <h3 class="h6 mb-0 text-dark">Beauty</h3>
                            </div>

                        </div>
                    </a>
                </div>

                {{-- Categoria 6 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="{{ route('products.index', ['category' => 'libri']) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">

                            <div class="category-placeholder d-flex align-items-center justify-content-center">
                                <span class="text-muted">Immagine</span>
                            </div>

                            <div class="card-body">
                                <h3 class="h6 mb-0 text-dark">Libri</h3>
                            </div>

                        </div>
                    </a>
                </div>
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

                {{-- Prodotto 1 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">

                        <div class="bg-secondary-subtle d-flex align-items-center justify-content-center">
                            <span class="text-muted">Immagine</span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h3 class="h6">Cuffie Wireless</h3>
                            <p class="text-muted small mb-3">Audio • Bluetooth • 20h</p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€ 49,90</span>
                                <a href="#" class="btn btn-dark btn-sm">Dettagli</a>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Prodotto 2 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-secondary-subtle d-flex align-items-center justify-content-center">
                            <span class="text-muted">Immagine</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h3 class="h6">Lampada da Tavolo</h3>
                            <p class="text-muted small mb-3">Casa • LED • Design</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€ 29,90</span>
                                <a href="#" class="btn btn-dark btn-sm">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Prodotto 3 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-secondary-subtle d-flex align-items-center justify-content-center">
                            <span class="text-muted">Immagine</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h3 class="h6">Tappetino Yoga</h3>
                            <p class="text-muted small mb-3">Sport • Antiscivolo</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€ 19,90</span>
                                <a href="#" class="btn btn-dark btn-sm">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Prodotto 4 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-secondary-subtle d-flex align-items-center justify-content-center">
                            <span class="text-muted">Immagine</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h3 class="h6">Zaino Urban</h3>
                            <p class="text-muted small mb-3">Moda • 20L • Waterproof</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€ 39,90</span>
                                <a href="#" class="btn btn-dark btn-sm">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Prodotto 5 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-secondary-subtle d-flex align-items-center justify-content-center">
                            <span class="text-muted">Immagine</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h3 class="h6">Crema Viso</h3>
                            <p class="text-muted small mb-3">Beauty • Idratante</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€ 14,90</span>
                                <a href="#" class="btn btn-dark btn-sm">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Prodotto 6 --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-secondary-subtle d-flex align-items-center justify-content-center">
                            <span class="text-muted">Immagine</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h3 class="h6">Romanzo Thriller</h3>
                            <p class="text-muted small mb-3">Libri • Bestseller</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€ 12,90</span>
                                <a href="#" class="btn btn-dark btn-sm">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- Pordotti in evidenza end --}}


</x-layout>
