<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  App\Productimage;
use App\Mostpopular;
use App\OfferOfDay;
use test\Mockery\ReturnTypeObjectTypeHint;
use TCG\Voyager\Traits\Translatable ;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Product extends Model
{
    use Translatable ;
    protected $translatable = ['name','company','featuers','aboutProduct'];
    public $additional_attributes = ['fullname'];
        public function comments()
        {
            return $this->hasMany('App\Comment');
        }
    public function productfilters()
    {
        return $this->hasMany('App\Productfilter');
    }
    public function productimages()
    {
        return $this->hasMany('App\Productimage');
    }
    public function mostpopular()
    {
        Return $this->hasOne('App\Mostpopular');
    }
// define a cccessor for show in relationshp for mostpopular bread
   public function getFullnameAttribute()
   {
       return "{$this->id}-{$this->name}-{$this->price}-{$this->catagory1}";
   }
    public function OfferOfDay()
    {
        Return $this->hasOne('App\OfferOfDay');
    }


}
