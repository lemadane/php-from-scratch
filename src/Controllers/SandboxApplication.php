<?php
declare(strict_types=1); // declare strict types for better type safety

namespace App\Sandbox; // Define the namespace for the Sandbox application

final class SandboxApplication { // Declare the SandboxApplication class as final to prevent inheritance
   public function run(): void { // Define the run method which contains the main logic of the application    
      $customerName = 'Juan dela Cruz'; // Define a variable to store the customer's name
      $monthlyBill = 1845.75; // Define a variable to store the monthly bill amount
      $serviceFee = 15.00; // Define a variable to store the service fee
      $totalAmount = $this->calculateTotal(
         billAmount: $monthlyBill,
         serviceFee: $serviceFee);
      echo 'PHP Sandbox Running' . PHP_EOL;
      echo 'Customer: ' . $customerName . PHP_EOL;
      echo 'Bill Amount: PHP ' . number_format($monthlyBill, 2) . PHP_EOL;
      echo 'Service Fee: PHP ' . number_format($serviceFee, 2) . PHP_EOL;
      echo 'Total Amount: PHP ' . number_format($totalAmount, 2) . PHP_EOL;
   }

   private function calculateTotal(float $billAmount, float $serviceFee): float {
      return $billAmount + $serviceFee;
   }
}