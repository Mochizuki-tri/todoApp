<?php

namespace App\Policies;

use App\User;
use App\Folder;

class FolderPolicy
{
    // use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }
}
