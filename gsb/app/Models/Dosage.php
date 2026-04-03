<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dosage
 *
 * @property string $DOS_CODE
 * @property string $DOS_QUANTITE
 * @property string $DOS_UNITE
 * @property Collection|Prescrire[] $prescrires
 */
class Dosage extends Model
{
    protected $table = 'dosage';

    protected $primaryKey = 'DOS_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'DOS_QUANTITE',
        'DOS_UNITE',
    ];

    public function prescrires()
    {
        return $this->hasMany(Prescrire::class, 'DOS_CODE');
    }
}
