<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
      $min_field = $parameters[0];
      $data = $validator->getData();
      $min_value = $data[$min_field];
      return $value >= $min_value;
    });   

    Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
      return str_replace(':field', $parameters[0], "El campo Año Final debe ser mayor o igual a Año Inicial");
    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
