<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RapportVisite
 *
 * @property string $VIS_MATRICULE
 * @property int $RAP_NUM
 * @property int $PRA_NUM
 * @property Carbon $RAP_DATE
 * @property string $RAP_BILAN
 * @property string $RAP_MOTIF
 * @property Praticien $praticien
 * @property Visiteur $visiteur
 * @property Collection|Offrir[] $offrirs
 */
class RapportVisite extends Model
{
    protected $table = 'rapport_visite';

    protected $primaryKey = 'RAP_NUM';

    public $timestamps = true;

    protected $casts = [
        'PRA_NUM' => 'int',
        'RAP_DATE' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'VIS_MATRICULE',
        'PRA_NUM',
        'RAP_DATE',
        'RAP_BILAN',
        'RAP_MOTIF',
        'created_at',
        'updated_at',
    ];

    public function praticien()
    {
        return $this->belongsTo(Praticien::class, 'PRA_NUM');
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'VIS_MATRICULE');
    }

    public function offrirs()
    {
        return $this->hasMany(Offrir::class, 'RAP_NUM');
    }
}
