<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin')->name('home');

Auth::routes(['register' => false]);

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');

Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::get('/subjects/create', 'SubjectController@create')->name('subject.create');

Route::post('/subjects', 'SubjectController@store')->name('subject.store');

Route::get('/subjects/{subject}', 'SubjectController@show');

Route::get('/questions/{question}', 'QuestionController@showUpdateData')->name('question.show.update.form');

Route::get('/questions/{question}/update', 'QuestionController@update')->name('question.update');

Route::get('/subjects/{subject}/questions/create', 'QuestionController@create');

Route::post('/subjects/{subject}/questions', 'QuestionController@store');

Route::delete('/subjects/{subject}/questions/{question}', 'QuestionController@destroy');

Route::get('/users/response/{question}', 'QuestionController@surveyResult')->name('questions.all');

Route::get('/responses', 'QuestionController@responses')->name('questions.user');


Route::get('/surveys/{subject}-{slug}', 'ResponeseController@show');

Route::post('/surveys/{subject}-{slug}', 'ResponeseController@store');



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'twofactor']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});
