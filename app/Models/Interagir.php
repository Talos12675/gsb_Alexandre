<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Interagir
 *
 * @property string $MED_PERTURBATEUR
 * @property string $MED_MED_PERTURBE
 * @property Medicament $medicament
 */
class Interagir extends Model
{
    protected $table = 'interagir';

    public $incrementing = false;

    public $timestamps = false;

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'MED_PERTURBATEUR');
    }
}
