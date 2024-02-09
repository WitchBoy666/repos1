<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Carbon\Carbon;

Route::get('/{year}/{month}/{day}', function($year, $month, $day) {

    if ($year>0 && $month>0 && $day>0 && $month<13 && $day<32) {
        $date = Carbon::create($year, $month, $day);
        $dayOfWeek = $date->format('l');
        return $dayOfWeek;
    } else {
        return 'Некорректный формат даты';
    }
});

Route::get('/user-city/{user}', function ($user) {
    $users = [ 
        'user1' => 'city1', 
        'user2' => 'city2', 
        'user3' => 'city3', 
        'user4' => 'city4', 
        'user5' => 'city5'
    ];
    if (array_key_exists($user, $users)) {
        return $users[$user];
    } else {
        return "Пользователь с именем $user не найден";
    }
});

Route::get('/user/{id?}', function ($id = 0) {
    return 'id ' . $id;
});



Route::get('/', function () {
    return view('welcome');
});
