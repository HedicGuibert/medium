@extends('layouts.main')

@section('content')
<section class="pt-2 mt-5">

      <div class="container">
        <div class="tab-content" id="demo-2">

          <div class="tab-pane active show" id="demo-2-4" role="tabpanel" aria-labelledby="demo-2-4">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8">

                <div class="row mb-4">
                  <div class="col">
                    <div class="boxed">
                      <div class="row align-items-center justify-content-between p-3">
                        <div class="col-md-2 pb-2 pb-md-0 text-center">
                          <img src="https://www.placecage.com/300/300" alt="Avatar">
                        </div>
                        <div class="col-md-5 text-center text-md-left">
                          <h4 class="mb-0"><b>{{ $user->name }}</b></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <h5 class="mb-2 fs-20 font-weight-normal">Informations générales</h5>
                    <form method="POST" action="{{ route('profile_update') }}">
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="firstName">Nom</label>
                            <input type="email" class="form-control" id="firstName" aria-describedby="firstName" value="{{ $user->name }}">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="userMail">Adresse email</label>
                            <input type="email" class="form-control" id="userMail" aria-describedby="userMail" value="{{ $user->email }}">
                          </div>
                        </div>
                      </div>
                      <div class="form-row mt-1 align-items-center">
                        <div class="col-3">
                          <button class="btn btn-secondary">Sauvegarder</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <h5 class="mb-2 fs-20 font-weight-normal">Mot de passe</h5>
                    <form method="POST" action="{{ route('profile_update') }}">
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" aria-describedby="password" value="">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="confirm">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="confirm" aria-describedby="confirm" value="">
                          </div>
                        </div>
                      </div>
                      <div class="form-row mt-1 align-items-center">
                        <div class="col-3">
                          <button class="btn btn-secondary">Sauvegarder</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5 class="mb-2 fs-20 font-weight-normal">Réseaux sociaux</h5>
                    <form method="POST" action="{{ route('profile_update') }}">
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" id="twitter" aria-describedby="twitter" value="{{ $user->twitterUrl }}">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" aria-describedby="facebook" value="{{ $user->facebookUrl }}">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="linkedIn">LinkedIn</label>
                            <input type="text" class="form-control" id="linkedIn" aria-describedby="linkedIn" value="{{ $user->linkedInUrl }}">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-3">
                          <button class="btn btn-secondary">Sauvegarder</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
