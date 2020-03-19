<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\posts;
class CommentModel extends Model
{
    //
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';

    public function post(){
        return $this->belongsTo('App\posts','p_id','posts_id');
    }
}
