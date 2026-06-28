<?php

declare(strict_types=1);

use App\Services\GreetingService;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$service = new GreetingService();

echo $service->greet('Lemuel');