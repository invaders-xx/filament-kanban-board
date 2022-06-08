# Add a Kanban page to filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/invaders-xx/filament-kanban-board.svg?style=flat-square)](https://packagist.org/packages/invaders-xx/filament-kanban-board)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/invaders-xx/filament-kanban-board/run-tests?label=tests)](https://github.com/invaders-xx/filament-kanban-board/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/invaders-xx/filament-kanban-board/Check%20&%20fix%20styling?label=code%20style)](https://github.com/invaders-xx/filament-kanban-board/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/invaders-xx/filament-kanban-board.svg?style=flat-square)](https://packagist.org/packages/invaders-xx/filament-kanban-board)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require invaders-xx/filament-kanban-board
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-kanban-board-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-kanban-board-views"
```

## Usage

In order to use this component, you must create a new Filament Page that extends from FilamentKanbanBoard

```php
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [David Vincent](https://github.com/invaders-xx)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
