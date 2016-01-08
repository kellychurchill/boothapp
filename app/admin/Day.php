<?php

Admin::model(App\Day::class)
	->title('Days')
	->with()
	->filters(function () {

})->columns(function ()
{
	Column::string('id', 'ID');
	Column::date('date', 'Date')->formatDate('short');
	Column::yesNo('weekend', 'Weekend');
	Column::active('status', 'Status')->append(Column::filter('status')->value('status'));
})->form(function ()
{
	FormItem::date('date', 'Date')->required()->unique();
	FormItem::checkbox('weekend', 'Weekend?')->required();
	FormItem::checkbox('status', 'Active?')->required();
});