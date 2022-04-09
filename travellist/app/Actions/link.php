<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use TCG\Voyager\Facades\Voyager;
class link extends AbstractAction
{
    public function getTitle()
    {
        return 'Compartir';
    }

    public function getIcon()
    {
        return 'voyager-helm';
    }

    public function getPolicy()
    {
        return 'browse';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return route('compartir', ['id' =>  $this->data->{$this->data->getKeyName()} ]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'reuniones';
    }
}