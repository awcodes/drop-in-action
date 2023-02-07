<?php

namespace Awcodes\DropInAction;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class DropInActionServiceProvider extends PluginServiceProvider
{
    public static string $name = 'drop-in-action';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }
}
