# Drop-in Action for Filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/drop-in-action.svg?style=flat-square)](https://packagist.org/packages/awcodes/drop-in-action)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/drop-in-action.svg?style=flat-square)](https://packagist.org/packages/awcodes/drop-in-action)

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
