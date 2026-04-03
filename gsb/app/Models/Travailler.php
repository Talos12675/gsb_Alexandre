<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Travailler
 *
 * @property string $VIS_MATRICULE
 * @property Carbon $JJMMAA
 * @property string $REG_CODE
 * @property string $TRA_ROLE
 * @property Region $region
 * @property Visiteur $visiteur
 */
class Travailler extends Model
{
    protected $table = 'travailler';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'JJMMAA' => 'datetime',
    ];

    protected $fillable = [
        'TRA_ROLE',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'REG_CODE');
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'VIS_MATRICULE');
    }
}
