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
 * @property string|null $LAB_EMAIL
 * @property string|null $LAB_ADRESSE
 * @property string|null $LAB_CP
 * @property string|null $LAB_VILLE
 * @property string|null $LAB_TELEPHONE
 * @property Collection|Visiteur[] $visiteurs
 * @property Collection|Collaborateur[] $collaborateurs
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
        // Champs administratifs ajoutés pour le nouveau besoin.
        'LAB_EMAIL',
        'LAB_ADRESSE',
        'LAB_CP',
        'LAB_VILLE',
        'LAB_TELEPHONE',
    ];

    public function visiteurs()
    {
        return $this->hasMany(Visiteur::class, 'LAB_CODE');
    }

    // Relation vers les collaborateurs identifiés pour ce laboratoire.
    public function collaborateurs()
    {
        return $this->hasMany(Collaborateur::class, 'LAB_CODE');
    }
}
