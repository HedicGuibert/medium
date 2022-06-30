<form method="POST" action="{{ route('article-groups.store') }}" class="w-100">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" dusk="create-article-group-name" class="form-control @error('name') is-invalid @enderror"
            required name="name" id="name" placeholder="Développement Web" value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}.
        </div>
        @enderror
    </div>
    <button class="btn btn-primary btn-sm" type="submit" dusk="create-article-group-submit">Ajouter</button>
</form>
