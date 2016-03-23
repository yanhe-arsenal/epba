<?php

namespace App\Policies;

use App\User;
use App\Epba_card_request;
use Illuminate\Auth\Access\HandlesAuthorization;

class Epba_card_requestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given epba card request.
     *
     * @param  User  $user
     * @param  Epba_card_request  $epba_card_request
     * @return bool
     */
    public function destroy(User $user, Epba_card_request $epba_card_request)
    {
        return $user->id === $epba_card_request->user_id;
    }
}
