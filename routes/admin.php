<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PurchaseOrderController;

Route::get('',[HomeController::class,'index']);

Route::get('/purchase',[PurchaseOrderController::class,'index']);

Route::get('/purchase/list', [PurchaseOrderController::class, 'getPurchase'])
        ->name('admin.purchase.list');

Route::get('/purchase/data/{Pedido}', [PurchaseOrderController::class, 'getPedido'])
        ->name('admin.purchase.getPedido');

