<?php

use Illuminate\Support\Facades\Route;

Route::prefix('items')->group(__DIR__ . '/api/item.php');
