<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $BeltID
 * @property string $Name
 * @property Belt $belt
 */
class Tests extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['BeltID', 'Name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function belt()
    {
        return $this->belongsTo('App\Belts', 'BeltID', 'Id');
    }
}
