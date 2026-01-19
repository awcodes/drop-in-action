# Drop-in Action for Filament

> [!Warning]
> With the release of Filament v3 this plugin is no longer necessary. Support will be maintained for v2 projects. You can read more about ["anonymous" actions](https://filamentphp.com/docs/3.x/forms/actions#adding-anonymous-actions-to-a-form-without-attaching-them-to-a-component) on the Filament Docs.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/drop-in-action.svg?style=flat-square)](https://packagist.org/packages/awcodes/drop-in-action)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/drop-in-action.svg?style=flat-square)](https://packagist.org/packages/awcodes/drop-in-action)

![drop-in-action](https://user-images.githubusercontent.com/3596800/217309146-b640e169-18df-4329-a2dc-f806c6cfad84.jpg)

A form component for Filament allowing actions inside of forms.

## Installation

You can install the package via composer:

```bash
composer require awcodes/drop-in-action
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="drop-in-action-views"
```

## Usage

```php
use Awcodes\DropInAction\Forms\Components\DropInAction;

DropInAction::make('test')
    ->disableLabel()
    ->execute(function (Closure $get, Closure $set) {
        return Action::make('geolocate')
            ->icon('heroicon-o-search')
            ->label('Geocode')
            ->action(function () use ($get, $set) {       
                try {
                    $mapsData = Http::get(config('services.google_maps.url') . '?key=' . config('services.google_maps.key') . '&address=' . $address . '&sensor=true')
                        ->throw()
                        ->json();
                } catch (RequestException $e) {
                    Filament::notify('danger', 'Unable to geocode for this address.');
        
                    return;
                }
        
                $set('latitude', $mapsData['results'][0]['geometry']['location']['lat'] ?? $get('latitude'));
                $set('longitude', $mapsData['results'][0]['geometry']['location']['lng'] ?? $get('longitude'));
          });
    }),
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [awcodes](https://github.com/awcodes)
- [JackWH](https://github.com/JackWH)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
