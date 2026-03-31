<?php
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;





// routes/web.php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/', [PageController::class, 'index']);
	Route::get('/test', function(){
        return view('test');
    });

});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
