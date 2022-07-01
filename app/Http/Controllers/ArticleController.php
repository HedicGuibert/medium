<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\DemandeGroupArticleRequest;
use App\Models\Article;
use App\Models\ArticleGroup;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{
    public function index() {
      $articles = Article::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->simplePaginate(5);

      return view('articles.index', ['articles' => $articles]);
    }
    
    public function publicArticle($slug) {
      $article = Article::where('slug', $slug)->first(); 
      $categories = Category::all();
      return view('articles.public_article',compact(['article', 'categories']));
    }
    public function show($id) {
      $article = Article::find($id);  
      $categories = Category::all();
      return view('articles.details',compact(['article', 'categories']));

    }

    public function update(ArticleStoreRequest $request, $id)
    {
        $article = Article::find($id);
        $params = $request->validated();
        if ($request->hasFile('image')) {
            $params['image'] = sprintf(


                  '/images/%s_%d.%s',
                  \pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME),
                  \time(),
                  $request->file('image')->getClientOriginalExtension()
              );

            if (Storage::exists('public'.$params['image'])) {
                Storage::delete('public'.$params['image']);
            }

            $request->file('image')->storeAs('public', $params['image']);
            $request->image->move(public_path('images'), $params['image']);
        }
        $params['slug'] = urlencode($params['title']);

        $article->update($params);

        return redirect()->route('articles');
    }

    public function create()
    {
        return view('articles.create');

    }

    public function store(ArticleStoreRequest $request)
    {
        $params = $request->validated();
        if ($request->hasFile('image')) {
            $params['image'] = sprintf(
                  '/images/%s_%d.%s',
                  \pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME),
                  \time(),
                  $request->file('image')->getClientOriginalExtension()
              );

            if (Storage::exists('public'.$params['image'])) {
                Storage::delete('public'.$params['image']);
            }

            $request->file('image')->storeAs('public', $params['image']);
            $request->image->move(public_path('images'), $params['image']);
        }
        $params['slug'] = urlencode($params['title']);
        $params['user_id'] = Auth::user()->id;
        Article::create($params);

        return redirect()->route('articles');

    }

    public function delete($id)
    {
        $article = Article::find($id);
        if (Storage::exists("public/$article->image")) {
            Storage::delete("public/$article->image");
        }

      $article->delete();
      return redirect()->route('articles');
    }

    public function write_demande($id){
      $article = Article::find($id);
      $article_groups = ArticleGroup::all();
      return view('articles.write_demande', ["article" => $article, "article_groups" => $article_groups]);
    }
    
    public function send_demande(DemandeGroupArticleRequest $request, $id) {
      $params = $request->validated();
      $article = Article::find($id);
      $article->update(["status" => "waiting"]);
      return redirect()->route('articles');
    }

}
