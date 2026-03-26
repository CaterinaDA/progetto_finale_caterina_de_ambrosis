<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Modifica categoria</h1>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark btn-sm">
                ← Torna alle categorie
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('admin.categories.update', $category) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome categoria</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $category->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine categoria</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>

                    <div class="mt-3 mb-3">
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                id="previewImage" class="category-preview rounded border">
                        @else
                            <img id="previewImage" src="#" alt="Preview"
                                class="category-preview rounded border d-none">
                        @endif
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
                        Salva modifiche
                    </button>
                </form>

            </div>
        </div>

    </div>
</x-layout>
