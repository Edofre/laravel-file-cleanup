# Laravel File Cleanup

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/laravel-file-cleanup
```

or add

```
"edofre/laravel-file-cleanup": "V1.0.0"
```

to the ```require``` section of your `composer.json` file.

## Configuration

Add the console command to the $commands array in your /app/Console/Kernel.php
```php
protected $commands = [
        \Edofre\FileCleanup\FileCleanup::class,
    ];

```

## Example command

The following command will remove files older than {days} in the specified {directory} 
```
php artisan db:file-cleanup {directory} {days}
```

## Tests

Run the tests by executing the following command:
```
composer test
```

## Feature requests

* ?
