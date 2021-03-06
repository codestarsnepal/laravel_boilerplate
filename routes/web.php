<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\SuperAdmin\OrganizationController;
use App\Http\Controllers\SuperAdmin\OrganizationUserController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'super-admin', 'middleware' => ['auth', 'super.admin']], function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('super.admin');
    Route::get('/organization', [OrganizationController::class, 'index'])->name('super.admin.organization');
    Route::get('/organization/create', [OrganizationController::class, 'create'])->name('super.admin.organization.create');
    Route::post('/organization/store', [OrganizationController::class, 'store'])->name('super.admin.organization.store');
    Route::get('/organization/edit/{id}', [OrganizationController::class, 'edit'])->name('super.admin.organization.edit');
    Route::post('/organization/update/{id}', [OrganizationController::class, 'update'])->name('super.admin.organization.update');
    Route::get('/organization/delete/{id}', [OrganizationController::class, 'delete'])->name('super.admin.organization.delete');

    Route::get('/organization/users/{organization_id}', [OrganizationUserController::class, 'index'])->name('super.admin.organization.user');
    Route::get('/organization/user/create/{organization_id}', [OrganizationUserController::class, 'create'])->name('super.admin.organization.user.create');
    Route::post('/organization/user/store/{organization_id}', [OrganizationUserController::class, 'store'])->name('super.admin.organization.user.store');
    Route::get('/organization/user/edit/{id}', [OrganizationUserController::class, 'edit'])->name('super.admin.organization.user.edit');
    Route::post('/organization/user/update/{id}', [OrganizationUserController::class, 'update'])->name('super.admin.organization.user.update');
    Route::get('/organization/user/delete/{id}', [OrganizationUserController::class, 'delete'])->name('super.admin.organization.user.delete');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.user');
    Route::get('/user/create', [AdminUserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/create/store', [AdminUserController::class, 'store'])->name('admin.user.store');
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'staff']], function () {
    Route::get('/', [StaffController::class, 'index'])->name('staff');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
