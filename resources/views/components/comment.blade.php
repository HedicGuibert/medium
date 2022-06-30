<div class="row justify-content-center">
    <div class="col-lg-10 blockquote-list">
        @isset($article->comments)
            @foreach($article->comments as $comment)
                @if(!$comment->comment_id)
                    @if(sizeof($comment->comments) > 0)
                        <div class="accordion-group" style="cursor: pointer" data-accordion-group>
                            <div dusk="data-accordion_{{$comment->id}}" class="accordion" style="border: 0" data-accordion>
                                <blockquote class="blockquote blockquote-2 boxed aos-init aos-animate" data-control>
                                    <p>{{ $comment->content }}</p>
                                    <footer class="blockquote-footer">
                                        <div class="row justify-content-between">
                                            @if(auth()->user() != null && $comment->user_id === auth()->user()->id && $article->user->id === auth()->user()->id)
                                                <p id="titre"><i style="color: var(--primary)" class="icon-certificate fs-16 mr-1"></i>{{$comment->user->name}}</p>
                                            @else
                                                <p id="titre">{{$comment->user->name}}</p>
                                            @endif
                                            <div class="row" id="row">
                                                @auth
                                                    <p id="anchor" data-name="{{$comment->user->name}}" data-id="{{ $comment->id }}" class="text-primary mr-3 accord" style="cursor: pointer">Répondre</p>
                                                    @if($comment->user->id === auth()->user()->id)
                                                        <p id="modify" data-body="{{ $comment->content}}" data-id="{{ $comment->id }}" class="text-primary mr-3 accord" style="cursor: pointer">Modifier<p>
                                                    @endif
                                                @endauth
                                                <p>{{ sizeof($comment->comments)}}<i class="icon-message-circle fs-16 mr-3"></i></p>
                                                <p>{{ $comment->like}}<i class="icon-heart2 fs-16 mr-3"></i></p>
                                            </div>
                                        </div>
                                    </footer>
                                </blockquote>
                                <div class="accordion-content" data-content>
                                    <div class="accordion-content-wrapper">
                                        @foreach($comment->comments as $message)
                                            <blockquote class="blockquote blockquote-2 boxed aos-init aos-animate my-2">
                                                <p>{{ $message->content }}</p>
                                                <footer class="blockquote-footer">
                                                    <div class="row justify-content-between">
                                                        @if(auth()->user() && $comment->user_id === auth()->user()->id && $article->user->id === auth()->user()->id)
                                                            <p id="titre"><i style="color: var(--primary)" class="icon-certificate fs-16 mr-1"></i>{{$comment->user->name}}</p>
                                                        @else
                                                            <p id="titre">{{$comment->user->name}}</p>
                                                        @endif
                                                        <div class="row">
                                                            @if(auth()->user() && $message->user->id === auth()->user()->id)
                                                                <p id="modify" data-body="{{ $message->content}}" data-id="{{ $message->id }}" class="text-primary mr-3 accord" style="cursor: pointer">Modifier<p>
                                                            @endif
                                                            <p class="align-content-center">{{ $message->like}}<i class="icon-heart2 fs-16 mr-3"></i></p>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </blockquote>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <blockquote class="blockquote blockquote-2 boxed aos-init aos-animate">
                            <p>{{ $comment->content }}</p>
                            <footer class="blockquote-footer">
                                <div class="row justify-content-between">
                                    @if(auth()->user() != null && $comment->user_id === auth()->user()->id && $article->user->id === auth()->user()->id)
                                        <p id="titre"><i style="color: var(--primary)" class="icon-certificate fs-16 mr-1"></i>{{$comment->user->name}}</p>
                                    @else
                                        <p id="titre">{{$comment->user->name}}</p>
                                    @endif
                                    <div class="row" id="row">
                                        @auth
                                            @if($comment->user->id === auth()->user()->id)
                                                <p dusk="modify_comment_{{ $comment->id }}" id="modify" data-body="{{ $comment->content }}" data-id="{{ $comment->id }}" class="text-primary mr-3 accord" style="cursor: pointer">Modifier<p>
                                            @endif
                                            <p id="anchor" data-name="{{$comment->user->name}}" data-id="{{ $comment->id }}" class="text-primary mr-3 accord"  style="cursor: pointer">Répondre  </p>
                                        @endauth

                                        <p>0<i class="icon-message-circle fs-16 mr-3"></i></p>
                                    </div>
                                </div>
                            </footer>
                        </blockquote>
                    @endif
                @endif
            @endforeach
        @endisset
    </div>
</div>
<div class="row" id="comment">
    <span class="eyebrow mb-1 text-primary mx-2">Laissez un commentaire</span>
</div>
<div class="row">
    <div class="col">
        <div id="badge">

        </div>
        <form id="commentForm"  method="post" action="{{route("create_comment",["id"=>$article->slug])}}">
            @csrf
            <div class="form-row mb-1">
                <div id="hiddenInput">

                </div>
                <div class="col">
                    <textarea dusk="textarea" class="form-control form-control-minimal" name="content" id="textArea" rows="3" placeholder="Votre message"></textarea>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col">
                    <button dusk="submit_comment_form" type="submit" class="btn btn-primary px-5">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
</div>
