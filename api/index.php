<?php

// Vercel Serverless environment initialization for Laravel
$tmp = '/tmp';
$directories = [
    $tmp . '/views',
    $tmp . '/storage/framework/views',
    $tmp . '/storage/framework/cache/data',
    $tmp . '/storage/framework/sessions',
    $tmp . '/storage/app/public/berkas/surat-pengantar',
    $tmp . '/storage/app/public/berkas/cv',
    $tmp . '/storage/logs',
    $tmp . '/bootstrap/cache',
];

foreach ($directories as $directory) {
    if (!is_dir($directory)) {
        @mkdir($directory, 0755, true);
    }
}

// Set storage and compiled view paths to /tmp
putenv('APP_STORAGE=' . $tmp . '/storage');
$_ENV['APP_STORAGE'] = $tmp . '/storage';
$_SERVER['APP_STORAGE'] = $tmp . '/storage';

putenv('VIEW_COMPILED_PATH=' . $tmp . '/views');
$_ENV['VIEW_COMPILED_PATH'] = $tmp . '/views';
$_SERVER['VIEW_COMPILED_PATH'] = $tmp . '/views';

// If SQLite is used and database/database.sqlite exists, copy to /tmp so it is writable
$sourceSqlite = __DIR__ . '/../database/database.sqlite';
$tmpSqlite = $tmp . '/database.sqlite';
if (!file_exists($tmpSqlite) && file_exists($sourceSqlite)) {
    @copy($sourceSqlite, $tmpSqlite);
}
if (file_exists($tmpSqlite)) {
    putenv('DB_DATABASE=' . $tmpSqlite);
    $_ENV['DB_DATABASE'] = $tmpSqlite;
    $_SERVER['DB_DATABASE'] = $tmpSqlite;
}

// Forward HTTPS for reverse proxies like Vercel
if ((isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
    isset($_SERVER['VERCEL'])) {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = '443';
}

require __DIR__ . '/../public/index.php';