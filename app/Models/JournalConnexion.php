<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalConnexion extends Model
{
    protected $table = 'journal_connexions';

    protected $primaryKey = 'idConnexion';

    public $timestamps = false;

    protected $fillable = [
        'idUtilisateur',
        'dateConnexion',
        'adresseIP',
        'userAgent',
    ];

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'idUtilisateur', 'VIS_MATRICULE');
    }
}
