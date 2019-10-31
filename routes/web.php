<?php

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

/**
 * One To One
 */
Route::get('one-to-one', 'OneToOneController@oneToOne');
Route::get('one-to-one-inverse', 'OneToOneController@oneToOneInverse');
Route::get('one-to-one-insert', 'OneToOneController@oneToOneInsert');


/**
 * One To Many
 */
Route::get('one-to-many', 'OnToManyController@onToMany');
Route::get('many-to-one', 'OnToManyController@manyToOne');
Route::get('one-to-many-two', 'OnToManyController@onToManyTwo');
Route::get('one-to-many-insert', 'OnToManyController@onToManyInsert');
Route::get('one-to-many-insert', 'OnToManyController@onToManyInsertTwo');


/**
 * Has Many to Through
 */

Route::get('has-many-through', 'OnToManyController@hasManythrough');



/**
 * Many to Many
 */

Route::get('many-to-many', 'ManyToManyController@manyToMamy');
Route::get('many-to-many-inverse', 'ManyToManyController@manyToMamyInverse');
Route::get('many-to-many-insert', 'ManyToManyController@manyToMamyInsert');

/**
 * Relation Polymorphic
 */

Route::get('polymorphics', 'PolymorphicController@polymorphic');
Route::get('polymorphics-insert', 'PolymorphicController@polymorphicInsert');






