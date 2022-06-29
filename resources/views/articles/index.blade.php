@extends('/layouts/app')

@section("content")


<div class="component-example">
            <div class="container">
              <div class="row">
                <div class="col">
                  <table class="table table-lined">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Créateur</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($articles as $article)
                        <tr>
                        <th scope="row">{{$article->id}}</th>
                        <td>{{$article->title}}</td>
                        <td>{{$article->user_id}}</td>
                        <td>{{$article->updated_at}}</td>
                        <td>
                          <div class="d-flex justify-content-between">
                          <a class="btn btn-with-ico btn-primary" href={{route('details_article',[$article->id])}}>Afficher</a> 
                          <form action="{{route('delete_article',$article->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Supprimer</button>
                          </form>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection