<?php

declare(strict_types=1);

namespace Karinderya\Models;

final class MenuItem {
   public function __construct(
      private readonly string $code,
      private readonly string $name,
      private readonly float $price,
      private readonly string $category
   ) {
   }

   public function code(): string {
      return $this->code;
   }

   public function name(): string {
      return $this->name;
   }

   public function price(): float {
      return $this->price;
   }

   public function category(): string {
      return $this->category;
   }
}