@component('mail::message')
# Nouveau commentaire

<b>{{$user_name}}</b> vient de commenter votre article <b><i>"{{$article_name}}"</i></b>!

@component('mail::button', ['url' => $article_url])
Aller voir
@endcomponent

Bonne journée,<br>
{{ config('app.name') }}
@endcomponent
