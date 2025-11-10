<?php

namespace BladeCN\BladeCN;

use BladeCN\BladeCN\Commands\BladeCNCommand;
use BladeCN\BladeCN\Commands\InstallBladeCNCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeCNServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('bladecn')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_migration_table_name_table')
            ->hasCommand(BladeCNCommand::class)
            ->hasCommand(InstallBladeCNCommand::class);
    }

    public function packageBooted(): void
    {
        // Check if components are installed in app directory
        // If installed, Laravel will auto-discover them from App\View\Components
        // If not installed, register package components as fallback
        if (! $this->componentsInstalled()) {
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
            'Avatar' => \BladeCN\BladeCN\View\Components\Ui\Avatar::class,
            'AvatarFallback' => \BladeCN\BladeCN\View\Components\Ui\AvatarFallback::class,
            'AvatarImage' => \BladeCN\BladeCN\View\Components\Ui\AvatarImage::class,
            'Badge' => \BladeCN\BladeCN\View\Components\Ui\Badge::class,
            'Button' => \BladeCN\BladeCN\View\Components\Ui\Button::class,
            'Card' => \BladeCN\BladeCN\View\Components\Ui\Card::class,
            'CardContent' => \BladeCN\BladeCN\View\Components\Ui\CardContent::class,
            'CardDescription' => \BladeCN\BladeCN\View\Components\Ui\CardDescription::class,
            'CardFooter' => \BladeCN\BladeCN\View\Components\Ui\CardFooter::class,
            'CardHeader' => \BladeCN\BladeCN\View\Components\Ui\CardHeader::class,
            'CardTitle' => \BladeCN\BladeCN\View\Components\Ui\CardTitle::class,
            'Input' => \BladeCN\BladeCN\View\Components\Ui\Input::class,
            'InputError' => \BladeCN\BladeCN\View\Components\Ui\InputError::class,
            'InputGroup' => \BladeCN\BladeCN\View\Components\Ui\InputGroup::class,
            'InputGroupAddon' => \BladeCN\BladeCN\View\Components\Ui\InputGroupAddon::class,
            'InputGroupInput' => \BladeCN\BladeCN\View\Components\Ui\InputGroupInput::class,
            'Label' => \BladeCN\BladeCN\View\Components\Ui\Label::class,
            'Separator' => \BladeCN\BladeCN\View\Components\Ui\Separator::class,
            'Textarea' => \BladeCN\BladeCN\View\Components\Ui\Textarea::class,
            'TextLink' => \BladeCN\BladeCN\View\Components\Ui\TextLink::class,
            'Breadcrumb' => \BladeCN\BladeCN\View\Components\Ui\Breadcrumb::class,

            // Dialog Components
            'Dialog' => \BladeCN\BladeCN\View\Components\Ui\Dialog::class,
            'DialogClose' => \BladeCN\BladeCN\View\Components\Ui\DialogClose::class,
            'DialogContent' => \BladeCN\BladeCN\View\Components\Ui\DialogContent::class,
            'DialogDescription' => \BladeCN\BladeCN\View\Components\Ui\DialogDescription::class,
            'DialogFooter' => \BladeCN\BladeCN\View\Components\Ui\DialogFooter::class,
            'DialogHeader' => \BladeCN\BladeCN\View\Components\Ui\DialogHeader::class,
            'DialogOverlay' => \BladeCN\BladeCN\View\Components\Ui\DialogOverlay::class,
            'DialogTitle' => \BladeCN\BladeCN\View\Components\Ui\DialogTitle::class,
            'DialogTrigger' => \BladeCN\BladeCN\View\Components\Ui\DialogTrigger::class,

            // Dropdown Components
            'Dropdown' => \BladeCN\BladeCN\View\Components\Ui\Dropdown::class,
            'DropdownCheckboxItem' => \BladeCN\BladeCN\View\Components\Ui\DropdownCheckboxItem::class,
            'DropdownContent' => \BladeCN\BladeCN\View\Components\Ui\DropdownContent::class,
            'DropdownItem' => \BladeCN\BladeCN\View\Components\Ui\DropdownItem::class,
            'DropdownLabel' => \BladeCN\BladeCN\View\Components\Ui\DropdownLabel::class,
            'DropdownRadioItem' => \BladeCN\BladeCN\View\Components\Ui\DropdownRadioItem::class,
            'DropdownSeparator' => \BladeCN\BladeCN\View\Components\Ui\DropdownSeparator::class,
            'DropdownShortcut' => \BladeCN\BladeCN\View\Components\Ui\DropdownShortcut::class,
            'DropdownSub' => \BladeCN\BladeCN\View\Components\Ui\DropdownSub::class,
            'DropdownSubContent' => \BladeCN\BladeCN\View\Components\Ui\DropdownSubContent::class,
            'DropdownSubTrigger' => \BladeCN\BladeCN\View\Components\Ui\DropdownSubTrigger::class,
            'DropdownTrigger' => \BladeCN\BladeCN\View\Components\Ui\DropdownTrigger::class,

            // Sheet Components
            'Sheet' => \BladeCN\BladeCN\View\Components\Ui\Sheet::class,
            'SheetClose' => \BladeCN\BladeCN\View\Components\Ui\SheetClose::class,
            'SheetDescription' => \BladeCN\BladeCN\View\Components\Ui\SheetDescription::class,
            'SheetFooter' => \BladeCN\BladeCN\View\Components\Ui\SheetFooter::class,
            'SheetHeader' => \BladeCN\BladeCN\View\Components\Ui\SheetHeader::class,
            'SheetTitle' => \BladeCN\BladeCN\View\Components\Ui\SheetTitle::class,
            'SheetTrigger' => \BladeCN\BladeCN\View\Components\Ui\SheetTrigger::class,

            // Form Components
            'Checkbox' => \BladeCN\BladeCN\View\Components\Ui\Checkbox::class,
            'NativeSelect' => \BladeCN\BladeCN\View\Components\Ui\NativeSelect::class,
            'Select' => \BladeCN\BladeCN\View\Components\Ui\Select::class,
            'RadioGroup' => \BladeCN\BladeCN\View\Components\Ui\RadioGroup::class,

            // Table Components
            'Table' => \BladeCN\BladeCN\View\Components\Ui\Table::class,
            'TableHeader' => \BladeCN\BladeCN\View\Components\Ui\TableHeader::class,
            'TableBody' => \BladeCN\BladeCN\View\Components\Ui\TableBody::class,
            'TableRow' => \BladeCN\BladeCN\View\Components\Ui\TableRow::class,
            'TableHead' => \BladeCN\BladeCN\View\Components\Ui\TableHead::class,
            'TableCell' => \BladeCN\BladeCN\View\Components\Ui\TableCell::class,

            // Utility Components
            'Progress' => \BladeCN\BladeCN\View\Components\Ui\Progress::class,
            'Spinner' => \BladeCN\BladeCN\View\Components\Ui\Spinner::class,
            'Tooltip' => \BladeCN\BladeCN\View\Components\Ui\Tooltip::class,
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
            'App' => \BladeCN\BladeCN\View\Components\Layout\App::class,
            'AppHeader' => \BladeCN\BladeCN\View\Components\Layout\AppHeader::class,
            'AppSidebar' => \BladeCN\BladeCN\View\Components\Layout\AppSidebar::class,
            'Auth' => \BladeCN\BladeCN\View\Components\Layout\Auth::class,
            'Head' => \BladeCN\BladeCN\View\Components\Layout\Head::class,
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
