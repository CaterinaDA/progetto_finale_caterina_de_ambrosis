<x-layout>

    <div class="container py-5">

        <h1 class="mb-4">Carrello</h1>

        @if (count($cart) === 0)
            <div class="alert alert-info">
                Il carrello è vuoto.
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-dark">
                Vai al catalogo
            </a>
        @else
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Prodotto</th>
                            <th class="text-end">Prezzo</th>
                            <th class="text-center">Quantità</th>
                            <th class="text-end">Totale</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $item['name'] }}</div>
                                    <div class="text-muted small">{{ $item['slug'] }}</div>
                                </td>

                                <td class="text-end">
                                    € {{ number_format($item['price'], 2, ',', '.') }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        {{-- Decremento --}}
                                        <form action="{{ route('cart.update', $item['product_id']) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="action" value="decrease">
                                            <button class="btn btn-outline-secondary btn-sm">-</button>
                                        </form>

                                        <span>{{ $item['quantity'] }}</span>

                                        {{-- Incremento --}}
                                        <form action="{{ route('cart.update', $item['product_id']) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="action" value="increase">
                                            <button class="btn btn-outline-secondary btn-sm">+</button>
                                        </form>

                                    </div>
                                </td>

                                <td class="text-end">
                                    € {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}
                                </td>

                                <td class="text-end">
                                    <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            Rimuovi
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <div class="card p-3">
                    <div class="d-flex justify-content-between gap-4">
                        <span class="fw-semibold">Totale:</span>
                        <span class="fw-bold">€ {{ number_format($total, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                @auth
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark">
                            Conferma ordine
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark">
                        Accedi per completare l'ordine
                    </a>
                @endauth
            </div>

        @endif
    </div>
</x-layout>
