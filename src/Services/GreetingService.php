<?php

declare(strict_types=1);

namespace App\Services;

final class GreetingService {
   public function greet(string $name): string {
      return "Hello, {$name}. Welcome to PHP 8.5.";
   }
}