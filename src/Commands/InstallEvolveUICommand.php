<?php

namespace EvolveUI\EvolveUI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallEvolveUICommand extends Command
{
    public $signature = 'evolveui:install {--force : Overwrite existing files}';

    public $description = 'Install EvolveUI authentication and UI components into your application';

    protected $packagePath;
    protected $basePath;

    public function handle(): int
    {
        $this->packagePath = __DIR__.'/../../';
        $this->basePath = base_path();

        $this->info('🚀 Installing EvolveUI Starter Kit...');
        $this->newLine();

        // Install views
        $this->installViews();

        // Install component classes
        $this->installComponents();

        // Install controllers
        $this->installControllers();

        // Install routes
        $this->installRoutes();

        // Install helpers
        $this->installHelpers();

        // Check if User model exists
        $userModelPath = app_path('Models/User.php');
        if (!File::exists($userModelPath)) {
            $this->warn('User model not found. Make sure you have a User model with authentication.');
        }

        $this->newLine();
        $this->info('✅ EvolveUI installed successfully!');
        $this->newLine();
        $this->info('Available routes:');
        $this->line('  - /login');
        $this->line('  - /register');
        $this->line('  - /forgot-password');
        $this->line('  - /reset-password/{token}');
        $this->line('  - /logout (POST)');
        $this->newLine();
        $this->info('Components are now available in your application:');
        $this->line('  <x-layout.auth>');
        $this->line('  <x-layout.app>');
        $this->line('  <x-ui.button>');
        $this->line('  <x-ui.input>');
        $this->line('  <x-ui.card>');
        $this->line('  And 100+ more components!');

        return self::SUCCESS;
    }

    protected function installViews(): void
    {
        $this->info('📁 Installing views...');

        $source = $this->packagePath.'resources/views';
        $destination = $this->basePath.'/resources/views';

        $this->copyDirectory($source, $destination, [
            'examples', // Skip examples directory
        ]);

        $this->info('   ✓ Views installed to resources/views/');
    }

    protected function installComponents(): void
    {
        $this->info('🧩 Installing component classes...');

        $source = $this->packagePath.'src/View/Components';
        $destination = $this->basePath.'/app/View/Components';

        // Create directory structure
        File::ensureDirectoryExists($destination.'/Ui');
        File::ensureDirectoryExists($destination.'/Layout');

        // Copy and update namespaces for UI components
        $uiComponents = File::allFiles($source.'/Ui');
        foreach ($uiComponents as $file) {
            $content = File::get($file->getPathname());

            // Update namespace
            $content = str_replace(
                'namespace EvolveUI\\EvolveUI\\View\\Components\\Ui;',
                'namespace App\\View\\Components\\Ui;',
                $content
            );

            // Update view paths
            $content = preg_replace(
                "/view\('evolveui::components\.ui\.([^']+)'\)/",
                "view('components.ui.$1')",
                $content
            );

            $destinationFile = $destination.'/Ui/'.basename($file->getPathname());
            File::put($destinationFile, $content);
        }

        // Copy and update namespaces for Layout components
        $layoutComponents = File::allFiles($source.'/Layout');
        foreach ($layoutComponents as $file) {
            $content = File::get($file->getPathname());

            // Update namespace
            $content = str_replace(
                'namespace EvolveUI\\EvolveUI\\View\\Components\\Layout;',
                'namespace App\\View\\Components\\Layout;',
                $content
            );

            // Update view paths
            $content = preg_replace(
                "/view\('evolveui::components\.layout\.([^']+)'\)/",
                "view('components.layout.$1')",
                $content
            );

            $destinationFile = $destination.'/Layout/'.basename($file->getPathname());
            File::put($destinationFile, $content);
        }

        $this->info('   ✓ Component classes installed to app/View/Components/');
    }

