<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AlternateContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DebugController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\NewApplicationController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Debug Controller
if (App::environment(['local', 'dev'])) {

    Route::post('/debug/login', [DebugController::class, 'login'])->name('debug.login');
    Route::get('/debug/loginas', [DebugController::class, 'loginAs'])->name('debug.loginAs');
}

Route::group(['middleware' => ['auth']], function () {
    // New Application
    Route::name('newapplication.')->prefix('newapplication')->group(function () {
        Route::get('initiate', [NewApplicationController::class, 'initiate'])->name('initiate');

        Route::get('demographic/{newApplication}', [NewApplicationController::class, 'demographic'])->name('demographic');
        Route::match(['put', 'patch', 'post'], 'savedemographic', [NewApplicationController::class, 'savedemographic'])->name('savedemographic');

        Route::get('contact/{newApplication}', [NewApplicationController::class, 'contact'])->name('contact');
        Route::match(['put', 'patch', 'post'], 'savecontact', [NewApplicationController::class, 'savecontact'])->name('savecontact');

        Route::get('insurance/{newApplication}', [NewApplicationController::class, 'insurance'])->name('insurance');
        Route::match(['put', 'patch', 'post'], 'saveinsurance', [NewApplicationController::class, 'saveinsurance'])->name('saveinsurance');

        Route::get('income/{newApplication}', [NewApplicationController::class, 'income'])->name('income');
        Route::match(['put', 'patch', 'post'], 'saveincome', [NewApplicationController::class, 'saveincome'])->name('saveincome');

        Route::get('household/{newApplication}', [NewApplicationController::class, 'household'])->name('household');
        Route::match(['put', 'patch', 'post'], 'savehousehold', [NewApplicationController::class, 'savehousehold'])->name('savehousehold');

        Route::get('alternate/{newApplication}', [NewApplicationController::class, 'alternate'])->name('alternate');
        Route::match(['put', 'patch', 'post'], 'savealternate', [NewApplicationController::class, 'savealternate'])->name('savealternate');

        Route::get('alternatecontact/{newApplication}', [NewApplicationController::class, 'alternatecontact'])->name('alternatecontact');
        Route::match(['put', 'patch', 'post'], 'savealternatecontact', [NewApplicationController::class, 'savealternatecontact'])->name('savealternatecontact');

        Route::get('proofs/{newApplication}', [NewApplicationController::class, 'proofs'])->name('proofs');
        Route::match(['put', 'patch', 'post'], 'saveproofs', [NewApplicationController::class, 'saveproofs'])->name('saveproofs');

        Route::get('signature/{newApplication}', [NewApplicationController::class, 'signature'])->name('signature');
        Route::match(['put', 'patch', 'post'], 'savesignature', [NewApplicationController::class, 'savesignature'])->name('savesignature');

        Route::get('review/{newApplication}', [NewApplicationController::class, 'review'])->name('review');
        Route::match(['put', 'patch', 'post'], 'savereview', [NewApplicationController::class, 'savereview'])->name('savereview');
    });

    // Addresses
    Route::resource('newapplication.addresses', AddressController::class)->parameters(['newapplication' => 'newApplication'])->shallow();

    // Phone Numbers
    Route::resource('newapplication.phonenumbers', PhoneNumberController::class)->parameters(['newapplication' => 'newApplication'])->shallow();

    // Households
    Route::resource('newapplication.households', HouseholdController::class)->parameters(['newapplication' => 'newApplication'])->shallow();

    // Alternate Contacts
    Route::resource('newapplication.alternatecontacts', AlternateContactController::class)->parameters(['newapplication' => 'newApplication'])->shallow();

    // Files
    Route::resource('files', FileController::class)->except(['index', 'show']);
    Route::get('file/download/{file}', [FileController::class, 'download'])->name('file.download');

    // Users
    Route::resource('users', UserController::class);
    Route::get('users/register', [UserController::class, 'showRegistrationForm'])->name('users.showRegistrationForm');
    Route::post('users/register', [UserController::class, 'register'])->name('users.register');
    // Route::get('users/{id}', 'UserController@show')->name('users.show');
    // Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
    // Route::match(['put', 'patch', 'post'], 'users/{user}', 'UserController@update')->name('users.update');

    // Agency
    Route::resource('agency', AgencyController::class);
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    // Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');

    // Email Logs
    // Route::get('emaillogs', 'EmailLogController@index')->name('emaillogs.index');
    // Route::get('emaillogs/{id}', 'EmailLogController@show')->name('emaillogs.show');

});

//Auth::routes();