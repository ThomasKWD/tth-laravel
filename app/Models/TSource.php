<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $titel
 * @property string $isbn
 * @property int $jahr
 * @property string $kurz
 * @property int $autor_id
 * @property TthQuellenAutoren[] $tthQuellenAutorens
 * @property TthQuellenangaben[] $tthQuellenangabens
 */
class TSource extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tth_quellen';

    /**
     * `kurz` is to be generated from data in autor_id
     * We should not have it as column at all (OR consider temp column)
     * which must be updated
     * 
     * @var array
     */
    protected $fillable = ['titel', 'isbn', 'jahr', 'kurz', 'autor_id'];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthQuellenAutorens()
    // {
    //     return $this->hasMany('App\Models\TthQuellenAutoren', 'quelle_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthQuellenangabens()
    // {
    //     return $this->hasMany('App\Models\TthQuellenangaben', 'quelle_id');
    // }
}
