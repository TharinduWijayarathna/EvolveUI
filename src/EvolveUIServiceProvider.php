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
        $components = [
            'Avatar' => \EvolveUI\EvolveUI\View\Components\Ui\Avatar::class,
            'AvatarFallback' => \EvolveUI\EvolveUI\View\Components\Ui\AvatarFallback::class,
            'AvatarImage' => \EvolveUI\EvolveUI\View\Components\Ui\AvatarImage::class,
            'Badge' => \EvolveUI\EvolveUI\View\Components\Ui\Badge::class,
            'Button' => \EvolveUI\EvolveUI\View\Components\Ui\Button::class,
            'Card' => \EvolveUI\EvolveUI\View\Components\Ui\Card::class,
            'CardAction' => \EvolveUI\EvolveUI\View\Components\Ui\CardAction::class,
            'CardContent' => \EvolveUI\EvolveUI\View\Components\Ui\CardContent::class,
            'CardDescription' => \EvolveUI\EvolveUI\View\Components\Ui\CardDescription::class,
            'CardFooter' => \EvolveUI\EvolveUI\View\Components\Ui\CardFooter::class,
            'CardHeader' => \EvolveUI\EvolveUI\View\Components\Ui\CardHeader::class,
            'CardTitle' => \EvolveUI\EvolveUI\View\Components\Ui\CardTitle::class,
            'Dialog' => \EvolveUI\EvolveUI\View\Components\Ui\Dialog::class,
            'DialogClose' => \EvolveUI\EvolveUI\View\Components\Ui\DialogClose::class,
            'DialogContent' => \EvolveUI\EvolveUI\View\Components\Ui\DialogContent::class,
            'DialogDescription' => \EvolveUI\EvolveUI\View\Components\Ui\DialogDescription::class,
            'DialogFooter' => \EvolveUI\EvolveUI\View\Components\Ui\DialogFooter::class,
            'DialogHeader' => \EvolveUI\EvolveUI\View\Components\Ui\DialogHeader::class,
            'DialogOverlay' => \EvolveUI\EvolveUI\View\Components\Ui\DialogOverlay::class,
            'DialogTitle' => \EvolveUI\EvolveUI\View\Components\Ui\DialogTitle::class,
            'DialogTrigger' => \EvolveUI\EvolveUI\View\Components\Ui\DialogTrigger::class,
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
            'EmptyContent' => \EvolveUI\EvolveUI\View\Components\Ui\EmptyContent::class,
            'EmptyDescription' => \EvolveUI\EvolveUI\View\Components\Ui\EmptyDescription::class,
            'EmptyHeader' => \EvolveUI\EvolveUI\View\Components\Ui\EmptyHeader::class,
            'EmptyMedia' => \EvolveUI\EvolveUI\View\Components\Ui\EmptyMedia::class,
            'EmptyState' => \EvolveUI\EvolveUI\View\Components\Ui\EmptyState::class,
            'EmptyTitle' => \EvolveUI\EvolveUI\View\Components\Ui\EmptyTitle::class,
            'EventCalendar' => \EvolveUI\EvolveUI\View\Components\Ui\EventCalendar::class,
            'Input' => \EvolveUI\EvolveUI\View\Components\Ui\Input::class,
            'InputError' => \EvolveUI\EvolveUI\View\Components\Ui\InputError::class,
            'InputGroup' => \EvolveUI\EvolveUI\View\Components\Ui\InputGroup::class,
            'InputGroupAddon' => \EvolveUI\EvolveUI\View\Components\Ui\InputGroupAddon::class,
            'InputGroupButton' => \EvolveUI\EvolveUI\View\Components\Ui\InputGroupButton::class,
            'InputGroupInput' => \EvolveUI\EvolveUI\View\Components\Ui\InputGroupInput::class,
            'InputGroupPassword' => \EvolveUI\EvolveUI\View\Components\Ui\InputGroupPassword::class,
            'InputGroupText' => \EvolveUI\EvolveUI\View\Components\Ui\InputGroupText::class,
            'InputGroupTextarea' => \EvolveUI\EvolveUI\View\Components\Ui\InputGroupTextarea::class,
            'InputOtp' => \EvolveUI\EvolveUI\View\Components\Ui\InputOtp::class,
            'InputOtpGroup' => \EvolveUI\EvolveUI\View\Components\Ui\InputOtpGroup::class,
            'InputOtpSeparator' => \EvolveUI\EvolveUI\View\Components\Ui\InputOtpSeparator::class,
            'InputOtpSlot' => \EvolveUI\EvolveUI\View\Components\Ui\InputOtpSlot::class,
            'Item' => \EvolveUI\EvolveUI\View\Components\Ui\Item::class,
            'ItemActions' => \EvolveUI\EvolveUI\View\Components\Ui\ItemActions::class,
            'ItemContent' => \EvolveUI\EvolveUI\View\Components\Ui\ItemContent::class,
            'ItemDescription' => \EvolveUI\EvolveUI\View\Components\Ui\ItemDescription::class,
            'ItemFooter' => \EvolveUI\EvolveUI\View\Components\Ui\ItemFooter::class,
            'ItemGroup' => \EvolveUI\EvolveUI\View\Components\Ui\ItemGroup::class,
            'ItemHeader' => \EvolveUI\EvolveUI\View\Components\Ui\ItemHeader::class,
            'ItemMedia' => \EvolveUI\EvolveUI\View\Components\Ui\ItemMedia::class,
            'ItemSeparator' => \EvolveUI\EvolveUI\View\Components\Ui\ItemSeparator::class,
            'ItemTitle' => \EvolveUI\EvolveUI\View\Components\Ui\ItemTitle::class,
            'Label' => \EvolveUI\EvolveUI\View\Components\Ui\Label::class,
            'NativeSelect' => \EvolveUI\EvolveUI\View\Components\Ui\NativeSelect::class,
            'Separator' => \EvolveUI\EvolveUI\View\Components\Ui\Separator::class,
            'Sheet' => \EvolveUI\EvolveUI\View\Components\Ui\Sheet::class,
            'SheetClose' => \EvolveUI\EvolveUI\View\Components\Ui\SheetClose::class,
            'SheetDescription' => \EvolveUI\EvolveUI\View\Components\Ui\SheetDescription::class,
            'SheetFooter' => \EvolveUI\EvolveUI\View\Components\Ui\SheetFooter::class,
            'SheetHeader' => \EvolveUI\EvolveUI\View\Components\Ui\SheetHeader::class,
            'SheetTitle' => \EvolveUI\EvolveUI\View\Components\Ui\SheetTitle::class,
            'SheetTrigger' => \EvolveUI\EvolveUI\View\Components\Ui\SheetTrigger::class,
            'Spinner' => \EvolveUI\EvolveUI\View\Components\Ui\Spinner::class,
            'Textarea' => \EvolveUI\EvolveUI\View\Components\Ui\Textarea::class,
            'TextLink' => \EvolveUI\EvolveUI\View\Components\Ui\TextLink::class,
            'Tooltip' => \EvolveUI\EvolveUI\View\Components\Ui\Tooltip::class,
        ];

        foreach ($components as $name => $class) {
            Blade::component($class, "ui.{$name}");
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
