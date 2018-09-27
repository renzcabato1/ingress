<?php

Route::group( ['middleware' => 'auth'], function()
{
Route::get('/show-barcode-list', 'barcodeController@show_barcode_list');
Route::get('/barcode', 'barcodeController@show');
Route::post('/new_barcode', 'barcodeController@barcode');
Route::get('/print-barcode/{id}', 'barcodeController@print');
Route::get('/edit-visitor/{id}', 'barcodeController@editvisitor');
Route::post('/edit-visitor/{id}','barcodeController@saveeditvisitor');
Route::get('/out-visitor/{id}','barcodeController@outvisitor');
Route::get('/visitors-history', 'barcodeController@visitors_history');
Route::get('/change-password', 'accountController@change_password');
Route::post('/change-password', 'accountController@save_change_password');


Route::group( ['middleware' => 'admin'], function()
{
Route::get('/history-log', 'barcodeController@logActivity');
Route::get('/new-account', 'accountController@new_account');
Route::get('/deactivate-account/{id}', 'accountController@deactivate_account');
Route::get('/activate-account/{id}', 'accountController@activate_account');
Route::post('/new-account', 'accountController@save_new_account');
Route::get('/reset-account/{id}','accountController@reset_account');
Route::get('/view-account', 'accountController@account_list');
});
    
});

Auth::routes();

Route::get('/home','HomeController@index');
Route::get('/','HomeController@index');

