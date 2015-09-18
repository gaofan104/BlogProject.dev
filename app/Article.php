<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{

    use Eloquent\SoftDeletes;
    //used to rename the table name, otherwise plural of article will be used
    //protected $table = 'my_users';

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'author',
        'user_id'
    ];

    protected $dates = ['published_at', 'deleted_at'];

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query){
        $query->where('published_at', '>=', Carbon::now());
    }

    //setPublishedAtAttribute
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * article belong to a user
     * @return mixed
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
