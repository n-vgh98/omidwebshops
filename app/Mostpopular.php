<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Mostpopular extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
