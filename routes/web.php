<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'login']);
Route::get('/logout', [PageController::class, 'logout']);
Route::get('/dashboard/admin', [PageController::class, 'dashboardAdmin']);
Route::get('/outlet/admin', [PageController::class, 'outletAdmin']);
Route::get('/product/admin', [PageController::class, 'productAdmin']);
Route::get('/member/admin', [PageController::class, 'memberAdmin']);
Route::get('/transaction/admin', [PageController::class, 'transactionAdmin']);
Route::get('/user/admin', [PageController::class, 'userAdmin']);

