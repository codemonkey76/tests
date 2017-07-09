<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $BeltID
 * @property string $Name
 * @property Belt $belt
 */
class Test extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['belt_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function belt()
    {
        return $this->belongsTo('App\Belts', 'belt_id', 'id');
    }
}
