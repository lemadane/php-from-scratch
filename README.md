# Karinderya Sales Analyzer

A beginner-friendly PHP project for learning **arrays**, **associative arrays**, **multi-dimensional arrays**, and **loops** using a real-world karinderya sales report example.

This project is part of the **PHP from Scratch** course continuation:
**Section 3: Arrays & Iteration**

---

## What This Project Teaches

This project demonstrates how to use:

* Indexed arrays
* Associative arrays
* Multi-dimensional arrays
* Array functions
* Basic loops
* Nested loops
* Looping through arrays
* Grouping data
* Counting items
* Calculating totals
* Working with object arrays

---

## Project Scenario

The application simulates a small karinderya sales report system.

It has:

* Menu items
* Sales receipts
* Cashiers
* Sold items
* Quantity sold
* Receipt totals
* Grand total sales
* Sold item summary
* Menu grouping by category

No database is used yet.
All data is stored in PHP arrays so the focus stays on arrays and iteration.

---

## Requirements

* PHP 8.5 or newer
* Composer

Check your PHP version:

```bash
php -v
```

Check your Composer version:

```bash
composer -V
```

---

## Installation

Clone or create the project folder:

```bash
mkdir karinderya-sales-analyzer
cd karinderya-sales-analyzer
```

Install Composer autoloading:

```bash
composer dump-autoload
```

---

## Project Structure

```txt
karinderya-sales-analyzer/
├── bin/
│   └── report.php
├── src/
│   ├── Models/
│   │   └── MenuItem.php
│   ├── Repositories/
│   │   └── SalesRepository.php
│   └── Services/
│       └── SalesReportService.php
├── composer.json
├── README.md
└── vendor/
```

---

## Running the Project

Run the project using Composer:

```bash
composer start
```

Or run the PHP file directly:

```bash
php bin/report.php
```

---

## Expected Output

The application will print a sales report similar to this:

```txt
MENU BY CATEGORY
================

Ulam
- Pork Adobo: PHP 75.00
- Chicken Curry: PHP 80.00
- Fried Chicken: PHP 65.00

Rice
- Plain Rice: PHP 15.00

Drinks
- Coke Mismo: PHP 25.00
- Bottled Water: PHP 20.00

KARINDERYA SALES REPORT
=======================

Receipt: OR-0001
Cashier: Maria
Items:
- Pork Adobo x2 = PHP 150.00
- Plain Rice x2 = PHP 30.00
- Coke Mismo x1 = PHP 25.00
Receipt Total: PHP 205.00

GRAND TOTAL: PHP 610.00

SOLD ITEM SUMMARY
=================
Plain Rice: 6 sold
Fried Chicken: 3 sold
Coke Mismo: 3 sold
Pork Adobo: 2 sold
Chicken Curry: 1 sold
Bottled Water: 1 sold
```

---

## Main Files

### `MenuItem.php`

Represents a single menu item.

Each menu item has:

* Code
* Name
* Price
* Category

Example:

```php
new MenuItem('PORK-ADOBO', 'Pork Adobo', 75.00, 'Ulam')
```

---

### `SalesRepository.php`

Provides sample data for the application.

It contains:

* Menu items
* Sales receipts
* Receipt items
* Cashier names

This file demonstrates indexed arrays, associative arrays, and multi-dimensional arrays.

---

### `SalesReportService.php`

Contains the main business logic.

It can:

* Build a searchable menu index
* Print menu items by category
* Print receipt reports
* Calculate grand total sales
* Count sold items
* Print sold item summaries

---

### `report.php`

The main entry point of the application.

It creates the repository and service objects, loads the data, and prints the report.

---

## Important PHP Concepts Used

### Indexed Array

```php
$items = [
    'Pork Adobo',
    'Plain Rice',
    'Coke Mismo',
];
```

Use indexed arrays when you only need a list of values.

---

### Associative Array

```php
$sale = [
    'receipt_no' => 'OR-0001',
    'cashier' => 'Maria',
];
```

Use associative arrays when each value needs a named key.

---

### Multi-Dimensional Array

```php
$sales = [
    [
        'receipt_no' => 'OR-0001',
        'cashier' => 'Maria',
        'items' => [
            ['code' => 'PORK-ADOBO', 'quantity' => 2],
            ['code' => 'RICE', 'quantity' => 2],
        ],
    ],
];
```

Use multi-dimensional arrays when data has multiple levels.

Example:

```txt
Sales
└── Receipt
    └── Items
```

---

### Foreach Loop

```php
foreach ($sales as $sale) {
    echo $sale['receipt_no'];
}
```

`foreach` is the most common loop used for arrays in PHP.

---

### Nested Loop

```php
foreach ($sales as $sale) {
    foreach ($sale['items'] as $item) {
        echo $item['code'];
    }
}
```

Use nested loops when looping through arrays inside another array.

---

## Practice Challenges

### Challenge 1

Add a new menu item:

```php
new MenuItem('PANCIT', 'Pancit Canton', 50.00, 'Merienda')
```

Then add it to one receipt.

---

### Challenge 2

Create a method that counts sales by cashier.

Expected result:

```php
[
    'Maria' => 2,
    'Ben' => 1,
]
```

---

### Challenge 3

Create a method that calculates total sales per cashier.

Expected result:

```php
[
    'Maria' => 495.00,
    'Ben' => 115.00,
]
```

---

### Challenge 4

Create a method that finds the best-selling item.

Expected output:

```txt
Plain Rice is the best-selling item with 6 sold.
```

---

### Challenge 5

Create a method that groups receipt numbers by cashier.

Expected result:

```php
[
    'Maria' => [
        'OR-0001',
        'OR-0003',
    ],
    'Ben' => [
        'OR-0002',
    ],
]
```

---

## Why This Project Matters

Arrays are everywhere in real PHP applications.

You will see arrays in:

* Form submissions
* API responses
* JSON data
* Validation errors
* Database result sets
* Configuration files
* Session data
* Request data
* Response data

Before learning databases, MVC, sessions, authentication, and APIs, it is important to become comfortable with arrays and loops first.

---

## Next Step

After completing this section, the next logical step is to connect this array-based project to a simple MVC structure, then later replace the hardcoded arrays with a database.
