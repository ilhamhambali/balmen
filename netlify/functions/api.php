<?php

// File ini bertindak sebagai pintu masuk untuk Netlify Functions.
// Ia akan memuat dan menjalankan aplikasi Laravel Anda.

define('LARAVEL_START', microtime(true));

// Muat autoloader Composer
require __DIR__ . '/../../vendor/autoload.php';

// Bootstrap aplikasi Laravel
$app = require_once __DIR__ . '/../../bootstrap/app.php';

// Tangani permintaan HTTP
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
