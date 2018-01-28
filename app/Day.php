<?php

namespace App;

use \SleepingOwl\Models\SleepingOwlModel;

class Day extends SleepingOwlModel 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'weekend', 'status'];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date'];

    public function booths()
    {
        return $this->hasMany('App\Booth');
    }


    public static function getList() {
        return static::lists('date', 'id')->all();
    }
}
