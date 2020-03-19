<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcqAnswerModel extends Model
{
    //
    protected $table = 'mcq_answers';
    protected $primaryKey = 'mcq_ans_id';

    public function mcq(){
        return $this->belongsTo('App\McqModel','id_of_mcq','mcq_id');
    }   
}
