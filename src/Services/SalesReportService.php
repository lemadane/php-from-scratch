<?php

declare(strict_types=1);

namespace Karinderya\Services;

use Karinderya\Models\MenuItem;

final class SalesReportService {
   /**
    * Convert menu item array into a searchable associative array.
    *
    * Example result:
    *
    * [
    *     'PORK-ADOBO' => MenuItem,
    *     'RICE' => MenuItem
    * ]
    *
    * @param array<int, MenuItem> $menuItems
    *
    * @return array<string, MenuItem>
    */
   public function buildMenuIndex(array $menuItems): array {
      $menuIndex = [];
      foreach ($menuItems as $menuItem) {
         $menuIndex[$menuItem->code()] = $menuItem;
      }
      return $menuIndex;
   }

   /**
    * @param array<int, array{
    *     receipt_no: string,
    *     cashier: string,
    *     items: array<int, array{
    *         code: string,
    *         quantity: int
    *     }>
    * }> $sales
    *
    * @param array<string, MenuItem> $menuIndex
    */
   public function printReceiptReport(
      array $sales,
      array $menuIndex): void {
      echo PHP_EOL;
      echo "KARINDERYA SALES REPORT" . PHP_EOL;
      echo "=======================" . PHP_EOL;
      foreach ($sales as $sale) {
         echo PHP_EOL;
         echo "Receipt: {$sale['receipt_no']}" . PHP_EOL;
         echo "Cashier: {$sale['cashier']}" . PHP_EOL;
         echo "Items:" . PHP_EOL;
         $receiptTotal = 0.00;
         foreach ($sale['items'] as $soldItem) {
            $code = $soldItem['code'];
            $quantity = $soldItem['quantity'];
            if (!isset($menuIndex[$code])) {
               echo "- Unknown item code: {$code}" . PHP_EOL;
               continue;
            }
            $menuItem = $menuIndex[$code];
            $lineTotal = $menuItem->price() * $quantity;
            $receiptTotal += $lineTotal;
            echo sprintf(
               "- %s x%d = PHP %.2f",
               $menuItem->name(),
               $quantity,
               $lineTotal
            ) . PHP_EOL; // PHP_EOL constant for new line
         }
         echo sprintf(
            "Receipt Total: PHP %.2f",
            $receiptTotal) . PHP_EOL; // PHP_EOL constant for new line
      }
   }

   /**
    * @param array<int, array{
    *     receipt_no: string,
    *     cashier: string,
    *     items: array<int, array{
    *         code: string,
    *         quantity: int
    *     }>
    * }> $sales
    *
    * @param array<string, MenuItem> $menuIndex
    */
   public function calculateGrandTotal(
      array $sales,
      array $menuIndex): float {
      $grandTotal = 0.00;
      foreach ($sales as $sale) {
         foreach ($sale['items'] as $soldItem) {
            $code = $soldItem['code'];
            $quantity = $soldItem['quantity'];
            if (!isset($menuIndex[$code])) {
               continue;
            }
            $grandTotal += $menuIndex[$code]->price() * $quantity;
         }
      }
      return $grandTotal;
   }

   /**
    * Count total quantity sold per item.
    *
    * @param array<int, array{
    *     receipt_no: string,
    *     cashier: string,
    *     items: array<int, array{
    *         code: string,
    *         quantity: int
    *     }>
    * }> $sales
    *
    * @return array<string, int>
    */
   public function countSoldItems(array $sales): array {
      $soldItems = [];
      foreach ($sales as $sale) {
         foreach ($sale['items'] as $item) {
            $code = $item['code'];
            $quantity = $item['quantity'];
            if (!isset($soldItems[$code])) {
               $soldItems[$code] = 0;
            }
            $soldItems[$code] += $quantity;
         }
      }
      return $soldItems;
   }

   /**
    * @param array<string, int> $soldItems
    * @param array<string, MenuItem> $menuIndex
    */
   public function printSoldItemSummary(
      array $soldItems,
      array $menuIndex): void {
      echo PHP_EOL;
      echo "SOLD ITEM SUMMARY" . PHP_EOL;
      echo "=================" . PHP_EOL;
      arsort($soldItems); // Sort the sold items in descending order based on quantity sold
      foreach ($soldItems as $code => $quantity) {
         if (!isset($menuIndex[$code])) { // isset() check to avoid undefined index error
            continue;
         }
         echo sprintf(
            "%s: %d sold",
            $menuIndex[$code]->name(),
            $quantity
         ) . PHP_EOL;
      }
   }

   /**
    * @param array<int, MenuItem> $menuItems
    */
   public function printMenuByCategory(array $menuItems): void {
      $groupedItems = [];
      foreach ($menuItems as $menuItem) {
         $category = $menuItem->category();
         if (!isset($groupedItems[$category])) {
            $groupedItems[$category] = [];
         }
         $groupedItems[$category][] = $menuItem;
      }
      echo PHP_EOL;
      echo "MENU BY CATEGORY" . PHP_EOL;
      echo "================" . PHP_EOL;
      foreach ($groupedItems as $category => $items) {
         echo PHP_EOL;
         echo $category . PHP_EOL;
         foreach ($items as $item) {
            echo sprintf(
               "- %s: PHP %.2f",
               $item->name(),
               $item->price()
            ) . PHP_EOL;
         }
      }
   }
}