@extends('/layouts/main')
@section('title')
   {{ $article->title }}
@endsection
@section('content')

    <section class="p-0">
        <div class="swiper-container text-white swiper-container-fade swiper-container-initialized swiper-container-horizontal skrollable skrollable-between"
            data-top-top="transform: translateY(0px);" data-top-bottom="transform: translateY(250px);"
            style="transform: translateY(70.1596px);">
            <div class="swiper-wrapper">
                <div class="swiper-slide vh-100 swiper-slide-active"
                    style="width: 1000px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                    @if (isset($article->image))
                        <div class="image image-overlay image-zoom"
                            style="background-image:url('{{ asset("images/$article->image") }}')"></div>
                    @else
                        <div class="image image-overlay image-zoom" style="background-image:url('')"></div>
                    @endif
                    <div class="caption">
                        <div class="container">
                            <div class="row align-items-center vh-100">
                                <div class="col-md-8" data-swiper-parallax-y="-250%"
                                    style="transform: translate3d(0px, 0%, 0px);">
                                    <span class="eyebrow mb-2">{{ $article->created_at }}</span>
                                    <h1 class="display-2">{{ $article->title }}</h1>
                                    <span class="eyebrow mb-2">Publié par {{ $article->user->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-footer mb-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-center">
                                <div class="mouse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </section>
    <section>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <p class="lead">{{ $article->introduction }}</p>
                <hr class="w-25">
                <p>{!! $article->body !!}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="tag-cloud">
                    <a href="">Design</a>
                    <a href="">Development</a>
                    <a href="">Travel</a>
                    <a href="">Web Design</a>
                    <a href="">Marketing</a>
                    <a href="">Research</a>
                    <a href="">Managment</a>
                </div>
            </div>
        </div>
        <div class="container my-3">
            @include('components.comment')
        </div>


    </section>

    <script>

        const anchors = document.querySelectorAll("#anchor");
        const badge = document.getElementById("badge");
        const accordion = document.querySelectorAll(".accord");
        const textArea = document.querySelector("#textArea");
        const form = document.querySelector('#commentForm')
        const hiddenInput = document.querySelector('#hiddenInput')
        const modifyButtons = document.querySelectorAll("#modify");

        accordion.forEach(item => item.addEventListener("click", function (e){
            e.stopPropagation()
        }))
        //When user click on respond button to comment move viewport to the comment section
        anchors.forEach(item => item.addEventListener("click", function(){
            document.getElementById('comment').scrollIntoView({
                behavior: 'smooth'
            });
            resetForm();
            badge.innerHTML =`<button type="button" class="btn btn-outline-primary btn-rounded" onclick="deleteBadge(this)" id="button_response" value="${item.getAttribute("data-id")}">${item.getAttribute("data-name")} <i style="vertical-align: middle;" class="icon-times-circle"></i></button>`;
            hiddenInput.innerHTML = `<input hidden id="comment_id" name="comment_id" value="${ item.getAttribute("data-id") }">`;
            textArea.placeholder = `Vous répondez à ${ item.getAttribute("data-name") }`
        }))

        //When user click on modify button to comment move viewport to the comment section
        modifyButtons.forEach(item => item.addEventListener("click", function(){
            document.getElementById('comment').scrollIntoView({
                behavior: 'smooth'
            });
            badge.innerHTML =`<button type="button" class="btn btn-outline-primary btn-rounded" onclick="deleteBadge(this, true)" id="button_response">Modifier <i style="vertical-align: middle;" class="icon-times-circle"></i></button>`;
            const url = "{{route("modify_comment",["id"=>$article->slug, "comment_id" => 100])}}"

            form.action = url.replace('100', item.getAttribute("data-id"))
            console.log(item)
            textArea.value = item.getAttribute("data-body");
        }))
        function deleteBadge (el, bool = false){
            if(bool){
                resetForm();
            }
            el.remove();
            textArea.placeholder = "Votre message";
            document.getElementById("comment_id").remove();
        }
        function resetForm(){
            form.action = "{{route("create_comment",["id"=>$article->slug])}}";
            textArea.value = "";
        }

        </script>

