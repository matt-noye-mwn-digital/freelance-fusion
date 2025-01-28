<?php

use App\Http\Controllers\Admin\AdminActivityLogController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminTinyFileUploadController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Admin\Clients\AdminClientsMainController;
use App\Http\Controllers\Admin\Expenses\AdminExpenseCategoryController;
use App\Http\Controllers\Admin\Expenses\AdminExpenseController;
use App\Http\Controllers\Admin\Leads\AdminLeadMainController;
use App\Http\Controllers\Admin\ProjectManagement\AdminMainProjectManagementController;
use App\Http\Controllers\Admin\ProjectManagement\AdminProjectManagementProjectTypeController;
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

    //Billing
    Route::name('billing.')->prefix('billing')->group(function(){


        Route::name('expenses.')->prefix('expenses')->group(function(){
            Route::get('/', [AdminExpenseController::class, 'index'])->name('index');
            Route::get('create', [AdminExpenseController::class, 'create'])->name('create');
            Route::post('store', [AdminExpenseController::class, 'store'])->name('store');
            Route::get('edit/{id}', [AdminExpenseController::class, 'edit'])->name('edit');
            Route::put('update/{id}', [AdminExpenseController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [AdminExpenseController::class, 'destroy'])->name('destroy');

            Route::resource('categories', AdminExpenseCategoryController::class);
        });

        Route::resource('transactions', AdminTransactionController::class);
    });

    //Clients
    Route::name('clients.')->prefix('clients')->group(function(){
        Route::get('/', [AdminClientsMainController::class, 'index'])->name('index');
        Route::get('create', [AdminClientsMainController::class, 'create'])->name('create');
        Route::post('store', [AdminClientsMainController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AdminClientsMainController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [AdminClientsMainController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [AdminClientsMainController::class, 'destroy'])->name('destroy');
    });



    //Leads
    Route::name('leads.')->prefix('leads')->group(function(){
        Route::get('/', [AdminLeadMainController::class, 'index'])->name('index');
        Route::get('create', [AdminLeadMainController::class, 'create'])->name('create');
        Route::post('store', [AdminLeadMainController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AdminLeadMainController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [AdminLeadMainController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [AdminLeadMainController::class, 'destroy'])->name('destroy');
    });

    Route::name('project-management.')->prefix('project-management')->group(function(){

        //Projects
        Route::get('/', [AdminMainProjectManagementController::class, 'index'])->name('index');
        Route::get('create', [AdminMainProjectManagementController::class, 'create'])->name('create');
        Route::post('store', [AdminMainProjectManagementController::class, 'store'])->name('store');

        //Project Types
        Route::resource('project-types', AdminProjectManagementProjectTypeController::class);
    });

    //Settings
    Route::name('settings.')->prefix('settings')->group(function () {

        //Payment Methods
        Route::resource('payment-methods', AdminPaymentMethodController::class);
    });

    //Staff
    Route::resource('staff', AdminStaffMainController::class);

    //TinyMCE File Upload
    Route::post('tiny-file-upload', [AdminTinyFileUploadController::class, 'upload'])
        ->name('tiny-file-upload')
        ->middleware('web');
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


