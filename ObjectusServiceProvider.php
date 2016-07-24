<?php

namespace App\Providers;

class ObjectusServiceProvider extends ServiceProvider
{

  public function boot()
  {
    $data = \larjectus\Objectus::slurp('config/');
    return $data;
  }

  public function register() {
  }


}
