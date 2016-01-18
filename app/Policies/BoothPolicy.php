<?php

namespace App\Policies;

use App\User;
use App\Booth;

use Illuminate\Auth\Access\HandlesAuthorization;

class BoothPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can return the given booth.
     *
     * @param  User  $user
     * @param  Booth  $booth
     * @return bool
     */
    public function returnBooth(User $user, Booth $booth)
    {
        return $user->id === $booth->user_id;
    } 

    /**
     * Determine if the given user can update the given booth.
     *
     * @param  User  $user
     * @param  Booth  $booth
     * @return bool
     */
    public function updateBooth(User $user, Booth $booth)
    {
        return $user->id === $booth->user_id;
    } 
}
