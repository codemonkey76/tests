<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $Id
 * @property string $Name
 */
class Belts extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
