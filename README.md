PostgresqlSchema
================

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)

Add inheritance in postgresql tables

## Installation
[PHP](https://php.net) 5.4+ and [Laravel](http://laravel.com) 4.2+ are required.

To get the latest version of PostgreSQL Schema, simply require `"thibaud-dauce/postgresql-schema": "0.*"` in your `composer.json` file. You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once PostgreSQL Schema is installed, you need to register the service provider. Open up `app/config/app.php` and add the following to the `providers` key.

* `'ThibaudDauce\PostgresqlSchema\PostgresqlSchemaServiceProvider'`

## Usage

In migration file when using a postgresql database, you can use the new method `addInheritedTable`:

```php
<?php

Schema::create('test', function(Blueprint $table) {

  $table->increments('id');
  $table->addInheritedTable('users');
});
```
