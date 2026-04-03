<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Offrir
 *
 * @property string $VIS_MATRICULE
 * @property int $RAP_NUM
 * @property string $MED_DEPOTLEGAL
 * @property int|null $OFF_QTE
 * @property Medicament $medicament
 * @property RapportVisite $rapport_visite
 * @property Visiteur $visiteur
 */
class Offrir extends Model
{
    protected $table = 'offrir';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'RAP_NUM' => 'int',
        'OFF_QTE' => 'int',
    ];

    protected $fillable = [
        'OFF_QTE',
    ];

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'MED_DEPOTLEGAL');
    }

    public function rapport_visite()
    {
        return $this->belongsTo(RapportVisite::class, 'RAP_NUM');
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'VIS_MATRICULE');
    }
}
