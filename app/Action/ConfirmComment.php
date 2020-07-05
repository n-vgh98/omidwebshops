<?php

namespace App\Action;

use TCG\Voyager\Actions\AbstractAction;

class ConfirmComment extends AbstractAction
{
    public function getTitle()
    {
        return __('generic.confirm');
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return url('/admin/confirm_comment', $this->data->{$this->data->getKeyName()});
    }
    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'comments';
    }
}
