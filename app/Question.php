<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Question
 * @property integer $AnswerId
 * @property Answer $answer
 */
class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question', 'answer_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo('App\Answer', 'answer_id', 'id');
    }
}
