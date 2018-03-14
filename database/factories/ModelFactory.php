<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'username' => $faker->word,
        'bdate' => '1995-04-03'
    ];
});

$factory->define(App\Post::class, function(Faker\Generator $faker){

    return[
        'user_id' => App\User::all()->random()->id,
        'subject' =>$faker->name,
        'quiz' =>$faker->randomNumber,
        'quiztotal' =>$faker->randomNumber,
        'assignment'=>$faker->randomNumber,
        'assignmenttotal'=>$faker->randomNumber,
        'attendance'=>$faker->randomNumber,
        'attendancetotal'=>$faker->randomNumber,
        'longexams'=>$faker->randomNumber,
        'longexamstotal'=>$faker->randomNumber,
        'finalexam'=>$faker->randomNumber,
        'finalexamtotal'=>$faker->randomNumber,
        'total'=>$faker->randomNumber,
        'status'=$faker->name,
        
        
        'quizPercent' =>$faker->randomNumber,

        'assignmentPercent'=>$faker->randomNumber,

        'attendancePercent'=>$faker->randomNumber,

        'longexamsPercent'=>$faker->randomNumber,

        'finalexamPercent'=>$faker->randomNumber,
        
    ];
});


$factory->define(App\Rating::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'subject' =>$faker->name,
        'quizPercent' =>$faker->randomNumber,
        'assignmentPercent'=>$faker->randomNumber,
        'attendancePercent'=>$faker->randomNumber,
        'longExamsPercent'=>$faker->randomNumber,
        'finalExamPercent'=>$faker->randomNumber,

    ];
});

$factory->define(App\Like::class, function (Faker\Generator $faker) {
  
    return [
        'user_id' => App\User::all()->random()->id,
        'post_id' => App\Post::all()->random()->id,
    ];
});