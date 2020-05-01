<?php

Route::get('/', function () {
    return view('landingpage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/busqueda','HomeController@busqueda')->name('busqueda');

Route::resource('/moteles','BussinessController');

Route::resource('/reservation','ReservationController');

Route::get('/compre',function(){
	return view('reservation.process_pay');
});