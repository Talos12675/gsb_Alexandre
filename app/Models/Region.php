<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 *
 * @property string $REG_CODE
 * @property string $SEC_CODE
 * @property string $REG_NOM
 * @property Secteur $secteur
 * @property Collection|Travailler[] $travaillers
 */
class Region extends Model
{
    protected $table = 'region';

    protected $primaryKey = 'REG_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'SEC_CODE',
        'REG_NOM',
    ];

    public function secteur()
    {
        return $this->belongsTo(Secteur::class, 'SEC_CODE');
    }

    public function travaillers()
    {
        return $this->hasMany(Travailler::class, 'REG_CODE');
    }
}
