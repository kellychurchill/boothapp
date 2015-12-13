<?php namespace App\Column;

use SleepingOwl\Admin\Columns\Column\BaseColumn;

class ActiveInactiveColumn extends BaseColumn
{

    public function render($instance, $totalCount)
    {
       $content = (($instance->{$this->name}) === 1) ? 'Active' : 'Inactive';
        return parent::render($instance, $totalCount, $content);
    }

}