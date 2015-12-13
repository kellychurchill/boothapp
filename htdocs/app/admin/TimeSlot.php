<?php

Admin::model(App\TimeSlot::class)
	->title('Time Slots')
	->with()
	->filters(function () {

})->columns(function ()
{
	Column::date('start', 'Start')->format('none', 'short');
	Column::date('end', 'End')->format('none', 'short');
})->form(function ()
{
	FormItem::time('start', 'Start')->required();
	FormItem::time('end', 'End')->required();
});