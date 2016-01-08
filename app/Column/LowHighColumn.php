<?php namespace App\Column;

use SleepingOwl\Admin\Columns\Column\BaseColumn;

class LowHighColumn extends BaseColumn
{

    public function render($instance, $totalCount)
    {
       $content = ($instance->{$this->name}) ? 'High' : 'Low';
        return parent::render($instance, $totalCount, $content);
    }

}