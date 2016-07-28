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

> *Note*: currenty in early development

# Requirements

* [PHP v5.5+](https://www.php.net/)
* [PHP-YAML](http://php.net/manual/en/book.yaml.php)

# Installation

Require this package with Composer

```bash
composer require acidjazz/larjectus
```

## Laravel

Once Composer has installed or updated your packages you need to register Larjectus with Laravel itself. Open up config/app.php and find the providers key, towards the end of the file, and add 'larjectus\LarjectusServiceProvider', to the end:

```php
'providers' => [
  ...
    larjectus\LarjectusServiceProvider::class,
],
```
