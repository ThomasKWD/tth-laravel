<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection as Collection;
use App\Models\TEntity as TEntity;
use Illuminate\View\View;

class EntitiesController extends Controller {

	/** 
	 * returns all values of all entities
	 */
    public static function getAll() : Collection {
		return TEntity::orderBy('begriff')->get();
	}

	/** 
	 * returns all entity names and ids

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

	/** returns details for an entity ID
	 * - performs all the useful joins, like old code in tth_rex
	 * 	public function buildSingleEntityQuery() {
		$tableAuthors = $this->getTableName('authors');
		$tableStati = $this->getTableName('states');
		$tableLanguage = $this->getTableName('languages');
		$tableRegions = $this->getTableName('regions');
		$tableStyles = $this->getTableName('languagestyles');
		$tableEntities = $this->getTableName('entities');
		
		// ! b is first alias for $tableEntities, b2 is the second for benutze
		$query = "SELECT b.begriff,b.id,b.autor_id,$tableAuthors.gnd,b.quelle_seite,b.code,b.definition,b.bild,b.begriffsstatus_id,$tableStati.status,b.notes,b.benutze,b.benutzt_fuer,b.kategorie,b.veroeffentlichen,b.bearbeiten,b.sprache_id,b.sprachstil_id,b.region_id,";
		$query .= "b2.begriff AS benutze_begriff,CONCAT($tableAuthors.vorname, ' ', $tableAuthors.name) AS autor,";
		$query .= "$tableLanguage.sprache AS sprache,";
		$query .= "$tableRegions.region AS region, ";
		$query .= "$tableStyles.stil AS sprachstil ";
		$query .= "FROM $tableEntities b ";
		$query .= "LEFT JOIN $tableAuthors ON b.autor_id = $tableAuthors.id ";
		$query .= "LEFT JOIN $tableStati ON b.begriffsstatus_id = $tableStati.id ";
		$query .= "LEFT JOIN $tableLanguage ON b.sprache_id = $tableLanguage.id ";
		$query .= "LEFT JOIN $tableRegions ON b.region_id = $tableRegions.id ";
		$query .= "LEFT JOIN $tableStyles ON b.sprachstil_id = $tableStyles.id ";
		$query .= "LEFT JOIN $tableEntities b2 ON b2.id = b.benutze WHERE b.id = :entityId";

		return $query;
	}
	 * - remember: ->first() resolves to NULL when nothing found
	 * 
	 *  @return object first row of collection 
	 *                !!! which type
	*/
	public static function getEntity(int $id) {
		$found = TEntity::select(['id','begriff','definition','code','gnd','notes','bearbeiten','kategorie'])
		->where('id', $id) // !!! need like clause
		->get()
		->first();

		return $found;
		// if ($found !== NULL) {
		// 	return 'there is something';
		// }
	}

	/**
	 * return view with data for a list of all entities
	 * 
	 * just a helper for the routes
	 *
	 */	
	public static function viewAllEntities() {
		return view('overview', [
			'entities' => self::getAllNames(),
			'entityStrings' => self::getAllNamesAsJavaScript(),
			'isStartPage' => true
		]);
	}
}
