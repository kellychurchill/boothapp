<?php

namespace App\Repositories;

use App\User;
use App\Booth;
use DB;
use App\Day;

class BoothRepository
{
    /**
     * Get all of the booths for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        $releaseDate =  DB::select('select * from configs where id = ?', [1]);

        return Booth::join('days', 'days.id', '=', 'day_id')
                    ->where('user_id', $user->id)
                    ->where('days.date', '<', $releaseDate[0]->value)
                    ->orderBy('day_id', 'asc')
                    ->get();
    }

    /**
     * Get all of the booths not assigned to a user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function avaialableBooths()
    {
        $releaseDate =  DB::select('select * from configs where id = ?', [1]);
        $today = date('Y-m-d');
        return Booth::join('days', 'days.id', '=', 'day_id')
                    ->where('user_id', 0)
                    ->where('days.date', '<', $releaseDate[0]->value)
                    ->where('days.date', '>', $today)
                    ->orderBy('day_id', 'asc')
                    ->get();
    }

    /**
     * Get all of the booths.
     *
     * @param  User  $user
     * @return Collection
     */
    public function boothReports()
    {
        return Booth::orderBy('day_id', 'asc')->get();
    }

    /**
     * Get all of the unassigned early booths.
     *
     * @param  User  $user
     * @return Collection
     */
    public function earlyBooths( $day)
    {
        return Booth::join('days', 'days.id', '=', 'day_id')
                    ->where('user_id', 0)
                    ->where('day_id', $day)
                    ->orderBy('day_id', 'asc')
                    ->get();
    }

}