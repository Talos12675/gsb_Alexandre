<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Realiser
 *
 * @property int $AC_NUM
 * @property string $VIS_MATRICULE
 * @property float $REA_MTTFRAIS
 * @property ActiviteCompl $activite_compl
 * @property Visiteur $visiteur
 */
class Realiser extends Model
{
    protected $table = 'realiser';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'AC_NUM' => 'int',
        'REA_MTTFRAIS' => 'float',
    ];

    protected $fillable = [
        'REA_MTTFRAIS',
    ];

    public function activite_compl()
    {
        return $this->belongsTo(ActiviteCompl::class, 'AC_NUM');
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'VIS_MATRICULE');
    }
}
