<?php

declare(strict_types=1);

namespace Karinderya\Models;

// This class represents a menu item in the Karinderya system, 
// encapsulating its code, name, price, and category.
final class MenuItem {
   public function __construct(
      private readonly string $code,
      private readonly string $name,
      private readonly float $price,
      private readonly string $category
   ) {
   }

   // Getter methods for the properties of the MenuItem class.
   public function code(): string {
      return $this->code;
   }

   // Getter methods for the properties of the MenuItem class.
   public function name(): string {
      return $this->name;
   }

   // Getter methods for the properties of the MenuItem class.
   public function price(): float {
      return $this->price;
   }

   // Getter methods for the properties of the MenuItem class.
   public function category(): string {
      return $this->category;
   }
}