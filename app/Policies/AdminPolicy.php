<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function isAdmin(User $user): bool
    {
        return $user->is_admin;
    }
}
