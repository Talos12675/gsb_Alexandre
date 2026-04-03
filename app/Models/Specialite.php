<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialite
 *
 * @property string $SPE_CODE
 * @property string $SPE_LIBELLE
 * @property Collection|Posseder[] $posseders
 */
class Specialite extends Model
{
    protected $table = 'specialite';

    protected $primaryKey = 'SPE_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'SPE_LIBELLE',
    ];

    public function posseders()
    {
        return $this->hasMany(Posseder::class, 'SPE_CODE');
    }
}
