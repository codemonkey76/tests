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
class Results extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['TestId', 'UserId', 'QuestionId', 'AnswerId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo('App\Answer', 'AnswerId', 'Id');
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'UserId');
    }
}
