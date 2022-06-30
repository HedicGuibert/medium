<form method="POST" action="{{ route('categories.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" dusk="create-category-name"
            class="form-control @if (session('action') == 'store') @error('name') is-invalid @enderror @endif" required
            name="name" id="name" placeholder="Développement Web" @if (session('action')=='store' )
            value="{{ old('name') }}" @endif>
        @if (session('action') == 'store')
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}.
        </div>
        @enderror
        @endif
    </div>
    <button class="btn btn-primary" type="submit" dusk="create-category-submit">Ajouter</button>
</form>
