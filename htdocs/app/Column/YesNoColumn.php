<?php namespace App\Column;

use SleepingOwl\Admin\Columns\Column\BaseColumn;

class YesNoColumn extends BaseColumn
{

    public function render($instance, $totalCount)
    {
       $content = ($instance->{$this->name}) ? 'Yes' : 'No';
        return parent::render($instance, $totalCount, $content);
    }

}