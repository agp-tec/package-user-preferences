<?php

Route::group(['as' => 'web.', 'namespace' => 'Agp\UserPreferences\Controller\Web', 'middleware' => ['web']], function () {
    Route::resource('cidade', 'CidadeController');
});

Route::get('home', function () {
    return view('UserPreferences::cidade/index');
});

?>
