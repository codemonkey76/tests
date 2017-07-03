<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Question
 * @property integer $AnswerId
 * @property Answer $answer
 */
class Questions extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Question', 'AnswerId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo('App\Answer', 'AnswerId', 'Id');
    }
}
