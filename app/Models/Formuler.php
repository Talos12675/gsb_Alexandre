<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Formuler
 *
 * @property string $MED_DEPOTLEGAL
 * @property string $PRE_CODE
 * @property Medicament $medicament
 * @property Presentation $presentation
 */
class Formuler extends Model
{
    protected $table = 'formuler';

    public $incrementing = false;

    public $timestamps = false;

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'MED_DEPOTLEGAL');
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'PRE_CODE');
    }
}
