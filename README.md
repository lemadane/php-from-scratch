# PHP From Scratch

A realistic object-oriented PHP 8.5 learning project using Composer, PSR-4 autoloading, and SQLite when database persistence is needed.

This project is designed as a clean starting point for learning modern PHP from scratch while still following real-world project structure.

## Tech Stack

* PHP 8.5
* Composer
* Object-Oriented PHP
* PSR-4 Autoloading
* SQLite
* Vanilla PHP
* Built-in PHP development server

## Project Structure

```text
php-from-scratch/
├── composer.json
├── public/
│   └── index.php
├── src/
│   ├── Controllers/
│   ├── Core/
│   ├── Models/
│   └── Services/
├── storage/
│   └── database.sqlite
├── vendor/
├── README.md
└── .gitignore
```

## Requirements

Make sure the following are installed:

```bash
php -v
composer -V
```

Required PHP extensions:

```bash
php -m | grep pdo
php -m | grep sqlite
```

You should have:

```text
PDO
pdo_sqlite
sqlite3
```

## Installation

Clone the project or create the folder manually:

```bash
mkdir php-from-scratch
cd php-from-scratch
```

Install Composer dependencies:

```bash
composer install
```

Regenerate Composer autoload files:

```bash
composer dump-autoload
```

## Running the Application

Start the PHP development server:

```bash
composer serve
```

Open the application in your browser:

```text
http://localhost:8000
```

## Composer Configuration

The project uses PSR-4 autoloading:

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "src/"
    }
  }
}
```

This means a class like this:

```php
namespace App\Services;

final class GreetingService {
}
```

Should be placed in:

```text
src/Services/GreetingService.php
```

## Coding Style

This project uses K&R-style braces:

```php
final class UserService {
   public function getUsers(): array {
      return [];
   }
}
```

Opening braces should stay on the same line as the class, method, function, loop, or condition.

## Example Entry Point

```php
<?php

declare(strict_types=1);

use App\Services\GreetingService;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$service = new GreetingService();

echo $service->greet('Lemuel');
```

## Database

SQLite will be used when the project needs persistence.

The default database location is:

```text
storage/database.sqlite
```

Create the file manually when needed:

```bash
mkdir -p storage
touch storage/database.sqlite
```

## Development Notes

This project intentionally starts simple.

We will gradually add:

* Routing
* Controllers
* Services
* Models
* Request and response handling
* SQLite database access
* Basic MVC structure
* Form handling
* Validation
* Authentication examples
* REST API examples

## Useful Commands

Start local server:

```bash
composer serve
```

Regenerate autoload files:

```bash
composer dump-autoload
```

Check PHP version:

```bash
php -v
```

Check installed PHP modules:

```bash
php -m
```

## License

This project is for learning purposes.
