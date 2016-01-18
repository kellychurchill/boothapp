<?php

Admin::model(App\TimeSlot::class)
	->title('Time Slots')
	->with()
	->filters(function () {

})->columns(function ()
{
	Column::string('id', 'ID');
	Column::date('start', 'Start')->format('none', 'short');
	Column::date('end', 'End')->format('none', 'short');
	Column::earlyLate('type', 'Type');
})->form(function ()
{
	FormItem::time('start', 'Start')->required();
	FormItem::time('end', 'End')->required();
	FormItem::select('type', 'Type')->list([1 => 'Early', 0 => 'Late']);
});