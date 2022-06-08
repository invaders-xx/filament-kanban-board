# Add a Kanban page to filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/invaders-xx/filament-kanban-board.svg?style=flat-square)](https://packagist.org/packages/invaders-xx/filament-kanban-board)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/invaders-xx/filament-kanban-board/run-tests?label=tests)](https://github.com/invaders-xx/filament-kanban-board/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/invaders-xx/filament-kanban-board/Check%20&%20fix%20styling?label=code%20style)](https://github.com/invaders-xx/filament-kanban-board/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/invaders-xx/filament-kanban-board.svg?style=flat-square)](https://packagist.org/packages/invaders-xx/filament-kanban-board)

Define a Kanban page within your Filament's application. It can be a page or a resource's page.
<img width="1471" alt="image" src="https://user-images.githubusercontent.com/604907/172618602-d1bf4377-109c-4316-8a75-ac78a0a70e9b.png">

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

You can also specify your own views to change the behaviour:

```php
public string $recordContentView = 'filament-kanban-board::record-content';
```

in your class to add more content to your kanban's boxes.

You can define your own styles for each element of the Kanban:

```php
public function styles(): array
{
    return [
        'wrapper' => 'w-full h-full flex space-x-4 overflow-x-auto',
        'kanbanWrapper' => 'h-full flex-1',
        'kanban' => 'bg-primary-200 rounded px-2 flex flex-col h-full',
        'kanbanHeader' => 'p-2 text-sm text-gray-900',
        'kanbanFooter' => '',
        'kanbanRecords' => 'space-y-2 p-2 flex-1 overflow-y-auto',
        'record' => 'shadow bg-white dark:bg-gray-800 p-2 rounded border',
        'recordContent' => 'w-full',
    ];
}
```

## Usage

In order to use this component, you must create a new Filament Page that extends from FilamentKanbanBoard

```php
class KanbanOrders extends FilamentKanbanBoard
{
    public function statuses() : Collection
    {
        return collect([
            [
                'id' => 'registered',
                'title' => 'Registered',
            ],
            [
                'id' => 'awaiting_confirmation',
                'title' => 'Awaiting Confirmation',
            ],
            [
                'id' => 'confirmed',
                'title' => 'Confirmed',
            ],
            [
                'id' => 'delivered',
                'title' => 'Delivered',
            ],
        ]);
    }
}
```

For each status we define, we must return an array with at least 2 keys: id and title.

Now, for records() we may define a list of Sales Orders that come from an Eloquent model in our project.

```php
public function records() : Collection
{
    return SalesOrder::query()
        ->map(function (SalesOrder $salesOrder) {
            return [
                'id' => $salesOrder->id,
                'title' => $salesOrder->client,
                'status' => $salesOrder->status,
            ];
        });
}
```

As you might see in the above snippet, we must return a collection of array items where each item must have at least 3
keys: id, title and status. The last one is of most importance since it is going to be used to match to which status the
record belongs to. For this matter, the component matches status and records with the following comparison

```php
$status['id'] == $record['status'];
```

if you need to use this page within a Filament's resource, add the route function definition to the class:

```php
public static function route(string $path): array
{
    return [
        'class' => static::class,
        'route' => $path,
    ];
}
```

### Sorting and Dragging

By default, sorting and dragging between statuses is disabled. To enable it, set in your class:

```php
public bool $sortable = true;
public bool $sortableBetweenStatuses = true;
```

### Behavior and Interactions

When sorting and dragging is enabled, your component can be notified when any of these events occur. The callbacks
triggered by these two events are `onStatusSorted` and `onStatusChanged`

On `onStatusSorted` you are notified about which `record` has changed position within it's `status`. You are also given
a `$orderedIds` array which holds the ids of the `records` after being sorted. You must override the following method to
get notified on this change.

```php
public function onStatusSorted($recordId, $statusId, $orderedIds)
{
    //   
}
```

On `onStatusChanged` gets triggered when a `record` is moved to another `status`. In this scenario, you get notified
about the `record` that was changed, the new `status`, the ordered ids from the previous status and the ordered ids of
the new status the record in entering. To be notified about this event, you must override the following method:

```php
public function onStatusChanged($recordId, $statusId, $fromOrderedIds, $toOrderedIds)
{
    //
}
``` 

`onStatusSorted` and `onStatusChanged` are never triggered simultaneously. You'll get notified of one or the other when
an interaction occurs.

You can also get notified when a record in the status board is clicked via the `onRecordClick` event

```php
public function onRecordClick($recordId)
{
    //
}
``` 

To enable `onRecordClick` set it in the class:

```php
public bool $recordClickEnabled = true;
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
