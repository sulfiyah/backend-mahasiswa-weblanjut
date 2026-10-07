<?php

$app = require __DIR__ . '/../bootstrap/app.php';

if (getenv('VERCEL') || isset($_ENV['VERCEL'])) {
    $app->useStoragePath('/tmp');
}

$request = Illuminate\Http\Request::capture();
$response = $app->handle($request);
$response->send();