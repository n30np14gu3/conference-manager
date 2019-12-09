<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function (){ return view('pages.welcome'); });

Route::get('/test', ['uses' => 'demoController@test']);
Route::post('/demo', ['uses' => 'demoController@demo']);

Route::get('/all', function (){ return view('pages.all'); });

Route::group(['prefix' => 'tasks'], function(){

    Route::get('1', function (){ return view('pages.task-1');});
    Route::get('2', function (){ return view('pages.task-2');});
    Route::get('3', function (){ return view('pages.task-3');});
    Route::get('4', function (){ return view('pages.task-4');});
    Route::get('5', function (){ return view('pages.task-5');});
    Route::get('6', function (){ return view('pages.task-6');});

    Route::group(['prefix' => 'actions'], function(){
        Route::get('1', ['uses' => 'tasksController@task1']);
        Route::post('2', ['uses' => 'tasksController@task2']);
        Route::get('3', ['uses' => 'tasksController@task3']);
        Route::get('4', ['uses' => 'tasksController@task4']);
        Route::get('5', ['uses' => 'tasksController@task5']);
        Route::get('6', ['uses' => 'tasksController@task6']);
        Route::post('all', ['uses' => 'tasksController@all']);
    });
});
