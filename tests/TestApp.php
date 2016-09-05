<?php namespace Orchestra\Testbench\TestCase;

use Larjectus\Objectus;

class TestApp extends \PHPUnit_Framework_TestCase
{
  public function testCreateApplicationMethod()
  {
    $stub = new StubTestCase();
    $app = $stub->createApplication();

    $this->assertInstanceOf('\Orchestra\Testbench\Contracts\TestCase', $stub);
    $this->assertInstanceOf('\Illuminate\Foundation\Application', $app);
    $this->assertEquals('UTC', date_default_timezone_get());
    $this->assertEquals('testing', $app['env']);
    $this->assertInstanceOf('\Illuminate\Config\Repository', $app['config']);
    $this->assertTrue($app->isBooted(), true);
    $this->assertArrayhasKey('Larjectus\ServiceProvider', $app->getLoadedProviders());

  
  }

  public function testConsoleCommand()
  {

    $stub = new StubTestCase();
    $app = $stub->createApplication();

    $config =(new Objectus)->slurp('tests/config/');
    config($config);

    \Artisan::call('larjectus:config');
    $output = json_decode(\Artisan::output(), true);
    $expected = ['json' => 'a test for json'];
    $this->assertEquals($output['test'],$expected);

  }
}

class StubTestCase extends \Orchestra\Testbench\TestCase
{
  protected function getPackageProviders($app)
  {
    return ['Larjectus\ServiceProvider'];
  }

}
