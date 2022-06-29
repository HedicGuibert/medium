<div class="row justify-content-center">
    <div class="col-lg-10 blockquote-list">
        @isset($article->comments)
            @foreach($article->comments as $comment)
                @if(!$comment->comment_id)
                    @if(sizeof($comment->comments) > 0)
                        <div class="accordion-group" style="cursor: pointer" data-accordion-group>
                            <div class="accordion" style="border: 0" data-accordion>
                                <blockquote class="blockquote blockquote-2 boxed aos-init aos-animate" data-control>
                                    <p>{{ $comment->content }}</p>
                                    <footer class="blockquote-footer">
                                        <div class="row justify-content-between">
                                            <p id="titre" class="mr-3">{{$comment->user->name}}</p>
                                            <div class="row" id="row">
                                                <p id="anchor" data-name="{{$comment->user->name}}" data-id="{{ $comment->id }}" class="text-primary mr-3 respond" style="cursor: pointer">Répondre</p>
                                                <p class="">{{ sizeof($comment->comments)}}<i class="icon-message-circle fs-16 mr-3"></i></p>
                                                <p class="">{{ $comment->like}}<i class="icon-heart2 fs-16 mr-3"></i></p>
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
                                                        <p id="titre">{{$message->user->name}}</p>
                                                        <div class="row" id="row">
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
                                    @if($comment->user_id === 1)
                                        <p id="titre"><i style="color: var(--primary)" class="icon-certificate fs-16 mr-1"></i>{{$comment->user->name}}</p>
                                    @else
                                        <p id="titre">{{$comment->user->name}}</p>
                                    @endif
                                    <div class="row" id="row">
                                        <p id="anchor" data-name="{{$comment->user->name}}" data-id="{{ $comment->id }}" class="text-primary mr-3 respond"  style="cursor: pointer">Répondre  </p>
                                        <p class="">0<i class="icon-message-circle fs-16 mr-3"></i></p>
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
        <form  method="post" action="{{route("create_comment",["id"=>$article->id])}}">
            @csrf
            <div class="form-row mb-1">
                <div id="form">

                </div>
                <div class="col">
                    <textarea class="form-control form-control-minimal" name="content" id="textArea" rows="3" placeholder="Votre message"></textarea>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary px-5">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
</div>
