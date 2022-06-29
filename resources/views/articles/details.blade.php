@extends('/layouts/main')
@section('content')
    <form method="POST" action={{ route('update_article', [$article->id]) }} enctype="multipart/form-data" class="container"
        style="margin-top:10em; margin-bottom:10em">
        @csrf
        @method('PUT')
        <h1 class="text-center">Information sur l'article</h1>
        <div>
            <div class="mb-3">
                <label for="title">Titre</label>
                <input id="title" class="form-control" type="text" placeholder="titre" value="{{ $article->title }}"
                    name="title">
            </div>
            <div class="mb-3">
                <label for="introduction">Introduction</label>
                <input id="introduction" class="form-control" type="text" placeholder="introduction"
                    value="{{ $article->introduction }}" name="introduction">
            </div>
            <div class="mb-3">
                <label for="body">Content</label>
                <textarea id="body" class="form-control" type="text" placeholder="content" row="10" style="height:200px"
                    name="body">
          {{ $article->body }}
        </textarea>
            </div>
<<<<<<< HEAD

            @if (isset($article->image))
                <div>
                    <img class="img-responsive mb-3" style="with:500px; height:500px" src="{{ asset($article->image) }}"
=======
            @if (isset($article->image))
                <div>
                    <img class="img-responsive" style="with:500px; height:500px" src="{{ asset($article->image) }}"
>>>>>>> 5a4ae84 (add delete article function)
                        alt="image">
                </div>
            @endif
            <div class="mb-3 custom-file">
                <input type="file" class="custom-file-input" name="image" accept="image/*" id="inputfile">
                <label for="inputfile" class="custom-file-label">Choisisez un fichier...</label>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#body',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endsection
