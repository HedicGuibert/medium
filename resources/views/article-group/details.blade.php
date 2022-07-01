@extends('layouts.main')

@section('content')
    <div class="component-example mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-lined" dusk="table_list">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Créateur</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($article_groups->articles as $article)
                                <tr>
                                    <td dusk="title">{{ $article->title }}</td>
                                    <td>{{ $article->user_id }}</td>
                                    <td>{{ $article->updated_at }}</td>
                                    <td class="relative">
                                        <div class="d-flex" style="gap:1em">
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Deny</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
