<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Comment extends Model
{
    use Translatable ;
    protected $translatable = ['comment'];
    //on to many relation
    public function products()
    {
    	return  $this->belongsTo('App\Product');
    }
}
