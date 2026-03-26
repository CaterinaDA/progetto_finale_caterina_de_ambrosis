<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Admin - Categorie</h1>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-dark">
                Nuova categoria
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Immagine</th>
                        <th>Nome</th>
                        <th>Slug</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                        class="category-thumb rounded">
                                @else
                                    <div
                                        class="category-thumb-placeholder bg-light d-flex align-items-center justify-content-center rounded">
                                        <span class="text-muted small">No img</span>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="btn btn-sm btn-outline-dark">
                                    Modifica
                                </a>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-sm btn-outline-dark">
                                        Modifica
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>

    </div>
</x-layout>
