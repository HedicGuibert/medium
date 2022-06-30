@extends('layouts.main')
@section('title')
    Favoris
@endsection
@section('content')
<section class="bg-light hero hero-with-header pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row aos-init aos-animate" data-aos="fade-up">
                    <div class="col-md-8">
                        <h2 class="text-uppercase font-weight-bold">Favoris</h2>
                    </div>
                </div>
                <div id="fav_main_content">
                    @include('components.list_articles')
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const addRemoveFavourite = async (state, id) => {
        fetch(`/favourite/${state ? 'remove' : 'add'}/${id}`, {
            method: 'POST',
            credentials: "same-origin",
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        }).then((response) => response.json())
            .then(function(json){
                if(json.success){
                    const article = document.getElementById("article_"+id);
                    const articles = document.querySelectorAll("[id^='article_']");
                    article.remove();

                    if(articles.length == 1){
                        console.log(articles)
                        const mainContent = document.querySelector("#fav_main_content");
                        mainContent.innerHTML = `<div class="col-lg-12"><h3>Aucun article n'a été trouvé</h3></div>`;
                    }
                    toastr.success(json.message,'',{"positionClass":"toast-bottom-right"});

                }else{
                    toastr.warning(json.message,'',{"positionClass":"toast-bottom-right"});
                }
        }).catch(function(error){
            console.log(error);
            toastr.warning("Une erreur s'est produite",'',{"positionClass":"toast-bottom-right"});
        });
    }
</script>
@endsection
