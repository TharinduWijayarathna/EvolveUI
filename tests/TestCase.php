<?php

namespace BladeCN\BladeCN\Tests;

use BladeCN\BladeCN\BladeCNServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (
                string $modelName,
            ) => 'BladeCN\\BladeCN\\Database\\Factories\\'.
                class_basename($modelName).
                'Factory',
        );
    }

    protected function getPackageProviders($app)
    {
        return [BladeCNServiceProvider::class];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
         foreach (\Illuminate\Support\Facades\File::allFiles(__DIR__ . '/database/migrations') as $migration) {
            (include $migration->getRealPath())->up();
         }
         */
    }
}
