<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Famille
 *
 * @property string $FAM_CODE
 * @property string $FAM_LIBELLE
 * @property Collection|Medicament[] $medicaments
 */
class Famille extends Model
{
    protected $table = 'famille';

    protected $primaryKey = 'FAM_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'FAM_LIBELLE',
    ];

    public function medicaments()
    {
        return $this->hasMany(Medicament::class, 'FAM_CODE');
    }
}
