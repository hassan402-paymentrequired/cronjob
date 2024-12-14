<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/auth')->as('auth:')->group(
    base_path(
        path: 'routes/api/auth.php'
    )
);

Route::prefix('v1/vendor')->as('vendor:')->group(
    base_path(
        path: 'routes/api/vendor.php'
    )
);

