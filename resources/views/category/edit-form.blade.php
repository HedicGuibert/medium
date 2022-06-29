<form id="edit-form" method="POST"
    action="{{ route('categories.update', ['slug' => session('category') ? session('category')['slug'] : '#']) }}"
    data-link="{{ route('categories.update', ['slug' => '#']) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Catégorie à modifier</label>
        <input type="text" class="form-control disabled" name="old-name" placeholder="Développement Web" disabled
            value="{{ session('category') ? session('category')['slug'] : '' }}">
    </div>

    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text"
            class="form-control  @if (session('action') == 'update') @error('name') is-invalid @enderror @endif"
            required name="name" id="name" placeholder="Développement Web" @if (session('action')=='update' )
            value="{{ old('name') }}" @endif>

        @if (session('action') == 'update')
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}.
        </div>
        @enderror
        @endif
    </div>

    <button class="btn btn-primary" type="submit">Modifier</button>
</form>
