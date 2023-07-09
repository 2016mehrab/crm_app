<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Employee\Auth\EmployeeAuthenticatedSessionController;
use App\Http\Controllers\Manager\Auth\ManagerAuthenticatedSessionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
})->middleware(['auth'])->name('employee.dashboard');

Route::group(['prefix'=>'employee'],function(){
    Route::view('available-projects', 'available-projects');
    Route::view('participation', 'participation');
    Route::view('attendance', 'attendance');
    Route::view('tickets', 'tickets');
});

Route::group(['prefix'=>'manager'],function(){
    Route::view('projects', 'projects');
    Route::view('initiate-project', 'initiate-project');
    Route::view('resolve-tickets', 'resolve-tickets');
    Route::view('employee-attendance', 'employee-attendance');
});



Route::get('/manager-dashboard', function () {
    return view('manager-dashboard');
})->middleware(['auth'])->name('manager.dashboard');


require __DIR__.'/auth.php';
