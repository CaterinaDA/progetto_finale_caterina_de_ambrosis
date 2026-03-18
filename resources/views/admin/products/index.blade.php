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

                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
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
            {{ $products->links() }}
        </div>

    </div>
</x-layout>
