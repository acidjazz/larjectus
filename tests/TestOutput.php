<?php

use Larjectus\Objectus;

class TestOutput extends PHPUnit\Framework\TestCase
{

  private $expected = [
    'test' =>  [
      'json' =>  'a test for json'
    ],
    'colors' => [
      'blue1' => '#0000FF',
      'red1' => '#FF0000',
    ],
    'config' => [
      'url' => 'http://www.example.url/',
      'meta' => [
        'title' => 'website title',
        'description' => 'website description',
      ],
    ],
    'fonts' => [
      'copy' => '20px Tahoma',
      'h1' => '40px Tahoma',
      'h2' => '30px Tahoma',
    ],
    'subdir' => [
      'content' => [
        'title' => 'content title',
        'data' => [
          0 => 'test',
          1 => 'one',
          2 => 'two',
        ],
      ],
    ],
  ];

  public function testConfig() {
    $data = (new Objectus)->slurp('tests/config/');
    $this->assertEquals($data,$this->expected);
  }


  public function testBrokenJson() {
    $this->expectException(ErrorException::class);
    (new Objectus)->slurp('tests/brokenJSON/');
  }

  public function testBrokenYaml() {
    $this->expectException(ErrorException::class);
    (new Objectus)->slurp('tests/brokenYAML/');
  }

}

