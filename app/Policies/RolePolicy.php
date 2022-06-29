<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function isAuthor(User $user): bool
    {
        return $user->role >= User::ROLE_AUTHOR;
    }

    public function isEditor(User $user): bool
    {
        return $user->role === User::ROLE_EDITOR;
    }
}
