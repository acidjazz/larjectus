<?php

namespace Larjectus;

use Illuminate\View\ViewServiceProvider;

class ServiceProvider extends ViewServiceProvider
{

  public function boot()
  {
    //print_r($this->app->basePath() . '/config/');
    config( (new Objectus)->slurp($this->app->basePath() . '/config/'));
    view()->share(['config' => config()->all()]);
  }

  public function register()
  { 

    $this->commands([
      'Larjectus\Console\Commands\Config',
    ]);
  
  }

}
