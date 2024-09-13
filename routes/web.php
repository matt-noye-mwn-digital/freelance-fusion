<?php

use App\Http\Controllers\Admin\AdminActivityLogController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Clients\AdminClientsMainController;
use App\Http\Controllers\Admin\Settings\AdminPaymentMethodController;
use App\Http\Controllers\Admin\Staff\AdminStaffMainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Staff\StaffDashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

//Admin Routes
Route::middleware(['auth', 'role:super admin|admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class,'index'])->name('dashboard');

    //Activity Log
    Route::name('activity-log.')->prefix('activity-log')->group(function () {
        Route::get('/', [AdminActivityLogController::class, 'index'])->name('index');
        Route::post('clear', [AdminActivityLogController::class, 'clearActivityLog'])->name('clear');

    });

    //Clients
    Route::name('clients.')->prefix('clients')->group(function () {
        Route::get('/', [AdminClientsMainController::class, 'index'])->name('index');
        Route::get('create', [AdminClientsMainController::class,'create'])->name('create');
        Route::post('store', [AdminClientsMainController::class,'store'])->name('store');
        Route::get('show/{id}', [AdminClientsMainController::class,'show'])->name('show');
        Route::get('edit/{id}', [AdminClientsMainController::class,'edit'])->name('edit');
        Route::put('update/{id}', [AdminClientsMainController::class,'update'])->name('update');
    });

    //Settings
    Route::name('settings.')->prefix('settings')->group(function () {

        //Payment Methods
        Route::resource('payment-methods', AdminPaymentMethodController::class);
    });

    //Staff
    Route::name('staff.')->prefix('staff')->group(function () {
        Route::get('/', [AdminStaffMainController::class, 'index'])->name('index');
        Route::get('create', [AdminStaffMainController::class,'create'])->name('create');
        Route::post('store', [AdminStaffMainController::class,'store'])->name('store');
        Route::get('show/{id}', [AdminStaffMainController::class,'show'])->name('show');
        Route::get('edit/{id}', [AdminStaffMainController::class,'edit'])->name('edit');
        Route::put('update/{id}', [AdminStaffMainController::class,'update'])->name('update');
        Route::delete('destroy/{id}', [AdminStaffMainController::class,'destroy'])->name('destroy');
    });
});

//Client / Customer Routes
Route::middleware(['auth', 'role:super admin|customer|client'])->name('client.')->prefix('client')->group(function () {
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
});

//Staff Routes
Route::middleware(['auth', 'role:super admin|staff'])->name('staff.')->prefix('staff')->group(function () {
    Route::get('dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
});

Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


