<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;
// use Auth;

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

Route::view('contact', 'frontend.contact')->name('contact');
Route::view('product', 'frontend.product')->name('product');

// ROUTE FRONTEND
Route::group([
    'namespace' => 'Frontend',
], function () {
    // Home
    Route::get('/', 'HomeController@index')->name('home');
    // Blog
    Route::get('blog', 'BlogController@index')->name('blog.index');
    Route::get('blog/{blog:slug}', 'BlogController@show')->name('blog.show');
});

// ROUTE ADMIN
Route::group([
    'namespace' => 'Admin',
    'as' => 'admin.',
    'prefix' => 'admin',
    'name' => 'admin',
    'middleware' => ['auth', 'has_any_permission'],
], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Category
    Route::get('category/list', 'CategoryController@list')->name('category.list');
    Route::resource('category', 'CategoryController', ['except' => ['show']]);

    // Attribute
    Route::get('attribute/list', 'AttributeController@list')->name('attribute.list');
    Route::resource('attribute', 'AttributeController', ['except' => ['show']]);

    // Attribute Values
    Route::get('attribute/{attribute}/value/list', 'AttributeValueController@list')->name('attribute.value.list');
    Route::resource('attribute.value', 'AttributeValueController', ['except' => ['show', 'create', 'edit', 'update']]);

    // Product
    Route::get('product/list', 'ProductController@list')->name('product.list');
    Route::resource('product', 'ProductController', ['except' => ['show']]);

    // Blog
    Route::get('blog/list', 'BlogController@list')->name('blog.list');
    Route::resource('blog', 'BlogController', ['except' => ['show']]);

    // User
    Route::get('user/list', 'UserController@list')->name('user.list');
    Route::resource('user', 'UserController', ['except' => ['show', 'create', 'store']]);

    // Role
    Route::get('role/list', 'RoleController@list')->name('role.list');
    Route::get('role/permissionList', 'RoleController@permissionList')->name('role.permissionList');
    Route::resource('role', 'RoleController', ['except' => ['show']]);

    // Permission
    Route::get('permission/list', 'PermissionController@list')->name('permission.list');
    Route::resource('permission', 'PermissionController', ['except' => ['show', 'create', 'store', 'edit', 'update']]);
});

// FILE MANAGER
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'],], function () {
    Route::group(['prefix' => 'filemanager'], function () {
        Lfm::routes();
    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
