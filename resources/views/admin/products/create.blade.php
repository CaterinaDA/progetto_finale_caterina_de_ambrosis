<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Nuovo prodotto</h1>

            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark btn-sm">
                ← Torna ai prodotti
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome prodotto</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoria</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            <option value="">Seleziona una categoria</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Prezzo</label>
                            <input type="number" step="0.01" min="0" name="price" id="price"
                                class="form-control" value="{{ old('price') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Quantità</label>
                            <input type="number" min="0" name="quantity" id="quantity" class="form-control"
                                value="{{ old('quantity') }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="is_active" class="form-label">Visibilità</label>
                        <select name="is_active" id="is_active" class="form-select" required>
                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Attivo</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non attivo</option>
                        </select>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-dark">
                        Crea prodotto
                    </button>
                </form>

            </div>
        </div>

    </div>
</x-layout>
