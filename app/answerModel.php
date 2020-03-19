<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\posts;
use App\students;
class answerModel extends Model
{
    //
    protected $table = 'answer';
    protected $primaryKey = 'ans_id';

    public function student(){
        return $this->belongsTo('App\students','stu_id','s_id');
    }

    public function post(){
        return $this->belongsTo('App\posts','p_id','posts_id');
    }

}
