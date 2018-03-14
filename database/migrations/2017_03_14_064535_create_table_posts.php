<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->text('subject');
            $table->integer('quiz');
            $table->integer('quiztotal');
            $table->integer('assignment');
            $table->integer('assignmenttotal');
            $table->integer('attendance');           
            $table->integer('attendancetotal');
            $table->integer('longexams');
            $table->integer('longexamstotal');
            $table->integer('finalexam');
            $table->integer('finalexamtotal');
            $table->integer('total');
           
            $table->integer('quizPercent');
        
            $table->integer('assignmentPercent');
       
            $table->integer('attendancePercent');
            $table->integer('longexamsPercent');
            $table->integer('finalexamPercent');
    
            $table->text('status');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
