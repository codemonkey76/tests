<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property integer $QuestionId
 * @property string $Answer
 * @property string $created_at
 * @property string $updated_at
 * @property Question $question
 */
class Answers extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question_id', 'answer', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }
}
