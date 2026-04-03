<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypePraticien
 *
 * @property string $TYP_CODE
 * @property string $TYP_LIBELLE
 * @property string $TYP_LIEU
 * @property Collection|Praticien[] $praticiens
 */
class TypePraticien extends Model
{
    protected $table = 'type_praticien';

    protected $primaryKey = 'TYP_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'TYP_LIBELLE',
        'TYP_LIEU',
    ];

    public function praticiens()
    {
        return $this->hasMany(Praticien::class, 'TYP_CODE');
    }
}
