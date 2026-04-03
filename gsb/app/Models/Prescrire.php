<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prescrire
 *
 * @property string $MED_DEPOTLEGAL
 * @property string $TIN_CODE
 * @property string $DOS_CODE
 * @property string $PRE_POSOLOGIE
 * @property Dosage $dosage
 * @property Medicament $medicament
 * @property TypeIndividu $type_individu
 */
class Prescrire extends Model
{
    protected $table = 'prescrire';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'PRE_POSOLOGIE',
    ];

    public function dosage()
    {
        return $this->belongsTo(Dosage::class, 'DOS_CODE');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'MED_DEPOTLEGAL');
    }

    public function type_individu()
    {
        return $this->belongsTo(TypeIndividu::class, 'TIN_CODE');
    }
}
