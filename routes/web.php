<?php

use App\Humanoid;

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

Route::get('/', function() {
    return view('main', [
        'paginated' => Humanoid::paginate(5)
    ]);
});

// humanoid prefix
Route::prefix('humanoid')->group(function () {
    Route::post('create', 'HumanoidController@create');
});

