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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/compartir/{id}', function ($id) {
    $reunion = App\Reunione::find($id);
    return  redirect(setting('site.link').$reunion->slug);
})->name('compartir');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//reunioines
Route::group(['middleware' => 'auth'], function () {
    Route::get('/reunion/{slug}', function ($slug) {
        $reunion = App\Reunione::where('slug', $slug)->first();
        //return $reunion;
        $participantes = App\RelUserReunione::where('reunion_id', $reunion->id)->get();
        //return $participantes;
        // return $participantes;
        //return Auth::user()->id;
        $name = $reunion->name;
        if (Auth::user()->id==1 || Auth::user()->id==3 ) {
            return view('reunion', compact('name', 'reunion'));
        }else{
            return redirect('/home');

        }
        //return view('reunion', compact('name', 'reunion'));
    })->name('reunion');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
