<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Collaborateur
 *
 * @property int $id
 * @property string $LAB_CODE
 * @property string $COL_NOM
 * @property string $COL_PRENOM
 * @property string $COL_EMAIL
 * @property string|null $COL_TELEPHONE
 * @property string $COL_POSTE
 */
class Collaborateur extends Model
{
    // Table dédiée aux collaborateurs des laboratoires.
    protected $table = 'collaborateur';

    public $timestamps = false;

    // Champs pouvant être remplis en masse lors de l'insertion.
    protected $fillable = [
        'LAB_CODE',
        'COL_NOM',
        'COL_PRENOM',
        'COL_EMAIL',
        'COL_TELEPHONE',
        'COL_POSTE',
    ];

    // Relation vers son laboratoire parent.
    public function labo()
    {
        return $this->belongsTo(Labo::class, 'LAB_CODE');
    }
}
