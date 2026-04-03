<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Posseder
 *
 * @property int $PRA_NUM
 * @property string $SPE_CODE
 * @property string $POS_DIPLOME
 * @property float $POS_COEFPRESCRIPTION
 * @property Praticien $praticien
 * @property Specialite $specialite
 */
class Posseder extends Model
{
    protected $table = 'posseder';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'PRA_NUM' => 'int',
        'POS_COEFPRESCRIPTION' => 'float',
    ];

    protected $fillable = [
        'POS_DIPLOME',
        'POS_COEFPRESCRIPTION',
    ];

    public function praticien()
    {
        return $this->belongsTo(Praticien::class, 'PRA_NUM');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'SPE_CODE');
    }
}
