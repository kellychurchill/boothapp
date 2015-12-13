<?php

namespace App;

use \SleepingOwl\Models\SleepingOwlModel;

class Booth extends SleepingOwlModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['location_id', 'time_slot_id', 'user_id', 'day_id'];

	public function location()
	{
		return $this->belongsTo('App\Location');
	}

	public function day()
	{
		return $this->belongsTo('App\Day');
	}
	public function time_slot()
	{
		return $this->belongsTo('App\TimeSlot');
	}


}
