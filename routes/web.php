<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Auth::routes();
Route::group(
	['middleware' => 'auth'], function () {

	Route::view(
		'programs', 'pages.programs'
	)
	     ->name('programs');
	Route::view(
		'typography', 'pages.typography'
	)
	     ->name('typography');
	Route::view(
		'icons', 'pages.icons'
	)
	     ->name('icons');
	Route::view(
		'map', 'pages.map'
	)
	     ->name('map');
	Route::view(
		'notifications', 'pages.notifications'
	)
	     ->name('notifications');
	Route::view(
		'rtl-support', 'pages.language'
	)
	     ->name('language');
	Route::view(
		'upgrade', 'pages.upgrade'
	)
	     ->name('upgrade');
	Route::resource('user', UserController::class, ['except' => ['show']]);
	Route::prefix('profile')
	     ->name('profile.')
	     ->group(
		     function () {
			     Route::get('/', [ProfileController::class, 'edit'])
			          ->name('edit');
			     Route::put('/', [ProfileController::class, 'update'])
			          ->name('update');
			     Route::put('/password', [ProfileController::class, 'password'])
			          ->name('password');
		     }
	     );
	Route::get('command/jobs', [CommandController::class, 'index'])->name('command.jobs');
	Route::post('command/dispatch', [CommandController::class, 'submitJobRequest'])
	     ->name('command.dispatch');
	Route::get('command/{name}',[CommandController::class, 'showRequestForm'])->name('command.showRequestForm');

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
	     ->name('home');
	Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
	
}
);
Route::view(
	'/', 'welcome'
);
Route::view(
	'{slug?}', 'welcome'
);



