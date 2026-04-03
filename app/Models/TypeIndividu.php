<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeIndividu
 *
 * @property string $TIN_CODE
 * @property string $TIN_LIBELLE
 * @property Collection|Prescrire[] $prescrires
 */
class TypeIndividu extends Model
{
    protected $table = 'type_individu';

    protected $primaryKey = 'TIN_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'TIN_LIBELLE',
    ];

    public function prescrires()
    {
        return $this->hasMany(Prescrire::class, 'TIN_CODE');
    }
}