    protected function installControllers(): void
    {
        $this->info('🎮 Installing controllers...');

        $source = $this->packagePath.'src/Http/Controllers';
        $destination = $this->basePath.'/app/Http/Controllers';

        File::ensureDirectoryExists($destination.'/Auth');

        $controllers = File::allFiles($source.'/Auth');
        foreach ($controllers as $file) {
            $content = File::get($file->getPathname());

            // Update namespace
            $content = str_replace(
                'namespace EvolveUI\\EvolveUI\\Http\\Controllers\\Auth;',
                'namespace App\\Http\\Controllers\\Auth;',
                $content
            );

            // Update view paths
            $content = preg_replace(
                "/view\('evolveui::auth\.([^']+)'\)/",
                "view('auth.$1')",
                $content
            );

            $destinationFile = $destination.'/Auth/'.basename($file->getPathname());
            File::put($destinationFile, $content);
        }

        $this->info('   ✓ Controllers installed to app/Http/Controllers/Auth/');
    }

    protected function installRoutes(): void
    {
        $this->info('🛣️  Installing routes...');

        $source = $this->packagePath.'src/routes/auth.php';
        $destination = $this->basePath.'/routes/auth.php';

        if (!File::exists($source)) {
            $this->warn('   ⚠️  Source routes file not found: '.$source);
            return;
        }

        $content = File::get($source);

        // Update controller namespaces
        $content = str_replace(
            'EvolveUI\\EvolveUI\\Http\\Controllers\\Auth\\',
            'App\\Http\\Controllers\\Auth\\',
            $content
        );

        // Write routes file
        File::put($destination, $content);
        $this->info('   ✓ Routes file created: routes/auth.php');

        // Add require to web.php
        $webRoutesPath = $this->basePath.'/routes/web.php';
        if (File::exists($webRoutesPath)) {
            $webContent = File::get($webRoutesPath);

            // Check if already included
            if (str_contains($webContent, "require __DIR__.'/auth.php'") ||
                str_contains($webContent, "require __DIR__.\"/auth.php\"")) {
                $this->info('   ✓ Routes already included in routes/web.php');
            } else {
                // Add require statement at the end
                $webContent = rtrim($webContent) . "\n\nrequire __DIR__.'/auth.php';\n";
                File::put($webRoutesPath, $webContent);
                $this->info('   ✓ Added require statement to routes/web.php');
            }
        } else {
            $this->warn('   ⚠️  routes/web.php not found. Please manually add: require __DIR__.\'/auth.php\';');
        }

        $this->info('   ✓ Routes installation complete');
    }

    protected function installHelpers(): void
    {
        $this->info('🔧 Installing helpers...');

        $source = $this->packagePath.'src/helpers.php';
        $destination = $this->basePath.'/app/helpers.php';

        if (File::exists($source)) {
            File::copy($source, $destination);

            // Add to composer.json autoload if not exists
            $composerPath = $this->basePath.'/composer.json';
            if (File::exists($composerPath)) {
                $composer = json_decode(File::get($composerPath), true);

                if (!isset($composer['autoload']['files'])) {
                    $composer['autoload']['files'] = [];
                }

                if (!in_array('app/helpers.php', $composer['autoload']['files'])) {
                    $composer['autoload']['files'][] = 'app/helpers.php';
                    File::put($composerPath, json_encode($composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
                    $this->info('   ✓ Added helpers.php to composer.json autoload');
                    $this->warn('   ⚠️  Run: composer dump-autoload');
                }
            }
        }

        $this->info('   ✓ Helpers installed');
    }

    protected function copyDirectory(string $source, string $destination, array $exclude = []): void
    {
        if (!File::isDirectory($source)) {
            return;
        }

        File::ensureDirectoryExists($destination);

        $files = File::allFiles($source);

        foreach ($files as $file) {
            $relativePath = str_replace($source.'/', '', $file->getPathname());

            // Check if file should be excluded
            $shouldExclude = false;
            foreach ($exclude as $excludePath) {
                if (str_starts_with($relativePath, $excludePath)) {
                    $shouldExclude = true;
                    break;
                }
            }

            if ($shouldExclude) {
                continue;
            }

            $destPath = $destination.'/'.$relativePath;
            $destDir = dirname($destPath);

            File::ensureDirectoryExists($destDir);
            File::copy($file->getPathname(), $destPath);
        }
    }
}
