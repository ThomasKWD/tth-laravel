<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $sprache
 * @property TthWortliste[] $tthWortlistes
 */
class TLanguage extends Model
{
    use HasFactory;

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
     * 1:n relation field in TEntities
     * 
     * hasMany *here* because this language can have many entities pointing to it
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tEntities()
    {
        return $this->hasMany(TEntity::class, 'sprache_id');
    }
}

