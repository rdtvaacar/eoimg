<?php


Route::group(['middleware' => ['web']], function () {
    Route::group(['namespace' => 'Acr\Eoimg\Controllers', 'prefix' => 'acr/eoimg'], function () {
        Route::get('/upload', 'ImgControllers@upload');
        Route::get('/arsivle/indir', 'ImgControllers@arsivle_indir');
        Route::group(['middleware' => ['auth']], function () {
        });
    });
});