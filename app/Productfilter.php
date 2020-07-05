<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable ;

class Productfilter extends Model
{
    use Translatable ;
    protected $translatable = ['name','company','featuers','aboutProduct'];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
