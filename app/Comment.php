<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'published_at'
    ];

    protected $dates = ['published_at'];

    //setPublishedAtAttribute
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function article(){
        return $this->belongsTo('App\Article');
    }
}
