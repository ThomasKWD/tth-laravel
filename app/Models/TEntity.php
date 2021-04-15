<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TEntity extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tth_wortliste';

    /**
     * @var array
     */
    protected $fillable = [
        'begriff',
        'definition',
        'code',
        'gnd',
        'sprache_id',
        'sprachstil_id', 

        // 'begriffsstatus_id',
        // 'region_id',
        // 'benutze',
        // 'benutzt_fuer',
        // 'bild',
        // 'notes',
        // 'datierung',
        // 'historischer_hintergrund',
        // 'kategorie',
        // 'veroeffentlichen',
        // 'bearbeiten'
        // 'liste_quellenangaben',
        // 'quelle_seite',
        // 'quellen_idlist',
        // 'autor_id',
        // 'aequivalent',
        // 'verwandte_begriffe', 
        // 'grobgliederung',
        // 'unterbegriffe',
        // 'oberbegriffe', 
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(TLanguage::class, 'sprache_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stil()
    {
        return $this->belongsTo(TLanguageStyle::class, 'sprachstil_id');
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function tthBegriffsstati()
    // {
    //     return $this->belongsTo('App\Models\TthBegriffsstati', 'begriffsstatus_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function tthWortliste()
    // {
    //     return $this->belongsTo('App\Models\TthWortliste', 'benutze');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function tthRegionen()
    // {
    //     return $this->belongsTo('App\Models\TthRegionen', 'region_id');
    // }



    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function tthSprachstile()
    // {
    //     return $this->belongsTo('App\Models\TthSprachstile', 'sprachstil_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffAequivalentes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffAequivalente', 'aequivalent_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffAequivalentes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffAequivalente', 'begriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffGrobgliederungs()
    // {
    //     return $this->hasMany('App\Models\TthBegriffGrobgliederung', 'begriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffGrobgliederungs()
    // {
    //     return $this->hasMany('App\Models\TthBegriffGrobgliederung', 'grobgliederung_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffOberbegriffes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffOberbegriffe', 'begriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffOberbegriffes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffOberbegriffe', 'oberbegriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffTags()
    // {
    //     return $this->hasMany('App\Models\TthBegriffTag', 'begriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffUnterbegriffes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffUnterbegriffe', 'begriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffUnterbegriffes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffUnterbegriffe', 'unterbegriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffVerwandtes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffVerwandte', 'begriff_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthBegriffVerwandtes()
    // {
    //     return $this->hasMany('App\Models\TthBegriffVerwandte', 'verwandter_id');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function tthQuellenangabens()
    // {
    //     return $this->hasMany('App\Models\TthQuellenangaben', 'begriff_id');
    // }
}
