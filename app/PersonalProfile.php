<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    protected $table = 'personalProfiles';

    protected $fillable = [
        'user_id',
        'occupation'
    ];

    protected $dates = ['published_at', 'deleted_at'];

    /**
     * article belong to a user
     * @return mixed
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
