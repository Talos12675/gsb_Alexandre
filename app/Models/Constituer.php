<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Constituer
 *
 * @property string $MED_DEPOTLEGAL
 * @property string $CMP_CODE
 * @property float $CST_QTE
 * @property Composant $composant
 */
class Constituer extends Model
{
    protected $table = 'constituer';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'CST_QTE' => 'float',
    ];

    protected $fillable = [
        'CST_QTE',
    ];

    public function composant()
    {
        return $this->belongsTo(Composant::class, 'CMP_CODE');
    }
}
