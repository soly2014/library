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
/*
Route::get('loll', function () {
   // return view('welcome');
	return "my first appp";
}); */
/*

Route::get('/',function(){

//return view('welcome');
return '<p>this is the home page back to <a href="about">about</a></p>';
//return Redirect::to('about');

});


Route::get('about',function(){

	return 'this  is aboutme <a href="about/0000">custom</a>';
});


Route::get('about/{myname}',function($myname = null){

	return '<p>this is '.$myname.' me page back to <a href="/">home</a>or back to <a href="/about">about</a></p>';
})->where('myname','[0-9]+'); */


//Route::get('library','authorController@index');
Route::get('library',function(){
    return 'lolllllll';
});

Route::get('library/admin','sectionControler@admin');

Route::get('library/admin/create','sectionControler@create')->name('create');

Route::post('library/admin/create',['middleware'=>'create:superadmin,admin','uses'=>'sectionControler@create'])->name('create');

Route::put('library/admin/{id}',['middleware'=>'update:superadmin,editor','uses'=>'sectionControler@update'])->name('update');

Route::delete('library/admin/{id}',['middleware'=>'delete:superadmin','uses'=>'sectionControler@delete'])->name('delete');

// Remember the day you have wasted to dissolve and finally added delete-forever in route name 

Route::post('library/admin/delete-forever/{id}','sectionControler@deleteForever')->name('delete-forever');

Route::post('library/admin/{id}','sectionControler@restore')->name('restore');



Route::get('library/books/{id}','sectionControler@showBooks')->name('books');

Route::get('library/books/add/{id}','booksController@create')->name('add-books');

Route::post('library/books/add/{id}','booksController@create')->name('add-books');

Route::put('library/books/{id}','booksController@update')->name('books-update');

Route::delete('library/books/delete/{id}','booksController@delete')->name('books-delete');

Route::get('library/author/{id}','authorController@showAuthor')->name('author');




Route::get('library/summery','booksController@summery')->name('summery');


////////////////////////////////////////////////////////////////////////////////////////
///
///         auth credintials                             /////////////////////////////////
///         and reset password                           /////////////////////////////////
///
///////////////////////////////////////////////////////////////////////////////////////

Route::get('/auth/login','Auth\AuthController@getLogin');
Route::post('/auth/login','Auth\AuthController@postLogin');
Route::get('/auth/logout','Auth\AuthController@getLogout');

Route::get('/auth/register','Auth\AuthController@getRegister');
Route::post('/auth/register','Auth\AuthController@postRegister');

// forget password credentials
Route::get('/password/email','Auth\PasswordController@getEmail');
Route::post('/password/email','Auth\PasswordController@postEmail');

Route::get('/password/reset/{token}','Auth\PasswordController@getReset');
Route::post('/password/reset','Auth\PasswordController@postReset');

Route::get('/auth/facebook','Auth\AuthController@redirectToProvider');
Route::get('/callback','Auth\AuthController@handleProviderCallback');




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
Route::get('library/create',function ()
{
		
	return '<center><h1>add the new section to the library</h1></center> ';

});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('library/create',function ()
{

	$sectionName    = Input::get('sectionName');
	$sectionDetails = Input::get('sectionDetails');
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('library/{sectionName}',function ($sectionName){

	return '<center><h1>this page for '.$sectionName.'section</h1></center> ';

});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::patch('library/{sectionName}/edit',function ($sectionName){

	return '<center><h1>return the form for editing '.$sectionName.' section</h1></center> ';

});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::delete('library/{sectionName}/delete',function ($sectionName){

	return '<center><h1>return the form for delete'.$sectionName.' section</h1></center> ';

});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






























