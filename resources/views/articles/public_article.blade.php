@extends('/layouts/main')
@section("content")

<section class="p-0">
      <div class="swiper-container text-white swiper-container-fade swiper-container-initialized swiper-container-horizontal skrollable skrollable-between" data-top-top="transform: translateY(0px);" data-top-bottom="transform: translateY(250px);" style="transform: translateY(70.1596px);">
        <div class="swiper-wrapper">
          <div class="swiper-slide vh-100 swiper-slide-active" style="width: 1000px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
            @if(isset($article->image))
            <div class="image image-overlay image-zoom" style="background-image:url('{{asset($article->image)}}')" ></div>
            @else
             <div class="image image-overlay image-zoom" style="background-image:url('')" ></div>
             @endif
            <div class="caption">
              <div class="container">
                <div class="row align-items-center vh-100">
                  <div class="col-md-8" data-swiper-parallax-y="-250%" style="transform: translate3d(0px, 0%, 0px);">
                    <h1 class="display-2">{{$article->title}}</h1>
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
      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</section>
<section>
      <div class="container">
        </div>

        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            <p class="lead">{{$article->introduction}}</p>
            <hr class="w-25">
            <p>{{$article->body}}</p>
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
      </div>
    </section>