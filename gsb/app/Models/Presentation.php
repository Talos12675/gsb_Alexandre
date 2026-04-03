<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Presentation
 *
 * @property string $PRE_CODE
 * @property string $PRE_LIBELLE
 * @property Collection|Formuler[] $formulers
 */
class Presentation extends Model
{
    protected $table = 'presentation';

    protected $primaryKey = 'PRE_CODE';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'PRE_LIBELLE',
    ];

    public function formulers()
    {
        return $this->hasMany(Formuler::class, 'PRE_CODE');
    }
}
