<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SwitchboardItem
 *
 * @property int $SwitchboardID
 * @property int $ItemNumber
 * @property string|null $ItemText
 * @property int|null $Command
 * @property string|null $Argument
 */
class SwitchboardItem extends Model
{
    protected $table = 'switchboard items';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'SwitchboardID' => 'int',
        'ItemNumber' => 'int',
        'Command' => 'int',
    ];

    protected $fillable = [
        'SwitchboardID',
        'ItemNumber',
        'ItemText',
        'Command',
        'Argument',
    ];
}
