<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\posts;
use App\mcqAnswerModel;
class McqModel extends Model
{
    //
    protected $table = 'mcqContent';
    protected $primaryKey = 'mcq_id';

    public function post(){
        return $this->belongsTo('App\posts','p_id','posts_id');
    }   

    public function responsedAnswerOfMcq(){
        return $this->hasMany('App\mcqAnswerModel','id_of_mcq','mcq_id');
    }
}
