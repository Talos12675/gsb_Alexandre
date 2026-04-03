<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Secteur
 *
 * @property string $SEC_CODE
 * @property string $SEC_LIBELLE
 * @property Collection|Region[] $regions
 * @property Collection|Visiteur[] $visiteurs
 */
class Secteur extends Model
{
    protected $table = 'secteur';

    protected $primaryKey = 'SEC_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'SEC_LIBELLE',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class, 'SEC_CODE');
    }

    public function visiteurs()
    {
        return $this->hasMany(Visiteur::class, 'SEC_CODE');
    }
}
