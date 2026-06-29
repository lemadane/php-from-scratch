<?php

declare(strict_types=1);

use Karinderya\Repositories\SalesRepository;
use Karinderya\Services\SalesReportService;

require __DIR__ . '/../vendor/autoload.php';

$repository = new SalesRepository();
$reportService = new SalesReportService();
$menuItems = $repository->menuItems();
$sales = $repository->sales();
$menuIndex = $reportService->buildMenuIndex(
   $menuItems);
$reportService->printMenuByCategory(
   $menuItems);
$reportService->printReceiptReport(
   $sales,
   $menuIndex);
$grandTotal = $reportService->calculateGrandTotal(
   $sales,
   $menuIndex);
echo PHP_EOL;
echo sprintf(
   "GRAND TOTAL: PHP %.2f",
   $grandTotal) . PHP_EOL;
$soldItems = $reportService->countSoldItems($sales);
$reportService->printSoldItemSummary(
   $soldItems,
   $menuIndex);