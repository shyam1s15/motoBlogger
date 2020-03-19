<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\boats;
use App\posts;
class students extends Model
{
    //
    protected $table = 'students';
    protected $primaryKey = 's_id';
    
    public function boats(){
        return $this->belongsToMany('App\boats','stu_boats','stu_id','b_id');
        // ->withTimestamps();
    }
    
    public function posts()
    {
        // return $this->hasMany('App\posts', 'posts_id', 's_id');
        return $this->hasMany(posts::class,'user_id','s_id');
        
    }
    
    
}
