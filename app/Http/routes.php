<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/centros',
    array(
        'middleware' => ['is_admin'],
        'uses' => 'HomeController@centros'
    )
);


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('web', 'WelcomeController@web');

Route::get('datatables',
    array(
      'as'     =>'test.datatables',
      'uses'   =>'WelcomeController@datatables'
    )
  );

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
require app_path('Http/Routes/web.php');
