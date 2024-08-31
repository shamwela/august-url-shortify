<?php

namespace App\Policies;

use App\Models\User;
use App\Url\Url;

class UrlPolicy
{
    public function viewStats(User $user, Url $url): bool
    {
        return $user->id === $url->user_id;
    }

    public function delete(User $user, Url $url): bool
    {
        return $user->id === $url->user_id;
    }
}
