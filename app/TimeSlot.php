<?php

namespace App;

use \SleepingOwl\Models\SleepingOwlModel;

class TimeSlot extends SleepingOwlModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start', 'end', 'type'];

    public function getSlotAttribute() 
    {
        return date('g:i a', strtotime($this->attributes['start']))  . ' - ' .  date('g:i a', strtotime($this->attributes['end']));
    }

    public function getStartAttribute() {
        return date('g:i a', strtotime($this->attributes['start']));
    }

    public static function getList() 
    {

        return static::all()->lists('slot', 'id')->all();
    }

    public function booths()
    {
        return $this->hasMany('App\Booth');
    }
}
