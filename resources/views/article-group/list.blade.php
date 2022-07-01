@extends('layouts.main')

@section('content')
    <section class="bg-light hero hero-with-header pb-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row aos-init aos-animate" data-aos="fade-up">
                        <div class="col-md-8">
                            <h2 class="text-uppercase font-weight-bold">Liste des Groupes d'articles</h2>
                            {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua.</p> --}}
                        </div>
                    </div>
                    <form method="GET" action="{{ route('search') }}" class="mb-3">
                        @csrf
                        <div class="row gutter-1">

                            <div class="form-group col-md-5">
                                <input dusk="search" type="text" class="form-control-lg form-control" name="input"
                                    placeholder="Destination">
                            </div>
                            <div class="form-group col-md-2">
                                <button dusk="submit" type="submit"
                                    class="btn btn-lg btn-block btn-primary">Search</button>
                            </div>
                        </div>

                    </form>
                    <div class="row gutter-2">
                        @forelse ($articleGroups as $articleGroup)
                            <div class="col-lg-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up">
                                <div class="card rising h-100">
                                    <div class="card-body">
                                        <div class="d-flex row align-content-between h-100 my-2">
                                            <div class="w-100">
                                                <p>Mise à jour le: {{ $articleGroup->updated_at }}</p>
                                                <h3>{{ $articleGroup->name }}</h3>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('detail_article_group', $articleGroup->id) }}"
                                                    class="btn btn-outline-primary btn-rounded">Découvrir @if (count($articleGroup->articles) > 0)
                                                        les {{ count($articleGroup->articles) }} articles
                                                    @endif </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <h3>Aucun groupe d'article n'a été trouvé</h3>
                            </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $articleGroups->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')
