<x-layout>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Nuova categoria</h1>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark btn-sm">
                ← Torna alle categorie
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome categoria</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}" required>
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
                        Crea categoria
                    </button>
                </form>

            </div>
        </div>

    </div>
</x-layout>
