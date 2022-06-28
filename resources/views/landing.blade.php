@extends('layouts.main')
@section('title')
    Accueil
@endsection
@section('content')

    <section class="bg-light hero hero-with-header pb-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row aos-init aos-animate" data-aos="fade-up">
                        <div class="col-md-8">
                            <h2 class="text-uppercase font-weight-bold">Accueil</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="row gutter-2">
                        @if($articles->count() > 0)
                            @foreach($articles as $article)
                                <div class="col-lg-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up">
                                    <div class="card rising h-100">
                                        <a href="" class="card-img-container">
                                            <img class="card-img-top" src="../images/demo/fitness/fitness-3.jpg" alt="Image">
                                            <h5 class="card-footer card-title">Shaping</h5>
                                        </a>
                                        <div class="card-body">
                                            <div class="d-flex row align-content-between h-100 ">
                                                <div>
                                                    <p>20/06/2018</p>
                                                    <h3>{{ $article->title }}</h3>
                                                    <p class="card-text">{{ $article->introduction }}</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <a href="" class="btn btn-outline-primary btn-rounded">Découvrir</a>
                                                    <small class="ml-3">3 mins à lire</small>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12">
                                <h3>Aucun article n'a été trouvé</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection