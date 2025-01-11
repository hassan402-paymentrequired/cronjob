<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1/auth')->as('auth:')->group(
    base_path(
        path: 'routes/api/auth.php'
    )
);

Route::prefix('v1/provider')->as('provider:')->group(
    base_path(
        path: 'routes/api/provider.php'
    )
);

Route::prefix('v1/customer')->as('customer:')->group(
    base_path(
        path: 'routes/api/customer.php'
    )
);


