<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inviter
 *
 * @property int $AC_NUM
 * @property int $PRA_NUM
 * @property bool|null $SPECIALISTEON
 * @property ActiviteCompl $activite_compl
 * @property Praticien $praticien
 */
class Inviter extends Model
{
    protected $table = 'inviter';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'AC_NUM' => 'int',
        'PRA_NUM' => 'int',
        'SPECIALISTEON' => 'bool',
    ];

    protected $fillable = [
        'SPECIALISTEON',
    ];

    public function activite_compl()
    {
        return $this->belongsTo(ActiviteCompl::class, 'AC_NUM');
    }

    public function praticien()
    {
        return $this->belongsTo(Praticien::class, 'PRA_NUM');
    }
}
