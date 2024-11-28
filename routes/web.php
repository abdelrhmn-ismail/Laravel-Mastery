<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


// Define client configurations
$clients = [
    'app01' => [
        'domain' => 'app01.tenancy.test',
        'database' => 'tenancy_app01',
    ],
    'app02' => [
        'domain' => 'app02.tenancy.test',
        'database' => 'tenancy_app02',
    ],
];

// Main domain route
Route::domain('tenancy.test')->group(function () {
    Route::get('/', function () {
        return 'Welcome to the main domain!';
    });
});

// Subdomain routes
foreach ($clients as $client => $config) {
    Route::domain($config['domain'])->group(function () use ($config) {
        Route::get('/', function () use ($config) {
            // Switch database
            config(['database.connections.mysql.database' => $config['database']]);
            DB::purge('mysql'); // Clears the previous database connection
            DB::reconnect('mysql'); // Reconnects with the new database

            // Fetch some data from the database (example: a table called 'users')
            $users = DB::table('users')->get();

            return [
                'message' => "Welcome to {$config['domain']}!",
                'data' => $users,
            ];
        });
    });
}
