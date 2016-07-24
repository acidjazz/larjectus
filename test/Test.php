<?php

class Test extends PHPUnit_Framework_TestCase
{

  public function testOne() {
    include 'vendor/autoload.php';
    $data = \larjectus\Objectus::slurp('test/dat/');
    $this->assertEquals($data['colors']['blue1'],'#0000FF');
  }

}
