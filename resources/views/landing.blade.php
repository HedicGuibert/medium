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
                <form method="GET" action="{{ route('search') }}" class="mb-3">
                    <div class="row gutter-1">

                        <div class="form-group col-md-5">
                            <input dusk="search" type="text" class="form-control-lg form-control" name="input"
                                placeholder="Destination">
                        </div>

                        <div class="form-group col-md-2">
                            <button dusk="submit" type="submit" class="btn btn-lg btn-block btn-primary">Search</button>
                        </div>
                    </div>

                </form>
                @include('components.list_articles')
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
                        const heart = document.getElementById(id);
                        toastr.success(json.message,'',{"positionClass":"toast-bottom-right"});
                        if(state) {
                            heart.classList.remove('icon-heart');
                            heart.classList.add('icon-heart2');
                            console.log(heart.parentElement)
                            heart.parentElement.removeAttribute('onclick');
                            heart.parentElement.setAttribute('onclick', `addRemoveFavourite(false, ${id})`);
                            alert('ok')
                        }
                        else{
                            heart.classList.remove('icon-heart2');
                            heart.classList.add('icon-heart');
                            heart.parentElement.removeAttribute('onclick');
                            heart.parentElement.setAttribute('onclick', `addRemoveFavourite(true, ${id})`);
                        }
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
