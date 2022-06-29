@extends('/layouts/main');
@section("content")

  <form method="POST" action={{route("store_article")}} enctype="multipart/form-data" class="container">
    @csrf
    @method('POST')
    <h1 class="text-center">Créer un nouveau article</h1>
      <div>
      <div class="mb-3">
        <label for="title">Titre</label>
        <input id="title" class="form-control" type="text" placeholder="titre" name="title">
      </div >
      <div class="mb-3">
        <label for="introduction">Introduction</label>
        <input id="introduction" class="form-control" type="text" placeholder="introduction" name="introduction">
      </div >
      <div class="mb-3">
        <label for="body">Content</label>
        <textarea id="body" class="form-control" type="text" placeholder="content"  row="10" style="height:200px" name="body">
        </textarea>
      </div >
        <div class="mb-3"><input type="file" name="image" accept="image/*"></div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  </form>

@endsection
