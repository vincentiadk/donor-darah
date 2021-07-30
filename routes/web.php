<?php

use Illuminate\Support\Facades\Route;
Route::match(['get', 'post'], 'login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');
Route::get('auth/check-login', 'AuthController@checkLogin');

Route::middleware('auth.login')->group(function () {
    Route::get('/', 'DashboardController@index');

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('profile', 'ProfileController@index');
        Route::post('profile/store', 'ProfileController@store');

        Route::get('donor-history', 'DonorHistoryController@index');
        Route::get('donor-history/show', 'DonorHistoryController@show');
        Route::post('donor-history/delete', 'DonorHistoryController@delete');
        Route::post('donor-history/datatable', 'DonorHistoryController@datatable');
        Route::post('donor-history/store', 'DonorHistoryController@store');
        
        Route::get('medical-history', 'MedicalHistoryController@index');
        Route::post('medical-history/store', 'MedicalHistoryController@store');

        Route::get('preference', 'PreferenceController@index');
        Route::post('preference/store', 'PreferenceController@store');
        Route::post('preference/delete-location', 'PreferenceController@deleteLocation');

        Route::get('log', 'LogController@index');
        Route::post('log/datatable', 'LogController@datatable');

        Route::get('need-blood', 'NeedBloodController@index');
        Route::post('need-blood/datatable', 'NeedBloodController@datatable');

        Route::get('reseptor', 'ReseptorController@index');
        Route::get('reseptor/add', 'ReseptorController@add');
        Route::get('reseptor/view/{id}', 'ReseptorController@view');
        Route::get('reseptor/donor-potential/{id}', 'ReseptorController@donorPotential');
        Route::post('reseptor/store', 'ReseptorController@store');

        Route::get('role', 'RoleController@index');
        Route::post('role/datatable', 'RoleController@datatable');
        Route::post('role/store', 'RoleController@store');

        Route::post('select2/provinsi', 'Select2Controller@getProvinsi');
        Route::post('select2/kabupaten', 'Select2Controller@getKabupaten');
        Route::post('select2/kecamatan', 'Select2Controller@getKecamatan');
        Route::post('select2/kelurahan', 'Select2Controller@getKelurahan');
        Route::post('select2/role', 'Select2Controller@getRole');
        Route::post('select2/user', 'Select2Controller@getUser');
        Route::post('select2/location-preference', 'Select2Controller@getLocationPreference');

        Route::get('user', 'UserController@index');
        Route::post('user/datatable', 'UserController@datatable');
        Route::post('user/store', 'UserController@store');
        Route::get('user/show/{id}', 'UserController@show');
        Route::get('user/setting', 'UserController@setting');
        Route::post('user/enable', 'UserController@enable');
        Route::post('user/disable', 'UserController@disable');


        Route::get('provinsi', 'ProvinsiController@index');
        Route::post('provinsi/datatable', 'ProvinsiController@datatable');
        Route::get('kabupaten', 'KabupatenController@index');
        Route::post('kabupaten/datatable', 'KabupatenController@datatable');
        Route::get('kecamatan', 'KecamatanController@index');
        Route::post('kecamatan/datatable', 'KecamatanController@datatable');
        Route::get('kelurahan', 'KelurahanController@index');
        Route::post('kelurahan/datatable', 'KelurahanController@datatable');

    });
});
