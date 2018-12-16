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

Route::get('reset_password/{token}', ['as' => 'password.reset', function($token)
{
    // implement your reset password route here!
}]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

	Route::resource('deduction', 'DeductionController');
	Route::resource('email', 'EmailController');
	Route::resource('expense', 'ExpenseController');
	Route::resource('fee', 'FeeController');
	Route::resource('income', 'IncomeController');
	Route::resource('journal', 'JournalController');
	// Route::resource('journal_purchase', 'JournalPurchaseController');


	Route::prefix('occasion')->name('occasion.')->group(function(){
		Route::get('register/{occasion}', 'OccasionController@register');
		Route::get('deregister/{occasion}', 'OccasionController@deregister');
	});

	Route::resource('occasion', 'OccasionController');
	// Route::resource('occasion_registration', 'OccasionRegistrationController');
	Route::resource('payment', 'PaymentController');
	Route::resource('registration', 'RegistrationController');
	Route::resource('user', 'UserController');
	
});
