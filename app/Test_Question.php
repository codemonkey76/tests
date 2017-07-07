<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $TestId
 * @property integer $QuestionId
 * @property Question $question
 * @property Test $test
 */
class Test_Question extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Test_Questions';

    /**
     * @var array
     */
    protected $fillable = ['question_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo('App\Test', 'test_id', 'id');
    }
}
