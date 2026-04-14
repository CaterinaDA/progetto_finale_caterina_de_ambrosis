<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Admin - Prodotti</h1>

            <a href="{{ route('admin.products.create') }}" class="btn btn-dark">
                Nuovo prodotto
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Immagine</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th class="text-end">Prezzo</th>
                        <th>Attivo</th>
                        <th>Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>

                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        style="width: 70px; height: 70px; object-fit: cover;" class="rounded">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                        style="width: 70px; height: 70px;">
                                        <span class="text-muted small">No img</span>
                                    </div>
                                @endif
                            </td>

                            <td>{{ $product->name }}</td>

                            <td>
                                {{ $product->category->name }}
                            </td>

                            <td class="text-end">
                                € {{ number_format($product->price, 2, ',', '.') }}
                            </td>

                            <td>
                                @if ($product->is_active)
                                    <span class="badge bg-success">Attivo</span>
                                @else
                                    <span class="badge bg-danger">Non attivo</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="btn btn-sm btn-outline-dark">
                                        Modifica
                                    </a>

                                    <form action="{{ route('admin.products.toggle', $product) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        @if ($product->is_active)
                                            <button type="submit" class="btn btn-sm btn-outline-warning">
                                                Disattiva
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                Attiva
                                            </button>
                                        @endif
                                    </form>

                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Sei sicura di voler eliminare questo prodotto?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Elimina
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>

    </div>
</x-layout>
