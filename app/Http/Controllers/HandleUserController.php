<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HandleUserController extends Controller
{
    public function list()
    {
        return view('users/list', [
            'users' => User::all(),
            'roles' => array_flip(User::ROLES),
        ]);
    }

    public function show(int $id)
    {
        $user = User::find($id);

        return view('users/show', [
            'user' => $user,
            'roles' => array_flip(User::ROLES),
        ]);
    }

    public function editRole(Request $request, int $id)
    {
        $user = User::find($id);
        $user->role = $request->get('role');

        return back();
    }

    public function editPassword(UpdatePasswordRequest $request, int $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->get('password'));

        return back();
    }

    public function editInformations(Request $request, int $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');

        return back();
    }
}
