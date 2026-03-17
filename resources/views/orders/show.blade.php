<x-layout>
    <div class="container py-5">

        <a href="{{ route('orders.index') }}" class="btn btn-outline-dark btn-sm mb-4">
            ← Torna ai miei ordini
        </a>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-1">Ordine #{{ $order->id }}</h1>
                <p class="text-muted mb-0">
                    {{ $order->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

            <span class="badge bg-secondary">
                {{ $order->status }}
            </span>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Prodotto</th>
                        <th class="text-center">Quantità</th>
                        <th class="text-end">Prezzo unitario</th>
                        <th class="text-end">Totale riga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>
                                {{ $item->product->name }}
                            </td>

                            <td class="text-center">
                                {{ $item->quantity }}
                            </td>

                            <td class="text-end">
                                € {{ number_format($item->unit_price, 2, ',', '.') }}
                            </td>

                            <td class="text-end">
                                € {{ number_format($item->unit_price * $item->quantity, 2, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <div class="card p-3">
                <div class="d-flex justify-content-between gap-4">
                    <span class="fw-semibold">Totale ordine:</span>
                    <span class="fw-bold">
                        € {{ number_format($order->total_price, 2, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>

    </div>
</x-layout>
