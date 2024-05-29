<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Support\RoleSupport;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/get_records', 'DashboardController@get_records')->name('get_record');
        Route::get('/personnel', 'DashboardController@getPersonnels')->name('dashboard.personnels.get');
    });

    Route::group(['prefix' => 'management_type', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'ManagementTypeController@index')->name('get');
        Route::post('/save', 'ManagementTypeController@store')->name('save');
        Route::get('/edit/{id}', 'ManagementTypeController@edit')->name('edit');
        Route::get('/get', 'ManagementTypeController@get')->name('get');
        Route::post('/update/{id}', 'ManagementTypeController@update')->name('update');
        Route::get('/destroy/{id}', 'ManagementTypeController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'designation', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'DesignationController@index')->name('get');
        Route::post('/save', 'DesignationController@store')->name('save');
        Route::get('/edit/{id}', 'DesignationController@edit')->name('edit');
        Route::get('/get', 'DesignationController@get')->name('get');
        Route::post('/update/{id}', 'DesignationController@update')->name('update');
        Route::get('/destroy/{id}', 'DesignationController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'department', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'DepartmentController@index')->name('get');
        Route::post('/save', 'DepartmentController@store')->name('save');
        Route::get('/edit/{id}', 'DepartmentController@edit')->name('edit');
        Route::get('/get', 'DepartmentController@get')->name('get');
        Route::post('/update/{id}', 'DepartmentController@update')->name('update');
        Route::get('/destroy/{id}', 'DepartmentController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'administrative', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'AdministrativeRankController@index')->name('get');
        Route::post('/save', 'AdministrativeRankController@store')->name('save');
        Route::get('/edit/{id}', 'AdministrativeRankController@edit')->name('edit');
        Route::get('/get', 'AdministrativeRankController@get')->name('get');
        Route::post('/update/{id}', 'AdministrativeRankController@update')->name('update');
        Route::get('/destroy/{id}', 'AdministrativeRankController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'notification'], function () {
        Route::get('/', 'NotificationController@index')->name('notification.index');
        Route::get('/get', 'NotificationController@get')->name('notification.get');
    });

    Route::group(['prefix' => 'academic_rank', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'AcademicRankController@index')->name('get');
        Route::post('/save', 'AcademicRankController@store')->name('save');
        Route::get('/edit/{id}', 'AcademicRankController@edit')->name('edit');
        Route::get('/get', 'AcademicRankController@get')->name('get');
        Route::post('/update/{id}', 'AcademicRankController@update')->name('update');
        Route::get('/destroy/{id}', 'AcademicRankController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'employment_status', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'EmploymentStatusController@index')->name('get');
        Route::post('/save', 'EmploymentStatusController@store')->name('save');
        Route::get('/edit/{id}', 'EmploymentStatusController@edit')->name('edit');
        Route::get('/get', 'EmploymentStatusController@get')->name('get');
        Route::post('/update/{id}', 'EmploymentStatusController@update')->name('update');
        Route::get('/destroy/{id}', 'EmploymentStatusController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'personnel'], function () {
        Route::get('/', 'PersonnelController@index')->name('personnel.index');
        Route::get('/create', 'PersonnelController@create')->name('personnel.create')->middleware('can:'.RoleSupport::PERMISSION_CREATE_PERSONNEL);
        Route::get('/review', 'PersonnelController@review')->name('personnel.review')->middleware('can:'.RoleSupport::PERMISSION_REVIEW_PERSONNEL_STATUS);
        Route::post('/save', 'PersonnelController@store')->name('save');
        Route::get('/edit/{id}', 'PersonnelController@edit')->name('personnel.edit')->middleware('can:'.RoleSupport::PERMISSION_UPDATE_PERSONNEL);
        Route::get('/edit_personnel/{id}', 'PersonnelController@edit_personnel')->name('edit');
        Route::get('/get', 'PersonnelController@get')->name('get');
        Route::get('/get_for_review', 'PersonnelController@getForReview')->name('personnel.get_for_review');
        Route::get('/review/{id}', 'PersonnelController@reviewPersonnel')->name('personnel.review_personnel')->middleware('can:'.RoleSupport::PERMISSION_REVIEW_PERSONNEL_STATUS);
        Route::get('/{id}', 'PersonnelController@view')->name('personnel.view')->middleware('can:'.RoleSupport::PERMISSION_READ_PERSONNEL);
        Route::post('/update/{id}', 'PersonnelController@update')->name('update');
        Route::get('/destroy/{id}', 'PersonnelController@destroy')->name('delete');
        Route::get('/get_record/{id}', 'PersonnelController@get_record')->name('get_record');
        Route::post('/save_status', 'PersonnelController@save_status')->name('save_status');
        Route::post('/image/upload', 'PersonnelController@imageUpload')->name('personnel.image_upload');
    });

    Route::group(['prefix' => 'campus', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'CampusController@index')->name('get');
        Route::post('/save', 'CampusController@store')->name('save');
        Route::get('/edit/{id}', 'CampusController@edit')->name('edit');
        Route::get('/city/{id}', 'CampusController@city')->name('edit');
        Route::get('/barangay/{id}', 'CampusController@barangay')->name('edit');
        Route::get('/get', 'CampusController@get')->name('get');
        Route::post('/update/{id}', 'CampusController@update')->name('update');
        Route::get('/destroy/{id}', 'CampusController@destroy')->name('delete');
    });


    Route::group(['prefix' => 'users', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'UsersController@index')->name('index');
        Route::post('/save', 'UsersController@store')->name('save');
        Route::get('/get', 'UsersController@get')->name('get');
        Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
        Route::get('/destroy/{id}', 'UsersController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'activity_logs', 'middleware' => ["role:". RoleSupport::ROLE_SUPERADMINISTRATOR]], function () {
        Route::get('/', 'ActivityLogsController@index')->name('index');
        Route::get('/get', 'ActivityLogsController@get')->name('get');
    });

    Route::group(['prefix' => 'security'], function () {
        Route::get('/change_password', 'SecurityController@changePassword')->name('security.change_password');
        Route::post('/change_password/update', 'SecurityController@changePasswordUpdate')->name('security.change_password.update');
    });

    Route::group(['prefix' => 'reports', 'middleware' => ["can:". RoleSupport::PERMISSION_GENERATE_REPORT]], function () {
        Route::get('/', 'ReportsController@index')->name('reports.change_passwordindex');
        Route::post('/download', 'ReportsController@download')->name('reports.download');
    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::post('/mark-as-read', 'NotificationsController@markAsRead')->name('notifications.mark_as_read');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
