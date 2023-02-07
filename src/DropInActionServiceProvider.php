<?php

namespace Awcodes\DropInAction;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class DropInActionServiceProvider extends PluginServiceProvider
{
    public static string $name = 'drop-in-action';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-drop-in-action' => __DIR__.'/../resources/dist/drop-in-action.css',
    ];

    protected array $scripts = [
        'plugin-drop-in-action' => __DIR__.'/../resources/dist/drop-in-action.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-drop-in-action' => __DIR__ . '/../resources/dist/drop-in-action.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
