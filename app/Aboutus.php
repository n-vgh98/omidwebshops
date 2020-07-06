<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Aboutus extends Model
{
    use Translatable ;
    protected $translatable = ['about_us'];
    protected $table = 'about-us' ;

}
