<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table ="courses";

    public function users() {

        return $this->belongsToMany('App\User','user_course','course_id','user_id')->withPivot('result')->withPivot('id');
    } 


  
}
