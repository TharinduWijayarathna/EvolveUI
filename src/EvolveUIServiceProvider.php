<?php

namespace EvolveUI\EvolveUI;

use EvolveUI\EvolveUI\Commands\EvolveUICommand;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EvolveUIServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('evolveui')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_migration_table_name_table')
            ->hasCommand(EvolveUICommand::class);
    }

    public function packageBooted(): void
    {
        // Register UI components with 'ui' prefix
        Blade::componentNamespace('EvolveUI\\EvolveUI\\View\\Components\\Ui', 'ui');

        // Register Layout components with 'layout' prefix
        Blade::componentNamespace('EvolveUI\\EvolveUI\\View\\Components\\Layout', 'layout');
    }

    public function boot(): void
    {
        parent::boot();

        // Load helpers
        if (file_exists(__DIR__.'/helpers.php')) {
            require_once __DIR__.'/helpers.php';
        }
    }
}
