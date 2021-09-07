<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'HomeController@index');

Auth::routes();

// Rutas para Works
Route::group(['middleware' => ['permission:works.create|works.store']], function () {
    Route::get('works/create', 'WorkController@create')->middleware('auth')->name('works.create');
    Route::post('works', 'WorkController@store')->middleware('auth')->name('works.store');
    Route::get('works/upload/{work}', 'WorkController@form_upload')->middleware('auth')->name('works.form_upload');
    Route::post('works/upload', 'WorkController@upload')->middleware('auth')->name('works.upload');
});

Route::group(['middleware' => ['permission:works.index|works.create']], function () {
    Route::get('works', 'WorkController@index')->middleware('auth')->name('works.index');
    Route::get('works/{work}', 'WorkController@show')->middleware('auth')->name('works.show');
    Route::get('works/export/{work}', 'WorkController@exportPDF')->middleware('auth')->name('works.pdf');
});

Route::group(['middleware' => ['permission:works.edit|works.update|works.destroy']], function () {
    Route::get('works/{work}/edit', 'WorkController@edit')->middleware('auth')->name('works.edit');
    Route::put('works/{work}', 'WorkController@update')->middleware('auth')->name('works.update');
    Route::delete('works/{work}', 'WorkController@destroy')->middleware('auth')->name('works.destroy');
});

// Rutas para Resources
Route::group(['middleware' => ['permission:resources.create|resources.store']], function () {
    Route::get('works/{work}/resources/create', 'ResourceController@create')->middleware('auth')->name('resources.create');
    Route::get('works/{work}/resources/create_resource_human', 'ResourceController@create_resource_human')->middleware('auth')->name('resources.create_resource_human');
    Route::post('works/{work}/resources', 'ResourceController@store')->middleware('auth')->name('resources.store');

});

Route::group(['middleware' => ['permission:resources.edit|resources.update|resources.destroy']], function () {
    Route::get('works/{work}/resources/{resource}/edit', 'ResourceController@edit')->middleware('auth')->name('resources.edit');
    Route::put('works/{work}/resources/{resource}', 'ResourceController@update')->middleware('auth')->name('resources.update');
    Route::delete('works/{work}/resources/{resource}', 'ResourceController@destroy')->middleware('auth')->name('resources.destroy');
});

//Rutas para administración de Usuarios y Roles
Route::group(['middleware' => ['permission:admin.edit']], function () {
    Route::resource('/admin/users', 'Admin\UserController')->middleware('auth');
    Route::resource('/admin/roles', 'Admin\RolPermisoController')->middleware('auth');
});

//Rutas para administración - Listas
Route::group(['middleware' => ['permission:admin.edit']], function () {
    Route::resource('/admin/refworks', 'Admin\RefworkController')->except(['show'])->middleware('role:admin');
    Route::resource('/admin/reffrequencys', 'Admin\ReffrequencyController')->except(['show'])->middleware('auth');
    Route::resource('/admin/refhighways', 'Admin\RefhighwayController')->except(['show'])->middleware('auth');
    Route::resource('/admin/refroutes', 'Admin\RefrouteController')->except(['show'])->middleware('auth');
    Route::resource('/admin/refdirections', 'Admin\RefdirectionController')->except(['show'])->middleware('auth');
    Route::resource('/admin/reforigins', 'Admin\ReforiginController')->except(['show'])->middleware('auth');
    Route::resource('/admin/refresources', 'Admin\RefresourceController')->except(['show'])->middleware('auth');
    Route::resource('/admin/costs', 'CostController')->except(['show', 'edit', 'update', 'destroy'])->middleware('auth');
    Route::resource('/admin/money', 'Admin\MoneyController')->except(['show'])->middleware('auth'); #fmoreno 22042020
    Route::resource('/admin/enterprises', 'EnterpriseController')->middleware('auth'); #fmoreno 29062021
    Route::resource('/admin/contracts', 'ContractController')->middleware('auth'); #fmoreno 29062021
    Route::resource('/admin/{contract}/services', 'ServiceController')->middleware('auth'); #fmoreno 29062021
    Route::resource('/admin/{contract}/services/{service}/managment', 'ServiceUserController')->middleware('auth'); #fmoreno 29062021

});

//Exportación de archivos
Route::resource('reports', 'ReportController')->except(['show','edit','update'])->middleware('role:admin|supervisor');
Route::post('reports', 'ReportController@store')->name('reports.store')->middleware('role:admin|supervisor');
Route::post('reports/download', 'ReportController@download')->name('reports.download')->middleware('role:admin|supervisor');

Route::resource('admin/calendars', 'Admin\CalendarController')->except(['show'])->middleware('role:admin|supervisor');
Route::resource('admin/costHumans', 'Admin\CostHumanController')->except(['show'])->middleware('role:admin|supervisor');

Route::get('calves', function () {

    echo env('DB_USERNAME') . env('DB_PASSWORD');

});
