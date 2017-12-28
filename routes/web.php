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
header('Access-Control-Allow-Headers: X-Requested-With, origin, content-type');
Route::get('/', function () {
    return redirect('/login');
});

// front page route
Route::get('/', "FrontPageController@index");

// front page route
Route::get('/gallery/list/{id}', "FrontPageController@list");
// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");
Route::get('/user/getrole/{id}', "UserController@getRole");
Route::get('/user/getcomponent/{id}', "UserController@getComponent");
Route::get('/user/get/{id}', "UserController@get");
// role
Route::get("/role", "RoleController@index");
Route::get("/role/create", "RoleController@create");
Route::get("/role/edit/{id}", "RoleController@edit");
Route::get("/role/delete/{id}", "RoleController@delete");
Route::post("/role/save", "RoleController@save");
Route::post("/role/update", "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");
//Auth::routes();
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');

// settings
Route::get('/setting', "SettingController@index");

// category
Route::get("/category", "CategoryController@index");
Route::get("/category/create", "CategoryController@create");
Route::post("/category/save", "CategoryController@save");
Route::get("/category/delete/{id}", "CategoryController@delete");
Route::get("/category/edit/{id}", "CategoryController@edit");
Route::post("/category/update", "CategoryController@update");

// upload gallery
Route::get("/upload-gallery", "UploadGalleryController@index");
Route::get("/upload-gallery/create", "UploadGalleryController@create");
Route::post("/upload-gallery/save", "UploadGalleryController@save");
Route::get("/upload-gallery/delete/{id}", "UploadGalleryController@delete");

// upload slideshow
Route::get("/slideshow", "SlideshowController@index");
Route::get("/slideshow/create", "SlideshowController@create");
Route::post("/slideshow/save", "SlideshowController@save");
Route::get("/slideshow/delete/{id}", "SlideshowController@delete");

Route::get('/component/delete/{id}', "ComponentController@delete");
// language
Route::get('/language/{id}', "LanguageController@index");
