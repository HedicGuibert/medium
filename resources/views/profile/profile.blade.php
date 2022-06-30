@extends('layouts.main')

@section('content')
<section class="mb-5 mt-10">

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
                    <form method="POST" action="{{ route('profile_update_informations') }}">
                    @csrf
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" dusk="name" id="name" aria-describedby="name" name="name" value="{{ $user->name }}">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" dusk="email" id="email" aria-describedby="email" name="email" value="{{ $user->email }}">
                          </div>
                        </div>
                      </div>
                      <div class="form-row mt-1 align-items-center">
                        <div class="col-3">
                          <button class="btn btn-secondary" dusk="submit-informations">Sauvegarder</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <h5 class="mb-2 fs-20 font-weight-normal">Mot de passe</h5>
                    <form method="POST" action="{{ route('profile_update_password') }}">
                    @csrf
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" dusk="password" id="password" aria-describedby="password" name="password" value="">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="password_confirmation">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" dusk="confirm" id="password_confirmation" aria-describedby="password_confirmation" name="password_confirmation" value="">
                          </div>
                        </div>
                      </div>
                      <div class="form-row mt-1 align-items-center">
                        <div class="col-3">
                          <button class="btn btn-secondary" dusk="submit-password">Sauvegarder</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5 class="mb-2 fs-20 font-weight-normal">Réseaux sociaux</h5>
                    <form method="POST" action="{{ route('profile_update_socials') }}">
                    @csrf
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" dusk="twitter" id="twitter" aria-describedby="twitter" name="twitter" value="{{ $user->twitterUrl }}">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" dusk="facebook" id="facebook" aria-describedby="facebook" name="facebook" value="{{ $user->facebookUrl }}">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="linkedIn">LinkedIn</label>
                            <input type="text" class="form-control" dusk="linkedIn" id="linkedIn" aria-describedby="linkedIn" name="linkedIn" value="{{ $user->linkedInUrl }}">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-3">
                          <button class="btn btn-secondary" dusk="submit-socials">Sauvegarder</button>
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
