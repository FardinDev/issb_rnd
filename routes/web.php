<?php
use App\Events\NewPostAdded;
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

Route::get('/', function () {
    // $role =  Spatie\Permission\Models\Role::create(['name' => 'admin']);
    // $permission = Spatie\Permission\Models\Permission::create(['name' => 'view-posts']);
    // $role->givePermissionTo($permission);
    // $role = Spatie\Permission\Models\Role::first();
    // $permission = Spatie\Permission\Models\Permission::first();

//     $user = App\User::where('email', 'fardin@mcc.com.bd')->first();

//    dd( $user->getRoleNames() );

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/import-thana', 'ThanaController@importThana');

// Route::get('/import-user', 'UserController@importUser');

// Route::get('/make-realation', 'ThanaUserController@makeRealation');

// Route::get('/phone', 'Api\PhonebookController@phonebook');

Route::get('/posts/index', 'Admin\PostController@index')->name('post.index');

Route::get('/posts/show/{id}', 'Admin\PostController@show')->name('post.show');

Route::get('/posts/ajax', 'Admin\PostController@ajax')->name('post.ajax');

Route::post('/comment/post/{id}', 'Admin\CommentController@post')->name('comment.post');

Route::get('/user', 'UserController@userThanas');

Route::get('/get-unread-notification', 'NotificationController@getUnreadNotification')->name('get.unread.notification');


Route::get('/thana-users', 'ThanaController@thanaUsers');

Route::get('/notification', 'NotificationController@notificationPage')->name('notification');

Route::get('/send-notification', 'NotificationController@notificationForm')->name('notification.form');

Route::post('/send-notification', 'NotificationController@notificationSend')->name('notification.send');



// users

Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/user-add', 'UserController@create')->name('user.create');
Route::post('/user-add', 'UserController@store')->name('user.store');
Route::get('/user-show/{id}', 'UserController@show')->name('user.show');
Route::get('/user-edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user-destroy/{id}', 'UserController@destroy')->name('user.destroy');

