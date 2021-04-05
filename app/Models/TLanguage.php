<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sprache
 * @property TthWortliste[] $tthWortlistes
 */
class TLanguage extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tth_sprachen';

    /**
     * @var array
     */
    protected $fillable = ['sprache'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tEntities()
    {
        return $this->hasMany('App\Models\TEntity', 'sprache_id');
    }
}
