<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function() {
    Route::get('contacts', 'App\Http\Controllers\ContactController@index')->name('contacts');
    Route::get('contacts/create', 'App\Http\Controllers\ContactController@create')->name('create_contacts');
    Route::post('contacts', 'App\Http\Controllers\ContactController@store');
    Route::get('contacts/{contact}/edit', 'App\Http\Controllers\ContactController@edit');
    Route::patch('contacts/{contact}', 'App\Http\Controllers\ContactController@update');
    Route::delete('contacts/{contact}', 'App\Http\Controllers\ContactController@destroy');
    Route::get('thank_you', 'App\Http\Controllers\ThankYouController');
});

require __DIR__.'/auth.php';
