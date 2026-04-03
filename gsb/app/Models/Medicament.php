<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicament
 *
 * @property string $MED_DEPOTLEGAL
 * @property string $MED_NOMCOMMERCIAL
 * @property string $FAM_CODE
 * @property string $MED_COMPOSITION
 * @property string $MED_EFFETS
 * @property string $MED_CONTREINDIC
 * @property float $MED_PRIXECHANTILLON
 * @property Famille $famille
 * @property Collection|Formuler[] $formulers
 * @property Collection|Interagir[] $interagirs
 * @property Collection|Offrir[] $offrirs
 * @property Collection|Prescrire[] $prescrires
 */
class Medicament extends Model
{
    protected $table = 'medicament';

    protected $primaryKey = 'MED_DEPOTLEGAL';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'MED_PRIXECHANTILLON' => 'float',
    ];

    protected $fillable = [
        'MED_NOMCOMMERCIAL',
        'FAM_CODE',
        'MED_COMPOSITION',
        'MED_EFFETS',
        'MED_CONTREINDIC',
        'MED_PRIXECHANTILLON',
    ];

    public function famille()
    {
        return $this->belongsTo(Famille::class, 'FAM_CODE');
    }

    public function formulers()
    {
        return $this->hasMany(Formuler::class, 'MED_DEPOTLEGAL');
    }

    public function interagirs()
    {
        return $this->hasMany(Interagir::class, 'MED_PERTURBATEUR');
    }

    public function offrirs()
    {
        return $this->hasMany(Offrir::class, 'MED_DEPOTLEGAL');
    }

    public function prescrires()
    {
        return $this->hasMany(Prescrire::class, 'MED_DEPOTLEGAL');
    }
}
