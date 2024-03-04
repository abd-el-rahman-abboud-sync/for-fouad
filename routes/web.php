<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\formController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\formEntryController;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\dashboardController;


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
//No logic is allowed in routes 
Route::get('/c', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection established successfully.";
    } catch (\Exception $e) {
        return "Unable to connect to the database. Error: " . $e->getMessage();
    }
});


Route::middleware(['web', 'check.session'])->group(function () {
    // this is an old way from laravel 7
    Route::get('/dashboard', 'App\Http\Controllers\dashboardController@showDashboard')->name('dashboard');
    // this is the latest way for routing
    // Route::get('/dashboard', [dashboardController::class, 'showDashboard'])->name('dashboard');

    Route::get('/form2', [formEntryController::class, 'showForm']);
    Route::post('/form2', [formEntryController::class, 'store'])->name('form2.store');
    Route::get('/news', [homePageController::class, 'showHome']);

});




Route::get('/form', [formController::class, 'showForm']);
Route::post('/form', [formController::class, 'store'])->name('submit.form');

Route::get('/', [loginController::class, 'showLogin'])->name('login');
Route::post('/', [loginController::class, 'login']);


//Route::get('/dashboard', 'App\Http\Controllers\dashboardController@showDashboard')->name('dashboard');

//Route::get('/form2', [formEntryController::class, 'showForm']);
//Route::post('/form2', [formEntryController::class, 'store'])->name('form2.store');

//try searching for something called route model binding !!
Route::delete('/delete-user/{id}', [dashboardController::class, 'deleteUser']);

Route::get('/user/edit/{id}', [dashboardController::class, 'editform'])->name('user.edit');
Route::put('/user/update/{id}', [dashboardController::class, 'updateUser'])->name('user.update');


Route::get('/logout', 'App\Http\Controllers\DashboardController@logout')->name('logout');

//overall bad naming for all your routes.