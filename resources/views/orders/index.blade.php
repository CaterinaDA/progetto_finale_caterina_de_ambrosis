<x-layout>
    <div class="container py-5">

        <h1 class="mb-4">I miei ordini</h1>

        @if ($orders->isEmpty())
            <div class="alert alert-info">
                Non hai ancora effettuato ordini.
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Data</th>
                            <th class="text-end">Totale</th>
                            <th>Stato</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>

                                <td>
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </td>

                                <td class="text-end">
                                    € {{ number_format($order->total_price, 2, ',', '.') }}
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <td class="text-end">
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-dark btn-sm">
                                        Dettagli
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
</x-layout>
