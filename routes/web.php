<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/' , 'middleware' => 'web'], function () {
    Route::get('/SistemAdmin', 'LoginController@index')->name('/SistemAdmin');
    Route::get('/', 'HomeController@index')->name('/'); 
    Route::post('/login.check_login', 'LoginController@postlogin')->name('login.check_login');  
    Route::get('/VisiMisi', 'VisiMisiController@index')->name('/VisiMisi'); 
    Route::get('/Sejarah', 'SejarahController@index')->name('/Sejarah'); 
    Route::get('/Identitas', 'IdentitasController@index')->name('/Identitas'); 

    
    Route::get('/ProfilWaka', 'ProfilWakaController@index')->name('/ProfilWaka'); 
    Route::get('/ProfilKa', 'ProfilKaController@index')->name('/ProfilKa'); 

    Route::get('/Kegiatan', 'KegiatanController@index')->name('/Kegiatan');
    Route::get('/EktraKurikuler', 'EktraKurikulerController@index')->name('/EktraKurikuler');
    Route::get('/Video', 'VideoController@index')->name('/Video');
    
    Route::get('/Kontak', 'KontakController@index')->name('/Kontak'); 

    Route::get('/DafarPpdb_user', 'PpdbController@DafarPpdb_user')->name('/DafarPpdb_user');
    Route::post('/ppdb_user', 'PpdbController@store');
}); 

Route::group(['prefix'=>'/','middleware' => 'check'], function () {
    Route::post('logout' , '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@index')->name('/dashboard');
    Route::get('/user', 'UserController@index')->name('/user');
    Route::get('/ppdb', 'PpdbController@index')->name('/ppdb');
    Route::get('/DafarPpdb', 'PpdbController@DafarPpdb')->name('/DafarPpdb');
    Route::get('/EditPpdb/{id}', 'PpdbController@EditPpdb')->name('/EditPpdb');
    Route::post('/update_ppdb', 'PpdbController@update')->name('/update_ppdb');
    Route::get('/softdelete/{id}', 'PpdbController@softdelete')->name('/softdelete');
    Route::get('/status/{id}', 'PpdbController@status')->name('/status');
    Route::get('/print_pdf/{id}', 'PpdbController@print_pdf')->name('/print_pdf');


    Route::resource('user','UserController');
    Route::resource('ppdb','PpdbController');
});    
