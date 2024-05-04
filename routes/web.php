<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

$router->group(['middleware' => ['auth']], function ($router) {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    $router->group(['middleware' => ['superadmin']], function ($router) {
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

        Route::get('/role', [RolesController::class, 'index'])->name('role.index');
        Route::get('/role/create', [RolesController::class, 'create'])->name('role.create');
        Route::post('/role/save', [RolesController::class, 'save'])->name('role.save');
        Route::get('/role/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
        Route::post('/role/update/{id}', [RolesController::class, 'update'])->name('role.update');
        Route::post('/role/delete/{id}', [RolesController::class, 'delete'])->name('role.delete');

        Route::get('/companies', [CompaniesController::class, 'index'])->name('companies.index');
        Route::get('/companies/create', [CompaniesController::class, 'create'])->name('companies.create');
        Route::post('/companies/save', [CompaniesController::class, 'save'])->name('companies.save');
        Route::get('/companies/edit/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
        Route::post('/companies/update/{id}', [CompaniesController::class, 'update'])->name('companies.update');
        Route::post('/companies/delete/{id}', [CompaniesController::class, 'delete'])->name('companies.delete');
    });
});
