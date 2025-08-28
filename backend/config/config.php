<?php
return [
    'db' => [
        'host' => getenv('DB_HOST') ?: 'localhost', // Database host (set via DB_HOST environment variable)
        'port' => getenv('DB_PORT') ?: 3306, // Database port (set via DB_PORT environment variable)
        'name' => getenv('DB_NAME') ?: 'annuaire', // Database name (set via DB_NAME environment variable)
        'user' => getenv('DB_USER') ?: 'root', // Database user (set via DB_USER environment variable)
        'pass' => getenv('DB_PASS') ?: '', // Database password (set via DB_PASS environment variable)
        'charset' => 'utf8mb4',
    ],
    'jwt' => [
        'secret' => getenv('JWT_SECRET') ?: 'change_this_to_a_strong_secret', // JWT secret (set via JWT_SECRET environment variable)
        'algo' => 'HS256',
        'ttl'  => 3600
    ],
    'cors' => [
        'allowed_origins' => explode(',', getenv('CORS_ALLOWED') ?: 'http://192.168.0.191'), // Allowed CORS origins (set via CORS_ALLOWED environment variable)
    ],
];
