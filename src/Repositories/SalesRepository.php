<?php

declare(strict_types=1);

namespace Karinderya\Repositories;

use Karinderya\Models\MenuItem;

final class SalesRepository {
   /**
    * Indexed array of objects.
    *
    * @return array<int, MenuItem>
    */
   public function menuItems(): array {
      return [
         new MenuItem('PORK-ADOBO', 'Pork Adobo', 75.00, 'Ulam'),
         new MenuItem('CHICKEN-CURRY', 'Chicken Curry', 80.00, 'Ulam'),
         new MenuItem('FRIED-CHICKEN', 'Fried Chicken', 65.00, 'Ulam'),
         new MenuItem('RICE', 'Plain Rice', 15.00, 'Rice'),
         new MenuItem('COKE', 'Coke Mismo', 25.00, 'Drinks'),
         new MenuItem('WATER', 'Bottled Water', 20.00, 'Drinks'),
      ];
   }

   /**
    * Multi-dimensional associative array.
    *
    * @return array<int, array{
    *     receipt_no: string,
    *     cashier: string,
    *     items: array<int, array{
    *         code: string,
    *         quantity: int
    *     }>
    * }>
    */
   public function sales(): array {
      return [
         [
            'receipt_no' => 'OR-0001',
            'cashier' => 'Maria',
            'items' => [
               ['code' => 'PORK-ADOBO', 'quantity' => 2],
               ['code' => 'RICE', 'quantity' => 2],
               ['code' => 'COKE', 'quantity' => 1],
            ],
         ],
         [
            'receipt_no' => 'OR-0002',
            'cashier' => 'Ben',
            'items' => [
               ['code' => 'CHICKEN-CURRY', 'quantity' => 1],
               ['code' => 'RICE', 'quantity' => 1],
               ['code' => 'WATER', 'quantity' => 1],
            ],
         ],
         [
            'receipt_no' => 'OR-0003',
            'cashier' => 'Maria',
            'items' => [
               ['code' => 'FRIED-CHICKEN', 'quantity' => 3],
               ['code' => 'RICE', 'quantity' => 3],
               ['code' => 'COKE', 'quantity' => 2],
            ],
         ],
      ];
   }
}