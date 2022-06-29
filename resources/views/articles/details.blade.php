@extends('/layouts/app');
@section("content")

  <form method="POST" action={{route("update_article", [$article->id])}} enctype="multipart/form-data" class="container">
    @csrf
    @method('PUT')
    <h1 class="text-center">Information sur l'article</h1>
      <div>
      <div class="mb-3">
        <label for="title">Titre</label>
        <input id="title" class="form-control" type="text" placeholder="titre" value="{{$article->title}}" name="title">
      </div >
      <div class="mb-3">
        <label for="introduction">Introduction</label>
        <input id="introduction" class="form-control" type="text" placeholder="introduction" value="{{$article->introduction}}" name="introduction">
      </div >
      <div class="mb-3">
        <label for="introduction">slug</label>
        <input id="introduction" class="form-control" type="text" placeholder="slug" value="{{$article->slug}}" name="slug">
      </div >
      <div class="mb-3">
        <label for="body">Content</label>
        <textarea id="body" class="form-control" type="text" placeholder="content"  row="10" style="height:200px" name="body">
          {{$article->body}}
        </textarea>
      </div >
      <div>
        <img class="img-responsive" style="with:500px; height:500px" src="{{asset($article->image)}}" alt="image">
      </div>
        <div class="mb-3"><input type="file" name="image" accept="image/*"></div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  </form>

@endsection
