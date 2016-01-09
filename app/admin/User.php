<?php

Admin::model(App\User::class)
	->title('Troops')
	->with()
	->filters(function ()
{
		ModelItem::filter('status')->title('with status filter');
})
	->columns(function ()
{
	Column::string('id', 'Troop');
	Column::string('name', 'Coordinator');
	Column::string('email', 'Email');
	Column::string('program_level', 'Program Level');
	Column::active('status', 'Status')->append(Column::filter('status')->value('status'));
})->form(function ()
{
	FormItem::text('id', 'Troop Number')->unique()->required();
	FormItem::text('name', 'Coordinator');
	FormItem::text('email', 'Email')->unique()->required();
	FormItem::text('phone', 'Phone');
	FormItem::text('num_girls', 'Number of Girls');
	FormItem::select('program_level', 'Program Level')->enum(['Brownie', 'Junior', 'Cadette', 'Senior', 'Ambassador']);
	FormItem::select('weekend', 'Weekend only?')->list([1 => 'Yes', 0 => 'No']);
	FormItem::select('status', 'Status')->list([1 => 'Active', 0 => 'Inactive'])->required();
});