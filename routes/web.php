<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('car_brands', 'CarBrandsController');
    Route::post('car_brands_mass_destroy', ['uses' => 'CarBrandsController@massDestroy', 'as' => 'car_brands.mass_destroy']);
    Route::resource('car_models', 'CarModelsController');
    Route::post('car_models_mass_destroy', ['uses' => 'CarModelsController@massDestroy', 'as' => 'car_models.mass_destroy']);
    Route::resource('car_numbers', 'CarNumbersController');
    Route::post('car_numbers_mass_destroy', ['uses' => 'CarNumbersController@massDestroy', 'as' => 'car_numbers.mass_destroy']);
    Route::resource('tires', 'TiresController');
    Route::post('tires_mass_destroy', ['uses' => 'TiresController@massDestroy', 'as' => 'tires.mass_destroy']);


    Route::get('/find_tires_by_car_numbers', 'FindTiresByCarNumbersController@index')->name('find_tires_by_car_numbers.index');
    Route::post('/find_tires_by_car_numbers', 'FindTiresByCarNumbersController@find')->name('find_tires_by_car_numbers.find');
});