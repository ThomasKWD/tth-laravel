<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection as Collection;
use App\Models\TEntity as TEntity;

class EntitiesController extends Controller {

	/** 
	 * returns all entities as assoc array
	 * 
	 * !!! make return only all id,begriff
	 */
    public static function getAll() : Collection {
		return TEntity::orderBy('begriff')->get();
	}

	/** 
	 * returns all entities as assoc array
	 * 
	 * !!! make return only all id,begriff
	 * ! seems not to work, according to var dump it always prints all fields or only begriff
	 */
    public static function getAllNames() : Collection {
		return TEntity::select(['id','begriff'])
			->orderBy('begriff')->get();
		
		// orderBy('begriff')->get(['id','begriff']); // not working
	}

	/** 
	 * return all entities as a string which represents an JS array
	 */
    public static function getAllNamesAsJavaScript() : string {
		$entities = self::getAllNames();
		$completeWordList = '';
		foreach($entities as $k => $v) {
			$completeWordList .= '"'. $v['begriff'] .'", ';
		}
		return $completeWordList;
	}

	/**
	 * returns entities for given letter
	 * - should be passe by route or url parameter
	 * - MySQL does handle german äöü quite well 
	*/
	public static function getNamesStartingWith(string $letter) : Collection {
		$found = TEntity::select(['id','begriff'])
			->where('begriff', 'like', $letter. '%') // !!! need like clause
			->orderBy('begriff')->get();
		
		return $found;
	}
}
