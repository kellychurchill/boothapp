<?php namespace App\Column;

use SleepingOwl\Admin\Columns\Column\BaseColumn;

class EarlyLateColumn extends BaseColumn
{

    public function render($instance, $totalCount)
    {
       $content = ($instance->{$this->name}) ? 'Early' : 'Late';
        return parent::render($instance, $totalCount, $content);
    }

}