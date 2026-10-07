<?php

// Paksa path storage ke /tmp agar aman dari read-only Vercel
putenv('APP_STORAGE=/tmp');
$_ENV['APP_STORAGE'] = $_SERVER['APP_STORAGE'] = '/tmp';

// Load framework Laravel dan tangani request
require __DIR__ . '/../public/index.php';