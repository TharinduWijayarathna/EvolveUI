<?php

namespace EvolveUI\EvolveUI;

use EvolveUI\EvolveUI\Commands\EvolveUICommand;
use EvolveUI\EvolveUI\Commands\InstallEvolveUICommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
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
            ->hasCommand(EvolveUICommand::class)
            ->hasCommand(InstallEvolveUICommand::class);
    }

    public function packageBooted(): void
    {
        // Check if components are installed in app directory
        // If installed, Laravel will auto-discover them from App\View\Components
        // If not installed, register package components as fallback
        if (!$this->componentsInstalled()) {
            $this->registerPackageComponents();
        }
    }

    protected function componentsInstalled(): bool
    {
        return File::exists(app_path('View/Components/Ui/Button.php')) ||
               File::exists(app_path('View/Components/Layout/App.php'));
    }

    protected function registerPackageComponents(): void
    {
        // Register UI components individually with 'ui' prefix (fallback)
        $this->registerUiComponents();

        // Register Layout components individually with 'layout' prefix (fallback)
        $this->registerLayoutComponents();
    }

    protected function registerUiComponents(): void
    {
        // Essential shadcn/ui components only
        $components = [
            // Core Components
            'Avatar' => \EvolveUI\EvolveUI\View\Components\Ui\Avatar::class,
            'AvatarFallback' => \EvolveUI\EvolveUI\View\Components\Ui\AvatarFallback::class,
            'AvatarImage' => \EvolveUI\EvolveUI\View\Components\Ui\AvatarImage::class,
            'Badge' => \EvolveUI\EvolveUI\View\Components\Ui\Badge::class,
            'Button' => \EvolveUI\EvolveUI\View\Components\Ui\Button::class,
            'Card' => \EvolveUI\EvolveUI\View\Components\Ui\Card::class,
            'CardContent' => \EvolveUI\EvolveUI\View\Components\Ui\CardContent::class,
            'CardDescription' => \EvolveUI\EvolveUI\View\Components\Ui\CardDescription::class,
            'CardFooter' => \EvolveUI\EvolveUI\View\Components\Ui\CardFooter::class,
            'CardHeader' => \EvolveUI\EvolveUI\View\Components\Ui\CardHeader::class,
            'CardTitle' => \EvolveUI\EvolveUI\View\Components\Ui\CardTitle::class,
            'Input' => \EvolveUI\EvolveUI\View\Components\Ui\Input::class,
            'InputError' => \EvolveUI\EvolveUI\View\Components\Ui\InputError::class,
            'Label' => \EvolveUI\EvolveUI\View\Components\Ui\Label::class,
            'Separator' => \EvolveUI\EvolveUI\View\Components\Ui\Separator::class,
            'Textarea' => \EvolveUI\EvolveUI\View\Components\Ui\Textarea::class,
            'TextLink' => \EvolveUI\EvolveUI\View\Components\Ui\TextLink::class,
            'Breadcrumb' => \EvolveUI\EvolveUI\View\Components\Ui\Breadcrumb::class,
            
            // Dialog Components
            'Dialog' => \EvolveUI\EvolveUI\View\Components\Ui\Dialog::class,
            'DialogClose' => \EvolveUI\EvolveUI\View\Components\Ui\DialogClose::class,
            'DialogContent' => \EvolveUI\EvolveUI\View\Components\Ui\DialogContent::class,
            'DialogDescription' => \EvolveUI\EvolveUI\View\Components\Ui\DialogDescription::class,
            'DialogFooter' => \EvolveUI\EvolveUI\View\Components\Ui\DialogFooter::class,
            'DialogHeader' => \EvolveUI\EvolveUI\View\Components\Ui\DialogHeader::class,
            'DialogOverlay' => \EvolveUI\EvolveUI\View\Components\Ui\DialogOverlay::class,
            'DialogTitle' => \EvolveUI\EvolveUI\View\Components\Ui\DialogTitle::class,
            'DialogTrigger' => \EvolveUI\EvolveUI\View\Components\Ui\DialogTrigger::class,
            
            // Dropdown Components
            'Dropdown' => \EvolveUI\EvolveUI\View\Components\Ui\Dropdown::class,
            'DropdownCheckboxItem' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownCheckboxItem::class,
            'DropdownContent' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownContent::class,
            'DropdownItem' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownItem::class,
            'DropdownLabel' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownLabel::class,
            'DropdownRadioItem' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownRadioItem::class,
            'DropdownSeparator' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownSeparator::class,
            'DropdownShortcut' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownShortcut::class,
            'DropdownSub' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownSub::class,
            'DropdownSubContent' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownSubContent::class,
            'DropdownSubTrigger' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownSubTrigger::class,
            'DropdownTrigger' => \EvolveUI\EvolveUI\View\Components\Ui\DropdownTrigger::class,
            
            // Sheet Components
            'Sheet' => \EvolveUI\EvolveUI\View\Components\Ui\Sheet::class,
            'SheetClose' => \EvolveUI\EvolveUI\View\Components\Ui\SheetClose::class,
            'SheetDescription' => \EvolveUI\EvolveUI\View\Components\Ui\SheetDescription::class,
            'SheetFooter' => \EvolveUI\EvolveUI\View\Components\Ui\SheetFooter::class,
            'SheetHeader' => \EvolveUI\EvolveUI\View\Components\Ui\SheetHeader::class,
            'SheetTitle' => \EvolveUI\EvolveUI\View\Components\Ui\SheetTitle::class,
            'SheetTrigger' => \EvolveUI\EvolveUI\View\Components\Ui\SheetTrigger::class,
            
            // Form Components
            'Checkbox' => \EvolveUI\EvolveUI\View\Components\Ui\Checkbox::class,
            'NativeSelect' => \EvolveUI\EvolveUI\View\Components\Ui\NativeSelect::class,
            'Select' => \EvolveUI\EvolveUI\View\Components\Ui\Select::class,
            'RadioGroup' => \EvolveUI\EvolveUI\View\Components\Ui\RadioGroup::class,
            
            // Table Components
            'Table' => \EvolveUI\EvolveUI\View\Components\Ui\Table::class,
            'TableHeader' => \EvolveUI\EvolveUI\View\Components\Ui\TableHeader::class,
            'TableBody' => \EvolveUI\EvolveUI\View\Components\Ui\TableBody::class,
            'TableRow' => \EvolveUI\EvolveUI\View\Components\Ui\TableRow::class,
            'TableHead' => \EvolveUI\EvolveUI\View\Components\Ui\TableHead::class,
            'TableCell' => \EvolveUI\EvolveUI\View\Components\Ui\TableCell::class,
            
            // Utility Components
            'Progress' => \EvolveUI\EvolveUI\View\Components\Ui\Progress::class,
            'Spinner' => \EvolveUI\EvolveUI\View\Components\Ui\Spinner::class,
            'Tooltip' => \EvolveUI\EvolveUI\View\Components\Ui\Tooltip::class,
        ];

        foreach ($components as $name => $class) {
            if (class_exists($class)) {
                Blade::component($class, "ui.{$name}");
            }
        }
    }

    protected function registerLayoutComponents(): void
    {
        $components = [
            'App' => \EvolveUI\EvolveUI\View\Components\Layout\App::class,
            'AppHeader' => \EvolveUI\EvolveUI\View\Components\Layout\AppHeader::class,
            'AppSidebar' => \EvolveUI\EvolveUI\View\Components\Layout\AppSidebar::class,
            'Auth' => \EvolveUI\EvolveUI\View\Components\Layout\Auth::class,
            'Head' => \EvolveUI\EvolveUI\View\Components\Layout\Head::class,
        ];

        foreach ($components as $name => $class) {
            Blade::component($class, "layout.{$name}");
        }
    }

    public function boot(): void
    {
        parent::boot();

        // Load helpers
        if (file_exists(__DIR__.'/helpers.php')) {
            require_once __DIR__.'/helpers.php';
        }

        // Register authentication routes if they don't exist
        $this->registerAuthRoutes();
    }

    protected function registerAuthRoutes(): void
    {
        // Check if routes are installed in app
        $appRoutesPath = base_path('routes/auth.php');

        if (File::exists($appRoutesPath)) {
            // Routes are installed in app, don't load package routes
            return;
        }

        // Fallback: Load package routes if not installed
        if (! $this->app->routesAreCached()) {
            $authRoutesPath = __DIR__.'/routes/auth.php';

            if (file_exists($authRoutesPath)) {
                $this->loadRoutesFrom($authRoutesPath);
            }
        }
    }
}
