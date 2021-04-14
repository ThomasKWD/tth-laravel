<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntitiesController;
use App\Http\Controllers\AlphabeticalViewController;

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

// @php
// 	// !!! wrong MVC, how to pass the controller or its methods to view?
// 	$controller = new \App\Http\Controllers\EntitiesController();
// 	$entities = $controller->getNamesStartingWith('A');
// @endphp

/**
 * provides already overview of *all* entities
 * /// !!! problem all routes do almost the same, we could put helper in all of them
 *    make array for "normal" pages with nav 
 * // !!! better put to controller class
 */
Route::get('/entities',	function() {return EntitiesController::viewAllEntities();
});
// ->where('name', 'entity|entities|'); // omit trailing "|" for not allowing root "/"
Route::get('/entity', fn() => EntitiesController::viewAllEntities());

Route::get('/entity/{id}', function($id) {
	// !!! cool sanitize in laravel?:
	$saniId = intval($id);
	if ($saniId > 0) {

		return view('entitydetails', [
			'entityId' => $saniId,
			'entity' => EntitiesController::getEntity($saniId)
		]);
	}

	return EntitiesController::showAllEntities();
});

/** uses first letter of found `id` because id could be anything*/
Route::get('/alphabet/{id}', function($id) {
	$letter = strtoupper(substr(strval($id), 0, 1));
	// !!! stuff this into controller
	return view('alphabet', [
		'letter' => $letter,
		'listOfLetters' => AlphabeticalViewController::generateListOfLetters(),
		'entitiesForLetter' => EntitiesController::getNamesStartingWith($letter)
	]);
});

// !!! how to combine with next block, use helper function!
Route::get('/alphabet', function() {
	return view('alphabet', [
		'letter' => '',
		'listOfLetters' => AlphabeticalViewController::generateListOfLetters(),
		'entitiesForLetter' => []
	]);
});

/** uses first letter of found `id` because id could be anything*/
Route::get('/alphabet/{id}', function($id) {
	$letter = strtoupper(substr(strval($id), 0, 1));
	return view('alphabet', [
		'letter' => $letter,
		'listOfLetters' => AlphabeticalViewController::generateListOfLetters(),
		'entitiesForLetter' => EntitiesController::getNamesStartingWith($letter)
	]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', fn() => view('page',['routeUrl' => ''])); //!must not try to use parameter in closure

Route::fallback(function ($route) {
	return view('page', [
		'routeUrl' => $route
	]);
});
