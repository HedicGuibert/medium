<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInformationsRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateSocialsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        return view('profile/profile', [
            'user' => $request->user(),
        ]);
    }

    public function updateInformations(UpdateInformationsRequest $request)
    {
        $request->user()->name = $request->get('name');
        $request->user()->email = $request->get('email');
        $request->user()->save();

        return back();
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->user()->password = Hash::make($request->get('password'));
        $request->user()->save();

        return back();
    }

    public function updateSocials(UpdateSocialsRequest $request)
    {
        $request->user()->twitterUrl = $request->get('twitter');
        $request->user()->facebookUrl = $request->get('facebook');
        $request->user()->linkedInUrl = $request->get('linkedIn');
        $request->user()->save();

        return back();
    }
}
