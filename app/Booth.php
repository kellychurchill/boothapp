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

    public static function getBooths($day, $early = false, $weekend = false) {

       	if ($early) {
    		$type = [1];
    	} else {
    		$type = [0];
    	}
    	if ($weekend) {
    		$type = [0, 1];
    	}
        return Booth::join('days', 'days.id', '=', 'day_id')
        			->join('time_slots', 'time_slots.id', '=', 'time_slot_id')
                    ->where('user_id', 0)
                    ->where('day_id', $day)
                    ->whereIn('time_slots.type', $type)
                    ->orderBy('day_id', 'asc')
                    ->get();
    }



}
