<?php

// Arahkan storage path ke /tmp karena Vercel bersifat read-only
$_ENV['APP_STORAGE'] = '/tmp';

// Muat autoloader dari folder vendor utama project
require __DIR__ . '/../vendor/autoload.php';

// Jalankan aplikasi melalui bootstrap Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);