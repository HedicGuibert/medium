<<<<<<< HEAD
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

=======
@extends('/layouts/main')
@section('content')
    <form method="POST" action={{ route('store_article') }} enctype="multipart/form-data" class="container "
        style="margin-top:10em; margin-bottom:10em">
        @csrf
        @method('POST')
        <h1 class="text-center">Créer un nouveau article</h1>
        <div>
            <div class="mb-3">
                <label for="title">Titre</label>
                <input id="title" class="form-control" type="text" placeholder="titre" name="title">
            </div>
            <div class="mb-3">
                <label for="introduction">Introduction</label>
                <input id="introduction" class="form-control" type="text" placeholder="introduction" name="introduction">
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea id="content" class="form-control @error('body') is-invalid @enderror" type="text" row="10"
                    style="height:200px" name="body">
                </textarea>
                @error('body')
                    <small lass="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3 custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image"
                    accept="image/*" id="inputfile">
                <label for="inputfile" class="custom-file-label">Choisisez un fichier d'image...</label>

                @error('image')
                    <small lass="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
>>>>>>> 44e062f (initial article test)
@endsection
