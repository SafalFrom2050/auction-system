<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return ($user->client_type == 'seller') || ($user->client_type == 'joint');
    }

    public function edit(User $user): bool
    {
        return ($user->client_type == 'seller') || ($user->client_type == 'joint');
    }
}
