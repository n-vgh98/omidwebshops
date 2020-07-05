<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Fqa extends Model
{
    //
    use Translatable ;
    protected $translatable = ['question','replay'];
}
