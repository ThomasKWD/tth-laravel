<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sprachstil
 * @property TthWortliste[] $tthWortlistes
 */
class TLanguage extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tth_sprachstile';

    /**
     * @var array
     */
    protected $fillable = ['stil'];

    /**
     * 1:n relation field in TEntities
     * 
     * hasMany *here* because this language can have many entities pointing to it
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tEntities()
    {
        return $this->hasMany(TEntity::class, 'sprachstil_id');
    }
}

