<?php namespace Orchestra\Testbench\TestCase;

class TestApp extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Orchestra\Testbench\TestCase::createApplication() method.
     *
     * @test
     */
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
}

class StubTestCase extends \Orchestra\Testbench\TestCase
{
  protected function getPackageProviders($app)
  {
    return ['Larjectus\ServiceProvider'];
  }

}