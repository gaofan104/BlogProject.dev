<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(){
        return $this->belongsToMany('App\Article');
    }
}
