<?php

Admin::model(App\Location::class)->title('Locations')->with()->filters(function ()
{

})->columns(function ()
{
	Column::string('name', 'Name');
	Column::string('address', 'Address');
	Column::string('notes', 'Notes');
	Column::lowHigh('type', 'Type')->sortable(false);
	Column::active('status', 'Status');
})->form(function ()
{
	FormItem::text('name', 'Name')->required();
	FormItem::text('address', 'Address');
	FormItem::select('type', 'Type')->list([0 => 'High yield', 1 => 'Low yield'])->required();
	FormItem::select('status', 'Status')->list([0 => 'Active', 1 => 'Inactive'])->required();
	FormItem::ckeditor('notes', 'Notes');
});