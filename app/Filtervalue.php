<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filter;
use TCG\Voyager\Traits\Translatable ;

class Filtervalue extends Model
{
    use Translatable ;
    protected $translatable = ['value'];
    public  function  filter()
    {
        return $this->belongsTo('App\Filter');
    }
}
