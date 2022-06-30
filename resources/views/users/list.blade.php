@extends('layouts.main')
@section('title')
    Gérer les utilisateurs
@endsection
@section('content')
<section class="bg-primary py-10 w-100">
      <div class="container text-white pt-5">
        <div class="row">
          <div class="col">
            <div class="row align-items-center">
                <h2 class="eyebrow fs-22 col-md-6">Name</h2>
                <h2 class="eyebrow fs-22 col-md-3">Role</h2>
                <h2 class="eyebrow fs-22 col-md-3 text-md-right">Member since</h2>
            </div>
            @foreach($users as $user)
                <a href="{{ route('users_show', $user->id) }}" class="job row align-items-center">
                <span class="col-md-6 fs-20 font-weight-light text-white">
                    {{ $user->name }}
                </span>
                <span class="col-md-3">
                    <!-- <select
                        class="form-control send-on-change"
                        dusk="role"
                        id="role"
                        aria-describedby="role"
                        name="role"
                        data-user-id="{{ $user->id }}"
                        value="{{ $roles[$user->role] }}"
                    >
                        @foreach($roles as $role => $value)
                            <option
                                value="{{ $value }}"
                                @if($roles[$user->role] === $role)
                                    selected
                                @endif
                            >
                                {{ $role }}
                            </option>
                        @endforeach
                    </select> -->
                    {{ $roles[$user->role] }}
                </span>
                <span class="col-md-3 text-md-right small">
                    {{ $user->created_at }}
                </span>
                </a>
            @endforeach
          </div>
        </div>
      </div>
    </section>
