<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $region
 */
class TRegion extends Model
{

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tth_regionen';

    /**
     * @var array
     */
    protected $fillable = ['region'];

    /**
     * 1:n relation field in TEntities
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tEntities()
    {
        return $this->hasMany(TEntity::class, 'region_id');
    }
}

