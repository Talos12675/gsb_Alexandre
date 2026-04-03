<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * Class Visiteur
 *
 * @property string $VIS_MATRICULE
 * @property string $VIS_NOM
 * @property string|null $Vis_PRENOM
 * @property string|null $VIS_ADRESSE
 * @property string|null $VIS_CP
 * @property string|null $VIS_VILLE
 * @property Carbon|null $VIS_DATEEMBAUCHE
 * @property string|null $SEC_CODE
 * @property string|null $LAB_CODE
 * @property Labo|null $labo
 * @property Secteur|null $secteur
 * @property Collection|Offrir[] $offrirs
 * @property Collection|RapportVisite[] $rapport_visites
 * @property Collection|Realiser[] $realisers
 * @property Collection|Travailler[] $travaillers
 */
class Visiteur extends Model
{
    protected $table = 'visiteur';

    protected $primaryKey = 'VIS_MATRICULE';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'VIS_DATEEMBAUCHE' => 'datetime',
    ];

    protected $fillable = [
        'VIS_MATRICULE',
        'VIS_NOM',
        'Vis_PRENOM',
        'VIS_ADRESSE',
        'VIS_CP',
        'VIS_VILLE',
        'VIS_DATEEMBAUCHE',
        'SEC_CODE',
        'LAB_CODE',
        'VIS_PASSWORD',
    ];

    protected $hidden = [
        'VIS_PASSWORD',
    ];

    public function setVISPasswordAttribute($value)
    {
        // Store passwords hashed (but don't double-hash already hashed strings)
        if ($value !== null && Hash::needsRehash($value)) {
            $this->attributes['VIS_PASSWORD'] = Hash::make($value);
        } else {
            $this->attributes['VIS_PASSWORD'] = $value;
        }
    }

    public function labo()
    {
        return $this->belongsTo(Labo::class, 'LAB_CODE');
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class, 'SEC_CODE');
    }

    public function offrirs()
    {
        return $this->hasMany(Offrir::class, 'VIS_MATRICULE');
    }

    public function rapport_visites()
    {
        return $this->hasMany(RapportVisite::class, 'VIS_MATRICULE');
    }

    public function realisers()
    {
        return $this->hasMany(Realiser::class, 'VIS_MATRICULE');
    }

    public function travaillers()
    {
        return $this->hasMany(Travailler::class, 'VIS_MATRICULE');
    }
}
