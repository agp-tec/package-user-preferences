<?php

Route::group(['as' => 'web.', 'namespace' => 'Agp\UserPreferences\Controller\Web', 'middleware' => ['web']], function () {
    Route::get('user-preferente', 'UserPreferenceController@get');
    Route::post('user-preferente', 'UserPreferenceController@update');
});

?>
