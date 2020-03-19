<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\students;
use App\CommentModel;
use App\McqModel;
use App\boats;
use App\answerModel;
class posts extends Model
{
    //
    protected $table = 'posts';
    protected $primaryKey = 'posts_id';
    protected $fillable = ['user_id','type','description','file','b_id'];
    
    
    public function student()
    {
        return $this->belongsTo('App\students','user_id','s_id');
    }
    
    
    public function comments()
    {
        return $this->hasMany('App\CommentModel', 'p_id', 'posts_id');
    }
    
    public function mcqs(){
        return $this->hasMany('App\McqModel', 'p_id', 'posts_id');
    }

    public function boat()
    {
        return $this->belongsTo('App\boats','b_id','boat_id');
    }

    public function answers(){
        return $this->hasMany('App\answerModel','p_id','posts_id');
    }
    
}
