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

## Example command

The following command will remove files older than {days} in the specified {directory} from your {disk} 
```
php artisan db:file-cleanup {directory} {days=14} {disk=local}
```

## Feature requests

* Tests
