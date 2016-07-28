<?php

namespace larjectus;

use Illuminate\View\ViewServiceProvider;

class LarjectusServiceProvider extends ViewServiceProvider
{

  public function boot()
  {
    $data = \larjectus\Objectus::slurp($this->app->basePath() . '/config/');
    config(['data' => $data]);
    view()->share('data', $data);
  }

  public function register() { }

}

