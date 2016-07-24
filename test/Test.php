<?php

class Test extends PHPUnit_Framework_TestCase
{

  public $expected = array (
    'colors' =>
    array (
      'blue1' => '#0000FF',
      'red1' => '#FF0000',
    ),
    'config' =>
    array (
      'url' => 'http://www.example.url/',
      'meta' =>
      array (
        'title' => 'website title',
        'description' => 'website description',
      ),
    ),
    'fonts' =>
    array (
      'copy' => '20px Tahoma',
      'h1' => '40px Tahoma',
      'h2' => '30px Tahoma',
    ),
    'subdir' =>
    array (
      'content' =>
      array (
        'title' => 'content title',
        'data' =>
        array (
          0 => 'test',
          1 => 'one',
          2 => 'two',
        ),
      ),
    ),
  );

  public function testOne() {
    include 'vendor/autoload.php';
    $data = \larjectus\Objectus::slurp('test/dat/');
    $this->assertEquals($data,$this->expected);
  }

}
