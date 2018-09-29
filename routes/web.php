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

Route::get('/', function() {
	return redirect('/dashboard');
});

//Auth::routes();

//Route::get('/dashboard', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/dashboard', 'HomeController@summary')->name('summary');

Route::get('/dashboard/messages', 'HomeController@messages')->name('messages');

Route::get('/dashboard/forms', 'HomeController@forms')->name('forms');

Route::get('/dashboard/customers', 'HomeController@customers')->name('customers');

Route::get('/dashboard/payments', 'HomeController@payments')->name('payments');

Route::get('/dashboard/users', 'HomeController@users')->name('users');

Route::get('/dashboard/integrations', 'HomeController@integrations')->name('integrations');

Route::get('/dashboard/support', 'HomeController@support')->name('support');

Route::get('/api/payments/activity', 'PaymentsController@recent')->name('recentpayments'); // Payments Data Retrieval 

Route::get('/dashboard/forms/create', 'FormsController@create')->name('createform'); // Form Creation

Route::get('/dashboard/forms/edit/{id}', 'FormsController@create')->name('editform'); // Form Edit

Route::get('/dashboard/forms/list/', 'FormsController@listforms')->name('listforms'); // Form List

