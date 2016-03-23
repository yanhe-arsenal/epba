<?php

namespace App\Repositories;

use App\User;
use App\Epba_card_request;

class Epba_card_requestRepository
{
    /**
     * Get all of the epba card request for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Epba_card_request::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
