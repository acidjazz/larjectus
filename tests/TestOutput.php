<?php

use Larjectus\Objectus;

class TestOutput extends PHPUnit_Framework_TestCase
{

  private $expected = array (
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

  public function testConfig() {
    $data = (new Objectus)->slurp('tests/config/');
    $this->assertEquals($data,$this->expected);
  }

}
