<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class boats extends Model
{
    //
    protected $table = 'boats';
    protected $primaryKey = 'boat_id';

    public function students(){
        return $this->belongsToMany('App\students','stu_boats','b_id','stu_id');
    }

    public function posts()
    {
        // return $this->hasMany('App\posts', 'posts_id', 's_id');
        return $this->hasMany(posts::class,'b_id','boat_id');    
    }
    
    
    

}
