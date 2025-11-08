<?php

namespace EvolveUI\EvolveUI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallEvolveUICommand extends Command
{
    public $signature = 'evolveui:install';

    public $description = 'Install EvolveUI authentication and UI components';

    public function handle(): int
    {
        $this->info('Installing EvolveUI...');

        // Publish views (optional - for customization)
        if ($this->confirm('Would you like to publish views for customization?', false)) {
            $this->call('vendor:publish', [
                '--tag' => 'evolveui-views',
                '--force' => true,
            ]);
            $this->info('Views published successfully!');
        }

        $this->info('Authentication routes are automatically registered by the service provider.');
        $this->info('Routes available: /login, /register, /forgot-password, /reset-password, /logout');

        // Check if User model exists
        $userModelPath = app_path('Models/User.php');
        if (! File::exists($userModelPath)) {
            $this->warn('User model not found. Make sure you have a User model with authentication.');
        }

        $this->info('');
        $this->info('✅ EvolveUI installed successfully!');
        $this->info('');
        $this->info('Available routes:');
        $this->line('  - /login');
        $this->line('  - /register');
        $this->line('  - /forgot-password');
        $this->line('  - /reset-password/{token}');
        $this->line('  - /logout (POST)');
        $this->info('');
        $this->info('You can now use EvolveUI components in your views:');
        $this->line('  <x-layout.auth>');
        $this->line('  <x-layout.app>');
        $this->line('  <x-ui.button>');
        $this->line('  <x-ui.card>');
        $this->line('  And many more...');

        return self::SUCCESS;
    }
}
