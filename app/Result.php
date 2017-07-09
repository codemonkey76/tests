<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $TestId
 * @property integer $UserId
 * @property integer $QuestionId
 * @property integer $AnswerId
 * @property Answer $answer
 * @property Question $question
 * @property Test $test
 * @property User $user
 */
class Result extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['test_id', 'user_id', 'question_id', 'answer_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo('App\Answer', 'answer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo('App\Test', 'test_id', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
