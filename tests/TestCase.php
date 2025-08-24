<?php

namespace EvolveUI\EvolveUI\Tests;

use EvolveUI\EvolveUI\EvolveUIServiceProvider;
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
            ) => 'EvolveUI\\EvolveUI\\Database\\Factories\\'.
                class_basename($modelName).
                'Factory',
        );
    }

    protected function getPackageProviders($app)
    {
        return [EvolveUIServiceProvider::class];
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
