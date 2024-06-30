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

Route::middleware(['locale'])->namespace('Frontend')->group(function () {
    Route::get('/', 'HomepageController@index')->name('homepage');
    Route::get('/tier-list', 'HomepageController@tierList')->name('tierList');
    Route::post('ajax-tierlist', 'HomepageController@ajaxTierList')->name('ajaxTierList');
    // route watch
    Route::get('/guides', 'HomepageController@guides')->name('guides');
    Route::get('/comps', 'HomepageController@comps')->name('comps');
    // route learn
    Route::get('/learn', 'HomepageController@learn')->name('learn');

    Route::get('/encounters', 'HomepageController@encounters')->name('encounters');
    //Route::post('/encounter-type', 'HomepageController@encountersType')->name('ajaxEncountersType');

    Route::get('/champions', 'HomepageController@champions')->name('champions');
    Route::post('/champion-type', 'HomepageController@championsType')->name('ajaxChampionsType');

    Route::get('/items', 'HomepageController@items')->name('items');
    Route::post('/item-type', 'HomepageController@itemsType')->name('ajaxItemsType');

    Route::get('/traits', 'HomepageController@traits')->name('traits');
    Route::post('/trait-type', 'HomepageController@traitsType')->name('ajaxTraitsType');

    Route::get('/augments', 'HomepageController@augments')->name('augments');
    Route::post('/augment-type', 'HomepageController@augmentType')->name('ajaxAugmentType');

    Route::get('/new-player', 'HomepageController@newPlayer')->name('newPlayer');
    Route::get('/returning-player', 'HomepageController@returnPlayer')->name('returnPlayer');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
