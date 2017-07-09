<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedTest extends Model
{
    public function test()
    {
        return $this->belongsTo('App\Test');
    }
}
