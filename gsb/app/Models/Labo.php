<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Labo
 *
 * @property string $LAB_CODE
 * @property string $LAB_NOM
 * @property string $LAB_CHEFVENTE
 * @property Collection|Visiteur[] $visiteurs
 */
class Labo extends Model
{
    protected $table = 'labo';

    protected $primaryKey = 'LAB_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'LAB_NOM',
        'LAB_CHEFVENTE',
    ];

    public function visiteurs()
    {
        return $this->hasMany(Visiteur::class, 'LAB_CODE');
    }
}
