@extends('/layouts/main')

@section('content')
    <div class="container mt-3">
        <h2>Écrire une demande de rejoint un groupe d'article</h2>
        <form action="{{ route('send_demande', $article->id) }}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="" class="form-label">Message</label>
                <textarea type="text" class="form-control"
                    placeholder="Bonjour, je voudrais de publier mon article dans votre groupe..."></textarea>
            </div>
            <label for="">Choisisez un groupe d'article</label>'
            <select name="group" id="" class="form-control">
                @foreach ($article_groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary mt-3">Envoyer</button>
        </form>
    </div>
@endsection
