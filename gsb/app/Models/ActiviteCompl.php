<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActiviteCompl
 *
 * @property int $AC_NUM
 * @property Carbon $AC_DATE
 * @property string $AC_LIEU
 * @property string $AC_THEME
 * @property string $AC_MOTIF
 * @property Collection|Inviter[] $inviters
 * @property Collection|Realiser[] $realisers
 */
class ActiviteCompl extends Model
{
    protected $table = 'activite_compl';

    protected $primaryKey = 'AC_NUM';

    public $timestamps = false;

    protected $casts = [
        'AC_DATE' => 'datetime',
    ];

    protected $fillable = [
        'AC_DATE',
        'AC_LIEU',
        'AC_THEME',
        'AC_MOTIF',
    ];

    public function inviters()
    {
        return $this->hasMany(Inviter::class, 'AC_NUM');
    }

    public function realisers()
    {
        return $this->hasMany(Realiser::class, 'AC_NUM');
    }
}
