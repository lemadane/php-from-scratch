<?php

declare(strict_types=1);

namespace Karinderya\Services;

use Karinderya\Models\MenuItem;

// This class is responsible for generating sales reports based on the sales data and menu items.
final class SalesReportService {
   
   // This method converts an array of MenuItem objects into an associative array indexed by the menu 
   // item code.
   public function toIndexedMenu(array $menuItems): array {
      $toIndexedMenuItems = [];
      foreach ($menuItems as $menuItem) {
         $toIndexedMenuItems[$menuItem->code()] = $menuItem;
      }
      return $toIndexedMenuItems;
   }

   // This method prints a detailed sales report for each receipt, including the items sold 
   // and their totals. 
   public function printReceiptReport(
      array $sales,
      array $indexedMenu): void {
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
            $menuItem = $indexedMenu[$code];
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

   // This method calculates the grand total of all sales by iterating through each sale 
   // and summing up the total for each sold item based on its price and quantity.
   public function calculateGrandTotal(
      array $sales,
      array $indexedMenu): float {
      $grandTotal = 0.00;
      foreach ($sales as $sale) {
         foreach ($sale['items'] as $soldItem) {
            $code = $soldItem['code'];
            $quantity = $soldItem['quantity'];
            if (!isset($indexedMenu[$code])) {
               continue;
            }
            $grandTotal += $indexedMenu[$code]->price() * $quantity;
         }
      }
      return $grandTotal;
   }

   // This method counts the total quantity sold for each menu item across all sales.
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

   // This method prints a summary of sold items, showing the total quantity sold for each item,
   // sorted in descending order of quantity sold.
   public function printSoldItemSummary(
      array $soldItems,
      array $menuIndex): void {
      echo PHP_EOL;
      echo "SOLD ITEM SUMMARY" . PHP_EOL;
      echo "=================" . PHP_EOL;
      arsort($soldItems); // Sort the sold items in descending order based on quantity sold
      foreach ($soldItems as $code => $quantity) {
         if (!isset($menuIndex[$code])) { // isseet check if the menu item exists in the indexed menu
            continue;
         }
         echo sprintf(  // in Java this is similar to String.format()
            "%s: %d sold",
            $menuIndex[$code]->name(),
            $quantity
         ) . PHP_EOL;
      }
   }

   // This method groups menu items by their category and prints them in a structured format.
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