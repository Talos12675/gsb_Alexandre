<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Praticien
 *
 * @property string $PRA_NOM
 * @property string $PRA_PRENOM
 * @property string $PRA_ADRESSE
 * @property string $PRA_CP
 * @property string $PRA_VILLE
 * @property float $PRA_COEFNOTORIETE
 * @property string $TYP_CODE
 * @property int $PRA_NUM
 * @property TypePraticien $type_praticien
 * @property Collection|Inviter[] $inviters
 * @property Collection|Posseder[] $posseders
 * @property Collection|RapportVisite[] $rapport_visites
 */
class Praticien extends Model
{
    protected $table = 'praticien';

    protected $primaryKey = 'PRA_NUM';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'PRA_COEFNOTORIETE' => 'float',
        'PRA_NUM' => 'int',
    ];

    protected $fillable = [
        'PRA_NOM',
        'PRA_PRENOM',
        'PRA_ADRESSE',
        'PRA_CP',
        'PRA_VILLE',
        'PRA_COEFNOTORIETE',
        'TYP_CODE',
    ];

    public function type_praticien()
    {
        return $this->belongsTo(TypePraticien::class, 'TYP_CODE');
    }

    public function inviters()
    {
        return $this->hasMany(Inviter::class, 'PRA_NUM');
    }

    public function posseders()
    {
        return $this->hasMany(Posseder::class, 'PRA_NUM');
    }

    public function rapport_visites()
    {
        return $this->hasMany(RapportVisite::class, 'PRA_NUM');
    }
}
