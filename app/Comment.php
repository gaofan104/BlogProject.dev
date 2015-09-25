<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $fillable = [
        'article_id',
        'user_id',
        'content',
        'published_at'
    ];

    protected $dates = ['published_at'];

    //setPublishedAtAttribute
    public function setPublishedAtAttribute(){
        $this->attributes['published_at'] = Carbon::now();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function article(){
        return $this->belongsTo('App\Article');
    }
}
