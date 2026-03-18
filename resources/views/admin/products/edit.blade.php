<x-layout>
    <div class="container py-5">

        <h1 class="mb-4">Modifica prodotto</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrizione</label>
                <textarea name="description" class="form-control">
{{ old('description', $product->description) }}
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Prezzo</label>
                <input type="number" step="0.01" name="price" class="form-control"
                    value="{{ old('price', $product->price) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Quantità</label>
                <input type="number" name="quantity" class="form-control"
                    value="{{ old('quantity', $product->quantity) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Attivo</label>
                <select name="is_active" class="form-select">
                    <option value="1" {{ $product->is_active ? 'selected' : '' }}>Attivo</option>
                    <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Non attivo</option>
                </select>
            </div>

            <button class="btn btn-dark">Salva modifiche</button>
        </form>

    </div>
</x-layout>
