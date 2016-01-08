<?php

Admin::model(App\Booth::class)
	->title('Booths')
	->with('location', 'day', 'time_slot')
	->filters(function () {

})->columns(function ()
{
	 Column::string('location.name', 'Location');
	 Column::string('day.date', 'Date');
	 Column::string('time_slot.slot', 'Time');
	 Column::string('user_id', 'Troop');
	 Column::string('total', 'Total');


})->form(function ()
{
	FormItem::select('location_id', 'Location')->list('App\Location')->required();
	FormItem::select('day_id', 'Day')->list('App\Day')->required();
	FormItem::select('time_slot_id', 'Time Slot')->list('App\TimeSlot')->required();
	FormItem::select('user_id', 'Troop')->list('App\User');
});