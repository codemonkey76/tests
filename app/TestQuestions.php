<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $TestId
 * @property integer $QuestionId
 * @property Question $question
 * @property Test $test
 */
class TestQuestions extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'TestQuestions';

    /**
     * @var array
     */
    protected $fillable = ['QuestionId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question', 'QuestionId', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo('App\Test', 'TestId', 'Id');
    }
}
