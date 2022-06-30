<div class="row gutter-2">
    @if ($articles->count() > 0)
    @foreach ($articles as $article)
    <div id="article_{{ $article->id }}" class="col-lg-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up">
        <div class="card rising h-100">
            <a href="" class="card-img-container">
                <img class="card-img-top" src="{{ asset($article->image) }}" alt="Image">
                <h5 class="card-footer card-title">Shaping</h5>
            </a>
            <div class="card-body">
                <div class="d-flex row align-content-between h-100 ">
                    <div>
                        <div class="d-flex justify-content-between">
                            <p>20/06/2018</p>
                            @auth
                            <a dusk="add_to_favorite_{{ $article->slug }}" style="cursor: pointer"
                                onclick="addRemoveFavourite(@if($article->isFavourite() == false) false @else true @endif, {{ $article->id }})"><i
                                    id="{{ $article->id }}"
                                    class="@if($article->isFavourite() == false) icon-heart2 @else icon-heart @endif fs-20 mb-1 text-purple"></i></a>
                            @endauth
                        </div>
                        <h3>{{ $article->title }}</h3>
                        <p class="card-text">{{ $article->introduction }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('public_article', [$article->slug]) }}"
                            class="btn btn-outline-primary btn-rounded">Découvrir</a>
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
<div class="d-flex justify-content-center">
    {{$articles->links()}}
</div>
