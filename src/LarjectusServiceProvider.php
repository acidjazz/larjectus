<?php

namespace larjectus;

use Illuminate\View\ViewServiceProvider;


class LarjectusServiceProvider extends ViewServiceProvider
{

  public function boot()
  {
    config(\larjectus\Objectus::slurp($this->app->basePath() . '/config/'));
    view()->share(['config' => current((array) config())]);
  }

  public function register() { }

}

