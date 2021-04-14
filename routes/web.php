<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntitiesController;
use Illuminate\View\View;

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

// !!! put helper into class?
function getAllEntities() {
	return EntitiesController::getAllNames(); 	
}

/**
 * all letters except x,y
 */
function generateListOfLetters() : array {
	return ['A', 'B', 'C','D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Z'];
}

function showAllEntities() : View {
	return view('welcome', [
		'entities' => getAllEntities(),
		'entityStrings' => EntitiesController::getAllNamesAsJavaScript(),
		'isStartPage' => true
	]);
}

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
Route::get(
	'/{name}',
	fn() => showAllEntities()
)->where('name', 'entity|entities|');

Route::get('/entity/{id}', function($id) {
	// !!! cool sanitize in laravel?:
	$saniId = intval($id);
	if ($saniId > 0) {

		return view('entitydetails', [
			'entityId' => $saniId,
			'entity' => EntitiesController::getEntity($saniId)
		]);
	}

	return showAllEntities();
});

/** uses first letter of found `id` because id could be anything*/
Route::get('/alphabet/{id}', function($id) {
	$letter = strtoupper(substr(strval($id), 0, 1));
	return view('alphabet', [
		'letter' => $letter,
		'listOfLetters' => generateListOfLetters(),
		'entitiesForLetter' => EntitiesController::getNamesStartingWith($letter)
	]);
});

// !!! how to combine with next block, use helper function!
Route::get('/alphabet', function() {
	return view('alphabet', [
		'letter' => '',
		'listOfLetters' => generateListOfLetters(),
		'entitiesForLetter' => []
	]);
});

/** uses first letter of found `id` because id could be anything*/
Route::get('/alphabet/{id}', function($id) {
	$letter = strtoupper(substr(strval($id), 0, 1));
	return view('alphabet', [
		'letter' => $letter,
		'listOfLetters' => generateListOfLetters(),
		'entitiesForLetter' => EntitiesController::getNamesStartingWith($letter)
	]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::fallback(function ($route) {
	return view('page', [
		'routeUrl' => $route
	]);
});
