<?php 

namespace Orchestra\Testbench\TestCase;

class TestSetup extends \Orchestra\Testbench\TestCase {

  protected function getPackageProviders($app)
  {
    return ['Larjectus\ServiceProvider'];
  }

  public function testConfig() {
    $this->assertEquals(config('app.env'), 'testing');
  }

  public function testServiceProvider() {
    $this->assertContains('Larjectus\ServiceProvider',config('app.providers'));
  }

}
