<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
//    	'subject','quiz', 'quiztotal', 'quizPercent','assignment','assignmentPercent', 'assignmenttotal', 'attendance', 'attendancePercent','attendancetotal', 'longexams','longexamsPercent', 'longexamstotal', 'finalexam', 'finalexamtotal', 'finalexamPercent','user_id', 'total'
        'subject','quiz', 'quiztotal','assignment', 'assignmenttotal', 'attendance','attendancetotal', 'longexams', 'longexamstotal', 'finalexam', 'finalexamtotal','user_id', 'total'
    ];

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
//