<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employe
 *
 * @property int $id
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property string $adresse
 * @property string $code_postal
 * @property string $ville
 * @property Carbon $date_embauche
 */
class Employe extends Model
{
    protected $table = 'employes';

    public $timestamps = false;

    protected $casts = [
        'date_embauche' => 'datetime',
    ];

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'adresse',
        'code_postal',
        'ville',
        'date_embauche',
    ];
}
