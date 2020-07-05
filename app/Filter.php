<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filtervalue;
use TCG\Voyager\Traits\Translatable ;

class Filter extends Model
{
    use Translatable ;
    protected $translatable = ['name','filtervalues'];
    public function filtervalues()
    {
        return $this->hasMany('App\Filtervalue');
    }
}
