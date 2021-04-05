<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $vorname
 * @property string $gnd
 * @property TthQuellenAutoren[] $tthQuellenAutorens
 */
class TAuthor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tth_autoren';

    /**
     * @var array
     */
    protected $fillable = ['name', 'vorname', 'gnd'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tthQuellenAutorens()
    {
        return $this->hasMany('App\Models\TthQuellenAutoren', 'autor_id');
    }
}
