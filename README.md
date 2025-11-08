# EvolveUI

A beautiful Laravel UI component library inspired by shadcn/ui, featuring a complete set of components for building modern web applications.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/evolveui/evolveui.svg?style=flat-square)](https://packagist.org/packages/evolveui/evolveui)
[![Total Downloads](https://img.shields.io/packagist/dt/evolveui/evolveui.svg?style=flat-square)](https://packagist.org/packages/evolveui/evolveui)

## Features

- 🎨 **Essential Components**: 50+ essential shadcn/ui components (cleaned and focused)
- 🔐 **Complete Auth System**: Login, register, password reset with beautiful split-view design
- 📊 **Dashboard**: Pre-built shadcn-style dashboard with stats, tables, and cards
- 👤 **Profile Management**: Full profile page with account settings and password management
- 📱 **Responsive**: Mobile-first, fully responsive components
- 🌙 **Dark Mode**: Built-in dark mode support
- ⚡ **Blade Components**: Easy-to-use Laravel Blade components
- 🎯 **Type-Safe**: PHP component classes with type hints

## Installation

You can install the package via composer:

```bash
composer require evolveui/evolveui
```

## Quick Start

### 1. Install EvolveUI (Starter Kit)

After installing the package, run the install command:

```bash
php artisan evolveui:install
```

This will install everything into your application:
- ✅ **Views** → `resources/views/` (auth views, components, icons)
- ✅ **Components** → `app/View/Components/` (all UI and Layout components)
- ✅ **Controllers** → `app/Http/Controllers/Auth/` (authentication controllers)
- ✅ **Routes** → `routes/auth.php` (authentication routes)
- ✅ **Helpers** → `app/helpers.php` (utility functions)
- ✅ **CSS** → `resources/css/app.css` (Tailwind CSS with shadcn theming)
- ✅ **JS** → `resources/js/app.js` (Alpine.js setup)

After installation, you **must** install the required npm packages:

```bash
# Install npm dependencies (REQUIRED)
npm install tailwindcss @tailwindcss/vite tailwindcss-animate alpinejs @alpinejs/focus

# Build assets
npm run build
# OR for development:
npm run dev

# Update composer autoload
composer dump-autoload
```

⚠️ **Important**: The CSS and JS files require these npm packages. Without them, you'll get build errors!

### 2. Authentication is Ready!

After installation, you immediately have:
- **Login**: `/login` - Beautiful split-view login page
- **Register**: `/register` - Registration page with split-view design
- **Password Reset**: `/forgot-password` and `/reset-password`
- **Dashboard**: `/dashboard` - Complete shadcn-style dashboard with stats and tables
- **Profile**: `/profile` - User profile management with account settings
- **Logout**: POST to `/logout`

All files are now in your application directory - customize them as needed!

### 3. Use Components in Your Views

The package includes a beautiful split-view authentication layout. Here's how to use it:

**Login View Example:**

```blade
<x-layout.auth title="Welcome back" description="Sign in to your account" :showSignUpPrompt="true">
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div class="space-y-2">
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input id="email" type="email" name="email" required />
        </div>
        <div class="space-y-2">
            <x-ui.label for="password">Password</x-ui.label>
            <x-ui.input id="password" type="password" name="password" required />
        </div>
        <x-ui.button type="submit" class="w-full">Sign in</x-ui.button>
    </form>
</x-layout.auth>
```

**Register View Example:**

```blade
<x-layout.auth title="Create an account" description="Enter your information to get started" :showSignInPrompt="true">
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <!-- Your registration form fields -->
        <x-ui.button type="submit" class="w-full">Create account</x-ui.button>
    </form>
</x-layout.auth>
```

### 3. Dashboard & Profile

The starter kit includes a complete dashboard and profile page:

- **Dashboard** (`/dashboard`): Features stats cards, recent sales table, and activity feed
- **Profile** (`/profile`): Manage your account information, update password, and delete account

Both pages use the `<x-layout.app>` layout with sidebar navigation.

### 4. Use the Dashboard Layout

For authenticated pages, use the app layout with sidebar:

```blade
<x-layout.app title="Dashboard">
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Welcome back!</h1>
        <!-- Your dashboard content -->
    </div>
</x-layout.app>
```

## Available Components

### Essential UI Components

All UI components are prefixed with `x-ui.`:

**Core Components:**
- **Buttons**: `<x-ui.button>` (variants: default, outline, destructive, ghost)
- **Inputs**: `<x-ui.input>`, `<x-ui.textarea>`, `<x-ui.label>`, `<x-ui.input-error>`
- **Forms**: `<x-ui.checkbox>`, `<x-ui.select>`, `<x-ui.native-select>`, `<x-ui.radio-group>`
- **Cards**: `<x-ui.card>`, `<x-ui.card-header>`, `<x-ui.card-content>`, `<x-ui.card-title>`, `<x-ui.card-description>`, `<x-ui.card-footer>`
- **Avatars**: `<x-ui.avatar>`, `<x-ui.avatar-image>`, `<x-ui.avatar-fallback>`
- **Badges**: `<x-ui.badge>`
- **Separators**: `<x-ui.separator>`
- **Breadcrumbs**: `<x-ui.breadcrumb>`

**Interactive Components:**
- **Dialogs**: `<x-ui.dialog>`, `<x-ui.dialog-trigger>`, `<x-ui.dialog-content>`, `<x-ui.dialog-header>`, etc.
- **Dropdowns**: `<x-ui.dropdown>`, `<x-ui.dropdown-trigger>`, `<x-ui.dropdown-content>`, `<x-ui.dropdown-item>`, etc.
- **Sheets**: `<x-ui.sheet>`, `<x-ui.sheet-trigger>`, `<x-ui.sheet-content>`, etc.

**Data Display:**
- **Tables**: `<x-ui.table>`, `<x-ui.table-header>`, `<x-ui.table-body>`, `<x-ui.table-row>`, `<x-ui.table-head>`, `<x-ui.table-cell>`
- **Progress**: `<x-ui.progress>`
- **Spinner**: `<x-ui.spinner>`
- **Tooltip**: `<x-ui.tooltip>`

### Layout Components

- `<x-layout.app>` - Main application layout with sidebar
- `<x-layout.auth>` - Authentication layout with split view
- `<x-layout.app-header>` - Application header
- `<x-layout.app-sidebar>` - Application sidebar
- `<x-layout.head>` - HTML head component

## Assets & Dependencies

### CSS (Tailwind CSS)

The package includes a complete Tailwind CSS configuration with shadcn/ui theming:

- **File**: `resources/css/app.css`
- **Features**: 
  - Tailwind CSS v4 with `@tailwindcss/vite`
  - `tailwindcss-animate` plugin for animations
  - Complete shadcn color system (light & dark mode)
  - Custom theme variables for sidebar, charts, etc.

### JavaScript (Alpine.js)

The package includes Alpine.js setup for interactive components:

- **File**: `resources/js/app.js`
- **Features**:
  - Alpine.js with `@alpinejs/focus` plugin
  - Ready for dropdowns, dialogs, and other interactive components

### Required npm Packages

After installation, make sure you have these packages installed:

```bash
npm install tailwindcss @tailwindcss/vite tailwindcss-animate alpinejs @alpinejs/focus
```

### Vite Configuration

Make sure your `vite.config.js` includes the CSS and JS files:

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
```

### Icons

Icons are prefixed with `x-icons.`:

- `<x-icons.app-logo>`
- `<x-icons.search>`
- `<x-icons.user>`
- `<x-icons.chevron-down>`
- And 60+ more icons

## Component Examples

### Button

```blade
<x-ui.button>Default Button</x-ui.button>
<x-ui.button variant="outline">Outline Button</x-ui.button>
<x-ui.button variant="destructive">Delete</x-ui.button>
<x-ui.button variant="ghost">Ghost Button</x-ui.button>
<x-ui.button size="sm">Small Button</x-ui.button>
<x-ui.button size="lg">Large Button</x-ui.button>
```

### Input

```blade
<x-ui.label for="email">Email</x-ui.label>
<x-ui.input id="email" type="email" name="email" required />
<x-ui.input-error :message="$errors->first('email')" />
```

### Card

```blade
<x-ui.card>
    <x-ui.card-header>
        <x-ui.card-title>Card Title</x-ui.card-title>
        <x-ui.card-description>Card description</x-ui.card-description>
    </x-ui.card-header>
    <x-ui.card-content>
        Card content goes here
    </x-ui.card-content>
    <x-ui.card-footer>
        <x-ui.button>Action</x-ui.button>
    </x-ui.card-footer>
</x-ui.card>
```

### Dialog

```blade
<x-ui.dialog>
    <x-ui.dialog-trigger>
        <x-ui.button>Open Dialog</x-ui.button>
    </x-ui.dialog-trigger>
    <x-ui.dialog-overlay />
    <x-ui.dialog-content>
        <x-ui.dialog-header>
            <x-ui.dialog-title>Dialog Title</x-ui.dialog-title>
            <x-ui.dialog-description>Dialog description</x-ui.dialog-description>
        </x-ui.dialog-header>
        <p>Dialog content</p>
        <x-ui.dialog-footer>
            <x-ui.button variant="outline">Cancel</x-ui.button>
            <x-ui.button>Confirm</x-ui.button>
        </x-ui.dialog-footer>
    </x-ui.dialog-content>
</x-ui.dialog>
```

## Example Views

The package includes example views in `resources/views/examples/`:

- `login.blade.php` - Complete login form example
- `register.blade.php` - Complete registration form example
- `dashboard.blade.php` - Dashboard example with cards and stats

You can copy these to your application's views directory and customize them as needed.

## Styling

EvolveUI uses Tailwind CSS for styling. Make sure you have Tailwind CSS configured in your Laravel application.

The components use CSS variables for theming, which makes it easy to customize colors:

```css
:root {
    --background: 0 0% 100%;
    --foreground: 222.2 84% 4.9%;
    /* ... more variables */
}
```

## Configuration

You can publish the config file with:

```bash
php artisan vendor:publish --tag="evolveui-config"
```

## Requirements

- PHP ^8.3
- Laravel ^10.0 || ^11.0 || ^12.0
- Tailwind CSS

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
