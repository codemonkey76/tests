<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\belongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'belt_id', 'password', 'active', 'can_promote', 'instructor', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function belt()
    {
        return $this->belongsTo('App\Belt', 'belt_id','id');
    }
    public function assignTest($test_id)
    {
        $at = new AssignedTest;
        $at->user_id = $this->id;
        $at->test_id = $test_id;
        $at->save();
    }
    public function assignedTests()
    {
        return $this->hasMany('App\AssignedTest');
    }
    public function availableTests()
    {
        return Test::where('belt_id',$this->belt_id);
    }
    public static function studentsOf($id)
    {
        return static::where('instructor',$id);
    }
    public function scopeInstructors($query)
    {
        return $query->where("can_promote",true);
    }
}
