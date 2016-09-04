[![](media/objectus128.png)](http://github.com/acidjazz/objectus)
![](media/and128.png)
[![](media/laravel128.png)](http://laravel.com)
![](media/plus128.png)
[![](media/lumen128.png)](http://lumen.laravel.com)

Allows you to use [Objectus](http://github.com/acidjazz/objectus) seamlessly in [Laravel 5](http://laravel.com) and [Lumen](http://lumen.laravel.com)

[![Total Downloads](https://poser.pugx.org/acidjazz/larjectus/downloads)](https://packagist.org/packages/acidjazz/larjectus)
[![Latest Stable Version](https://poser.pugx.org/acidjazz/larjectus/v/stable)](https://packagist.org/packages/acidjazz/larjectus)
[![Latest Unstable Version](https://poser.pugx.org/acidjazz/larjectus/v/unstable)](https://packagist.org/packages/acidjazz/larjectus)
[![License](https://poser.pugx.org/acidjazz/larjectus/license)](https://packagist.org/packages/acidjazz/larjectus)
[![Build Status](http://img.shields.io/travis/acidjazz/larjectus.svg)](https://travis-ci.org/acidjazz/larjectus)
[![Coverage Status](https://coveralls.io/repos/github/acidjazz/larjectus/badge.svg?branch=master)](https://coveralls.io/github/acidjazz/larjectus?branch=master)
[![codecov](https://codecov.io/gh/acidjazz/larjectus/branch/master/graph/badge.svg)](https://codecov.io/gh/acidjazz/larjectus)

# What this does
Combines your `.env` and `config/` options with as many YAML and JSON files and directories you want to add inside config/, allows for functionality to share this config information in any langauges your `resources/` or `public/` folders might use 

# Why would I wnat this
Most all of my projects have extended configuration, everything from style guides to site copy, this allows stylus/css and coffeescript/javascript access to this data

# Requirements

* [PHP v5.6.25+](https://www.php.net/)
* [PHP-YAML](http://php.net/manual/en/book.yaml.php)

# Installation

Require this package with Composer

```bash
composer require acidjazz/larjectus
```

## Laravel

Once Composer has installed or updated your packages you need to register Larjectus with Laravel itself. Open up config/app.php and find the providers key, towards the end of the file, and add 'Larjectus\ServiceProvider', to the end:

```php
'providers' => [
  ...
    Larjectus\ServiceProvider::class,
],
```

## Lumen

For usage with [Lumen](http://lumen.laravel.com), add the service provider in `bootstrap/app.php`. 

```php
$app->register(Larjectus\ServiceProvider::class);
```

# configuration

## gulpfile.js example(s)

Your gulp task is different from how [Objectus](https://github.com/acidjazz/objectus) works, here is an example:

```
objectify = function() {
  var config, secure;
  config = {};
  secure = ['auth', 'database'];
  return exec('php artisan larjectus:config', function(error, result, stderr) {
    var dim, i, len, pubconfig;
    if (error) {
      notify(error);
    }
    this.config = JSON.parse(result);
    pubconfig = this.config;
    for (i = 0, len = secure.length; i < len; i++) {
      dim = secure[i];
      delete pubconfig[dim];
    }
    return fs.writeFileSync(public/js/config.js', "config = " + JSON.stringify(pubconfig) + ";", 'utf8');
  });
};

objectify();

gulp.task('larjectus', objectify);

gulp.task('watch', function() {
  gulp.watch('config/**/*', ['larjectus']);
);
```

Notice i have a `secure` array where i remove config data I do not want exposed, this is _extremely_ improtant

```
