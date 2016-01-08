<?php

namespace App;

use \SleepingOwl\Models\SleepingOwlModel;

class Location extends SleepingOwlModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'notes', 'type', 'status'];


	protected $hidden = [
		'created_at',
		'updated_at'
	];
	public function booths()
	{
		return $this->hasMany('App\Booth');
	}
	public static function getList() {
		return static::lists('name', 'id')->all();
	}
}
