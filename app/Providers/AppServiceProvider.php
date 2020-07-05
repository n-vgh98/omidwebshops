<?php

namespace App\Providers;

use App\Http\Controllers\langController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		Schema::defaultStringLength(191);
		//share a data between all views
		//View::share('key','value');

        //add action mostpopular to voyager
        Voyager::addAction(\App\Action\Mostpopularaction::class);
        Voyager::addAction(\App\Action\Takmilkhardi::class);

        // action for send replay to message user
        Voyager::addAction(\App\Action\PasokhMessageUser::class);

        // action to confirm user comment
        Voyager::addAction(\App\Action\ConfirmComment::class);

        $country  = new langController();
        //$country = $country->country();
        $country = 'IR';
        if($country =='IR')
             App::setLocale('fa');
        else
            App::setLocale('en');


    }

    function showIPAddress() {
        $variableIndex = array("HTTP_CLIENT_IP","HTTP_X_FORWARDED_FOR","HTTP_X_FORWARDED","HTTP_FORWARDED_FOR","HTTP_FORWARDED","REMOTE_ADDR");
        for($i=0;$i<count($variableIndex);$i++){
            if(!isset($ipAddress)) {
                if(array_key_exists($variableIndex[$i], $_ENV)) {
                    $ipAddress = $_SERVER[$variableIndex[$i]];
                    echo $ipAddress;
                    break;
                }
            }
        }
    }

}
