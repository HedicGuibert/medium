@extends('/layouts/main')

@section('content')
    <div class="component-example mt-5">
        <div class="container">
            <div><a href={{ route('create_article') }} class="btn btn-success">Ajouter un article</a></div>
            <div class="row">
                <div class="col">
                    <table class="table table-lined" dusk="table_list">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Créateur</th>
                                <th scope="col">État</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td dusk="title">{{ $article->title }}</td>
                                    <td style="word-wrap: break-word" dusk="articleSlug">{{ $article->slug }}</td>
                                    <td>{{ $article->user_id }}</td>
                                    <td>{{ $article->status }}</td>
                                    <td>{{ $article->updated_at }}</td>
                                    <td>
                                        <div class="d-flex" style="gap:2em">
                                            <a class="btn btn-sm btn-primary"
                                                href={{ route('details_article', [$article->id]) }}><i
                                                    class="icon-eye"></i></a>
                                            <form action="{{ route('delete_article', $article->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="icon-trash"></i></button>
                                            </form>
                                            <form method="post" action="{{ route('send_demande', $article->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="icon-mail"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $articles->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
