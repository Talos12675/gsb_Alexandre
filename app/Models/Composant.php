<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Composant
 *
 * @property string $CMP_CODE
 * @property string $CMP_LIBELLE
 * @property Collection|Constituer[] $constituers
 */
class Composant extends Model
{
    protected $table = 'composant';

    protected $primaryKey = 'CMP_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'CMP_LIBELLE',
    ];

    public function constituers()
    {
        return $this->hasMany(Constituer::class, 'CMP_CODE');
    }
}
