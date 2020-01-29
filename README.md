# Introduction
https://videx.comesconnected.com/ page product parser.

# Installation

After checking out project run

```bash
composer install
``` 

Copy environment file from example

```bash
cp .env.example .env
``` 

Run database migration

```bash
php artisan migrate:fresh
```

# Run parser

```bash
php artisan page:crawler videx
```

# Project files

Project specific files and folders listed below

## Main script file

**app/Console/Commands/PageCrawler.php**

## App classes

App classes 

app/Entity/*

app/Parser/*

app/ParserBuilder.php

app/VidexProduct.php


## Migration files

/database/migrations/2020_01_29_102836_create_videx_products_table.php

# Tests

Tests located in **tests/Unit** folder

Run tests

```bash
vendor/bin/phpunit
```
