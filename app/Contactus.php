<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Contactus extends Model
{
    use Translatable ;
    protected $translatable = ['contact_us'];
    protected $table = 'contact-us' ;
}
