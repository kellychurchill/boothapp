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

    /**
     * Format the date
     *
     * @return string
     */
    public function getDateAttribute()
    {
        return ($this->attributes['date']) ? date('m/d/Y', strtotime($this->attributes['date'])) : '';
    }

    public static function getList() {
        return static::lists('date', 'id')->all();
    }
}
