<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //parameters: array di parametri passato alla funzione
        Validator::extend('uniqueDateAndPlace', function($attribute,$value,$parameters){
                $param1= array_get($this->data, $parameters[0]);

                $count= DB::table()->where('dataCreazione',$value)
                                                ->where('IDArea',$param1)
                                                ->count();
               return $count===0;

        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
